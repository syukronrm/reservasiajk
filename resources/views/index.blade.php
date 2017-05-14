<!DOCTYPE html>
<html>
<head>
  @yield('css')
  <title>Reservasi AJK</title>
  <link rel="stylesheet" type="text/css" href=" {{ asset('/css/semantic.min.css') }}">
  <link rel="stylesheet" type="text/css" href=" {{ asset('/css/style.css') }}">
</head>
<body style="background-color: #fff;">
<!-- particles.js container --> 
  <div id="particles-js"></div> 

  <div class="ui container">
    <div class="logo" style="text-align: center; padding-top:20%; ">
      <img src="{{ asset('logo_blue.png')}}" height="200px" width="auto">
    </div>
    <div id="clock-container">
      <h1 id="clock"></h1>
      <h2 id="day"></h2>
    </div>

    <div class="ui raised segments" style="margin: 25px;">
      <div class="ui green segment center aligned bg-redcoral">
        <h1 id="event-now"></h1>
      </div>

      <div class="ui segment center aligned bg-redcoral">
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
  <script src="{{ asset('/js/semantic.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/moment.min.js') }}" type="text/javascript"</script>
  <script src="{{ asset('/js/particles.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function(){
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


      // particles.js config
      particlesJS("particles-js", {
        "particles": {
          "number": {
            "value": 400,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#067fd4"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "src": "img/github.svg",
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 1,
            "random": true,
            "anim": {
              "enable": true,
              "speed": 1,
              "opacity_min": 0,
              "sync": false
            }
          },
          "size": {
            "value": 3,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 4,
              "size_min": 0.3,
              "sync": false
            }
          },
          "line_linked": {
            "enable": false,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 3,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 600
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "bubble"
            },
            "onclick": {
              "enable": true,
              "mode": "repulse"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 250,
              "size": 0,
              "duration": 2,
              "opacity": 0,
              "speed": 3
            },
            "repulse": {
              "distance": 400,
              "duration": 0.4
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true
        });
    })

  </script>
@yield('js')
</body>
</html>