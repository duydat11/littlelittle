<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="{{ asset ('frontend/css/global.css')}}" />
  <link rel="stylesheet" href="{{ asset ('frontend/css/CTSuKien.css')}}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=iCiel Koni:wght@900&display=swap" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
</head>

<body>
  <div class="s-kin">
    <div class="frame3">
      <div class="render-1"></div>
    </div>
    <div class="bg">
      <img class="group-icon5" alt="" src="{{ asset ('frontend/img/group5.svg') }}" />

      <div class="frame4"></div>
      <div class="frame5"></div>
      @foreach ($details_event as $key => $de_event)
      <div class="s-kin-1" style="font-family: 'Sigmar', cursive; font-weight:300">{{$de_event->event_name}}</div>

    </div>
    <img class="group-icon6" alt="" src="{{ asset ('frontend/img/group6.svg') }}" />

    <div class="khung-cha-v">
      <img class="group-icon7" alt="" src="{{ asset ('frontend/img/group7.svg') }}" />

      <div class="group-container">
        <div class="frame-parent3">
          <div class="rectangle-wrapper">
            <img class="frame-item" alt="" src="{{$de_event->event_img}}" />
          </div>
          <div class="time-parent">
            <div class="time">
              <img class="icons-calendar" alt="" src="{{ asset ('frontend/img/icons--calendar.svg') }}" />

              <div class="div">{{$de_event->date_start}} đến {{$de_event->date_end}}</div>
            </div>
            <div class="m-sen-park">{{$de_event->event_desc}}</div>
            <b class="vn">{{ number_format($de_event->ticket_price, 0, ',', '.') }} VNĐ</b>
          </div>
        </div>
        <div class="frame-parent4">
          <div class="rectangle-container">
            <img class="frame-inner" alt="" src="{{$de_event->event_sub_img}}" />
          </div>
          <div class="lorem-ipsum-is" >
            {{$de_event->event_content_2}}

          </div>
        </div>
        <div class="frame-parent5">
          <div class="rectangle-frame">
            <img class="frame-inner" alt="" src="{{ asset ('frontend/img/rectangle-11@2x.png') }}" />
          </div>
          <div class="lorem-ipsum-is1">
            {{$de_event->event_content_3}}
          </div>
        </div>
        <div class="lorem-ipsum-is-container">
          <span class="lorem-ipsum-is-container1">
            <b class="lorem-ipsum">{{$de_event->event_desc}}</b>
            <span class="is-simply-dummy">
              {{$de_event->event_content}}</span>
          </span>
        </div>
      </div>
    </div>

    @endforeach

    <img class="frame-icon6" alt="" src="{{ asset ('frontend/img/frame5.svg') }}" />

    <img class="frame-icon7" alt="" src="{{ asset ('frontend/img/frame6.svg') }}" />

    <div class="navigation2">
      <img class="navigation-inner" alt="" src="{{ asset('frontend/img/vector-2.svg')}}" />

      <div class="frame-parent11">
        <div class="tags-container">
          <div class="tags7" id="tagsContainer">
            <b class="s-kin-13">Trang chủ</b>
          </div>
          <div class="tags6" id="tagsContainer1">
            <b class="s-kin-13">Sự kiện</b>
          </div>
          <div class="tags6" id="tagsContainer2">
            <b class="s-kin-13">Liên hệ</b>
          </div>
        </div>
        <div class="group-parent6">
          <img class="group-icon14" alt="" src="{{ asset('frontend/img/group4.svg')}}" />

          <b class="s-kin-13">0123456789</b>
        </div>
      </div>
      <img class="little-little-logo-ngang-12" alt=""
        src="{{ asset('frontend/img/little--little-logo-ngang-1@2x.png')}}" />
    </div>
  </div>

  <script>
    var tagsContainer = document.getElementById("tagsContainer");
      if (tagsContainer) {
        tagsContainer.addEventListener("click", function (e) {
          window.location.href = "/trangchu";
        });
      }
      
      var tagsContainer2 = document.getElementById("tagsContainer2");
      if (tagsContainer2) {
        tagsContainer2.addEventListener("click", function (e) {
          window.location.href = "/lienhe";
        });
      }
  </script>
</body>

</html>