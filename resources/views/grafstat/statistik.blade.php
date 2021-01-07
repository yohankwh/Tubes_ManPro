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
    <!-- Chart -->
    <div style="width: 50%;">
        <canvas id="canvas"></canvas>
    </div>
    <script>
		window.onload = function(){
            var ctx = document.getElementById("canvas").getContext("2d");
            new Chart(ctx, myChart);
        }

        var dataPemasukan = [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
        ];

        var dataPengeluaran = [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
        ];

        var myChart = {
            type:  'line',
            data: {
                datasets : [
                    { /* objek dataset1 */
                        label: "Pengeluaran",
                        backgroundColor: window.chartColors.white,
                        borderColor: window.chartColors.red,
                        data: dataPengeluaran,
                        fill: true,
                    },
                    { /* objek dataset2 */
                        label: "Pemasukan",
                        backgroundColor: window.chartColors.white,
                        borderColor: window.chartColors.blue,
                        data: dataPemasukan,
                        fill: true,
                    }
                ],
                labels: ["January", "February", "March", "April", "May", "June", "July"],
            },
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },

                title:{
                    display: true,
                    text:'Chart.js Line Chart'
                },

                responsive: true,
            },
        };
    </script>
    
</div>
<br><br><br><br>
<div class="w3-container w3-black w3-center w3-opacity w3-padding-8">
    <h1 class="w3-margin w3-xlarge">Stay safe!</h1>
</div>
@endsection