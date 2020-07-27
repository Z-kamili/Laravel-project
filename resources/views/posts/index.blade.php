@extends('layouts.app')
@section('content')
<div class="my-3">
<h4>{{ $posts->count()}} Post(s)</h4>
</div>
<ul class="list-group">
    @foreach ($posts as $post)
    <li class="list-group-item">
    <h2><a href="{{ route('posts.show',['post'=>$post->id]) }}">{{$post->title}}</a>  </h2>
        <p>{{$post->content}}</p>
    <em>{{$post->created_at}}</em>
    @if($post->coments_count)
    <div>
        <span class="badge badge-success"> {{$post->coments_count}} </span>
    </div>
    @else
    <div >
        <span class="badge badge-dark"> {{$post->coments_count}} </span> 

    </div>
    @endif
       <p class="text-muted">
           {{$post->updated_at->diffForHumans()}}
       </p>
        <a class="btn btn-warning" href="{{route('posts.edit',['post'=>$post->id])}}">Edit</a>
        <form style="display:inline"  method="Post" action="{{ route('posts.destroy',['post'=>$post->id])}}">
            {{-- token --}}
            @csrf 
            @method('DELETE')
            {{-- /token --}}
        <button class="btn btn-danger" type="submit">Delete</button>
            {{-- <button type="submit">Add post</button> --}}
        </form>
    </li>
    @endforeach
   
</ul>
@endsection