@extends('layouts.berita')

@section('content')
<div class="w3-container rounded shadow-sm p-3 text-left bg-white" style="margin-top:156px">
    <div class="py-1 px-2">
        <h3 class="mb-1 text-lato"><b>{{$berita->title}}</b></h3>
        <div class="mb-4">
            <span>{{date('l, d M Y H.i', strtotime($berita->created_at))}}</span>
        </div>
        <div class="hdr-img rounded mb-4">
            <img style="width:480px;object-fit:cover;object-position:center;" src="{{asset('img/berita/'.$berita->header_image)}}">
        </div>
        <p style="white-space: pre-line" class="">{{$berita->content}}</p>
        <div class="my-3">
            © 2020 Pusat Informasi COVID-19
        </div>
    </div>
</div>

@endsection