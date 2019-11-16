@extends('admin.layouts.layout')
@section('content')



<style type="text/css">
    .time{
        width:90px;
    }
</style>
<script src="{{ asset('js/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/jquery.timepicker.css') }}" />

        <ol class="breadcrumb">
            <li class="breadcrumb-item active">営業時間</li>
            <li class="breadcrumb-item"><a href="{{ url('admin/setting_time') }}">時間間隔</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/setting_ticket') }}">チケット</a></li>
        </ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> 営業時間</div>
        <div class="card-body">
            <form action="{{ url('/admin/setting/update') }}" method="get">

                <div class="form-group">
                    <table>
                        <tr>
                            <td>月曜日</td> <td>火曜日</td> <td>水曜日</td><td>木曜日</td> <td>金曜日</td> <td>土曜日</td><td>日曜日</td>
                        </tr>
                        <tr>
                            <td><input name="w1_1" type="text" class="time" value="{{ $week[1]['start']}}"></td> 
                            <td><input name="w2_1" type="text" class="time" value="{{ $week[2]['start']}}"></td> 
                            <td><input name="w3_1" type="text" class="time" value="{{ $week[3]['start']}}"></td> 
                            <td><input name="w4_1" type="text" class="time" value="{{ $week[4]['start']}}"></td> 
                            <td><input name="w5_1" type="text" class="time" value="{{ $week[5]['start']}}"></td> 
                            <td><input name="w6_1" type="text" class="time" value="{{ $week[6]['start']}}"></td> 
                            <td><input name="w7_1" type="text" class="time" value="{{ $week[7]['start']}}"></td> 
                        </tr>
                        <tr>
                            <td><input name="w1_2" type="text" class="time" value="{{ $week[1]['end'] }}"></td>
                            <td><input name="w2_2" type="text" class="time" value="{{ $week[2]['end'] }}"></td>
                            <td><input name="w3_2" type="text" class="time" value="{{ $week[3]['end'] }}"></td>
                            <td><input name="w4_2" type="text" class="time" value="{{ $week[4]['end'] }}"></td>
                            <td><input name="w5_2" type="text" class="time" value="{{ $week[5]['end'] }}"></td>
                            <td><input name="w6_2" type="text" class="time" value="{{ $week[6]['end'] }}"></td>
                            <td><input name="w7_2" type="text" class="time" value="{{ $week[7]['end'] }}"></td>
                        </tr>
                    </table>

                </div>

                <button type="submit" class="btn btn-success" >更新</button>
            </form>

        </div>
    </div>
    @endsection
    @section('footer_js')

    <script src="{{ asset('js/jquery.timepicker.js') }}"></script>
    <script>
        $(function() {
            $('.time').timepicker({'timeFormat':'H:i'});
        });
    </script>
    @endsection
