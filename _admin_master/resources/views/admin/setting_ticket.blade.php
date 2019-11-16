@extends('admin.layouts.layout')
@section('content')

<style type="text/css">
    .time{
        width:90px;
    }
    .sales{
        width:90px;
    }
    .tax_rate{
        width:90px;
    }
    .price{
        width:120px;
    }
</style>
<script src="{{ asset('js/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/jquery.timepicker.css') }}" />
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">営業時間</li>
            <li class="breadcrumb-item">時間間隔</li>
            <li class="breadcrumb-item"><a href="{{ url('admin/setting_ticket') }}">チケット</a></li>
        </ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> チケット</div>
        <div class="card-body">
            <form action="{{ url('/admin/setting_ticket/update') }}" method="get">

                <div class="form-group">
                    <table class="table" id="dataTable" style="width:50%">
                        <tr>
                            <th>販売数量</th> <th>販売単価</th> <th>請求合計</th><th>税率（％）</th><th></th>
                        </tr>

                        <?php foreach ($tickets as $k => $ticket) { ?>
                        <tr>
                            <td><input name="sales[{{ $ticket->id }}]" type="text" class="sales" value="{{ $ticket->sales }}"></td> 
                            <td><input name="unit_price[{{ $ticket->id }}]" type="text" class="value" value="{{ $ticket->unit_price }}"></td> 
                            <td class ="price"><span id="ticket_1" name="" class ="price">{{ $ticket->price }}</span></td> 
                            <td><input name="tax_rate[{{ $ticket->id }}]" type="text" class="tax_rate" value="{{ $ticket->tax_rate }}"></td> 
                            <td><a href="{{ url('admin/setting_ticket/delete') }}?id={{ $ticket->id }}"> x </a></td>

                        </tr>
                        <?php } ?>
                            <tr>
                            <td><input name="sales[]" type="text" class="sales" value=""></td> 
                            <td><input name="unit_price[]" type="text" class="unit_price" value=""></td> 
                            <td class ="price"><span id="price" name="" class ="price"></span></td> 
                            <td><input name="tax_rate[]" type="text" class="tax_rate" value=""></td> 
                            <td></td>

                        </tr>


                    </table>

                </div>

                <button type="submit" class="btn btn-success" >更新</button>
            </form>

        </div>
    </div>
    @endsection
    @section('footer_js')
    <script src="{{ asset('js/jquery.culc.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.js') }}"></script>
    <script>
        $(function() {
            $('.time').timepicker();
        });
    </script>
    @endsection
