@extends('layouts.default')

@section('header')
    <div class="row justify-content-between d-flex align-items-center">
        <div class="col-sm-7">
            <p class="text-white text-lato" style="font-size:2.6rem">Pusat Informasi COVID-19</p>
            <p class="text-white" style="font-size:1.2em">Tetap ikuti perkembangan kasus COVID-19 <br> dapatkan informasi dan edukasi yang perlu anda ketahui di sini</p>
        </div>
        <div class="col-sm-5 d-none d-lg-block d-xl-none pr-0">
            <div class="float-right mt-3">
                <img class="mySlides w3-animate-fading w3-round w3-card-4" src="{{asset('img/c1.jpg')}}" style="width:342px;height:232px;object-fit:cover">
                <img class="mySlides w3-animate-fading w3-round w3-card-4" src="{{asset('img/c2.jpg')}}" style="width:342px;height:232px;object-fit:cover">
            </div>
        </div>
    </div>
  @endsection

@section('content')
<!-- 3 Columns: Active, Deaths, Recovered  -->
<div class="row w3-center">
  <div class="column w3-container w3-border w3-card-4 w3-center active">
      <p>Active cases: </p>
      <p>1000</p>
  </div>
  <div class="column w3-container w3-border w3-card-4 w3-center death">
      <p>Deaths: </p>
      <p>1000</p>
  </div>
  <div class="column w3-container w3-border w3-card-4 w3-center recovered">
      <p>Recovered: </p>
      <p>1000</p>
  </div>
</div>

<!-- Graph -->
<div class="w3-container" width="100%">
<canvas id="canvas" width="400" height="100"></canvas>
</div>
<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 6000);    
    }
    </script>
<script>
// make barData
var barData = {
    labels: ["South Korea", "Hong Kong", "Switzerland", "Japan", "Netherlands"],
    datasets: [{
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [
            24.6, 15.7, 14.9, 14.9, 14, 3
        ]
    }]
}
// make myChart
myChart = {
    type: 'horizontalBar',
    data: barData,
    options: {
        elements: {
            rectangle: {
                borderWidth: 2,
            }
        },
        responsive: true,
        title: {
            display: true,
            text: 'Chart.js Horizontal Bar Chart'
        }
    }
}

window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    new Chart(ctx, myChart);
};
</script>
@endsection