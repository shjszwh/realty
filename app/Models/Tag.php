<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $fillable = [
        'user_id',
        'tag_able_type',
        'tag_able_id',
        'title',
    ];

    public function tag_able()
    {
        return $this->morphTo();
    }

    public function getTags()
    {
        $tags = self::select(DB::raw('title,count(title) number'))
            ->orderBy('number')
            ->get();
        dd($tags);
    }
    //
}
