@extends('layout')

@section('content')
<h1>Login</h1>
<p>Enter your username and password to login.</p>
<form class="pure-form pure-form-stacked" action="/login" method="post">
  @csrf
  <label for="email">Email Address</label>
  <input type="email" name="email" required>

  <label for="password">Password</label>
  <input type="password" minlength="8" name="password" required>

  <input class="pure-button pure-button-primary" type="submit" value="Login">
</form>
<p>Don't have an account yet? <a href="/register">Register here</a></p>
@endsection