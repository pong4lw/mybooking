@extends('admin.layouts.layout')
@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>トレーニング
    </div>
    <div class="card-body">
        <p>
            <a href="{{ url('admin/services/create') }}" class="btn btn-success" role="button">作成する</a>
        </p>
    </div>
</div>
    <?php foreach($services as $service){ ?>
<div class="card mb-3">
    
    <div class="card-body">
        <div class="table-responsive">
            <ul>
                    <li>
                        {{ $service->name }}　（{{ $service->used_time }}）<br>
                        {{ $service->description }} 　<br>
                        <a href="{{ url('admin/services') }}/{{ $service->id }}">編集 </a><br>
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