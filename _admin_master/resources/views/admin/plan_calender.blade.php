@extends('admin.layouts.layout')
@section('content')
<style>
  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #script-warning, #loading { display: none }
  #script-warning { font-weight: bold; color: red }

  #calendar {
    text-align: center; 
    margin: 40px auto;
    padding: 0 10px;
  }

  .tzo {
    color: #000;
  }
  <!--
  #jquery-ui-sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 70%;
  }
  #jquery-ui-sortable li {
    margin: 0 3px 3px 3px;
    padding: 0.3em;
    padding-left: 1em;
    font-size: 15px;
    font-weight: bold;
    cursor: move;
  }
  -->
</style>

<!-- Example DataTables Card-->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/jquery.ui.all.css')}}">

<script type="text/javascript" src="{{ asset('js/jquery-1.4.2.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.12.1.js' )}}"></script>

<link rel="stylesheet" href="{{ asset('css/schedule.css')}}" />

<link href="{{ asset('js/fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{ asset('js/fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('js/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
<link href="{{ asset('js/fullcalendar/packages/list/main.css')}}" rel='stylesheet' />

<script type="text/javascript" src="{{ asset('js/fullcalendar/packages/moment/main.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jq.schedule.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fullcalendar/packages/core/main.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fullcalendar/packages/interaction/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fullcalendar/packages/daygrid/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fullcalendar/packages/timegrid/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fullcalendar/packages/list/main.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var task_wi = JSON.parse(localStorage.getItem('task_wi'));
    var initialTimeZone = 'local';
    var timeZoneSelectorEl = document.getElementById('time-zone-selector');

  //  var loadingEl = document.getElementById('loading');

  var calendarEl = document.getElementById('calendar');
  var todate = new Date(); 
  var todayDate = todate.getFullYear()+'-'+ ("0"+(todate.getMonth() + 1)).slice(-2)+'-'+("0"+todate.getDate()).slice(-2);

  var events = [ ];
  var opentime = task_wi;
  
  if(opentime != null){
    opentime.start = todayDate+'T'+opentime.start;
    opentime.end = todayDate+'T'+opentime.end;
//    events = [task_wi];
}

events = 
[
{title: "", start: "", end: ""}
,{title: "aa", start: todayDate+'T'+"06:00:00", end: todayDate+'T'+"06:50:00"}

<?php foreach ($plan as $key => $value) {?>
,{title: "{{ $value['services'] }}", start: todayDate+'T'+"{{ $value['opentime'] }}:00", end: todayDate+'T'+"{{ $value['closetime'] }}:00"}
<?php } ?>

]

for(n = 0; n <= events.length; n++){
  console.log(n);
    //T パース時刻だけにする
    console.log(events[n]);
  }

  console.log(JSON.stringify(events)); 
  
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid', 'timeGrid'],
    defaultView: 'dayGridMonth',
    height: 1100,
    timeZone: initialTimeZone,
    header: {
      left: '',
      center: '',
      right: '',
      resources: []
    },
    allDaySlot: false,
    editable: true,
  droppable: false, // will let it receive events!
  defaultDate: todayDate,
  navLinks: true, // can click day/week names to navigate views
  editable: false,
  selectable: true,
  eventLimit: true, // allow "more" link when too many events
  events: events,

      //drop
      eventDrop:function(event){},
      //receive
      eventReceive:function(event){},
      //leave
      eventLeave:function(event){},
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
//    location.href = "";
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

<!-- Breadcrumbs-->

    <div class="card mb-3">

    <div class="card-header">
      <i class="fa fa-table"></i>カレンダー
    </div>
      <div class="card-body">
        <a href="{{ url('/admin/plan/create') }}" class="btn btn-primary" role="button">新規予約</a>
        <div id="calendar" stle="margin:80px;"></div>

      </div>
    </div>

  @endsection
  
@section('scripts')
@include('js.config')
<script src="{{ asset('js/site.js') }}"></script>
@endsection
  @section('footer_js')
