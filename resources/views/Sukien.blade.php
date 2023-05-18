<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="{{ asset ('frontend/css/SuKien1.css')}}" />
  <link rel="stylesheet" href="{{ asset ('frontend/css/global.css')}}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" />
  {{--
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=iCiel Koni:wght@900&display=swap" /> --}}


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
</head>

<body>
  <div class="s-kin1">
    <div class="frame6">
      <div class="bg1">
        <img class="group-icon9" alt="" src="{{ asset('frontend/img/group8.svg')}}" />

        <img class="frame-icon8" alt="" src="{{ asset('frontend/img/frame7.svg')}}" />

        <img class="vector-icon1" alt="" src="{{ asset('frontend/img/vector1.svg')}}" />

        <img class="vector-icon2" alt="" src="{{ asset('frontend/img/vector2.svg')}}" />

        <img class="vector-icon3" alt="" src="{{ asset('frontend/img/vector3.svg')}}" />

        <img class="vector-icon4" alt="" src="{{ asset('frontend/img/vector4.svg')}}" />

        <img class="vector-icon5" alt="" src="{{ asset('frontend/img/vector5.svg')}}" />

        <img class="vector-icon6" alt="" src="{{ asset('frontend/img/vector6.svg')}}" />

        <img class="vector-icon7" alt="" src="{{ asset('frontend/img/vector7.svg')}}" />

        <div class="s-kin-ni">Sự kiện nổi bật</div>

        <div class="s-kin-11">
        @foreach($all_event as $key =>$event)
        <div class="s-kin-12">
        <img class="s-kin-1-child" alt="" src="{{$event->event_img}}" />
        <div class="group-parent2">
            <div class="frame-wrapper">
                <div class="frame-parent7">
                    <div class="s-kin-1-parent">
                        <b class="s-kin-13">{{ $event->event_name }}</b>
                        <div class="m-sen-park1">{{ $event->event_desc }}</div>
                    </div>
                    <div class="time1">
                        <img class="icons-calendar1" alt="" src="{{ asset('assets/icons--calendar.svg') }}" />
                        <div class="div36">{{$event->date_start}} - {{$event->date_end}}</div>
                    </div>
                </div>
            </div>
            <b class="vn1">{{ number_format($event->ticket_price, 0, ',', '.') }} VNĐ</b>
            <div class="btn-xem-chi-tit" id="btnXemChiTit" data-slug="{{ $event->event_slug }}">
                <div class="xem-chi-tit">Xem chi tiết</div>
                <div class="xem-chi-tit-btn">
                <img class="group-icon10" alt="" src="{{ asset('frontend/img/group9.svg')}}" />
                    <div class="xem-chi-tit1">Xem chi tiết</div>
                </div>
            </div>

            {{-- <div class="p-t-33">
                <div class="flex-w flex-r-m p-b-10">
                    <div class="size-204 flex-w flex-m respon6-next">
                        <form action="/add-cart" method="post">
                            @if ($event->price !== null)
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_event"
                                        value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>                         
                            @endif
                            @csrf
                        </form>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>            
            @endforeach
            
          </div>


        <img class="previous-btn-icon" alt="" src="{{ asset('frontend/img/previous-btn.svg')}}" />

        <img class="next-btn-icon" alt="" src="{{ asset('frontend/img/next-btn.svg')}}" />
      </div>
      <img class="frame-icon9" alt="" src="{{ asset('frontend/img/frame8.svg')}}" />

      <img class="frame-icon10" alt="" src="{{ asset('frontend/img/frame9.svg')}}" />

      <div class="render-11"></div>
    </div>
    <div class="navigation2">
      <img class="navigation-inner" alt="" src="{{ asset('frontend/img/vector-2.svg')}}" />

      <div class="frame-parent11">
        <div class="tags-container">
          <div class="tags6" id="tagsContainer">
            <b class="s-kin-13">Trang chủ</b>
          </div>
          <div class="tags7">
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