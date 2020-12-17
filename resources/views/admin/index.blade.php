@extends('layouts.admin')

@section('custom')
<!--DataTable Lib-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <div class="row justify-content-around my-3">
        <div class="col-5" style="height: auto">
          <div class="border rounded p-3">
            <h2 class="mt-2">Berita</h2>
            <div class="card-body row">
                <div class="card-body border col-md-12" style="height: 100%">
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
        </div>

        <div class="col-6 border rounded p-3">
          <h2 class="mt-2">Kasus</h2>
          <div class="card-body row">
            <div class="card-body border col-md-12" style="height:100%">
              <h6 class="my-2">Data Kasus</h6>
              <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Positif</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>10 Desember 2020</td>
                    <td>200</td>
                    <td>112</td>
                    <td>20</td>
                  </tr>
                  <tr>
                    <td>11 Desember 2020</td>
                    <td>240</td>
                    <td>140</td>
                    <td>35</td>
                  </tr>
                  <tr>
                    <td>12 Desember 2020</td>
                    <td>232</td>
                    <td>108</td>
                    <td>27</td>
                  </tr>
                  <tr>
                    <td>13 Desember 2020</td>
                    <td>20</td>
                    <td>11</td>
                    <td>5</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-body row pt-0">
            <div class="card-body border col-md-12" style="height:100%">
              <h6 class="mb-2">
                <span>Data Demografi Umur (</span>
                <span style="display:inline-block;width: .8em;height:.8em;background-color:rgba(249, 169, 95, 0.849)"> </span>
                <span> : belum dipublish)</span>
              </h6>
              <table id="" class="table-bordered w-100 text-center" style="font-size:.8em">
                <thead>
                    <tr>
                        <th class="text-left">Tanggal</th>
                        <th>&lt;10</th>
                        <th>10 - 19</th>
                        <th>20 - 29</th>
                        <th>30 - 39</th>
                        <th>40 - 49</th>
                        <th>50 - 59</th>
                        <th>60 - 69</th>
                        <th>70 - 79</th>
                        <th>>80</th>
                    </tr>
                </thead>
                <tbody>
                  <tr class="row-highlight-r text-center">{{--if date == now, add id, on front end, append row-highlight class--}}
                    <td class="text-left">12 Des 2020 <i class="fa fa-pencil"></i></td>
                    <td>200</td>
                    <td>112</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                  </tr>
                  <tr class="text-center">
                    <td class="text-left">11 Des 2020 <i class="fa fa-pencil"></i></td>
                    <td>200</td>
                    <td>112</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-body row pt-0">
            <div class="card-body border col-md-12" style="height:100%;overflow-x:scroll">
              <h6 class="mb-2">
                <span>Data Kasus Daerah</span>
              </h6>
              <table id="table_daerah" class="text-center" style="font-size:.8em">
                <thead>
                    <tr>
                        <th class="text-left">Tanggal</th>
                        <th>Tipe</th>
                        <th>Seoul</th>
                        <th>Busan</th>
                        <th>Daegu</th>
                        <th>Incheon</th>
                        <th>Gwangju</th>
                        <th>Daejeon</th>
                        <th>Ulsan</th>
                        <th>Sejong</th>
                        <th>Gyeonggi-do</th>
                        <th>Gangwon-do</th>
                        <th>Chungcheongbuk-do</th>
                        <th>Chungcheongnam-do</th>
                        <th>Jeollabuk-do</th>
                        <th>Jeollanam-do</th>
                        <th>Gyeongsangbuk-do</th>
                        <th>Gyeongsangnam-do</th>
                        <th>Jeju-do</th>
                    </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td class="text-left">12 Des 2020</td>
                    <td>Positif</td>
                    <td>120</td>
                    <td>75</td>
                    <td>22</td>
                    <td>35</td>
                    <td>16</td>
                    <td>8</td>
                    <td>10</td>
                    <td>12</td>
                    <td>23</td>
                    <td>45</td>
                    <td>12</td>
                    <td>9</td>
                    <td>12</td>
                    <td>15</td>
                    <td>13</td>
                    <td>8</td>
                    <td>16</td>
                  </tr>
                  <tr class="text-center">
                    <td class="text-left">12 Des 2020</td>
                    <td>Sembuh</td>
                    <td>120</td>
                    <td>75</td>
                    <td>22</td>
                    <td>35</td>
                    <td>16</td>
                    <td>8</td>
                    <td>10</td>
                    <td>12</td>
                    <td>23</td>
                    <td>45</td>
                    <td>12</td>
                    <td>9</td>
                    <td>12</td>
                    <td>15</td>
                    <td>13</td>
                    <td>8</td>
                    <td>16</td>
                  </tr>
                  <tr class="text-center">
                    <td class="text-left">12 Des 2020</td>
                    <td>Meninggal</td>
                    <td>120</td>
                    <td>75</td>
                    <td>22</td>
                    <td>35</td>
                    <td>16</td>
                    <td>8</td>
                    <td>10</td>
                    <td>12</td>
                    <td>23</td>
                    <td>45</td>
                    <td>12</td>
                    <td>9</td>
                    <td>12</td>
                    <td>15</td>
                    <td>13</td>
                    <td>8</td>
                    <td>16</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="text-center py-2">
              <a href="">Lihat semua kasus</a>
          </div>
        </div>
    </div>

  @endsection

  @section('scripts')
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable({
      paging: false,
      searching: false,
      info: false
    });
    $('#table_daerah').DataTable({
      "scrollX":true,
      info: false,
      paging: false,
      searching: false
    });
  });
  </script>
  @endsection