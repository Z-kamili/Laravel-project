<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class PostTest extends TestCase
{
    public function testSavePost()
    {
        $post = new Post();
        $post->title = "new Title to test";
        $post->Content = "new content";
        $post->active = false;
        $post->save();
        $this->assertDatabaseHas('posts',[
            'title' => 'new Title to test'
        ]);
        
    }
    public function testPostStoreValid(){

        $data = [
            'title' => 'test our post store',
            'content' => 'content store',
            'active' => false
        ];
        $this->post('/posts',$data)->assertStatus(302)->assertSessionHas('status');
        $this->assertEquals(session('status'),'post was created!!');


    }

// public function testPostUpdate(){

//     $post = new Post();
//         $post->title = "new Title to test";
//         $post->Content = "new content";
//         $post->active = true;
//         $post->save();
//         $this->assertDatabaseHas('posts',[
//             'title' => 'new Title to test'
//         ]);
//         $data = [
//             'title' => 'test our post updated',
//             'content' => 'content store',
//             'active' => false
//         ];
//         $this->put('/posts/{$post->id}/edit',$data)->assertStatus(302)->assertSessionHas('status');
//         $this->assertDatabaseHas('posts',[
//             'title' => $data['title']
//         ]);

// }

public function testPostDelete(){
    $post = new Post();
            $post->title = "new Title to delete";
            $post->Content = "new content";
            $post->active = true;
            $post->save();
            $this->assertDatabaseHas('posts',[
                'title' => 'new Title to test'
            ]);
            $this->delete("/posts/{$post->id}")->assertStatus(302)->assertSessionHas('status');
            $this->assertDatabaseMissing('posts',$post->toArray());
}
}
