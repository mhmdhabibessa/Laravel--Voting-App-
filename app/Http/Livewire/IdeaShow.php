<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;
    // public $hasVoted;
    protected $listeners =['statusWasUpdated'];
    
    public function mount(Idea  $idea , $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->has_voted = $idea->isVotedByUser(auth()->user()); 
        // Log::debug('Output:'.$idea->isVotedByUser(auth()->user()) );  
    }

    public function vote(User $user)
    {   

        if(! auth() ->check()) {
            return redirect( route('login') );
        }
 
        if ($this->has_voted) {
            $this->idea->removevote(auth() ->user());
            $this -> votesCount --;
            $this -> has_voted = false;
        }
        else {
            $this->idea->vote(auth() ->user());
            $this -> votesCount ++;
            $this -> has_voted = true;
        }
    }
    
    public function statusWasUpdated(){

        $this->idea->refresh();
    }

    public function render()
    {
        return view('livewire.idea-show', [
            'idea' => $this->idea,
        ]);
    }
}
