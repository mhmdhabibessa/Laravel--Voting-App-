<?php

namespace App\Models;

use App\Exceptions\DoublicateVoteByUser;
use App\Exceptions\VoteNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// use Cviebrock\EloquentSluggable\Sluggable;


class Idea extends Model
{
    use HasFactory;
    const PAGGING_COUNT = 10 ;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class,'votes');
    }


    public function getStatusClasses() 
    {
      
        $allStatuses = [
            'Open' => 'bg-gray-500',
            'Considering' => 'bg-purple	 text-white',
            'In Progress' => 'bg-yellow-500 text-white' ,
            'Implemented' => 'bg-green-500 text-white', 
            'Closed' => 'bg-red-500 text-white' ,
        ];

        return $allStatuses[$this->status->name];
    }

    public function isVotedByUser(?User $user)
    {
        
        if (!$user) {
            
            return false.'No User Found';
        }
        return 
            // DB::table('votes')
            Vote::where('user_id', $user->id)
                ->where('id', $this->id)
                ->exists();

    //     return Vote::where('user_id', $user->id)
    //         ->where('idea_id', $this->id)
    //         ->exists();
    }

    public function vote(User $user)
    {
        if($this->isVotedByUser($user)) {
            throw new DoublicateVoteByUser();
        }

        $this->votes_count++;

        Vote::create([
            'user_id' => $user->id,
            'idea_id' => $this->id,
    ]); 
   
    }

    public function removevote(User $user)
    {
        $votetoDelete = Vote::where('user_id', $user->id)
                            ->where('idea_id', $this->id)
                            ->first(); 
            if($votetoDelete) {
                $votetoDelete->delete();
                $this->votes_count--;
            }
            else {
                throw new VoteNotFoundException();   
            }
            
    }
}