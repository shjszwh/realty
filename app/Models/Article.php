<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public function user()
	{
		$this->belongsTo(User::class);
	}

	public function content()
	{
		$this->hasOne(Article::class);
	}

	public function tags()
	{
		$this->morphTo(Tag::class, 'tagsTable');
	}

	public function dirs()
	{
		$this->morphTo(DirContent::class, 'dirTable');
	}
	//
}
