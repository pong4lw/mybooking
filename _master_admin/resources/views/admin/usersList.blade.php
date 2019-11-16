@extends('admin.layouts.layout')
@section('content')

<!-- Example DataTables Card-->

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>ユーザー
    </div>
    <div class="card-body">
        <p>
            <a href="{{ url('/admin/user/create') }}" class="btn btn-success" role="button">作成する</a>
        </p>
    </div>
</div>
    <?php foreach($userList as $user){ ?>

<div class="card mb-3">
    <div class="card-body">    
        <div class="table-responsive">
            <ul style="list-style: none;">
                    <li>
                        <img>{{$user['image']}} <br>

                        <h5>{{$user['name']}}</h5><br>
                        
                        メモ情報{{$user['description']}} 　<br>

                        予約件数　{{$user['plan_count']}}<br>

                    <i class="fa fa-phone"></i>
{{$user['tel']}} 　    <i class="fa fa-envelope"></i>{{$user['email']}} 　<i class="fa fa-home" aria-hidden="true"></i>{{$user['address']}} 　 <a href="{{url('admin/user')}}/{{$user->id}}">編集 </a><br>
                </li>
            </ul>
        </div>
    </div>
    </div>
    <?php } ?>

</div>
@endsection
@section('footer_js')
@endsection
