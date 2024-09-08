@extends('layouts.default')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/registration.css') }}">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <img src="{{ asset('images/homePage\loginPageImg.png') }}" style="width:100%" alt="description of myimage">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <form action="{{route('userLogin')}}" method="post" style="max-width:500px;margin:auto">
            <h2>Login Form</h2>
            @csrf
            <div class="input-container">
                <input class="input-field" type="text" placeholder="Username" name="name">
            </div>           

            <div class="input-container">
                <input class="input-field" type="password" placeholder="Password" name="password">
            </div>

            <button type="submit" class="btn ">Login</button>
        </form>
    </div>
    
</div>

@stop