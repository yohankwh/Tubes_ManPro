@extends('layouts.admin')
@section('content')
<div>
    <h2>Berita</h2>
</div>
<div class="table-responsive">
    <table id="multi-filter-select" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Berita</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <!-- <tfoot>
            <tr>
                <th>No</th>
                <th>Berita</th>
            </tr>
        </tfoot> -->
        <tbody>
            <tr>
                <td>1</td>
                <td>
                    <h5>Terjadi Pembunuhan</h5>
                </td>
                <td>
                    <button><i class="fa fa-pencil"></i></button>
                </td>
                <td><Button><i class="fa fa-trash-o"></i></Button></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection