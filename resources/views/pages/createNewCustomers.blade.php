@extends('layouts.default')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="/customers" class="btn btn-primary">Customer</a>
            <hr>
        </div>       
        <form>
            <div class="col-sm-6">
                <br>
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
            </div>
            <div class="col-sm-6">
                <br>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="col-sm-6">
                <br>
                <div class="input-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <br>
                <div class="input-group">
                    <label for="mobileNo">Mobile:</label>
                    <input type="mobile" class="form-control" name="mobileNo" placeholder="Mobile number">
                </div>
            </div>
            <div class="col-sm-12">
                <br>
                <hr>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/createNewcustomer.js') }}"></script>
@stop