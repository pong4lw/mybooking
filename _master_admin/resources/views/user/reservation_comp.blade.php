@extends('user.layout')
@section('content')

<style>
   .item{padding:25px;text-align: left;}

</style>
<!-- Breadcrumbs-->
<form  action="{{ url('/user/reservation_comp') }}" method="GET">

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        新規予約
    </li>
    <li class="breadcrumb-item active"></li>
</ol>
<!-- Example DataTables Card-->
<div class="card mb-3">


    <ol style="text-align: center;list-style: none;">
        <li class="item">メニュー</li>
        <li class="item">
<!--            <select name="services"> -->
            <?php foreach($services as $k => $v) {?>
                <?php echo $v;?><input  name="services" type="hidden" value="<?php echo $k;?>"><?php echo $v;?>
            <?php } ?>
<!--        </select> -->

    </li class="item">

    <li class="item">スタッフ</li>
    <li class="item">     
        <?php foreach($staffs as $k => $v) {?>
            <?php echo $v;?><input name="staffs" type="hidden" value="<?php echo $k;?>">
        <?php } ?>
</li>
<li class="item">予約日時</li>
<li class="item"><input name="re_date" type="date" value="<?php echo $re_date;?>"></li>

<!--
<li class="item">残チケット</li>
<li class="item"><?php echo $tickets;?>枚</li>
-->

</ol>
確定しました。

<div><input id="button_wrapper" type="button" value="戻る"></div>


</div>
</form>

@endsection
@section('footer_js')
<script type="text/javascript">
    $('#btn_back').click(function(){
        location.href="{{url('user/reservation')}}";
        console.log('btn');
    });

</script>
@endsection
