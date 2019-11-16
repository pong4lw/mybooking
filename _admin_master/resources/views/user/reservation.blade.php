@extends('user.layout')
@section('content')

<style>
   .item{padding:25px;text-align: left;}
</style>

<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.datetimepicker.full.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

<script>
$(function() {
  $('#re_time').datetimepicker();
});

</script>
<!-- Breadcrumbs-->
<form  action="{{ url('/user/reservation_conform') }}" method="GET">

    <!-- Example DataTables Card-->
    <div class="card mb-3" style="text-align: center;margin: auto">
            <h3>新規予約</h3>

        <ol style="text-align: center;list-style: none;">
            <li class="item">メニュー</li>
            <li class="item">
                <select name="services">
                    <?php foreach($services as $k => $v) {?>
                        <option value="<?php echo $k;?>"><?php echo $v;?></option>
                    <?php } ?>
                </select>
            </li>

            <li class="item">スタッフ</li>
            <li class="item">
                <select name="staffs">
                   <?php foreach($staffs as $k => $v) {?>
                    <option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
                <?php } ?>
                </select>
            </li>
            <li class="item">予約日時</li>
            <li class="item"><input name="re_date" type="date" value="<?php echo date('Y-m-d')?>"></li>

            <li class="item"><input id="re_time" name="re_time" type="text" value=""></li>

        </ol>

        <div class="button-wrapper"><input class="btn_back" type="button" value="戻る"><input class="button" type="submit" value="確認"></div>
    </div>
</form>

@endsection
@section('footer_js')
<script type="text/javascript">
    $('#btn_back').click(function(){
        location.href="{{url('user/index')}}";
    });
</script>
@endsection
