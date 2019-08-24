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
                <i class="fa fa-table"></i> Create</div>
            <div class="card-body">
                <div class="form-group">
                    <label>ユーザー名</label>
                    <span class="label label-warning label-required">必須</span>
                    <input class="form-control" id="user-name">
                </div>
                <div class="form-group">
                    <label>電子メールアドレス</label>
                    <span class="label label-warning label-required">必須</span>
                    <input class="form-control" type="email" id="email">
                </div>
                <div class="form-group">
                    <label>アバター</label>
                    <span class="label label-warning label-required">必須</span>
                    <input type="file" onchange="handleData.previewImage()" class="form-control" id="image" accept="image/*">
                    <img style="margin-top: 10px" width="200" src="" id="preview-image" class="rounded">
                </div>
                <button type="submit" class="btn btn-success" onclick="saveData()">作成する</button>
            </div>
        </div>
    @endsection
    @section('footer_js')
        <script>
            function saveData() {
                var userName = $('#user-name').val();
                var email = $('#email').val();
                var node = rootNode + 'users/';
                var id = fb.getKey(node);
                var databaseNode = node + id;
                if (userName == ''){
                    alert('please input name');
                    return;
                }
                if (email == ''){
                    alert('please input email');
                    return;
                }
                if ($('#image').val() == ''){
                    alert('please upload image');
                    return;
                }
                var base64 = $('#preview-image').attr('src');
                var storageNode = '/avatars/' + id;
                var storageData = {
                    base64: base64,
                    storageNode: {
                        node : storageNode,
                        name : 'avatarUrl'
                    }
                };
                var data = {
                    'name': userName,
                    'email': email,
                    'isLocked': false,
                    'method': 'email',
                    'id': id,
                };
                handleData.createData(databaseNode, data, '{{ url('/user') }}', storageData)
            }
        </script>
    @endsection
