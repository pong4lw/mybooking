@extends('customer.layout')
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/user')}}"></a>
            </li>
            <li class="breadcrumb-item active">顧客問い合わせ</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user"></i> 顧客問い合わせ</div>
            <div class="card-body">
                <p>
                    <a href="{{ url('/customers/create') }}" class="btn btn-success" role="button">返信する</a>
                </p>
                <div class="table-responsive">
                    <div width="100%" cellspacing="0">
                        <div>名前</div>
                        <textarea>
                            
                        </textarea>

                    </div>
                </div>
            </div>
        </div>
    @endsection
