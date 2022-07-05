<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $description;
    public $category = 1;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'required|min:3',
        'category' => 'required|integer|min:1|max:4',
    ];

    public function render()
    {
        return view('livewire.create-idea',
        [
            'categories' => Category::all()
        ]
    );
    }

    public function createIdea()
    {
        // crete idea 
        if (auth()->check()) {
            $this ->validate();
            Idea::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'status_id' => 1,
                'title' => $this->title,
                'description' => $this->description,
            ]);

            session()->flash('success_message', 'Idea created successfully');
            $this->reset();
            return redirect('/');
        }

        abort(Response::HTTP_FORBIDDEN);
        
    }
}
