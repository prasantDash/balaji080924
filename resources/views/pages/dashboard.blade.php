@extends('layouts.default')
@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-10">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-2 text-right">
            <a href="/customers" class="btn btn-primary">Customer</a>
        </div>
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-12 text-right">
        <ul class="pagination">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
    </div>





</div>
<script src="{{ asset('js/dashboard.js') }}"></script>
@stop