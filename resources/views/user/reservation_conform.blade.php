@extends('user.layout')
@section('content')

<style>
   .item{padding:25px;text-align: center;}

</style>
<!-- Breadcrumbs-->
<form  action="{{ url($shopId.'/user/reservation_comp') }}" method="GET">

<ol class="breadcrumb">
    <li class="breadcrumb-item"></li>
</ol>
<div class="card mb-3" style="text-align: center;margin: auto">
        <h3>予約確認</h3>

<!-- Example DataTables Card-->

    <ol style="text-align:center;list-style: none;">

        <li class="item">メニュー</li>
        <li class="item">
            <?php foreach($services as $k => $v) {?>
                <?php echo $v;?><input name="services" type="hidden" value="<?php echo $k;?>"><?php echo $v;?>
            <?php } ?>

    </li class="item">

    <li class="item">スタッフ</li>
    <li class="item">     
        <?php foreach($staffs as $k => $v) {?>
            <?php echo $v->name;?><input name="staffs" type="hidden" value="<?php echo $k;?>">
        <?php } ?>
</li>
<li class="item">予約日時</li>
<li class="item"><?php echo $re_date ?? '';?> <?php echo $re_time ?? '';?></li>
<li>
<input name="re_time" type="hidden" value="<?php echo $re_time;?>">
<input name="re_date" type="hidden" value="<?php echo $re_date;?>">
</li>
<!--
<li class="item">残チケット</li>
<li class="item">{{ $tickets->count ?? 0}}枚</li>
-->
</ol>
<div class="button-wrapper"><input class="btn_back" type="button" value="戻る"><input class="button" type="submit" value="確定"></div>

</div>
</form>

@endsection
@section('footer_js')
<script type="text/javascript">
    $('.btn_back').click(function(){
        location.href="{{url($shopId.'user/reservation')}}";
        console.log('btn');
    });

</script>
@endsection
