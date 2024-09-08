@extends('btob.layouts.default')
@section('content')
<!--CSS-->
<link href="{{ asset('css/btob/login.css') }}" rel="stylesheet">
<div class="row" style="margin-top:30px">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <h1>User login</h1>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center login-form">
        <form action="{{route('loginUser')}}" method="post">
            @csrf
            <!-- <div class="imgcontainer">
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div> -->

            <div>
                <label for="name"><b>Email</b></label>
                <input type="email" placeholder="Enter Username" name="email" required>
                <input type="hidden" name="role" value=1>
                <input type="hidden" name="btob" value=1>
                <input type="hidden" name="btoc" value=1>
                <input type="hidden" name="active" value=1>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <!-- <div style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div> -->
        </form>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
        <img src="{{ asset('images/btob/btoblogin.png') }}" alt="description of myimage">
    </div>
</div>
@stop