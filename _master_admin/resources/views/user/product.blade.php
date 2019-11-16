@extends('user.layout')
@section('content')
<!-- Breadcrumbs-->

<h3 class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/user') }}">ユーザーメニュー</a></li>
    <li class="breadcrumb-item active"><a href="{{ url('/user/product') }}">チケット</a></li>

</ol>

<!-- Example DataTables Card-->
<div class="mb-3">
    <div class="mb-3">チケット</div>
    <div class="button-wrapper">
        <input id="add_tickets" class="button" type="button" value="チケット購入">
    </div>

</div>
@endsection
@section('footer_js')
<script type="text/javascript">
    $('#add_tickets').click(function(){
        $.ajax({
            url: '{{url('user/ticketadd')}}',
            dataType: 'json',
            crossDomain: true,
            cache: false,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            success: function(result) {
                console.log(result);
            }
        });
    });
</script>
@endsection
