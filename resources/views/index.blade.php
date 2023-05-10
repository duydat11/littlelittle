<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="{{ asset ('frontend/css/index.css')}}" />
    <link rel="stylesheet" href="{{ asset ('frontend/css/global.css')}}" />
   
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=iCiel Koni:wght@900&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap"
    />
  </head>
  <body>
    <div class="calendar">
      <div class="month-selector">
        <div class="arrows">
          <img class="previous-icon" alt="" src="{{ asset ('frontend/img/previous.svg')}}" />

          <b class="thng-5-2021">Tháng 5, 2021</b>
          <img class="previous-icon" alt="" src="{{ asset ('frontend/img/next.svg')}}" />
        </div>
      </div>
      <div class="calendar-events">
        <div class="weekdays">
          <b class="cn">CN</b>
          <b class="t2">T2</b>
          <b class="t3">T3</b>
          <b class="t4">T4</b>
          <b class="t5">T5</b>
          <b class="t6">T6</b>
          <b class="t7">T7</b>
        </div>
        <div class="week-01">
          <div class="div12">1</div>
          <div class="div13">2</div>
          <div class="div14">3</div>
          <div class="div15">1</div>
          <div class="div16">2</div>
          <div class="div17">3</div>
          <div class="div18">4</div>
        </div>
        <div class="week-02">
          <div class="div19">5</div>
          <div class="div20">6</div>
          <div class="div21">7</div>
          <img class="current-day-icon" alt="" src="{{ asset ('frontend/img/current-day.svg')}}" />

          <div class="div22">8</div>
          <div class="div23">9</div>
          <div class="div24">10</div>
          <div class="div25">11</div>
        </div>
        <div class="week-03">
          <div class="div26">12</div>
          <div class="div27">13</div>
          <div class="div28">14</div>
          <div class="div15">15</div>
          <div class="div30">16</div>
          <div class="div31">17</div>
          <div class="div32">18</div>
        </div>
        <div class="week-04">
          <div class="div26">19</div>
          <div class="div34">20</div>
          <div class="div35">21</div>
          <div class="div36">22</div>
          <div class="div30">23</div>
          <div class="div17">24</div>
          <div class="div32">25</div>
        </div>
        <div class="week-05">
          <div class="div26">26</div>
          <div class="div27">27</div>
          <div class="div42">28</div>
          <div class="div15">29</div>
          <div class="div44">30</div>
          <div class="div45">31</div>
          <div class="div46">30</div>
        </div>
      </div>
    </div>
  </body>
</html>
