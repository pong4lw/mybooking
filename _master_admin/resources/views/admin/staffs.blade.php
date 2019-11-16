@extends('admin.layouts.layout')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>スタッフ
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('admin/staffupdate')}}/{{$staffs['id']}}" method="GET">
                @csrf
                <div><img>画像{{$staffs['image']}} </div>
                <!--                    <input type="file" onchange="handleData.previewImage()" class="form-control" id="image" accept="image/*">-->
                <ul class="col-md-6" style="list-style: none;">
                    <li>氏名</li>
                    <li><input class="form-control" id="name" name="name" type="text" value="{{$staffs['name']}}"></li>
                </ul>

                <ul class="col-md-6" style="list-style: none;">
                    <li>店舗ID</li>
                    <li><input class="form-control" id="shop_id" name="shop_id" type="text" value="{{$staffs['shop_id']}}"></li>
                </ul>

                <ul class="col-md-6" style="list-style: none;">
                    <li>パスワード</li>
                    <li><input class="form-control" class="form-control" id="password" name="password" type="password" value="{{$staffs['password'] ?? ''}}"></li>
                </ul>

                <ul class="col-md-6" style="list-style: none;">
                    <li><!-- メモ情報{{$staffs['description']}}--></li>
                    <li>電話</li>
                    <li><input id="tel" class="form-control" name="tel" type="text" value="{{$staffs['tel']}}"></li>
                </ul>

                <ul class="col-md-6" style="list-style: none;"> 
                    <li>メール</li>
                    <li><input id="email" class="form-control" name="email" type="text" value="{{$staffs['email']}}"></li> 　
                </ul>

                <ul class="col-md-6" style="list-style: none;">
                    <li>住所</li>
                    <li><input id="address" class="form-control" name="address" type="text" value="{{$staffs['address']}}"></li> 　 
                </ul>

                <ul class="col-md-6" style="list-style: none;">
                    <li><!-- メモ情報{{$staffs['description']}}--></li>
                    <li>緊急連絡先</li>
                    <li><input id="tel"wname="tel2" type="text" value="{{$staffs['tel2']}}"></li>
                </ul>


                <ul class="col-md-6" style="list-style: none;">
                    <li>スタッフ権限</li>
                    <li>
                    	<select class="form-control" name="user_type">
                    		<option value="staff" <?php if($staffs['user_type'] == 'staff'){?> selected<?php } ?> >STAFF A</option>
                    		<option value="staff2" <?php if($staffs['user_type'] == 'staff2' ){?> selected <?php } ?>>STAFF B</option>
                    	</select>
                    </li>
                </ul>

<!--
                <ul style="list-style: none;">
                     <li>可能スキル</li>
                    <?php foreach($skill as $k => $v){ ?>
                        <li>
                            <label><input type="checkbox" value="{{ $v->id }}">{{ $v->name }} {{ $v->used_time }}</label>
                        </li>
                    <?php } ?>
                </ul>
            -->
            <ul style="list-style: none;">
                <li><a href="{{url('admin/staffs')}}" class="btn" type="button" role="button">戻る</a> <input type="submit" class="btn btn-success" role="button" value="確定"> </li>
            </ul>

        </form>
    </div>
</div>
</div>
</div>
@endsection
@section('footer_js')
@endsection
