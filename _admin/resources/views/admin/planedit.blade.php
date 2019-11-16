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
            <form action="{{ url('admin/plan/update') }}/{{ $plan->id }}" method="get">
            @csrf
            <div class="card-header">
                <i class="fa fa-table"></i>予約</div>
                <div class="card-body">
                <div class="form-group">
                    <label>ユーザー名</label>

                    <p>
                    <select name="user_id" class="form-control">
                        <?php foreach ($users as $k => $v){ ?>
                            <option value="{{ $v->id }}" @if($plan->client_id == $v->id) selected="selected" @endif>{{ $v->name }}</option>
                        <?php } ?>          
                   </select>
                    </p>
                <!--  <input type="" class="form-control" id="user-name">-->
                </div>

                <div class="form-group">
                    <label>メニュー</label>
                    <br>

                    <p>
                    <select name="services_id" class="form-control">
                        <?php foreach ($services as $k => $v){ ?>
                            <option value="{{ $v->id }}" @if($plan->services_id == $v->id) selected="selected" @endif>{{ $v->name }}</option>
                        <?php } ?>          
                    </select>
                    </p>

                </div>

                <div class="form-group">
                    <label>スタッフ</label>
                    <br>

                    <p>
                    <select name="staffs_id" class="form-control">
                        <?php foreach ($staffs as $k => $v){ ?>
                            <option value="{{ $v->id }}" @if($plan->provider_id == $v->id) selected="selected" @endif>{{ $v->name }}</option>
                        <?php } ?>          
                    </select>
                    </p>

                </div>

                <div class="form-group">
                    <label>予約日時</label>
                     <input name="used_at" type="date" value="{{ $plan->used_at }}">
                </div>

                <div class="form-group">
                    <label>予約時間</label>
                <!--
   
                    <label><input type="radio" name="timezone">昼の時間帯</label>
                    <label><input type="radio" name="timezone">夕方～夜の時間帯</label>
-->
                   <br>
                    <label><input name="used_time" type="radio" value="10:00" @if($plan->used_time == "10:00") checked="checked" @endif >10:00</label>
                    <label><input name="used_time" type="radio" value="10:30" @if($plan->used_time == "10:30") checked="checked" @endif >10:30</label>
                    <label><input name="used_time" type="radio" value="11:00" @if($plan->used_time == "11:00") checked="checked" @endif >11:00</label>
                    <label><input name="used_time" type="radio" value="11:30" @if($plan->used_time == "11:30") checked="checked" @endif >11:30</label>
                    <label><input name="used_time" type="radio" value="12:00" @if($plan->used_time == "12:00") checked="checked" @endif >12:00</label>
                    <label><input name="used_time" type="radio" value="12:30" @if($plan->used_time == "12:30") checked="checked" @endif >12:30</label>
                    <br>
                    <label><input name="used_time" type="radio" value="13:00" @if($plan->used_time == "13:00") checked="checked" @endif >13:00</label>
                    <label><input name="used_time" type="radio" value="13:30" @if($plan->used_time == "13:30") checked="checked" @endif >13:30</label>
                    <label><input name="used_time" type="radio" value="14:00" @if($plan->used_time == "14:00") checked="checked" @endif >14:00</label>
                    <label><input name="used_time" type="radio" value="14:30" @if($plan->used_time == "14:30") checked="checked" @endif >14:30</label>
                    <label><input name="used_time" type="radio" value="15:00" @if($plan->used_time == "15:00") checked="checked" @endif >15:00</label>
                    <label><input name="used_time" type="radio" value="15:30" @if($plan->used_time == "15:30") checked="checked" @endif >15:30</label>
                    <br>
                    <input name="used_time" type="radio" value="16:00" @if($plan->used_time == "16:00") checked="checked" @endif>16:00
                    <input name="used_time" type="radio" value="16:30" @if($plan->used_time == "16:30") checked="checked" @endif>16:30
                    <input name="used_time" type="radio" value="17:00" @if($plan->used_time == "17:00") checked="checked" @endif>17:00
                    <input name="used_time" type="radio" value="17:30" @if($plan->used_time == "17:30") checked="checked" @endif>17:30
                    <input name="used_time" type="radio" value="18:00" @if($plan->used_time == "18:00") checked="checked" @endif>18:00
                    <input name="used_time" type="radio" value="18:30" @if($plan->used_time == "18:30") checked="checked" @endif>18:30
<br>
                    <input name="used_time" type="radio" value="19:00" @if($plan->used_time == "19:00") checked="checked" @endif>19:00
                    <input name="used_time" type="radio" value="19:30" @if($plan->used_time == "19:30") checked="checked" @endif>19:30
                    <input name="used_time" type="radio" value="20:00" @if($plan->used_time == "20:00") checked="checked" @endif>20:00
                    <input name="used_time" type="radio" value="20:30" @if($plan->used_time == "20:30") checked="checked" @endif>20:30
                    <input name="used_time" type="radio" value="21:30" @if($plan->used_time == "21:00") checked="checked" @endif>21:00
                    <input name="used_time" type="radio" value="21:30" @if($plan->used_time == "21:30") checked="checked" @endif>21:30
                </div>

                <button type="submit" class="btn btn-success" onclick="saveData()">作成する</button>
            </form>
            </div>
        </div>
    @endsection
    @section('footer_js')
    @endsection
