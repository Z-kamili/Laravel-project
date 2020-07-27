<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = App\User::all();
        $posts =  factory(App\Post::class,300)->make()->each(function($post) use ($users){
            $post->users_id = $users->random()->id;
            $post->save();
        });
    }
}
