<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StatusFilter extends Component
{


    public $status = 'All';
    public $statusCount;
    protected $queryString = [
        'status'
    
    ];
    public function mount()
    {
        $this->statusCount =Status::getCount();
        // dd($this->statusCount);
        // $this->status = request()->query('status', 'All');
        // dd(Route::currentRouteName());
        if(Route::currentRouteName()  == 'idea.show' ) {
            $this->status =null;
            $this->queryString = [];
        }
    }

    public function getStatusCount()
    {
        Idea::query()
            ->selectRaw("count(*) as all_statuses")
            // ->selectRaw("count(case when status_id = 1 then 1 end ) as Open")
            // ->selectRaw("count(case when status_id = 2 then 1 end ) as Considering")
            // ->selectRaw("count( case when status_id = 3 then 1 end ) as In_Progress")
            // ->selectRaw("count( case when status_id = 4 then 1 end ) as Implemented")
            // ->selectRaw("count( case when status_id = 5 then 1 end ) as Closed")
            ->first()
            ->toArray();
            // ->groupBy('status_id')
            // ->get()
            // ->each(function ($status) {
            //     $this->statusCount[$status->status_id] = $status->total;

    }

    public function getPreviosRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }

    public function setStatus($status)
    {
        // dd(request()->status());
        $this->status = $status;
        // dd(app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName());
        // if ($this ->getPreviosRouteName() ==='idea.show'){

            return redirect()->route('ideas.index',[
                'status' => $status
            ]);
        // }

        
        

    }


    public function render()
    {
        return view('livewire.status-filter');
    }
}
