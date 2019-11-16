@extends('user.layout')
@section('content')
<style>
    .menu-btn{
        text-align:center;
        margin:25px;
    }

    .title-area{
        font-weight: 150%;
        color: #fff;    
    }
     .menu-btn{
        font-weight: 150%;
        color: #fff;  
        padding: 25px;
    }

    .title-area{
          position: relative;
          display: inline-block;
          padding: 0.25em 0.5em;
          text-decoration: none;
          color: #FFF;
          background: #ddd;/*色*/
          border-radius: 4px;/*角の丸み*/
          box-shadow: inset 0 2px 0 rgba(255,255,255,0.2), inset 0 -2px 0 rgba(0, 0, 0, 0.05);
          font-weight: bold;
          border: solid 2px #dddddd;/*線色*/
          margin: 8 px;
}

    .title-area:active {
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
}    
</style>

<!-- Breadcrumbs-->
<div class="card mb-3" style="text-align: center;">
    <ul style="list-style: none;">

        <li class="title-area" style="background:#ff0000;width:95%;"><a href="{{ url('/user/reservation') }}"><div class="menu-btn"><h3><i class="fad fa-alarm-plus"></i>新規予約</h3></div></a></li>
        <li  class="title-area" style="background:#0000cc;width:95%;"><a href="{{ url('/user/schedule') }}"><div class="menu-btn"><h3><i class="fas fa-arrows-alt-h"></i>予約確認</h3></div></a></li>
        <!-- <li style="background:#eeee00;width:95%;"><a href="{{ url('/user/product') }}"><div class="menu-btn">チケット</div></a></li> -->
        <li class="title-area" style="background:#00ff00;width:95%;"><a href="{{ url('/user/setting') }}"><div class="menu-btn"><h3><i class="fas fa-user-cog"></i>設定</h3></div></a></li>
    </ul>
</div>

@endsection
@section('footer_js')
@endsection