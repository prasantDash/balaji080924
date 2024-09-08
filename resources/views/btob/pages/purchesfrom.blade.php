@extends('btob.layouts.default')
@section('title')
BtoB Purches form
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

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12">
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
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12">
        <form action="{{route('createPurches')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="product">Product:</label>
                        <select class="form-control form-select" id="product" name="product_id"></select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="item_id" class="form-label">Select Item:</label>
                        <select class="form-control form-select" id="item_id" name="item"></select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="carat_id" class="form-label">Select Carate:</label>
                        <select class="form-control form-select" id="carat_id" name="carat"></select>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="weight" class="form-label">Weight:</label>
                        <input type="text" class="form-control" name="weight" id="weight">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="less">Less:</label>
                        <input type="text" class="form-control" name="less" id="less">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="netweight" class="form-label">Net weight:</label>
                        <input type="text" class="form-control" name="netweight" id="netweight">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="tunch">Tunch:</label>
                        <input type="text" class="form-control" name="tunch" id="tunch">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="labour" class="form-label">Labour:</label>
                        <input type="text" class="form-control" name="lobour" id="labour">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="feiue" class="form-label">Fruic:</label>
                        <input type="text" class="form-control" name="feiue" id="feiue">
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>

        </form>
    </div>

</div>

<script type="text/javascript">
var APP_URL = {!!json_encode(url('/')) !!}
</script>
<script src="{{ asset('js/btob/createPurchesForm.js')}}"></script>
@stop