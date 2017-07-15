<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

/**
 * Class User
 * @package App\Models
 * @property Collection $articles
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function createTags()
    {
        return $this->hasMany(Tag::class);
    }

    public function dirs()
    {
        return $this->hasMany(Dir::class);
    }

    public function getCreatedTags()
    {
        $tags = Tag::select(DB::raw('title,count(title) number'))
                ->where('user_id',$this->id)
                ->groupBy('title')
                ->get()->toArray();
        return $tags;
    }

    public function tags()
    {
        $this->morphTo(Tag::class, 'tagsTable');
    }
}
