@extends('layouts.default')

@section('custom')
<style>
  #mapid { height: 360px; margin:0 auto }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection

@section('header')
<div class="justify-content-between d-flex align-items-center">
  <div class="">
      <p class="text-white text-lato" style="font-size:2.6rem">Sebaran Kasus COVID-19</p>
      <p class="text-white" style="font-size:1.2em">Peta Persebaran Kasus COVID-19</p>
      <small class="text-white" >Data update terakhir: <b>{{date("d F Y",strtotime($tanggal))}}</b></small>
  </div>
</div>
@endsection

@section('content')
<div class="p-2 my-3">
  <div class="container">
      <div class="row justify-content-around">
          <div class="col-sm-7 bg-white w3-round-xlarge pb-3 mb-5">
            <div class="p-2 text-left">
              <h5 class=""><b>Peta Kasus Covid-19 di Korea Selatan</b></h5>
              <hr>
              <div class="d-flex align-items-center">
                <span class="mini-box mini-lv1 mr-1"></span><span class="mr-2">&lt;50&emsp;</span>
                <span class="mini-box mini-lv2 mr-1"></span><span class="mr-2">50 - 100&emsp;</span>
                <span class="mini-box mini-lv3 mr-1"></span><span class="mr-2">101 - 1000&emsp;</span>
                <span class="mini-box mini-lv4 mr-1"></span><span>> 1001</span>
              </div>
              <div class="mt-3">
                <div id="mapid"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 bg-white w3-round-xlarge mb-5">
            <div class="py-2">
              <canvas id="canvasDaerah" height="420px"></canvas>
            </div>
          </div>
      </div>
      <div class="container">
        <div class="row justify-content-around">
          <div class="col-sm-12 bg-white w3-round-xlarge mb-5" style="height:586px;">
            <div class="py-2">
              <h5><b>Jumlah Kasus Provinsi</b></h5>
              <div class="p-2">
                <table id="daerah_k">
                  <thead>
                    <tr>
                      <th>Provinsi</th>
                      <th>Positif</th>
                      <th>Sembuh</th>
                      <th>Meninggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sum_daerah as $daerah)
                    <tr>
                      <td>{{$daerah->daerah}}</td>
                      <td>{{$daerah->pos}}</td>
                      <td>{{$daerah->sem}}</td>
                      <td>{{$daerah->men}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
<script> 
  var mymap = L.map('mapid').setView([37.532600, 127.024612], 7);  
  loadLeafletMap();
  var sumDaerah = {!! json_encode($sum_daerah) !!}
  var daerah = new Array();
  var psf = new Array();
  var mgl = new Array();
  var sem = new Array();
  var avgPos = 0;
  sumDaerah.forEach(function(item){
    daerah.push(item.daerah);
    psf.push(item.pos);
    mgl.push(item.men);
    sem.push(item.sem);
    console.log(item.men)
    avgPos += parseInt(item.pos);
  });
  
  avgPos/=psf.length;

  daerah.forEach(function(item, index){
    loadCircleRegion(item, psf[index], psf[index]/avgPos);
  });

  var ctx = document.getElementById('canvasDaerah').getContext('2d');
  var myBarChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: daerah,
      datasets: [
        {
          label: 'Jumlah Pasien Positif',
          data: psf,
          backgroundColor: 'rgba(247, 171, 71, 0.6)', 
          borderColor: 'rgba(247, 171, 71, 1)' 
        }
      ],
    },
    options: {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide
        elements: {
          rectangle: {
            borderWidth: 2,
          }
        },
        title: {
          display: false,
          text: 'Chart.js Horizontal Bar Chart'
        }
      }
  });

  var tKasusUmum = $('#daerah_k').DataTable({
      "order": [[ 1, "desc" ]],
      "lengthChange": false,
      "columns": [
          { "width": "40%" },
          { "width": "20%" },
          { "width": "20%" },
          { "width": "20%" },
        ],
    });
  
</script>
@endsection