@extends('admin.layouts.layout')
@section('content')

<style type="text/css">
    .time{
        width:90px;
    }
</style>
<script src="{{ asset('js/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/jquery.timepicker.css') }}" />
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> 時間間隔</div>
        <div class="card-body">
            <form action="{{ url('/admin/settings_time/update') }}" method="get">
                <div class="form-group">
                    <div><input type="text" name="time" value="{{ $time }}"></div>
                </div>
                <button type="submit" class="btn btn-success" >新規作成</button>
            </form>
        </div>
    </div>
    @endsection
    @section('footer_js')

    <script src="{{ asset('js/jquery.timepicker.js') }}"></script>
    <script>
        $(function() {
            $('.time').timepicker();
        });
    </script>
    @endsection
