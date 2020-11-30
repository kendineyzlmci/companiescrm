@extends('backend.layouts.layout')
@section('headersubcontent')
    <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Şirket Profili</span></h5>
    </div>
    <div class="col s2 m6 l6">
        <a href="{{ route('company.list') }}" class="ml-3 btn-floating waves-effect waves-light amber darken-4 tooltipped right" data-position="bottom" data-tooltip="Geri"><i class="material-icons left">arrow_back</i></a>
        <a href="{{ route('company.edit',['id'=>$companyInfo->id]) }}" class="ml-3 btn-floating waves-effect waves-light cyan tooltipped right" data-position="bottom" data-tooltip="Düzenle"><i class="material-icons left">edit</i></a>
    </div>
@endsection
@section('content')
    <div class="section users-view">
        <!-- users view media object start -->
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m7">
                    <div class="display-flex media">
                        <div class="media-body">
                            <h6 class="media-heading">
                                <span class="users-view-name">{{ $companyInfo->name }} </span>
                            </h6>
                            <span class="users-view-id">
                                Son Güncelleme : {{ $companyInfo->CompanyUpdatedAt }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-1">
                    <a href="{{ route('company.website',['id'=>$companyInfo->id]) }}" target="_blank" class="btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange tooltipped right" data-position="bottom" data-tooltip="Web Sitesine Git"><i class="material-icons left">language</i></a>
                </div>
            </div>
        </div>
        <!-- users view media object ends -->
        <div class="card">
            <div class="card-content" style="padding: 0;padding-left: 12px;">
                <ul class="tabs row">
                    <li class="tab">
                        <a class="display-flex align-items-center active" id="account-tab" href="#companyinfo">
                            <i class="material-icons mr-1">info</i><span>Şirket Bilgileri</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="display-flex align-items-center" id="information-tab" href="#companycontact">
                            <i class="material-icons mr-2">pin_drop</i><span>İletişim Bilgileri</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a class="display-flex align-items-center" id="information-tab" href="#companyperson">
                            <i class="material-icons mr-2">people_outline</i><span>Personeller</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @include('backend.company.info')
        @include('backend.company.contact')
        @include('backend.company.person')
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/pages/page-users.css') }}">
    <style>
        #personcancel{
            display: none;
        }
        #personadd{
            padding: 7px 25px;
        }
    </style>
@endsection
@section('js')
    <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
    <script language="javascript">
        var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:"5568225db28d43b5a9e9f916eca99589"}, function(){

            ibbMAP.Map.OnlyMap();

            $( ".showmapfunc" ).click(function() {
                var id = $(this).attr('address');
                var latv = $('#lat'+id).text();
                var lonv = $('#lon'+id).text();
                var zoomv = $('#zoom'+id).text();

                ibbMAP.Map.Goto({
                    lat: latv,
                    lon: lonv,
                    zoom: zoomv,
                    effect: true
                });

                ibbMAP.Nearby.Close();

                ibbMAP.Nearby.Open({
                    lat: latv,
                    lon: lonv,
                    type: "eğitim,kamu,eczane,banka",
                    distance: 300
                });
            });

            $( ".panoromafunc" ).click(function() {
                var id = $(this).attr('address');
                var latv = $('#lat'+id).text();
                var lonv = $('#lon'+id).text();

                ibbMAP.Panorama.Close();

                ibbMAP.Panorama.Open({
                    lat: latv,
                    lon: lonv,
                    angle: 10
                });
            });

            $( ".konumfunc" ).click(function() {
                var id = $(this).attr('address');
                var latv = $('#lat'+id).text();
                var lonv = $('#lon'+id).text();
                var zoomv = $('#zoom'+id).text();

                ibbMAP.Map.Goto({
                    lat: latv,
                    lon: lonv,
                    zoom: zoomv,
                    effect: true
                });
            });

        });

        $( "#personaddbtn" ).click(function() {
            $( "#personcancel" ).css('display','block');
            $( "#personadd" ).css('display','none');
        });

        $( "#personcancelbtn" ).click(function() {
            $( "#personcancel" ).css('display','none');
            $( "#personadd" ).css('display','block');
        });

        function personeditfunc(id) {
            $('#personedit'+id).css('display','table-row');
            $('#personcancelbutton'+id).css('display','inline-block');
            $('#personeditbutton'+id).css('display','none');
        }

        function personcancelfunc(id) {
            $('#personedit'+id).css('display','none');
            $('#personcancelbutton'+id).css('display','none');
            $('#personeditbutton'+id).css('display','inline-block');
        }
    </script>
@endsection
