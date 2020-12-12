@extends('layouts.admin')

@section('custom')
@endsection

@section('content')
<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-end mb-4">
    <a href="{{route('admin.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Write New Blog</a>
  </div> --}}


  <div class="">
    <div class="mb-4">
      <!-- Card Header - Dropdown -->
      <div class="ml-4 py-1 d-flex flex-row align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
        <a href="" class="btn btn-primary btn-sm ml-auto"><span><i class="fa fa-plus mr-2"></i></span>Buat Blog</a>
      </div>
      <!-- Card Body -->
      <div class="card-body row">
        <div class="card-body border col-md-12" style="height:  100%">
          <div class="">
            <h5 class="text-dark d-inline-flex">asdasdasdasda</h5>
            <div class="float-right">
              <a href="/admin/blog/1/edit"><span><span><i class="fa fa-pencil mr-2"></i></span>Sunting</span></a>
              <a href="/admin/blog/1" class="ml-4"><span><i class="fa fa-eye mr-2"></i>Lihat</span></a>
            </div>             
          </div>
          <hr>
          <div>
            <small>asdadsada</small>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  @endsection