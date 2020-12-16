@extends('layouts.admin')

@section('custom')
<!--DataTable Lib-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection

@section('content')
<!-- Page Heading -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800">Tulis Berita Baru</h1>
    </div>

    <hr style="border: 1px solid lightgrey">

    <div class="">
        <form>
            <div class="form-group">
                <label for="title">Judul</label>
                <input class="form-control" placeholder="Judul Berita">
            </div>
            <div class="form-group">
                <label for="body">Konten</label>
                <textarea class="form-control" placeholder="Tulis Berita" rows=10></textarea>
            </div>
            <div class="row">
                <div class="form-group col-5">
                    <input type="file">
                </div>
            </div>
            <button class='btn btn-primary'>Publish</button>
        </form>
    </div>
</div>
@endsection