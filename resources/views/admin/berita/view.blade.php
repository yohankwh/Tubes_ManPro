@extends('layouts.admin')

@section('content')
<div class="container rounder border shadow-sm p-3">
    <div class="row justify-content-between px-2">
        <a href="{{route('admin.berita')}}" class="btn rounded shadow-sm bg-dark text-white"><i class="fa fa-chevron-left"></i>&emsp;Kembali</a>
        <span>
            <a href="{{route('berita.edit',$berita->id)}}" class="btn rounded shadow-sm bg-warning mx-4"><i class="fa fa-pencil"></i>&emsp;Edit</a>
            <button class="btn rounded shadow-sm bg-danger mx-2" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i>&emsp;Hapus</button>
        </span>
    </div>
    <hr>
    <h1 class="my-2"><b>{{$berita->title}}</b></h1>
    <div>
        <span>{{date('l, d M Y H.i', strtotime($berita->created_at))}}</span>
    </div>
    <div class="hdr-img my-3 rounded">
        <img style="width:480px;object-fit:cover;object-position:center;" src="{{asset('img/'.$berita->header_image)}}">
    </div>
    <p style="white-space: pre-line" class="my-5">{{$berita->content}}</p>
    <div class="my-3">
        © 2020 Pusat Informasi COVID-19
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus blog ini?
        </div>
        <div class="modal-footer">
            <form action="{{route('berita.delete',$berita->id)}}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary bg-danger mr-3">Hapus</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection