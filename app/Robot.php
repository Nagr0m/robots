<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{

	protected $dates = ['created_at', 'updated_at', 'published_at'];

	protected $fillable = ['name', 'description', 'category_id', 'status', 'link'];
	
	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function tags() {
		return $this->belongsToMany(Tag::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}


	public function setNameAttribute($value) {
		$this->attributes['name'] = ucfirst($value);
		$this->attributes['slug'] = str_slug($value);
	}

	public function setStatusAttribute($value) {
		if ($value == 'published') {
			$this->attributes['published_at'] = \Carbon\Carbon::now();
		}
		$this->attributes['status'] = $value;
	}

	public function scopeCountPublished($query) {
		return $query->where('status', 'published')->count();
	}

	public function scopePublished($query, $status = 'published') {
		return $query->where('status', $status)->orderby('published_at', env('ORDER_ROBOT', 'DESC'));
	}

	public function scopeUnderPower($query, $power = 50) {
		return $query->where('power', '<', $power)->count();
	}
}
