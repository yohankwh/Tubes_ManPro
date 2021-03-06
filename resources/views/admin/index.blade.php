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
            @foreach($all_berita as $berita)
            <div class="card-body row">
                <div class="card-body border col-md-12" style="height: 100%">
                  <div class="">
                    <h5 class="text-dark d-inline-flex"><b>{{\Illuminate\Support\Str::limit($berita->title,50)}}</b></h5>           
                  </div>
                  <hr>
                  <div>
                    <small>{{date('d F Y',strtotime($berita->created_at))}}</small>
                    <div class="float-right">
                        <a href="{{route('berita.edit',$berita->id)}}"><span><span><i class="fa fa-pencil mr-2"></i></span>Sunting</span></a>
                        <a href="{{route('berita.view',$berita->id)}}" class="ml-4"><span><i class="fa fa-eye mr-2"></i>Lihat</span></a>
                      </div>  
                  </div>
                </div>
            </div>
            @endforeach
            <div class="text-center py-2">
                <a href="{{route('admin.berita')}}">Lihat semua berita</a>
            </div>
          </div>
        </div>

        <div class="col-6 border rounded p-3">
          <h2 class="mt-2">Kasus</h2>
          <div class="card-body row">
            <div class="card-body border col-md-12" style="height:100%">
              <h6 class="my-2">Data Kasus</h6>
              <table id="table_umum" class="display">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Positif</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($kasusUmum as $kasus)
                <tr class="{{strtotime($kasus->tanggal) > strtotime("now") ? "row-highlight-r" : ""}}">
                    <td>{{$kasus->tanggal}}</td>
                    <td>{{$kasus->positif}}</td>
                    <td>{{$kasus->sembuh}}</td>
                    <td>{{$kasus->meninggal}}</td>
                </tr>
                @endforeach
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
              <table id="table_demo" class="display">
                <thead>
                    <tr>
                        <th class="text-left">Tanggal</th>
                        <th>Kelompok Umur</th>
                        <th>Positif</th>
                        <th>Meninggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demografi as $demo)
                    <tr class="{{strtotime($demo->tanggal) > strtotime("now") ? "row-highlight-r" : ""}}">
                        <td>{{$demo->tanggal}}</td>
                        <td>{{$demo->kel_umur}}</td>
                        <td>{{$demo->positif}}</td>
                        <td>{{$demo->meninggal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>

          <div class="card-body row pt-0">
            <div class="card-body border col-md-12" style="height:100%">
              <h6 class="mb-2">
                <span>Data Kasus Daerah</span>
              </h6>
              <table id="table_daerah" class="display w-100">
                <thead>
                    <tr>
                        <th class="text-left">Tanggal</th>
                        <th>Daerah</th>
                        <th>Positif</th>
                        <th>Sembuh</th>
                        <th>Meninggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listDaerah as $daerah)
                    <tr class="{{strtotime($daerah->tanggal) > strtotime("now") ? "row-highlight-r" : ""}}">
                        <td>{{$daerah->tanggal}}</td>
                        <td>{{$daerah->daerah}}</td>
                        <td>{{$daerah->positif}}</td>
                        <td>{{$daerah->sembuh}}</td>
                        <td>{{$daerah->meninggal}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="text-center py-2">
            <a href="{{route('admin.kasus')}}">Lihat semua kasus</a>
          </div>
        </div>
    </div>

  @endsection

  @section('scripts')
  <script>
  $(document).ready( function () {
    $('#table_umum').DataTable({
      "order": [[ 0, "desc" ]],
      "lengthChange": false,
      pageLength: 3,
      searching: false
    });
    $('#table_daerah').DataTable({
      "order": [[ 0, "desc" ]],
      "scrollX":true,
      info: false,
      pageLength: 5
    });
    $('#table_demo').DataTable({
      "order": [[ 0, "desc" ]],
      "lengthChange": false,
      pageLength: 5,
      searching: false
    });
  });
  </script>
  @endsection