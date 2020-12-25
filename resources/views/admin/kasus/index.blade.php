@extends('layouts.admin')

@section('custom')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between my-2">
        <span style="font-size:2rem"><b>Kasus</b></span>
    </div>
</div>
<div class="container border rounded p-3 pb-4 shadow-sm my-4">{{--kasus umum--}}
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span style="font-size:rem"><b>Kasus Umum</b></span>
        <span class="btn mx-2 shadow-sm bg-dark text-white" id="btn-kasus-umum"><i class="fa fa-plus"></i>&emsp;Catat Kasus</span> 
    </div>
    <div class="row container py-2 my-2 collapse" id="input-umum">
        <div class="col-2 pl-0">
            <label for="tanggal-ku">Tanggal</label>
            <input type="date" class="form-control" placeholder="Judul Berita" name="tanggal-ku" id="tanggal-ku">
        </div>
        <div class="col-2 pl-0">
            <label for="positif-ku">Positif</label>
            <input class="form-control" type="number" placeholder="Jumlah Positif" name="positif-ku" id="positif-ku">
        </div>
        <div class="col-2 pl-0">
            <label for="sembuh-ku">Sembuh</label>
            <input class="form-control" type="number" placeholder="Jumlah Sembuh" name="sembuh-ku" id="sembuh-ku">
        </div>
        <div class="col-2 pl-0">
            <label for="meninggal-ku">Meninggal</label>
            <input class="form-control" type="number" placeholder="Jumlah Meninggal" name="meninggal-ku" id="meninggal-ku">
        </div>
        <div class="col-4">
            <label><input id="kasus-umum-c" type="checkbox">&emsp;Data sudah benar</label><br>
            <button id="kasus-umum-save" class="btn bg-primary text-white" disabled>Simpan</button>
        </div>
    </div>
    <div class="row container">
        <div class="col-10 px-0">
            <table id="kasus_umum" class="display">
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
                <tr>
                    <td>{{$kasus->tanggal}}
                        <span id="k{{$kasus->id}}" class="edit-ku-btn rounded bg-dark float-right p-1 px-2 text-white" style="cursor: pointer">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </td>
                    <td>{{$kasus->positif}}</td>
                    <td>{{$kasus->sembuh}}</td>
                    <td>{{$kasus->meninggal}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container border rounded p-3 pb-4 shadow-sm my-4">{{--kasus daerah--}}
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span style="font-size:rem"><b>Kasus Daerah</b></span>
        <span class="btn mx-2 shadow-sm bg-dark text-white" id="btn-kasus-daerah"><i class="fa fa-plus"></i>&emsp;Catat Kasus Daerah</span> 
    </div>
    <div class="container py-2 my-2 collapse" id="input-daerah">
        <div class="row">
            <div class="col-2 pl-0">
                <label>Tanggal</label>
                <input type="date" class="form-control" placeholder="Judul Berita" name="tanggal-kd" id="tanggal-kd">
            </div>
            <div class="col-2 pl-0">
                <label>Daerah</label>
                <select class="form-control" id="list-daerah">
                    <option>Seoul</option>
                    <option>Busan</option>
                    <option>Daegu</option>
                    <option>Incheon</option>
                    <option>Gwangju</option>
                    <option>Daejeon</option>
                    <option>Ulsan</option>
                    <option>Sejong</option>
                    <option>Gyeonggi-do</option>
                    <option>Gangwon-do</option>
                    <option>Chungcheongbuk-do</option>
                    <option>Chungcheongnam-do</option>
                    <option>Jeollabuk-do</option>
                    <option>Jeollanam-do</option>
                    <option>Gyeongsangbuk-do</option>
                    <option>Gyeongsangnam-do</option>
                    <option>Jeju-do</option>
                </select>
            </div>
            <div class="col-2 pl-0">
                <label>Positif</label>
                <input class="form-control" type="number" placeholder="Jumlah Positif" name="positif-kd" id="positif-kd">
            </div>
            <div class="col-2 pl-0">
                <label>Sembuh</label>
                <input class="form-control" type="number" placeholder="Jumlah Sembuh" name="sembuh-kd" id="sembuh-kd">
            </div>
            <div class="col-2 pl-0">
                <label>Meninggal</label>
                <input class="form-control" type="number" placeholder="Jumlah Meninggal" name="meninggal-kd" id="meninggal-kd">
            </div>
            <div class="col-2 pl-0">
                <label><input id="kasus-daerah-c" type="checkbox">&emsp;Data sudah benar</label><br>
                <button id="kasus-daerah-save" class="btn bg-primary text-white" disabled>Simpan</button>
            </div>
        </div>
        
    </div>
    <div class="row container">
        <div class="col-10 px-0">
            <table id="kasus_daerah" class="display">
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
                    <tr>
                        <td>{{$daerah->tanggal}}
                            <span id="kd{{$daerah->id}}" class="edit-kd-btn rounded bg-dark float-right p-1 px-2 text-white" style="cursor: pointer">
                                <i class="fa fa-pencil"></i>
                            </span>
                        </td>
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
</div>

<div class="container border rounded p-3 pb-4 shadow-sm my-4">{{--demografi --}}
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span style="font-size:rem"><b>Demografi Umur</b></span>
        <span class="btn mx-2 shadow-sm bg-dark text-white" id="btn-kasus-demo"><i class="fa fa-plus"></i>&emsp;Catat Kasus</span> 
    </div>
    <div class="row container py-2 my-2 collapse" id="input-demo">
        <div class="col-2 pl-0">
            <label>Tanggal</label>
            <input type="date" class="form-control" placeholder="Judul Berita" name="tanggal-demo" id="tanggal-demo">
        </div>
        <div class="col-2 pl-0">
            <label>Kelompok Umur</label>
            <select class="form-control" id="grup-umur">
                <option>0</option>
                <option>10</option>
                <option>20</option>
                <option>30</option>
                <option>40</option>
                <option>50</option>
                <option>60</option>
                <option>70</option>
                <option>80</option>
            </select>
        </div>
        <div class="col-2 pl-0">
            <label>Positif</label>
            <input class="form-control" type="number" placeholder="Jumlah Positif" name="positif-demo" id="positif-demo">
        </div>
        <div class="col-2 pl-0">
            <label>Meninggal</label>
            <input class="form-control" type="number" placeholder="Jumlah Meninggal" name="meninggal-demo" id="meninggal-demo">
        </div>
        <div class="col-4">
            <label><input id="kasus-demo-c" type="checkbox">&emsp;Data sudah benar</label><br>
            <button id="kasus-demo-save" class="btn bg-primary text-white" disabled>Simpan</button>
        </div>
    </div>
    <div class="row container">
        <div class="col-10 px-0">
            <table id="kasus_demo" class="display">
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
                    <tr>
                        <td>{{$demo->tanggal}}
                            <span id="d{{$demo->id}}" class="edit-demo-btn rounded bg-dark float-right p-1 px-2 text-white" style="cursor: pointer">
                                <i class="fa fa-pencil"></i>
                            </span>
                        </td>
                        <td>{{$demo->kel_umur}}</td>
                        <td>{{$demo->positif}}</td>
                        <td>{{$demo->meninggal}}</td>
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
    var tKasusUmum = $('#kasus_umum').DataTable({
                        "order": [[ 0, "desc" ]],
                        "lengthChange": false,
                        pageLength: 5,
                        searching: false
                     });
    var tKasusDemo = $('#kasus_demo').DataTable({
                        "order": [[ 0, "desc" ]],
                        "lengthChange": false,
                        pageLength: 9,
                        searching: false
                     });
    var tKasusDaerah = $('#kasus_daerah').DataTable({
                        "order": [[ 0, "desc" ]],
                        "lengthChange": false,
                        pageLength: 9,
                        searching: false
                     });

    urlKU = "{{route('kasus.createKU')}}";
    urlKD = "{{route('kasus.createKD')}}";
    urlDemo = "{{route('kasus.createDemo')}}";

    function initInputDemo(){
        $('#btn-kasus-demo').click(function(){
            $('#input-demo').collapse('toggle');
        })

        let tgl = $('#tanggal-demo');
        let grupUmur = $('#grup-umur');
        let positif = $('#positif-demo');
        let meninggal = $('#meninggal-demo');
        let rowID = -1;

        $("#kasus-demo-c").click(function(){
            if($('#kasus-demo-c').prop( "checked" )){
                $('#kasus-demo-save').prop('disabled', false );
                tgl.prop('disabled', true );
                grupUmur.prop('disabled', true );
                positif.prop('disabled', true );
                meninggal.prop('disabled', true );
            }else{
                $('#kasus-demo-save').prop('disabled', true );
                tgl.prop('disabled', false );
                grupUmur.prop('disabled', false );
                positif.prop('disabled', false );
                meninggal.prop('disabled', false );
            }
        })

        function resetEditListener(){
            $(".edit-demo-btn").click(function(){
                $('#input-demo').collapse('show');
                let dateReverse = $(this).parent().text().trim().split('/')
                tgl.val(dateReverse[2]+"-"+dateReverse[1]+"-"+dateReverse[0]);
                grupUmur.val($(this).parent().next().text());
                positif.val($(this).parent().next().next().text());
                meninggal.val($(this).parent().next().next().next().text());//lol, please find a better solution.
            })
        }
        
        function validateKasusDemo(){
            if($.isNumeric(grupUmur.val())&&
                $.isNumeric(positif.val())&&
                $.isNumeric(meninggal.val())&&
                tgl.val()){
                return true;
            }else{
                return false;
            }
            //validator tanggal blm ada :(
        }

        $('#kasus-demo-save').click(function(){
            if(validateKasusDemo()){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                {
                    url: urlDemo,
                    type: 'POST',
                    data: {
                        row: rowID,
                        tanggalVal: tgl.val(),
                        umurVal: grupUmur.val(),
                        positifVal: positif.val(),
                        meninggalVal: meninggal.val()
                    },
                    success: function (data)
                    {   
                        if(data['message']=="success"){
                            if(data['type']=="default"){//if input was default
                                tKasusDemo.row.add( [
                                    data['date']+getEditBtn(data['targetId']),
                                    grupUmur.val(),
                                    positif.val(),
                                    meninggal.val()
                                ] ).draw( false );
                                resetEditListener();
                            }else if(data['type']=="edit"){//if input was edit
                                let parent = $("#d"+data['targetId']).parent();
                                parent.next().text(grupUmur.val());
                                parent.next().next().text(positif.val());
                                parent.next().next().next().text(meninggal.val());
                            }
                            resetDemo();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        // console.log(xhr);
                        console.log(status);
                        //show error message to screen
                    }
                });
            }
        });

        function resetDemo(){
            tgl.val("");
            grupUmur.val(0);
            positif.val("");
            meninggal.val("");
            $("#kasus-demo-c").click();
        }
        function getEditBtn(targetId){
            let res = "<span id=\"d"+targetId+"\" class=\"edit-ku-btn rounded bg-dark float-right p-1 px-2 text-white\" style=\"cursor: pointer\"\><i class=\"fa fa-pencil\"></i\></span>";
            return res;
        }
        resetEditListener();
    }

    function initInputKD(){
        $('#btn-kasus-daerah').click(function(){
            $('#input-daerah').collapse('toggle');
        })

        let tgl = $('#tanggal-kd');
        let daerah = $('#list-daerah');
        let positif = $('#positif-kd');
        let sembuh = $('#sembuh-kd');
        let meninggal = $('#meninggal-kd');
        let rowID = -1;

        $("#kasus-daerah-c").click(function(){
            if($('#kasus-daerah-c').prop( "checked" )){
                $('#kasus-daerah-save').prop('disabled', false );
                tgl.prop('disabled', true );
                daerah.prop('disabled', true );
                sembuh.prop('disabled', true );
                positif.prop('disabled', true );
                meninggal.prop('disabled', true );
            }else{
                $('#kasus-kd-save').prop('disabled', true );
                tgl.prop('disabled', false );
                daerah.prop('disabled', false );
                sembuh.prop('disabled', false );
                positif.prop('disabled', false );
                meninggal.prop('disabled', false );
            }
        })

        function resetEditListener(){
            $(".edit-kd-btn").click(function(){
                $('#input-daerah').collapse('show');
                let dateReverse = $(this).parent().text().trim().split('/')
                tgl.val(dateReverse[2]+"-"+dateReverse[1]+"-"+dateReverse[0]);
                daerah.val($(this).parent().next().text());
                positif.val($(this).parent().next().next().text());
                sembuh.val($(this).parent().next().next().next().text());
                meninggal.val($(this).parent().next().next().next().next().text());//lol, please find a better solution.
            })
        }
        
        function validateKasusDaerah(){
            if( $.isNumeric(sembuh.val())&&
                daerah.val()&&
                $.isNumeric(positif.val())&&
                $.isNumeric(meninggal.val())&&
                tgl.val()){
                return true;
            }else{
                return false;
            }
            //validator tanggal blm ada :(
        }

        $('#kasus-daerah-save').click(function(){
            if(validateKasusDaerah()){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                {
                    url: urlKD,
                    type: 'POST',
                    data: {
                        row: rowID,
                        tanggalVal: tgl.val(),
                        daerahVal: daerah.val(),
                        sembuhVal: sembuh.val(),
                        positifVal: positif.val(),
                        meninggalVal: meninggal.val()
                    },
                    success: function (data)
                    {   
                        if(data['message']=="success"){
                            if(data['type']=="default"){//if input was default
                                tKasusDaerah.row.add( [
                                    data['date']+getEditBtn(data['targetId']),
                                    daerah.val(),
                                    sembuh.val(),
                                    positif.val(),
                                    meninggal.val()
                                ] ).draw( false );
                                resetEditListener();
                            }else if(data['type']=="edit"){//if input was edit
                                let parent = $("#kd"+data['targetId']).parent();
                                parent.next().text(daerah.val());
                                parent.next().next().text(positif.val());
                                parent.next().next().next().text(sembuh.val());
                                parent.next().next().next().next().text(meninggal.val());
                            }
                            resetDaerah();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        console.log(xhr);
                        console.log(status);
                        //show error message to screen
                    }
                });
            }
        });

        function resetDaerah(){
            tgl.val("");
            daerah.val("seoul");
            sembuh.val("");
            positif.val("");
            meninggal.val("");
            $("#kasus-daerah-c").click();
        }
        function getEditBtn(targetId){
            let res = "<span id=\"kd"+targetId+"\" class=\"edit-kd-btn rounded bg-dark float-right p-1 px-2 text-white\" style=\"cursor: pointer\"\><i class=\"fa fa-pencil\"></i\></span>";
            return res;
        }
        resetEditListener();
    }

    function initInputKU(){
        let tgl = $('#tanggal-ku');
        let sembuh = $('#sembuh-ku');
        let positif = $('#positif-ku');
        let meninggal = $('#meninggal-ku');
        let rowID = -1;

        function resetEditListener(){
            $(".edit-ku-btn").click(function(){
                $('#input-umum').collapse('show');
                let dateReverse = $(this).parent().text().trim().split('/')
                tgl.val(dateReverse[2]+"-"+dateReverse[1]+"-"+dateReverse[0]);
                positif.val($(this).parent().next().text());
                sembuh.val($(this).parent().next().next().text());
                meninggal.val($(this).parent().next().next().next().text());//lol, please find a better solution.
            })
        }

        $('#btn-kasus-umum').click(function(){
            $('#input-umum').collapse('toggle');
        })

        $("#kasus-umum-c").click(function(){
            if($('#kasus-umum-c').prop( "checked" )){
                $('#kasus-umum-save').prop('disabled', false );
                tgl.prop('disabled', true );
                positif.prop('disabled', true );
                sembuh.prop('disabled', true );
                meninggal.prop('disabled', true );
            }else{
                $('#kasus-umum-save').prop('disabled', true );
                tgl.prop('disabled', false );
                positif.prop('disabled', false );
                sembuh.prop('disabled', false );
                meninggal.prop('disabled', false );
            }
        })

        //only fires when it is not disabled
        $('#kasus-umum-save').click(function(){
            if(validateKasusUmum()){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                {
                    url: urlKU,
                    type: 'POST',
                    data: {
                        row: rowID,
                        tanggalVal: tgl.val(),
                        sembuhVal: sembuh.val(),
                        positifVal: positif.val(),
                        meninggalVal: meninggal.val()
                    },
                    success: function (data)
                    {   
                        if(data['message']=="success"){
                            if(data['type']=="default"){//if input was default
                                tKasusUmum.row.add( [
                                    data['date']+getEditBtn(data['targetId']),
                                    positif.val(),
                                    sembuh.val(),
                                    meninggal.val()
                                ] ).draw( false );
                                resetEditListener();
                            }else if(data['type']=="edit"){//if input was edit
                                let parent = $("#k"+data['targetId']).parent();
                                parent.next().text(positif.val());
                                parent.next().next().text(sembuh.val());
                                parent.next().next().next().text(meninggal.val());
                            }
                            resetKU();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        //show error message to screen
                    }
                });
            }else{
                //show error message to screen
            }
        })

        function validateKasusUmum(){
            if($.isNumeric(sembuh.val())&&
                $.isNumeric(positif.val())&&
                $.isNumeric(meninggal.val())&&
                tgl.val()){
                return true;
            }else{
                return false;
            }
            //validator tanggal blm ada :(
        }

        function resetKU(){
            tgl.val("");
            sembuh.val("");
            positif.val("");
            meninggal.val("");
            $("#kasus-umum-c").click();
        }
        function getEditBtn(targetId){
            let res = "<span id=\"k"+targetId+"\" class=\"edit-ku-btn rounded bg-dark float-right p-1 px-2 text-white\" style=\"cursor: pointer\"\><i class=\"fa fa-pencil\"></i\></span>";
            return res;
        }

        resetEditListener();
    }
    
    initInputDemo();
    initInputKU();
    initInputKD();
});
</script>
@endsection