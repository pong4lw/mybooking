@extends('user.layout')
@section('content')

<style>
   .item{padding:25px;text-align: left;}
</style>

<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('picker.date/themes/default.date.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('picker.date/themes/default.time.css') }}" />


<script type="text/javascript">
  $('.re_time').wickedpicker();
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
                        <option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
                    <?php } ?>
                </select>
                <?php foreach($services as $k => $v) {?>
                    <input type="hidden" name="services_<?php echo $v->id;?>" value="{{ $v->used_time ?? 0}}">
                <?php } ?>
            </li>

            <li class="item">スタッフ</li>
            <li class="item">
                <select class="staffs" name="staffs">
                   <?php foreach($staffs as $k => $v) {?>
                    <option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
                <?php } ?>
            </select>


        </li>
        <li class="item">予約日時</li>

        <li class="item"><input  id="re_date" class="re_date" name="re_date" type="date" value="<?php echo date('Y-m-d')?>">  

            <select id="re_time" name="re_time" class="re_time">
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
            </select>
        </li>
        <li class="item">予約場所</li>
        <li class="item">
            <div class="spaces"></div>
        </li>
    </ol>

    <div class="button-wrapper"><input class="btn_back" type="button" value="戻る"><input class="button" type="submit" value="確認"></div>
</div>
</form>

@endsection
@section('footer_js')
<script type="text/javascript">
    var f = function(){
        var data = {
         're_date':$('.re_date').val(),
         'staff_id':$('.staffs').val()
     }
     $.ajax({
        type: 'GET',
        url: "{{ url('user/reservation_json') }}",
        data: data,
        dataType: 'json'
    })
     .done( function(data) {
     })
     .always(function(data){
        var html = '';
        var s_hour = data.bt[0].open.split(':')[0];
        var s_time = data.bt[0].open.split(':')[1];
        var e_hour = data.bt[0].close.split(':')[0];
        var e_time = data.bt[0].close.split(':')[1];
        for(i= s_hour; i<e_hour; i++){
            t = ( '00' + i ).slice( -2 );
            html += '<option value="' + t + ':00">' + t + ':00</option>';
            html += '<option value="' + t + ':30">' + t + ':30</option>';
        }
/*
        for(i = 0; i<data.plans.length ;i ++){
            console.log(data.plans[i].used_time);
            console.log(data.plans[i].services_used_time);
        }
        */
        $('#re_time').html(html);
        var json = {
            <?php foreach ($spaces as $space){ ?>
                "{{$space->id}}":"{{ $space->name ?? ''}}" ,
            <?php } ?>
        };
        var html = json[data.bt[0].space_id] ;
        $('.spaces').html(html);
    });
 };
 $('.staffs').change(f);
 $('.re_date').change(f);

</script>
<script type="text/javascript">
    $('.btn_back').click(function(){
        location.href="{{url('user/index')}}";
    });
</script>

<script type="text/javascript" src="{{ asset('picker.date/picker.js')}}"></script>

<script type="text/javascript" src="{{ asset('picker.date/picker.date.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $('#re_date').pickadate({
            format: 'yyyy年m月d日(ddd)'
        });
    });
   $(function() {
        $('#re_time').pickatime(

/*            {
  disable: [
    new Date(2016,3,20,4,30),
    new Date(2016,3,20,9)
  ]
}*/
);
    });
</script>

@endsection
