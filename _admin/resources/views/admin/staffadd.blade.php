@extends('admin.layouts.layout')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{url('admin/')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">スタッフ</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>スタッフ
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('admin/staff/addmail')}}/" method="GET">
                @csrf
                <ul style="list-style: none;">
                    <li>メールアドレス</li>
                    <li><input id="email" name="email" type="text" value="" style="width:100%"></li>
                </ul>

                <ul style="list-style: none;">
                    <li>スタッフ権限 </li>
                    <li>
                        <select id="user_type" name="user_type" style="width:100%">
                            <option value="">選択</option>

                            <option value="staff">管理者 A</option>
                            <option value="staff2">管理者 B</option>
                        </select>
                    </li>
    
                </ul>   

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
