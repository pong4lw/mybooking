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
<form  action="{{ url($shopId.'/user/schedule_update_conform') }}" method="GET">
    <input type="hidden" name="id" value="{{$plans->id}}">

    <!-- Example DataTables Card-->
    <div class="card mb-3" style="text-align: center;margin: auto">
        <h3>予約変更</h3>

        <ol style="text-align: center;list-style: none;">
            <li class="item">メニュー</li>

            <li class="item">
                <select name="services">
                    <?php foreach($services as $k => $v) {?>
                        <option value="{{ $k }}" @if ($k == $plans->services_id) selected @endif>{{ $v }}</option>
                    <?php } ?>
                </select>
            </li>

            <li class="item">スタッフ</li>
            <li class="item">
                <select name="staffs">
                 <?php foreach($staffs as $k => $v) {?>

                    <option value="{{ $v->id }}"
                        @if ($k == $plans->provider_id) selected @endif>{{ $v->name }}</option>
                    <?php } ?>
                </select>
            </li>
            <li class="item">予約日時</li>

            <li class="item"><input name="re_date" type="date" value="{{ $plans->used_at }}">
                <select id="re_time" name="re_time" class="re_time">
                    <option value="10:00" @if ($plans->used_time == '10:00') selected @endif >10:00</option>
                    <option value="10:30" @if ($plans->used_time == '10:30') selected @endif>10:30</option>
                    <option value="11:00" @if ($plans->used_time == '11:00') selected @endif>11:00</option>
                    <option value="11:30" @if ($plans->used_time == '11:30') selected @endif>11:30</option>
                    <option value="12:00" @if ($plans->used_time == '12:00') selected @endif>12:00</option>
                    <option value="12:30" @if ($plans->used_time == '12:30') selected @endif>12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>                        
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>

                </select>

            </li>

        </ol>

        <div class="button-wrapper"><input class="btn_back" type="button" value="戻る"><input class="button" type="submit" value="確定"></div>
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
