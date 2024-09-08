@extends('btob.layouts.default')
@section('content')
   <!--CSS-->
   <link href="{{ asset('css/btob/registration.css') }}" rel="stylesheet">
   <div class="row" style="margin-top:30px">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
         <h1>User registration</h1>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 text-left">
         <img src="{{ asset('images/btob/btobregister.png') }}" alt="description of myimage" width="100%">
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
      <form action="{{route('registerBtoBUser')}}" method="post">
            @csrf
            <!-- <div class="imgcontainer">
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div> -->

            <div>
                <label for="name"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="name" required>
                <input type="hidden" name="role" value=1>
                <input type="hidden" name="btob" value=1>
                <input type="hidden" name="btoc" value=1>
                <input type="hidden" name="active" value=1>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Username email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
            </ul>
         </div>
      @endif
                <button type="submit">Login</button>
                <!-- <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
            </div>

            <!-- <div style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div> -->
        </form>
        
      </div>
   </div>  
@stop