<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Tag;
use App\Robot;
use App\Category;
use App\CacheInterface;
use Illuminate\Http\Request;

class FrontController extends Controller
{
	public function __construct() {
		view()->composer('partials.nav', function($view) {
			$categories = DB::table('categories')->select('title', 'id')->get();
			$view->with('categories', $categories);

			$current = request()->segment(1) == 'category' ? request()->segment(2) : (request()->is('/')? 'home' : null);
			$view->with('current', $current);
		});
	}

    public function index(CacheInterface $cache) {
        $page = (request()->page) ? request()->page : 1;
        if ($cache->has('home_p'.$page)) {
            $robots = $cache->get('home_p'.$page);
        } else {
            $robots = Robot::with('tags', 'category')->published()->paginate(10);
            $cache->set('home_p'.$page, $robots); 
        }
        
    	return view('front.home', ['robots' => $robots]);
    }

    public function showRobot($id) {
    	$robot = Robot::findOrFail($id);
    	return view('front.single', compact('robot'));
    }

    public function showRobotsByTag($id) {
        $page = (request()->page) ? request()->page : 1;
        if ($cache->has('robots'.$page)) {

        } else {
        	$tag = Tag::with('robots.tags', 'robots.category')->findOrFail($id);
        	$robots = $tag->robots;
        }
    	return view('front.tag', compact('tag', 'robots'));
    }

    public function showRobotsByCat($id, CacheInterface $cache) {
        $page = (request()->page) ? request()->page : 1;
        if ($cache->has('category_id'.$id.'_p'.$page)) {
            $cat = $cache->get('category_id'.$id.'_p'.$page);
        } else {
        	$cat = Category::with(['robots.tags' => function($query) {
                $query->where('status', 'published');
            }])->findOrFail($id);
            $cache->set('category_id'.$id.'_p'.$page, $cat); 
        }
        $robots = $cat->robots;
    	return view('front.category', compact('cat', 'robots'));
    }
}
