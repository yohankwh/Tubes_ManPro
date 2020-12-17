@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800"><b>Ubah Isi Berita</b></h1>
    </div>

    <hr style="border: 1px solid lightgrey">

    <div class="">
        <form action="{{route('berita.edit',$berita->id)}}" method="POST" id="b-form" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Judul</label>
                <input class="form-control" placeholder="Judul Berita" name="title" value="{{$berita->title}}">
            </div>
            <div class="form-group">
                <label for="body">Konten</label>
                <textarea class="form-control" placeholder="Tulis Berita" rows=10 name="content">{{$berita->content}}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <input type="file" name="header_photo">
                </div>
            </div>
            <button class='btn btn-primary'>Publish</button>
        </form>
    </div>
</div>
@endsection