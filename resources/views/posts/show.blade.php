@extends('layout.master')
@section('content')
<div class="col-sm-8 blog-main"> 
	@include('posts.post')
	<hr>

	<div class="comments">
		<ul class="list-group">
		@foreach($post->comments as $comment)
		<li class="list-group-item">
			<strong>{{ $comment->created_at->diffForHumans() }}</strong> : &nbsp;
			{{ $comment->body }}
		</li>
		@endforeach
		</ul>
	</div>
    @if(Auth::check())
	<hr>
	<div class="card">
		<div class="card-block">
			<form action="/posts/{{ $post->id }}/comments" method="post">
		    {{ csrf_field() }}
		    <div class="form-group">
		      <textarea name="body" class="form-control" placeholder="Your comment here"></textarea>
		    </div>
		    <div class="form-group">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		  @include('layout.error')
		  </form>
		</div>
	</div>
	@else
	<div class="card">
		<div class="card-block">
			Please Login to write comment.
		</div>
	</div>
	@endif
</div>
@endsection

