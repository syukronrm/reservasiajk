<!DOCTYPE html>
<html>
<head>
  @yield('css')
  <title>Reservasi AJK</title>
  <link rel="stylesheet" type="text/css" href=" {{ asset('/css/semantic.min.css') }}">
  <link rel="stylesheet" type="text/css" href=" {{ asset('/css/style.css') }}">
</head>
<body>
  <div class="ui container">
    <div id="clock-container">
      <h1 id="clock"></h1>
      <h2 id="day"></h2>
    </div>

    <div class="ui raised segments">
      <div class="ui green segment center aligned">
        <h1 id="event-now"></h1>
      </div>

      <div class="ui segment center aligned">
        <h3 id="time"></h3>
      </div>
    </div>

    <div class="ui secondary tall stacked raised segments"  id="upcoming-container">
      <div class="ui secondary segment left aligned">
        <h2> Upcoming Events</h2>
      </div>
      <div class="ui secondary segment aligned">
        <div id="upcoming"></div>
      </div>
    </div>
  </div>
  <script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/semantic.min.js') }}" type="text/javascript" charset="utf-8" async defer></script>
  <script src="{{ asset('/js/moment.min.js') }}" type="text/javascript" charset="utf-8" async defer></script>

  <script type="text/javascript">
    $(document).ready(function(){
      // This function gets the current time and injects it into the DOM

      function updateClock() {
        var now = new moment().locale('id');
        var time = now.format("HH:mm:ss");
        var day = now.format("dddd, DD MMMM YYYY");

        $("#clock").text(time);
        $("#day").text(day);

        setTimeout(updateClock, 1000);
      }
      setTimeout(updateClock(), 1000);
      

      function updateJadwal() {
        $.ajax({
          url: 'http://localhost:8000/jadwal',
          data: {
            format: 'json'
          },
          datatype: 'jsonp',
          success: function(data) {
            if (data.now) {
              var now = data.now;
              var start = moment(now.start, "YYYY-MM-DD HH:mm:ss");
              var end = moment(now.end, "YYYY-MM-DD HH:mm:ss");


              $('#event-now').text(now.keperluan);
              $('#time').text(start.format('HH:mm')+ " - " + end.format('HH:mm'));
            } else {
              $('#event-now').text("We're open!");
              $('#time').text("");

            }


            var upcoming = data.upcoming;
            $("#upcoming").html(" ");
            var upcomingHtml = "";
            for (var i = 0; i < upcoming.length || i >= 5; i++) {
              var event = upcoming[i];
              var eventStart = moment(event.start, "YYYY-MM-DD HH:mm:ss");
              var start = moment(event.start, "YYYY-MM-DD HH:mm:ss");
              var end = moment(event.end, "YYYY-MM-DD HH:mm:ss");

              $("#upcoming").append("<h4 class='ui header'>"+ event.keperluan +"<div class='sub header'>"+ start.format('HH:mm')+ " - " + end.format('HH:mm') +" | "+ eventStart.format("dddd, DD MMMM YYYY") + "</div></h4>");
            }

          },
          type: 'GET'
        });
        setTimeout(updateJadwal, 60000);
      }
      setTimeout(updateJadwal, 1000);
    })

  </script>
@yield('js')
</body>
</html>