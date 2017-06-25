<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dir extends Model
{
	public function tags()
	{
		$this->morphTo(Tag::class, 'item');
	}

	public function contents()
	{
		$this->hasMany(DirContent::class);
	}
	//
}
