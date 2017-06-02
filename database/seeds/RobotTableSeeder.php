<?php

use Illuminate\Database\Seeder;

class RobotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Supprime toute les images existantes
    	$uploads = public_path('images');
    	$files = File::allFiles($uploads);
    	foreach($files as $file) File::delete($file);

        factory(App\Robot::class, 30)->create()->each(function($robot) use($uploads) {

            // Tags
        	$alltags = range(1, 11);
        	shuffle($alltags);
        	$tags = array_slice($alltags, 0, rand(1, 5));
        	$robot->tags()->attach($tags);

        	// Images
        	$uri = 'R' . rand(1, 50) . '.png';
        	$image = file_get_contents('http://localhost/robotimg/' . $uri);
        	File::put($uploads . DIRECTORY_SEPARATOR . $uri, $image);
        	$robot->link = $uri;

            // Save
            $robot->save();

    	});
    }
}
