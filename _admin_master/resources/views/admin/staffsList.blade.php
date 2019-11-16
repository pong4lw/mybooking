@extends('admin.layouts.layout')
@section('content')
<!-- Example DataTables Card-->

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>スタッフ
    </div>
    <div class="card-body">
        <p>
            <a href="{{ url('/admin/staff/create') }}" class="btn btn-success" role="button">作成する</a>
        </p>
    </div>
</div>

<?php foreach($staffs as $staff){ ?>

    <div class="card mb-3">
        <div class="card-body">    
            <div class="table-responsive">
                <ul style="list-style: none;">
                    <li>
<!--
                        <form action= "{{url('admin/staff/upload')}}/{{$staff->id}}" method ="post" enctype="multipart/form-data">
                            @csrf
                            
                            {{--成功時のメッセージ--}}
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            {{-- エラーメッセージ --}}
                             @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                @if ($staff->image)
                                <p>
                                    <img src="{{ asset('storage/staff/' . $staff->image) }}" alt="avatar" />
                                </p>
                                @endif
                                <input type="file" name="file" class = "control-label">
                            </div>

                            <div class="form-group">
                               <input type="submit" class = "btn btn-default">
                           </div>
                       </form>
-->

                       <img>{{$staff['image']}} <br>
                       <h5>{{$staff['name']}}</h5><br>
                       メモ情報{{$staff['description']}} 　<br>
                       予約件数　{{$staff['plan_count']}}<br>
                       <i class="fa fa-phone"></i>{{$staff['tel']}} 
                       <i class="fa fa-envelope"></i>{{$staff['email']}}
                       <i class="fa fa-home" aria-hidden="true"></i>{{$staff['address']}} 　 
                       <a href="{{url('admin/staff')}}/{{$staff->id}}">編集 </a><br>
                   </li>
               </ul>
           </div>
       </div>
   </div>
<?php } ?>

</div>
</div>
</div>
@endsection
@section('footer_js')
@endsection
