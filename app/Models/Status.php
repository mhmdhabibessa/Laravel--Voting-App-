<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;


    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public static function getCount(){
        return
        Idea::query()
        ->selectRaw("count(*) as all_statuses")
        ->selectRaw("count(case when status_id = 1 then 1 end ) as Open")
        ->selectRaw("count(case when status_id = 2 then 1 end ) as Considering")
        ->selectRaw("count( case when status_id = 3 then 1 end ) as In_Progress")
        ->selectRaw("count( case when status_id = 4 then 1 end ) as Implemented")
        ->selectRaw("count( case when status_id = 5 then 1 end ) as Closed")
        ->first()
        ->toArray();
    }
}

