<?php

namespace App\Http\Controllers\Admin;

use App\Robot;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	use UserAdmin;

	public function __construct()
	{
		$this->setUser();
	}

	public function index() {
		$nbrobot = Robot::count();
		$nbcat = Category::count();
		$nbtag = Tag::count();

		return view('admin.dashboard', compact('user', 'nbrobot', 'nbcat', 'nbtag'));
	}
}
