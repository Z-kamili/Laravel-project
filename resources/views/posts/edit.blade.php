@extends('layouts.app')

@section('content')

<form method="Post" action="{{ route('posts.update',['post'=>$post->id])}}">
    {{-- token --}}
    @csrf 
    @method('PUT')
    <h1>Edit Post </h1>
    {{-- /token --}}
    @include('posts.forme')
    <input name="btn" id="title" value="Edit" type="submit" class="btn btn-block btn-warning">
    {{-- <button type="submit">Add post</button> --}}
</form>


@endsection