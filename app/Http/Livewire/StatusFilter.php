<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StatusFilter extends Component
{


    public $status;
    public $statusCount;

    public function mount()
    {
        
        $this->statusCount =Status::getCount();
        $this->status = request()->status ?? 'ALL';
            if(Route::currentRouteName()  == 'idea.show' ) {
                $this->status =null;
            }
    }

 

    public function getPreviosRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->emit('QureyStringUpdated', $this->status);

            if ($this ->getPreviosRouteName() ==='idea.show'){
                return redirect()->route('ideas.index',[
                    'status' => $status
                ]);
            }

    }


    public function render()
    {
        return view('livewire.status-filter');
    }
}
