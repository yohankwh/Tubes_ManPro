@extends('layouts.default')

@section('custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
@endsection

@section('header')
<div class="justify-content-between d-flex align-items-center">
  <div class="">
      <p class="text-white text-lato" style="font-size:2.6rem">Statistik Data COVID-19</p>
      <p class="text-white" style="font-size:1.2em">Statistik Data Perkembangan Kasus COVID-19</p>
  </div>
</div>
@endsection

@section('content')
<div class="p-2 my-2">
  <div class="w3-container border shadow-sm rounded p-3 bg-white mb-5 p-1" width="100%">
    <canvas id="canvasUmum" width="400" height="100"></canvas>
  </div>
  <div class="rounded border px-1 py-2 text-left bg-white">
    <h5 class="ml-2"><b>Demografi Umur</b></h5>
    <hr class="my-2">
    <div class="w3-container p-2 pt-3 bg-white mb-5" width="100%">
      <div class="row mx-0">
        <div class="col-7">
          <canvas id="demoChart"></canvas>
        </div>
        <div class="col-5 pl-0">
          <table id="demoTable" class="table">
            <thead>
              <tr>
                <th>Umur</th>
                <th>Jumlah Kasus</th>
                <th>Positif Hari Ini</th>
              </tr>
            </thead>
            <tbody>
              @foreach($demo_data as $demo)
              <tr>
                <td>{{$demo->kel_umur}}</td>
                <td data-order="{{$demo->pos}}">
                  <div class="row">
                    <div class="col-2">{{number_format($demo->pos,0,',','.')}}</div>
                    <div class="progress-bar rounded" role="progressbar" style="width: {{round($demo->pos/$demo_sum_pos*100,2)}}%"></div>
                  </div>
                </td>
                <td>{{$latest_demo[$loop->index]->positif}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  var data = {!! json_encode($demo_data) !!}
  var ctxDemo = document.getElementById('demoChart').getContext('2d');
  var psf = new Array();
  var mgl = new Array();
  var kel = new Array();
  data.forEach(function(item){
    psf.push(item.pos);
    mgl.push(item.men);
    kel.push(item.kel_umur);
  });
  console.log(kel);
  var pieDemo = new Chart(ctxDemo, {
      type: 'pie',
      data: {
          labels: kel,
          datasets: [
            {
              label: 'Jumlah Pasien Positif',
              data: psf,
              backgroundColor: [
                '#dff3e3',
                '#bedbbb',
                '#efb08c',
                '#f6d6ad',
                '#efd9d1',
                '#f1ae89',
                '#f8d49d',
                '#8db596',
                '#c6ebc9',
              ]
            }
          ],
      },
      options: {
          pieceLabel: {
            render: 'value' //show values
          }
      }
  });
  $(document).ready( function () {
    $('#demoTable').DataTable( {
        "paging":   false,
        "info":     false,
        "searching": false,
        "columns": [
          { "width": "20%" },
          { "width": "60%" },
          { "width": "30%" },
        ],
        "order": [[ 1, "desc" ]]
    });
    
  });
</script>

<script>
  var timeFormat = 'YYYY-MM-DD';
  var kasus = {!! json_encode($kasus_umum) !!}
  var ctxUmum = document.getElementById('canvasUmum').getContext('2d');
  var psfUmum = new Array();
  var semUmum = new Array();
  var mglUmum = new Array();
  var tglUmum = new Array();
  kasus.forEach(function(item){
    psfUmum.push(item.positif);
    mglUmum.push(item.meninggal);
    semUmum.push(item.sembuh);
    tglUmum.push(item.tanggal);
  });
  var color = Chart.helpers.color;
  var configUmum = {
      type: 'bar',
      data: {
          labels: tglUmum,
          datasets: [{
              label: 'Positif',
              backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
              borderColor: window.chartColors.orange,
              fill: false,
              data: psfUmum,
          },{
              label: 'Sembuh',
              backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
              borderColor: window.chartColors.green,
              fill: false,
              data: semUmum,
          },{
              label: 'Meninggal',
              backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
              borderColor: window.chartColors.red,
              fill: false,
              data: mglUmum,
          }]
      },
      options: {
        title: {
            text: 'Kasus COVID-19 Korea Selatan',
            display: true,
            fontSize: 16
        },
        scales: {
            xAxes: [{
                type: 'time',
                time: {
                    parser: timeFormat,
                    round: 'day',
                    tooltipFormat: 'll'
                },
            }],
        },
        plugins: {
            datalabels: {
              display: false
            }
        }
      }
  };
  window.myLine = new Chart(ctxUmum, configUmum);
</script>
@endsection