<div class="form-group">
    <label for="title">Your title</label>
<input  class="form-control" name="title" id="title" type="text" value="{{old('title',$post->title ?? null)}}">
</div>
<div class="form-group">
    <label for="content">Your content</label>
    <input class="form-control" name="content" id="title" type="text" value="{{old('content',$post->content ?? null)}}">
</div>

@if($errors->any())
<ul>
@foreach ($errors->all() as $error)
<li style="color: red;margin-left:10px">{{$error}}</li>            
@endforeach
</ul>
@endif