@extends('layouts.infoedu')
@section('custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/infoedu_carousel_3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/infoedu_carousel_2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/infoedu_carousel_1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<br>

<div class="container">
    <span style="font-size:2rem"><b>News Update</b></span>
    <div class="container">
    <div class="row justify-content-center my-5">
        <div class="table-responsive col-12">
            <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                <th style="width: 5%">No</th>
                    <th style="width: 15%">Date</th>
                    <th style="width: 80%">News</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_berita as $berita)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{date('d M Y',strtotime($berita->created_at))}}</td>
                    <td>{{$berita->title}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection