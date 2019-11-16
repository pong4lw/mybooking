@extends('admin.layouts.layout')
@section('content')
<!-- Breadcrumbs-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> ダッシュボード
    </div>

    <div class="card-body">

        総予約数 {{$count_all}}<a class="btn" href="{{url('admin/schedule')}}" role="button">確認</a>

        未対応予約数 {{$count_plan}}<a class="btn" href="{{url('admin/schedule')}}" role="button">確認</a>

        会員数 {{$count_users}}<a class="btn" href="{{url('admin/user')}}" role="button">確認</a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> 予約一覧
    </div>

    <div class="card-body">
        <a href="{{url('admin/plan/create')}}" class="btn btn-primary" role="button">新規予約</a>
    </div>
    <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>プロジェクト</th>
                    <th>担当者</th>
                    <th>ユーザー</th>
                    <th>スタジオ</th>
                    <th>開始日時</th>
                    <th>所要時間</th>
                    <th>請求額</th>
                </tr>
            </thead>

            <tbody id="show-user">

                <?php foreach ($plan as $k => $v) { ?>
                    <tr>
                        <th>{{ $v['services'] }}</th>
                        <th>{{ $v['provider'] }}</th>
                        <th>{{ $v['client'] }}</th>
                        <th>{{ $v['place'] }}</th>
                        <th>{{ $v['used_at'] }}<br>{{$v['used_time']}}</th>
                        <th>{{ $v['services_time'] }}</th>
                        <th>{{ $v['ticket'] }}</th>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> ステータス
        </div>

        <table class="table table-bordered"  id="datatable-staff" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>トレーナー</th>
                    <th>予約数</th>
                    <th>未対応</th>
                    <th>対応済</th>
                    <th>キャンセル</th>
                </tr>
            </thead>

            <tbody id="show-status">
                <?php foreach($provider as $k => $v){ ?>
                    <tr>
                        <th>{{ $v['name'] }}</th>
                        <th>{{ $v['count'] }}</th>
                        <th>{{ $v['plan_count'] }}</th>
                        <th>{{ $v['plan_encount'] }}</th>
                        <th>{{ $v['delete_count'] }}</th>
                    </tr>
                    
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>
@endsection
@section('footer_js')
  <script>
        $(document).ready(function() {
            $('#datatable-staff').DataTable();
        });
    </script>
@endsection
