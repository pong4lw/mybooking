@extends('user.layout')
@section('content')

<style>
 .item{padding:25px;text-align: left;}
</style>

<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/jquery.timepicker.css') }}" />

<script type="text/javascript" src="{{ asset('js/wickedpicker.min.js')}}"></script>

<script type="text/javascript">
  $('.re_time').wickedpicker();
</script>

<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

<!-- Breadcrumbs-->
<form  action="{{ url($shopId.'/user/reservation_cancel') }}" method="GET">
    <!-- Example DataTables Card-->
    <div class="card mb-3" style="text-align: center;margin: auto">
        <h3>キャンセル完了</h3>

        <ol style="text-align: center;list-style: none;">
            <li class="item">メニュー</li>

            <li class="item">
                    <?php foreach($services as $k => $v) {?>
                        @if ($k == $plans->services_id) {{ $v }} @endif 
                    <?php } ?>
            </li>

            <li class="item">スタッフ</li>
            <li class="item">
                 <?php foreach($staffs as $k => $v) {?>
                   @if ($k == $plans->provider_id) {{ $v->name }} @endif
                    <?php } ?>
            </li>
            <li class="item">予約日時</li>

            <li class="item">
          {{ $plans->used_at }}      {{ $plans->used_time }}
            </li>

        </ol>
        予約をキャンセルしました。
        <div class="button-wrapper"><input class="btn_back" type="button" value="戻る">
    </div>
</form>

@endsection
@section('footer_js')
<script type="text/javascript">
    $('.btn_back').click(function(){
        location.href="{{url($shopId.'user/index')}}";
    });
</script>

@endsection
