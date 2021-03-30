@extends('layout')

@section('content')
<h1>Register</h1>
<p>Create an account in our demo app.</p>
<form class="pure-form pure-form-stacked" action="/register" method="post">
  @csrf
  <label for="email">Email Address</label>
  <input type="email" name="email" required>

  <label for="password">Password</label>
  <input type="password" minlength="8" name="password" required>

  <input class="pure-button pure-button-primary" type="submit" value="Register">
</form>
<p>Already have an account? <a href="/">Login here</a></p>
@endsection