@extends('layouts.admin')

@section('custom')
@endsection

@section('content')
    <div class="row justify-content-around my-3">
        <div class="col-5 border rounded p-3">
            <h2 class="mt-2">Berita</h2>
            <div class="card-body row">
                <div class="card-body border col-md-12" style="height:  100%">
                  <div class="">
                    <h5 class="text-dark d-inline-flex"><b>Selain Vaksinasi, Apa yang Bisa Bikin Daya Tahan Tubuh Kuat?</b></h5>           
                  </div>
                  <hr>
                  <div>
                    <small>12 Desember 2020</small>
                    <div class="float-right">
                        <a href="/admin/blog/1/edit"><span><span><i class="fa fa-pencil mr-2"></i></span>Sunting</span></a>
                        <a href="/admin/blog/1" class="ml-4"><span><i class="fa fa-eye mr-2"></i>Lihat</span></a>
                      </div>  
                  </div>
                  
                </div>
            </div>
            <div class="card-body row">
                <div class="card-body border col-md-12" style="height:  100%">
                  <div class="">
                    <h5 class="text-dark d-inline-flex"><b>Perlu Tahu, Ini 7 Mitos Keliru Seputar Virus Corona COVID-19</b></h5>           
                  </div>
                  <hr>
                  <div>
                    <small>12 Desember 2020</small>
                    <div class="float-right">
                        <a href="/admin/blog/1/edit"><span><span><i class="fa fa-pencil mr-2"></i></span>Sunting</span></a>
                        <a href="/admin/blog/1" class="ml-4"><span><i class="fa fa-eye mr-2"></i>Lihat</span></a>
                    </div>  
                  </div>
                  
                </div>
            </div>
            <div class="card-body row">
                <div class="card-body border col-md-12" style="height:  100%">
                  <div class="">
                    <h5 class="text-dark d-inline-flex"><b>South Korean ultra-cold warehouse prepares to store Pfizer's COVID-19 vaccine</b></h5>           
                  </div>
                  <hr>
                  <div>
                    <small>12 Desember 2020</small>
                    <div class="float-right">
                        <a href="/admin/blog/1/edit"><span><span><i class="fa fa-pencil mr-2"></i></span>Sunting</span></a>
                        <a href="/admin/blog/1" class="ml-4"><span><i class="fa fa-eye mr-2"></i>Lihat</span></a>
                    </div>  
                  </div>
                  
                </div>
            </div>

            <div class="text-center py-2">
                <a href="">Lihat semua berita</a>
            </div>
        </div>

        <div class="col-5 border rounded p-3">
            <h2 class="mt-2">Kasus</h2>
            <div>
            </div>
        </div>
    </div>

  @endsection