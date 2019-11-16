@extends('admin.layouts.layout')
@section('content')
<style>
  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #script-warning, #loading { display: none }
  #script-warning { font-weight: bold; color: red }

  #calendar {
    text-align: center; 
    margin: 40px auto;
    padding: 0 10px;
  }

  .tzo {
    color: #000;
  }
  <!--
  #jquery-ui-sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 70%;
  }
  #jquery-ui-sortable li {
    margin: 0 3px 3px 3px;
    padding: 0.3em;
    padding-left: 1em;
    font-size: 15px;
    font-weight: bold;
    cursor: move;
  }
  -->
</style>

<!-- Example DataTables Card-->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/jquery.ui.all.css')}}">

<script type="text/javascript" src="{{ asset('js/jquery-1.4.2.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.12.1.js' )}}"></script>



    <div class="card mb-3">

    <div class="card-header">
      <i class="fa fa-table"></i>
    </div>
      <div class="card-body">

        メニュー
        スタッフ
        予約日時
        <a href="{{ url('/admin/plan/create') }}" class="btn btn-primary" role="button">新規予約</a>

      </div>
    </div>

  @endsection
  @section('footer_js')
