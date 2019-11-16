@extends('admin.layouts.layout')
    @section('content')

<style>
input[type=radio] {
    /*display: none; */
}

input[type="radio"]:checked + label {
    background: #31A9EE;
    color: #ffffff; 
}

.label:hover {
    background-color: #E2EDF9; 
}
</style>


        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <form action="{{ url('admin/plan/update') }}/" method="get">
            @csrf
            <div class="card-header">
                <i class="fa fa-table"></i>予約</div>
                <div class="card-body">
                <div class="form-group" >
                    <label>ユーザー名</label>

                    <p>
                    <select name="user_id" class="form-control col-md-6" >
                        <?php foreach ($users as $k => $v){ ?>
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                        <?php } ?>          
                   </select>
                    </p>
                <!--  <input type="" class="form-control" id="user-name">-->
                </div>

                <div class="form-group" class="col-md-6">
                    <label>メニュー</label>
                    <br>

                    <p>
                    <select name="services_id" class="form-control col-md-6" >
                        <?php foreach ($services as $k => $v){ ?>
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                        <?php } ?>          
                    </select>
                    </p>

                </div>

                <div class="form-group">
                    <label>スタッフ</label>
                    <br>

                    <p>
                    <select name="staffs_id" class="form-control col-md-3" >
                        <?php foreach ($staffs as $k => $v){ ?>
                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                        <?php } ?>          
                    </select>
                    </p>

                </div>

                <div class="form-group">
                    <label>予約日時</label>
                     <input name="used_at" class="form-control col-md-3"  type="date" value="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <label>予約時間</label>
                    <!--
                    <label><input type="radio" name="timezone">昼の時間帯</label>
                    <label><input type="radio" name="timezone">夕方～夜の時間帯</label>
-->
                   <br>
<!--                    昼-->
                    <label><input name="used_time" type="radio" value="10:00">10:00</label>
                    <label><input name="used_time" type="radio" value="10:30">10:30</label>
                    <label><input name="used_time" type="radio" value="11:00">11:00</label>
                    <label><input name="used_time" type="radio" value="11:30">11:30</label>
                    <label><input name="used_time" type="radio" value="12:00">12:00</label>
                    <label><input name="used_time" type="radio" value="12:30">12:30</label>
                    <br>
                    <label><input name="used_time" type="radio" value="13:00">13:00</label>
                    <label><input name="used_time" type="radio" value="13:30">13:30</label>
                    <label><input name="used_time" type="radio" value="14:00">14:00</label>
                    <label><input name="used_time" type="radio" value="14:30">14:30</label>
                    <label><input name="used_time" type="radio" value="15:00">15:00</label>
                    <label><input name="used_time" type="radio" value="15:30">15:30</label>
                    <br>
<!--                    夕方～夜 -->
                    <input name="used_time" type="radio" value="16:00">16:00
                    <input name="used_time" type="radio" value="16:30">16:30
                    <input name="used_time" type="radio" value="17:00">17:00
                    <input name="used_time" type="radio" value="17:30">17:30
                    <input name="used_time" type="radio" value="18:00">18:00
                    <input name="used_time" type="radio" value="18:30">18:30<br>
                    <input name="used_time" type="radio" value="19:00">19:00
                    <input name="used_time" type="radio" value="19:30">19:30
                    <input name="used_time" type="radio" value="20:00">20:00
                    <input name="used_time" type="radio" value="20:30">20:30
                    <input name="used_time" type="radio" value="21:30">21:00
                    <input name="used_time" type="radio" value="21:30">21:30
                </div>

                <button type="submit" class="btn btn-success" onclick="saveData()">作成する</button>
            </form>
            </div>
        </div>
    @endsection
    @section('footer_js')
    @endsection
