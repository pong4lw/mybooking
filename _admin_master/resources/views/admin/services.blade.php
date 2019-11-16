@extends('admin.layouts.layout')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>トレーニングメニュー
    </div>
    <div class="card-body">
 
        <div class="table-responsive">
            <form action="{{ url('admin/services/update') }}/{{ $service->id ?? '0' }}" method="POST">
@csrf
            <ul class="col-md-6" style="list-style: none;">
                <li>トレーニング名</li>
                <li><input id="name" class="form-control" name="name" type="text" value="{{ $service->name  ?? ''}}"></li>
            </ul>

            <ul class="col-md-6" style="list-style: none;">
                <li>トレーニング詳細</li>
                <li><input id="description" class="form-control" name="description" type="text" value="{{ $service->description  ?? ''}}"></li>
            </ul>

            <ul class="col-md-3" style="list-style: none;">
                <li>所要時間</li>
                <li>
                    <select id="used_time" class="form-control" name="used_time">
                        <option value="30">30分</option>
                        <option value="45">45分</option>
                        <option value="60">60分</option>
                        <option value="90">90分</option>
                        <option value="120">120分</option>
                    </select>

                </li>
            </ul>

            <ul  class="col-md-3" style="list-style: none;">
                <li>消費チケット</li>
                <li>
                    <select id="tickets" class="form-control" name="tickets">
                        <option value="1">1枚</option>
                        <option value="2">2枚</option>
                        <option value="3">3枚</option>
                        <option value="4">4枚</option>
                        <option value="5">5枚</option>
                    </select>
                </li>
            </ul>

            <ul  class="col-md-6" style="list-style: none;">
                <li><a href="{{url('admin/services')}}" class="btn" type="button" role="button">戻る</a> <input type="submit" class="btn btn-success" role="button" value="確定"> </li>
            </ul>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('footer_js')
@endsection
