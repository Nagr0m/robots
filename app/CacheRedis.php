<?php

namespace App;

use Cache;
use Carbon\Carbon;

class CacheRedis implements CacheInterface
{
	public function has(string $key) {
		return Cache::store('redis')->has($key);
	}

	public function get(string $key) {
		return Cache::store('redis')->get($key);
	}

	public function set(string $key, $data) {
		Cache::store('redis')->put($key, $data, \Carbon\Carbon::now()->addMinute(env('CACHE_TTL', 30)));
	}

	public function reset(string $key){
		Cache::store('redis')->reset($key);
	}
}