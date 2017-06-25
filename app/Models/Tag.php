<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
	//
}
