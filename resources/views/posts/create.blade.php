@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('posts.store')}}">
    {{-- token --}}
    @csrf 
    {{-- /token --}}
    <h1>New Post</h1>
 @include('posts.forme')
 <input name="btn" id="title" value="Add" type="submit" class="btn btn-block btn-primary">
    {{-- <button type="submit">Add post</button> --}}
</form>


@endsection