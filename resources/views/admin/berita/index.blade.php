@extends('layouts.admin')

@section('custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <span style="font-size:2rem"><b>Berita</b></span>
        <span class=""><a href="{{route('berita.create')}}" class="btn rounded shadow-sm bg-primary mx-2 text-white"><i class="fa fa-plus"></i>&emsp;Buat</a></span>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="table-responsive col-12">
            <table id="berita-table" class="">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Judul Berita</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_berita as $berita)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{date('d M Y',strtotime($berita->created_at))}}</td>
                        <td>
                            <span style="font-size:1.125rem;"><a href="{{route('berita.view',$berita->id)}}">{{$berita->title}}</a></span>
                            <a class="btn text-black rounded border shadow float-right mx-2" href="{{route('berita.edit',$berita->id)}}"><i class="fa fa-pencil"></i></a>
                            {{-- <a class="btn text-black rounded border shadow float-right mx-2" href="{{route('berita.view',$berita->id)}}"><i class="fa fa-eye"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready( function () {
    $('#berita-table').DataTable();
});
</script>
@endsection