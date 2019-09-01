@extends('user.layout')
@section('content')

<link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:500" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dist/css/style.css')}}">

<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>

<link href="{{asset('js/fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('js/fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('js/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('js/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('js/fullcalendar/packages/list/main.css')}}" rel='stylesheet' />
<script src="{{asset('js/fullcalendar/packages/core/main.js')}}"></script>
<script src="{{asset('js/fullcalendar/packages/interaction/main.js')}}"></script>
<script src="{{asset('js/fullcalendar/packages/daygrid/main.js')}}"></script>
<script src="{{asset('js/fullcalendar/packages/timegrid/main.js')}}"></script>
<script src="{{asset('js/fullcalendar/packages/list/main.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.fancybox.css')}}" media="screen" />
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

<!-- Example DataTables Card-->
<div class="mb-3">
  <div style="text-align:center"><h3>予約確認</h3></div>

  <ul style="list-style: none;">
    <?php foreach($plan as $k => $v){ ?>

      <?php if( $k == 0 ) { ?> 
         <li><h4>{{ date('Y年n月', strtotime($v->used_at)) }}</h4></li>
      <?php } ?>
      <?php if( ($k > 0) && date('m',strtotime($plan[$k-1]->used_at)) < date('m',strtotime($v->used_at)) ) { ?>
        <li><h4>{{ date('Y年n月', strtotime($v->used_at)) }}</h4></li>
       <?php } ?>

      <?php if($v->used_at){ ?>
     
     <li style="padding:7px;">   
 <a href="{{url($shopId.'user/schedule_change/')}}?id={{$v->id}}">
        <?php if ($v->is_delete){ ?>
        <i style="color:#FE3D34;">●</i>        

       <?php }else{ ?>
         <i style="color:#60F5B6;">●</i>

       <?php } ?>
        {{ date('j日',strtotime($v->used_at))}}
          （{{ $week[date('w',strtotime($v->used_at))] }}）

        {{ $v->used_time }} ‐ {{ $v->endtime }}
      <?php } ?>
</a>
      </li>
    <?php } ?>

</ul>
</div>
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

    events = 
    [
    <?php foreach($plan as $k => $v){ ?>

      <?php if($v['used_at']){ ?>
        {title: "{{$v['used_at'] }} {{ $v['used_time'] }}", start: "{{$v['used_at'] }}"+"T"+"{{ $v['used_time'] }}:00", end: "{{$v['used_at'] }}"},
      <?php } ?>
    <?php } ?>
    ]

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid','list',],
      defaultView: 'listMonth',
      height: 1100,
      timeZone: initialTimeZone,
      header: {
        left: '',
        center: '',
        right: 'listMonth,dayGridMonth',
        resources: []
      },

    views: {
      listMonth: {
      type: 'listWeek',
      duration: { days: 30 },
    }
  },
  axisFormat: 'H:mm',
  allDaySlot: false,
  editable: true,
  droppable: true, // will let it receive events!
  defaultDate: todayDate,
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  selectable: true,
  eventLimit: true, // allow "more" link when too many events
  
//  timeFormat: 'H:mm' ,
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


  });

</script>

@endsection
@section('footer_js')
@endsection
