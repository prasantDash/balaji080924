@extends('btob.layouts.default')
@section('content')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<style>
.modal-dialog {
    margin: 20vh auto 0px auto
}
</style>
<script src="{{ asset('js/library/jquery.min.js')}}"></script>

<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-sm-12 text-left">
        <h1>Carate</h1>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-sm-12 text-right">
        <br>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Add-new-carate">Add New
        </button>
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
        <br>
        <table class="table table-bordered" id="">
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th>Carat</th>
                    <th>Item</th>
                    <th>Created date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="items"></tbody>
        </table>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12 text-right">
        <ul class="pagination justify-content-end" id="carate-pagination"></ul>
    </div>
</div>
<!-- Modal -->
<div id="Add-new-carate" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new carate</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
                <form action="{{route('createNewCarate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="itemcarat">Add new item:</label>
                        <input type="text" class="form-control" name="itemcarat" id="itemcarat">
                    </div>
                    <div class="form-group">
                        <label for="item_id" class="form-label">Select Item (select one):</label>
                        <select class="form-control form-select" id="item_id" name="item_id"></select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('js/btob/carate.js')}}"></script>
@stop