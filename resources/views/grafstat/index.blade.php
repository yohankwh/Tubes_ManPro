@extends('layouts.default')

@section('custom')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection

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
<div class="w3-round border my-3 p-2 shadow-sm bg-white">
    <h6 class="text-left mt-2 mb-3">Data terkini: {{date("d F Y")}}</h6>
    <hr class="mt-0">
    <div class="w3-container pt-2 pb-2">
        <div class="row text-left">
            <div class="col-3 rounded border p-3 mx-3 bg-salmon text-white">
                <small>Jumlah Pasien</small>
                <p class="mb-0"><b>Positif</b></p>
                <h1 class="mb-0"><b>{{$sumData->pos}}</b></h1>
                <div>{{$kasus->positif}}</div>
            </div>
            <div class="col-3 rounded border p-3 mx-3 bg-seafoam text-white">
                <small>Jumlah Pasien</small>
                <p class="mb-0"><b>Sembuh</b></p>
                <h1 class="mb-0"><b>{{$sumData->sem}}</b></h1>
                <div>{{$kasus->sembuh}}</div>
            </div>
            <div class="col-3 rounded border p-3 mx-3 bg-dark text-white">
                <small>Jumlah Pasien</small>
                <p class="mb-0"><b>Meninggal</b></p>
                <h1 class="mb-0"><b>{{$sumData->men}}</b></h1>
                <div>{{$kasus->meninggal}}</div>
            </div>
        </div>
    </div>
    <br>
    <div><a href="{{route('statistik')}}">Lihat Selengkapnya &rsaquo;</a></div>
</div>
<!-- Graph -->
<div class="w3-container border shadow-sm rounded p-3 bg-white mb-5" width="100%">
<canvas id="canvas" width="400" height="100"></canvas>
</div>

<div>
    <h2 class="w3-center"><b>Yang wajib Anda ketahui tentang COVID-19</b></h2>
    <div class="text-left w3-container border rounded shadow-sm w3-white mt-4 p-4">
        <div class="py-2">
            <h3>
                <b>Apa itu COVID-19?</b>
            </h3>
            <p>COVID-19 adalah penyakit yang disebabkan oleh Novel Coronavirus (2019-nCoV), jenis baru coronavirus yang pada manusia menyebabkan penyakit mulai flu biasa hingga penyakit yang serius seperti Middle East Respiratory Syndrome (MERS) dan Sindrom Pernapasan Akut Berat/ Severe Acute Respiratory Syndrome (SARS).</p>
        </div>
        <div class="py-2">
            <h3>
                <b>Gejala</b>
            </h3>
            <p>Gejala umum berupa <b>demam ≥38°C</b>, <b>batuk kering</b>, dan <b>sesak napas</b>. Jika ada orang yang dalam 14 hari sebelum muncul gejala tersebut pernah melakukan perjalanan ke negara terjangkit, atau pernah merawat/kontak erat dengan penderita COVID-19, maka terhadap orang tersebut akan dilakukan pemeriksaan laboratorium lebih lanjut untuk memastikan diagnosisnya.</p>
        </div>
        <div class="py-2">
            <h3>
                <b>Penyebaran</b>
            </h3>
            <p>COVID-19 menyebar melalui tetesan kecil (droplet) yang muncul dari hidung atau mulut pada saat batuk, bersin, ataupun berbicara. Melalui droplet ini jika seseorang terkena kontak dengan mata, hidung, mulut secara langsung maupun tidak langsung, maka orang tersebut dapat terinfeksi dengan COVID-19</p>
        </div>
    </div>
</div>

<div>
    <h2 class="py-3"><b>Cegah Penyebaran COVID-19</b></h2><br>
    <div class="bg-light container">
        <div class="row justify-content-around">
            <div class="col-sm-4 bg-white w3-round-xlarge rcard-h d-flex align-items-center rcard-pos mb-5">
                <div class="rcard-img rounded-circle">
                    <img class="" src="{{asset('img/dist.png')}}">
                </div>
                <div class="text-left">
                    <p class="mb-2 rcard-cap"><b>Jaga Jarak</b></p><br>
                    <p>Hindari risiko penyebaran dengan menjaga jarak minimal 1.5 meter.<p>
                </div>
            </div>
            <div class="col-sm-7 bg-white w3-round-xlarge rcard-h d-flex align-items-center rcard-pos mb-5">
                <div class="rcard-img rounded-circle">
                    <img class="" src="{{asset('img/mask.png')}}">
                </div>
                <div class="text-left">
                    <p class="mb-2 rcard-cap"><b>Pakai Masker</b></p><br>
                    <p>Gunakan masker jika berpergian untuk mengurangi risiko penularan COVID-19 melalui udara. Masker disarankan bukan berupa masker skuba, karena daya saring yang kurang tinggi.<p>
                </div>
            </div>
            <div class="col-sm-7 bg-white w3-round-xlarge rcard-h d-flex align-items-center rcard-pos mb-5">
                <div class="rcard-img rounded-circle">
                    <img class="" src="{{asset('img/clean.png')}}">
                </div>
                <div class="text-left">
                    <p class="mb-2 rcard-cap"><b>Jaga Kebersihan</b></p><br>
                    <p>Jaga Kebersihan dimanapun Anda berada. Cuci tangan sebelum beraktivitas di tempat umum. Segera ganti pakaian dan bersihkan tubuh setelah berpergian atau berada di tempat umum.<p>
                </div>
            </div>
            <div class="col-sm-4 bg-white w3-round-xlarge rcard-h d-flex align-items-center rcard-pos">
                <div class="rcard-img rounded-circle">
                    <img class="" src="{{asset('img/house.png')}}">
                </div>
                <div class="text-left">
                    <p class="mb-2 rcard-cap"><b>Tetap Dirumah</b></p><br>
                    <p>Tetap dirumah dan hanya pergi jika saat keperluan mendesak.<p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- untuk call center -->
<div class="text-left w3-container rounded border shadow-sm w3-white p-3 pb-4">
  <h2 class="mb-0"><b>Hubungi Call Center </b></h2><br>
    <table id="call-table" class="ctable">
        <thead>
            <tr>
                <th>No</th>
                <th>Provinsi</th>
                <th>Call Center</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Busan</td>
                <td class="cc">221</td>       
            </tr>
            <tr>
                <td>2</td>
                <td>Incheon</td>
                <td class="cc">222</td> 
            </tr>
            <tr>
                <td>3</td>
                <td>Ulsan</td>
                <td class="cc">223</td>      
            </tr>
            <tr>
                <td>4</td>
                <td>Gyeonggi</td>
                <td class="cc">224</td>  
            </tr>
            <tr>
                <td>5</td>
                <td>Gangwon</td>
                <td class="cc">225</td>  
            </tr>
            <tr>
                <td>6</td>
                <td>North Chungcheong</td>
                <td class="cc">226</td>  
            </tr>
            <tr>
                <td>7</td>
                <td>South Chungcheong</td>
                <td class="cc">227</td>  
            </tr>
            <tr>
                <td>8</td>
                <td>North Jeolla </td>
                <td class="cc">228</td>  
            </tr>
            <tr>
                <td>9</td>
                <td>South Jeolla</td>
                <td class="cc">229</td>  
            </tr>
            <tr>
                <td>10</td>
                <td>North Gyeongsang</td>
                <td class="cc">210</td>  
            </tr>
            <tr>
                <td>11</td>
                <td>South Gyeongsang </td>
                <td class="cc">211</td>  
            </tr>
        </tbody>
    </table>
</div><br><br>
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

$(document).ready( function () {
    $('#call-table').DataTable({pageLength: 5});
});
</script>
@endsection