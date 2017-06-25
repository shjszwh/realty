<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirContent extends Model
{
	public function dirTable()
	{
		$this->morphTo();
	}

	public function dir()
	{
		$this->belongsTo(Dir::class);
	}
}
