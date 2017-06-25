<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @property ArticleContent $content;
 */
class Article extends Model
{
	protected $fillable = [
		'title',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function content()
	{
		return $this->hasOne(ArticleContent::class);
	}

	public function tags()
	{
		return $this->morphMany(Tag::class, 'tag_able');
	}

	public function dirs()
	{
		return $this->morphMany(DirContent::class, 'dir_content_able');
	}
}
