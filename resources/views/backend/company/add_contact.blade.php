@extends('backend.layouts.layout')
@section('headersubcontent')
    <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{ $companyInfo->name }} | Adres Ekle</span></h5>
    </div>
    <div class="col s2 m6 l6">
        <a href="{{ route('company.show',['id'=>$companyInfo->id]) }}" class="ml-3 btn-floating waves-effect waves-light amber darken-4 tooltipped right" data-position="bottom" data-tooltip="Geri"><i class="material-icons left">arrow_back</i></a>
    </div>
@endsection
@section('content')
    <div class="section users-edit">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12" id="account">
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('address.store',['id'=>$companyInfo->id]) }}" enctype="multipart/form-data" >
                            @csrf
                            @if(session('status'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-alert card cyan">
                                            <div class="card-content white-text">
                                                <p>{{ session('status') }}</p>
                                            </div>
                                            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="row">
                                        <div class="col s12 input-field">
                                            <input id="address" name="address" type="text" class=" @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                                   data-error=".address">
                                            <label for="name">{{ __('Adres') }}</label>
                                            @error('website')
                                            <small class="website">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="lat" name="lat" placeholder="" type="text" class="validate @error('lat') is-invalid @enderror" value="{{ old('lat') }}"
                                                   data-error=".lat">
                                            <label for="lat">{{ __('Enlem') }}</label>
                                            @error('lat')
                                            <small class="lat">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="lon" name="lon" placeholder="" type="text" class="validate @error('lon') is-invalid @enderror" value="{{ old('lon') }}"
                                                   data-error=".lon">
                                            <label for="lon">{{ __('Boylam') }}</label>
                                            @error('lon')
                                            <small class="lon">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="zoom" id="zoom">
                                        <div class="col s12">
                                            <label class="green-text">* Harita üzerinde konumunuzu işaretleyebilirsiniz.</label>
                                            <div id="harita" style="width:100%; height:100%">
                                                <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/" width="100%" height="324" style="border:0;">
                                                    <p>Tarayıcınız iframe özelliklerini desteklemiyor !</p>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 display-flex justify-content-end mt-3">
                                    <button type="submit" class="btn indigo">
                                        {{ __('Kaydet') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/dropify/css/dropify.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('backend/vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/js/scripts/form-file-uploads.js') }}"></script>
    <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
    <script>
        var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:"5568225db28d43b5a9e9f916eca99589"}, function(){
            ibbMAP.Map.OnClick(function (lat, lon, zoom ,clickDirection, pixelX, pixelY) {

                if(clickDirection=="l"){
                    $("#lat").val(lat);
                    $("#lon").val(lon);
                    $("#zoom").val(zoom);
                }

            });
        });
    </script>
@endsection

