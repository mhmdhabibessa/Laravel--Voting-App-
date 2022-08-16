<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IdeaTest extends TestCase
{

  use RefreshDatabase;

  public function can_check_if_idea_isvoted_for_by_user()
  {

    $user = User::factory()->create();
    $userB = User::factory()->create();

    $categoryOne = Category::factory()->create(['name'=> 'Category One']);
    $statusOpen = Status::factory()-> create(['name' => 'Open']);

    $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id'=> $categoryOne->id,
        'status_id' => $statusOpen->id,
        'title' => ' First Idea' , 
        'description' => ' Description to Test',
    ]);
    // $idea->votes()->sync([$user->id]);
    Vote::factory()->create([
        'user_id' => $user->id,
        'idea_id' => $idea->id,
    ]);

    $this ->assertTrue($idea->isVotedByUser($user));
    



    }
}
