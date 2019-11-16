@extends('user.layout')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var task_wi = JSON.parse(localStorage.getItem('task_wi'));

      var initialTimeZone = 'local';
      var timeZoneSelectorEl = document.getElementById('time-zone-selector');

      var calendarEl = document.getElementById('calendar');
      var todate = new Date(); 
      var todayDate = todate.getFullYear()+'-'+ ("0"+(todate.getMonth() + 1)).slice(-2)+'-'+("0"+todate.getDate()).slice(-2);

      var events = [ ];
      var opentime = task_wi;

      if(opentime != null){
        opentime.start = todayDate+'T'+opentime.start;
        opentime.end = todayDate+'T'+opentime.end;
    }

/*
events = 
[
{title: "朝食のお世話", start: todayDate+'T'+"07:10:00", end: todayDate+'T'+"08:00:00"}
,{title: "登園準備", start: todayDate+'T'+"08:00:00", end: todayDate+'T'+"08:30:00"}
,{title: "授乳", start: todayDate+'T'+"09:00:00", end: todayDate+'T'+"10:00:00"}
]
*/

for(n = 0; n <= events.length; n++){
    console.log(n);
    //T パース時刻だけにする
    console.log(events[n]);
}

console.log(JSON.stringify(events)); 

var calendar = new FullCalendar.Calendar(calendarEl, {
  plugins: [ 'interaction', 'dayGrid', 'timeGrid'],
  defaultView: 'timeGrid',
  height: 1100,
  timeZone: initialTimeZone,
  header: {
    left: 'timeGridDay',
    center: '',
    right: 'timeGridWeek',
    resources: []
},
allDaySlot: false,
editable: true,
  droppable: true, // will let it receive events!
  defaultDate: todayDate,
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  selectable: true,
  eventLimit: true, // allow "more" link when too many events
  events: events,
      // スクロール開始時間
      firstHour: 6,

      loading: function(bool) {
          if (bool) {
         //   loadingEl.style.display = 'inline'; // show
     } else {
       //    loadingEl.style.display = 'none'; // hide
   }
},
eventTimeFormat: { hour: 'numeric', minute: '2-digit', timeZoneName: 'short' },

dateClick: function(arg) {
    console.log('dateClick', calendar.formatIso(arg.date));
},
select: function(arg) {
    console.log('select', calendar.formatIso(arg.start), calendar.formatIso(arg.end));
}


});

function tojson(title,text){
  var rs = /([0-9]*?)\:([0-9]*?)\s*(AM|PM)\s*-\s*([0-9]*?)\:([0-9]*?)\s*(AM|PM)\s*(.*?)/.exec(text);

  if(rs[3] == 'PM' && rs[1] != 12){
    var start = parseInt(rs[1],10)+12 +':'+rs[2]+':00';
}else{
    var start = rs[1]+':'+rs[2]+':00';
}
if(rs[6] == 'PM' && rs[1] != 12){
    var end = parseInt(rs[4],10)+12+':'+rs[2]+':00';
}else{
    var end = rs[1]+':'+rs[2]+':00';
}
var json = {
    title:title,
    start:start,
    end:end
}
console.log(json);
return json;
};

function jsontoparse(json){

  var rs = /.*T(.*?)\:00/.exec(json.start);

  var rs2 = /.*?T(.*?)\:00/.exec(json.end);

  console.log(rs);
//  var rs = /([0-9]*?)\:([0-9]*?)\s*(AM|PM)\s*-\s*([0-9]*?)\:([0-9]*?)\s*(AM|PM)\s*(.*?)/.exec(text);
console.log(rs);
console.log(rs2);

var rsJson = {
    title:json.title,
    start:rs[1],
    end:rs2[1]
}
console.log(rsJson);
return rsJson;
};


calendar.render();

    // load the list of available timezones, build the <select> options
    // it's HIGHLY recommended to use a different library for network requests, not this internal util func
    FullCalendar.requestJson('GET', 'php/get-time-zones.php', {}, function(timeZones) {

      timeZones.forEach(function(timeZone) {
        var optionEl;

        if (timeZone !== 'UTC') { // UTC is already in the list
          optionEl = document.createElement('option');
          optionEl.value = timeZone;
          optionEl.innerText = timeZone;
          timeZoneSelectorEl.appendChild(optionEl);
      }
  });
  }, function() {
      // TODO: handle error
  });

    // when the timezone selector changes, dynamically change the calendar option
    timeZoneSelectorEl.addEventListener('change', function() {
      calendar.setOption('timeZone', this.value);
  });


    // when the timezone selector changes, dynamically change the calendar option
    timeZoneSelectorEl.addEventListener('change', function() {
      calendar.setOption('timeZone', this.value);
  });
});

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
}

#top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 5px;
    line-height: 40px;
    font-size: 12px;
}
.left { float: left }
.right { float: right }
.clear { clear: both }

#script-warning, #loading { display: none }
#script-warning { font-weight: bold; color: red }

#calendar {
    margin: 5px auto;
    padding: 0 5px;
}
.tzo {
    color: #000;
}
</style>

<style>
  .timezone{
    display: inline-block;
    text-align: center;
    width:45%;
}

@media screen and (max-width: 600px){
    .timezone{width:45%;}

}
</style>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/user') }}">ユーザーメニュー</a></li>
    <li class="breadcrumb-item active"><a href="{{ url('/user/schedule') }}">予約確認</a></li>
</ol>
<!-- Example DataTables Card-->
<div class="mb-3">


    <div style="text-align:center">予約一覧</div>

    <div id='calendar'></div>

    <ul style="list-style: none;">


        <?php foreach($plan as $k => $v){?>
            <li>
                <?php if($v['used_at']){ ?>
                    {{ $v['used_at'] }} {{ $v['used_time'] }} <br>
                <?php } ?>
            </li>
        <?php } ?>

    </ul>
</div>
@endsection
@section('footer_js')
@endsection
