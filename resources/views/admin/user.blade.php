@extends('admin.layouts.layout')
@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>ユーザー
    </div>
    <div class="card-body">
 
        <div class="table-responsive">
            <form action="{{url('admin/userupdate')}}/{{$user['id']}}" method="GET">
            <div><img>画像{{$user['image']}} </div>

            <ul style="list-style: none;">
                <li>氏名</li>
                <li><input id="name" name="name" type="text" value="{{$user['name']}}"></li>
            </ul>

            <ul style="list-style: none;">
                <li><!-- メモ情報{{$user['description']}}--></li>
                <li>電話</li>
                <li><input id="tel" name="tel" type="text" value="{{$user['tel']}}"></li>
            </ul>

            <ul style="list-style: none;"> 
                <li>メール</li>
                <li><input id="email" name="email" type="text" value="{{$user['email']}}"></li> 　
            </ul>

            <ul style="list-style: none;">
                <li>住所</li>
                <li><input id="address" name="address" type="text" value="{{$user['address']}}"></li> 　 
            </ul>

            <ul style="list-style: none;">
                <li><a href="{{url('admin/user')}}" class="btn" type="button" role="button">戻る</a> <input type="submit" class="btn btn-success" role="button" value="確定"> </li>
            </ul>

            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('footer_js')
@endsection
