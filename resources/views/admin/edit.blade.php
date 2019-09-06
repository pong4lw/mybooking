@extends('admin.layouts.layout')
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">ユーザー</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit</div>
            <div class="card-body">
                    <div class="form-group">
                        <label>ユーザー名</label>
                        <input class="form-control" name="user-name" id="user-name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>アバター</label>
                        <input type="file" name="avatar" id="image" class="form-control"  onchange="handleData.previewImage()" accept="image/*">
                        <img style="margin-top: 10px" width="200" src="{{ $user->avatarUrl }}" data-full-path="@if(!empty($user->fullPath)){{ $user->fullPath }}@endif" id="preview-image" class="rounded" alt="Cinque Terre">
                    </div>
                    <button type="button" class="btn btn-success" onclick="saveData()">編集完了</button>
            </div>
        </div>
    @endsection
    @section('footer_js')
        <script>
            function saveData() {
                var userName = $('#user-name').val();
                var id = '{{ $user->id }}';
                var databaseNode = rootNode + 'users/' + id;
                if (userName == ''){
                    alert('please input name');
                    return;
                }
                var storageData = {};
                if ($('#image').val()){
                    var fullPath = $('#preview-image').attr('data-full-path');
                    var base64 = $('#preview-image').attr('src');
                    var storageNode = '/avatars/' + id;
                    storageData = {
                        fullPath: fullPath,
                        base64: base64,
                        storageNode: {
                            node : storageNode,
                            name : 'avatarUrl'
                        }
                    };
                }
                handleData.updateData(databaseNode, {'name':userName}, '{{ url('/user') }}', storageData)
            }
        </script>
    @endsection
