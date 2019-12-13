@extends('user.layout')
@section('content')
<!-- Breadcrumbs-->


<!-- Example DataTables Card-->
<div class="mb-3">
    <div class="mb-3"></div>
    comming soon
    <div class="button-wrapper">

<!--        <input id="add_tickets" class="button" type="button" value="チケット購入">-->
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
