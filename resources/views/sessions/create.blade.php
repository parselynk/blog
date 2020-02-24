@extends('layout.master')
@section('content')
  <div class="col-sm-8">
    <h1>Login</h1>
    <form action="/login" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <lable for="email">Email:</lable>
        <input name="email" id="email" type="text" class="form-control">
      </div>
      <div class="form-group">
        <lable for="password">Password:</lable>
        <input name="password" id="password" type="password" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      @include('layout.error')
    </form>
  </div><!-- /.blog-main -->
@endsection
