<?php

namespace App\Http\Livewire;

use App\Mail\IdeaStatusUpdatedMailable;
use App\Models\Idea;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $notifyallvoters;
    public function mount(Idea $idea){

        $this->idea=$idea;
        $this->status = $this->idea->status_id; 
    }

    public function setStatus(){
        
        if(! auth()->check() || ! auth()->user()->isAdmin()){
                abort(Response::HTTP_FORBIDDEN);
            }
            $this->idea->status_id = $this->status;
            $this->idea->save();

            if($this->notifyallvoters) {
                $this->notifyallvoters();
            }

            $this->emit('statusWasUpdated');
    }

    public function notifyallvoters(){

        $this->idea->votes()
                    ->select('name','email')
                    ->chunk(100,function($voters){
                        foreach($voters as $user){
                            Mail::to($user)
                                ->queue(new IdeaStatusUpdatedMailable($this->idea));
                          }   
                    });
                    
                 
    }



    public function render()
    {
        return view('livewire.set-status');
    }
}
