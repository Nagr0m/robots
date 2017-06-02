<?php

namespace App\Http\Controllers\Admin;

use App\Robot;
use App\Tag;
use App\Category;
use App\Http\Requests\RobotRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RobotController extends Controller
{

	use UserAdmin;

	public function __construct()
	{
		$this->setUser();
	}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$robots = Robot::with('tags', 'category', 'user')->paginate(10);
    	return view('admin.robot.index', compact('robots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Robot::class);
    	$categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        return view('admin.robot.create', compact('user', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RobotRequest $request)
    {	
    	// dd($request->all());
        $robot = Robot::create($request->all());
        $robot->tags()->attach($request->tags);
        $robot->user_id = $request->user()->id; ;
        $robot->save();
        return redirect()->route('robot.index')->with('message', 'merci pour votre insertion de robot');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Robot $robot)
    {
        $this->authorize('update', $robot);
    	// $robot = Robot::find($id);
    	// dd($robot->tags->pluck('id')->toArray());
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        return view('admin.robot.edit', compact('user', 'robot', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Robot $robot)
    {
        // $robot = Robot::find($id);
        $robot->update($request->all());
        $robot->tags()
              ->sync($request->tags); # ->sync() : fonction magique qui supprime/insère les tags

        return redirect()->route('robot.index')->with('message', sprintf('%s has been updated', $robot->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Robot $robot)
    {
        $this->authorize('delete', $robot);
        $name = $robot->name;
        $robot->delete();
        
        return redirect()->route('robot.index')->with('message', sprintf('suppression du robot %s avec succès', $name));
    }
}
