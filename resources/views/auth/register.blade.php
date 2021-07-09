@extends('template')

@section('content')
<div>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <button type="submit">Register</button>
    </form>
</div>
@endsection

