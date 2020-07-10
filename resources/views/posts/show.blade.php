@extends('layouts.app')

@section('content')
{{-- @foreach ($posts as $post) --}}
<div>
    <h2> <a>{{$posts->title}}</a>  </h2>
    <p>{{$posts->content}}</p>
<em>{{$posts->created_at}}</em> 
{{-- @foreach ($posts as $post)
{{-- {{dd($posts->title)}} --}}
{{-- @endForeach --}}
</div>
{{-- @endForeach --}}
@endsection