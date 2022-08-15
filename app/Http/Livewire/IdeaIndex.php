<?php

namespace App\Http\Livewire;

use App\Exceptions\DoublicateVoteByUser;
use App\Exceptions\VoteNotFoundException;
use App\Models\Idea;
use Livewire\Component;

class IdeaIndex extends Component
{

    public $idea;
    public $voteCount;
    // public $hasVoted;
    
    public function mount(Idea  $idea , $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->voted_by_user; 
    }
    
    public function vote()
    {   

        if(! auth() ->check()) {
            return redirect( route('login') );
        }
        
    
        if(! auth() ->check()) {
            return redirect( route('login') );
        }

 
        if ($this->hasVoted) {

            try {
                
                $this->idea->removevote(auth() ->user());
            }
            catch (VoteNotFoundException $e) {
                // session()->flash('message', $e->getMessage());
            }
            $this -> votesCount --;
            $this -> has_voted = false;
        }
        else {
            try {
                $this->idea->vote(auth() ->user()); 
            }
            catch (DoublicateVoteByUser $e) {
                // session()->flash('message', $e->getMessage());
            }
            $this -> votesCount ++;
            $this -> has_voted = true;
        }
            
    }
    public function render()
    {
        return view('livewire.idea-index');
    }
}
