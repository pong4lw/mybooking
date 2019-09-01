@extends('user.layout')
@section('content')
<style>
     .menu-btn{
        text-align:center;      
        font-weight: 150%;
        color: #fff;  
        padding: 25px;
        margin:auto;
    }

    .title-area{
        text-align:center;      
          position: relative;
          display: inline-block;
          padding: 0.25em 0.5em;
          text-decoration: none;
          color: #FFF;
          background: #ddd;/*色*/
          border-radius: 8px;/*角の丸み*/
          box-shadow: inset 0 2px 0 rgba(255,255,255,0.2), inset 0 -2px 0 rgba(0, 0, 0, 0.05);
          font-weight: bold;
          border: solid 1px #dddddd;/*線色*/
          margin: 8 px;
          margin-top: 8 px; 
    }
    .title-area:active {
      box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
    }    
</style>

<!-- Breadcrumbs-->
<div style="text-align: center;">

        <div class="title-area" style="background-color:#F2453D;width:350px;margin-top:32px; "><a href="{{ url($shopId.'/user/reservation') }}"><div class="menu-btn"><h3><i class="fad fa-alarm-plus"></i>新規予約</h3></div></a></div>
        <div class="title-area" style="background-color:#2B98F0;width:350px;margin-top:32px;"><a href="{{ url($shopId.'/user/schedule') }}"><div class="menu-btn"><h3><i class="fas fa-arrows-alt-h"></i>予約確認</h3></div></a></div>
        <!-- <div style="background-color:#FD9726;width:95%;"><a href="{{ url('/user/product') }}"><div class="menu-btn">チケット</div></a></div> -->
        
        <div class="title-area" style="background-color:#8CC151;width:350px;margin-top:32px;"><a href="{{ url($shopId.'/user/setting') }}"><div class="menu-btn"><h3><i class="fas fa-user-cog"></i>設定</h3></div></a></div>
</div>

@endsection
@section('footer_js')
@endsection