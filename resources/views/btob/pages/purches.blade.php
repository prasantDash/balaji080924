@extends('btob.layouts.default')
@section('title')
BtoB Purches
@stop
@section('content')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<style>
.modal-dialog {
    margin: 10vh auto 0px auto
}
</style>
<script src="{{ asset('js/library/jquery.min.js')}}"></script>

<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-sm-12 text-left">
        <h1>Purches</h1>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-sm-12 text-right">
        <br>
        <a href="{{route('createNewPurches')}}" type="button" class="btn btn-info btn-sm">Add
            New</a>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-sm-12">
        Number of item
    </div>
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-sm-12">
        <form action="">
            <div class="text-right">
                <input type="text" class="form-control" id="item" placeholder="Search item..." name="item">
            </div>
        </form>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12">
        <div style="overflow: scroll;">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>
            <table class="table table-bordered" id="">
                <thead>
                    <tr>
                        <th>Sl no</th>
                        <th>Amount</th>
                        <th>Product</th>
                        <th>Item</th>
                        <th>Weight</th>
                        <th>Less</th>
                        <th>Net Weight</th>
                        <th>Tunch</th>
                        <th>Labour</th>
                        <th>Fluee</th>
                        <th>Grand total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="items"></tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12 text-right">
        <ul class="pagination justify-content-end" id="carate-pagination"></ul>
    </div>
</div>
<script type="text/javascript">
var APP_URL = {!!json_encode(url('/')) !!}
</script>
<script src="{{ asset('js/btob/purches.js')}}"></script>
@stop