@extends('layout')

@section('content')
<h1>Profile</h1>
@include('flash-message')
<p><strong>User ID: </strong> {{ session()->get('user')['id'] }}</p>
<p><strong>Email: </strong> {{ session()->get('user')['email'] }}</p>
<a href="/logout">Logout</a>
@endsection