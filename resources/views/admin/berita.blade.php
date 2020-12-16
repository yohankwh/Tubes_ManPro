@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Berita</h2>
</div>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="table-responsive col-12">
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
                            <h5>Selain Vaksinasi, Apa yang Bisa Bikin Daya Tahan Tubuh Kuat?</h5>
                        </td>
                        <td>
                            <button><i class="fa fa-pencil"></i></button>
                        </td>
                        <td><Button><i class="fa fa-trash-o"></i></Button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <h5>Perlu Tahu, Ini 7 Mitos Keliru Seputar Virus Corona COVID-19</h5>
                        </td>
                        <td>
                            <button><i class="fa fa-pencil"></i></button>
                        </td>
                        <td><Button><i class="fa fa-trash-o"></i></Button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <h5>South Korean ultra-cold warehouse prepares to store Pfizer's COVID-19 vaccine</h5>
                        </td>
                        <td>
                            <button><i class="fa fa-pencil"></i></button>
                        </td>
                        <td><Button><i class="fa fa-trash-o"></i></Button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection