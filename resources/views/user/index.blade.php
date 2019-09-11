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
          background: #fff;/*色*/
          border-radius: 8px;/*角の丸み*/
          box-shadow: inset 0 2px 0 rgba(255,255,255,0.2), inset 0 -2px 0 rgba(0, 0, 0, 0.05);
          font-weight: bold;
          border: solid 1px #ffffff;/*線色*/
          margin: 8 px;
          margin-top: 8 px; 



    }
  a:link{color:#fff;}
 a:visited{color:#fff;}

    .title-area:active {
      box-shadow: 0 0 2px rgba(0, 0, 0, 0.30);
    }    
</style>

<!-- Breadcrumbs-->
<div style="text-align: center;">



<div class="col-xl-3 col-sm-6 mb-3 title-area">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-comments"></i></div>
<div class="mr-5"><a href="{{ url('/user/reservation') }}"><h3>新規予約</h3></a></div>
</div>
</div>
</div>
<br>

<div class="col-xl-3 col-sm-6 mb-3 title-area">
<div class="card text-white bg-primary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon"><i class="fa fa-fw fa-comments"></i></div>
<div class="mr-5"><h3 ><a href="{{ url('/user/schedule') }}" style="font:#fff;">予約確認</a></h3></div>
</div>
</div>
</div>
<br>

<div class="col-xl-3 col-sm-6 mb-3 title-area"><div class="card text-white bg-warning o-hidden h-100"><div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-list"></i>
</div>
<div class="mr-5"><h3><a href="{{ url('/user/product') }}">チケット</a></h3></div>
</div>
</div>
</div>
<br>

<div class="col-xl-3 col-sm-6 mb-3 title-area">
<div class="card text-white bg-success o-hidden h-100">
  <div class="card-body">
    <div class="card-body-icon">
      <i class="fa fa-fw fa-support"></i>
    </div>
    <div class="mr-5"><h3><a href="{{ url('/user/setting') }}">設定</a></h3></div>
  </div>
</div>
</div>
<br>

</div>

@endsection
@section('footer_js')
@endsection