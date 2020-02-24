
@extends('layout.master')
@section('content')
<div class="col-sm-8 blog-main">
  <h1>Create new post</h1>
  <form action="/posts" method="post">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="formGroupExampleInput">Title</label>
      <input name="title" type="text" class="form-control" id="title" placeholder="Example input">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Body</label>
      <textarea name="body" class="form-control" id="body" rows="3"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  @include('layout.error')
  </form>
</div>
@endsection