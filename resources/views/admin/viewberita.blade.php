@extends('layouts.admin')

@section('content')
<div class="container rounder border shadow-sm p-3">
    <div class="row justify-content-between px-2">
        <a href="{{route('admin.berita')}}" class="btn rounded shadow-sm bg-dark text-white"><i class="fa fa-chevron-left"></i>&emsp;Kembali</a>
        <span>
            <a href="{{route('berita.edit',$berita->id)}}" class="btn rounded shadow-sm bg-warning mx-4"><i class="fa fa-pencil"></i>&emsp;Edit</a>
            <a class="btn rounded shadow-sm bg-danger mx-2"><i class="fa fa-trash"></i>&emsp;Hapus</a>
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
@endsection