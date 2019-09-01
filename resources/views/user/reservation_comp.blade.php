@extends('user.layout')
@section('content')

<style>
   .item{padding:25px;text-align: left;eft;}

</style>
<!-- Breadcrumbs-->
<form  action="{{ url($shopId.'/user/reservation_comp') }}" method="GET">

<ol class="breadcrumb">
    <li class="breadcrumb-item"></li>
</ol>
<!-- Example DataTables Card-->
<div class="card mb-3"  style="text-align: center;margin: auto">
    <h3>確認画面</h3>

    <ol style="text-align: center;list-style: none;">
        <li class="item">メニュー</li>
        <li class="item">
            <?php foreach($services as $k => $v) {?>
                <?php echo $v;?><input  name="services" type="hidden" value="<?php echo $k;?>">
            <?php } ?>
    </li class="item">

    <li class="item">スタッフ</li>

    <li class="item">     
        <?php foreach($staffs as $k => $v) {?>
            <?php echo $v->name;?><input name="staffs" type="hidden" value="<?php echo $v->id;?>">
        <?php } ?>
	</li>
	<li class="item">予約日時</li>
	<li class="item"><?php echo $re_date;?> <?php echo $re_time;?></li>

	<!--
		<li class="item">残チケット</li>
		<li class="item"><?php echo $tickets;?>枚</li>
	-->

</ol>
確定しました。

<div class="button_wrapper"><input class="btn_back" type="button" value="HOME"></div>


</div>
</form>

@endsection
@section('footer_js')
<script type="text/javascript">
    $('.btn_back').click(function(){
        location.href="{{url($shopId.'user/')}}";
        console.log('btn');
    });

</script>
@endsection
