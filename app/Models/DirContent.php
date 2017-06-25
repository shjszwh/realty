<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirContent extends Model
{
	protected $table = 'dir_contents';
	protected $fillable = [
		'dir_id'
	];

	public function dir_content_able()
	{
		$this->morphTo();
	}

	public function dir()
	{
		$this->belongsTo(Dir::class);
	}
}
