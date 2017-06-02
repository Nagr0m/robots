<?php 

namespace App;

interface CacheInterface
{
	public function has(string $key);

	public function get(string $key);

	public function set(string $key, $data);

	public function reset(string $key);
}