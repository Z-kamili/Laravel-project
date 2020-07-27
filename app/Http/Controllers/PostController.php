<?php

namespace App\Http\Controllers;
use App\Http\Requests\Verification;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::withCount('coments')->get();
        return view('posts.index',[
            'posts' => $post,
            'tab' => 'list'
        ]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Verification $request)
    {
    $data = $request->only(['title','content']);
     $data["users_id"] = Auth::user()->id;
    $post = Post::create($data);
    $request->session()->flash('status','post was created!!');
    return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show',[
            'posts' => Post::find($id)
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(Gate::denies('post.update',$post)){
            abort(403,"You can't edit this post");
        }
        return view('posts.edit',[
            'post' =>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Verification $request, $id)
    {

        $post = Post::findOrFail($id);
        if(Gate::denies('post.update',$post)){
            abort(403,"You can't edit this post");
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        $request->session()->flash('status','post was Updated!!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize("post.delete",$post);
        $post->delete();
        $request->session()->flash('status','post was created!!');
        return redirect()->route('posts.index');
    }
}
