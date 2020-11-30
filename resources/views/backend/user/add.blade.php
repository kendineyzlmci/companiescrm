@extends('backend.layouts.layout')
@section('headersubcontent')
    <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Kullanıcı Ekle</span></h5>
    </div>
    <div class="col s2 m6 l6">
        <a href="{{ url()->previous() }}" class="ml-3 btn-floating waves-effect waves-light amber darken-4 tooltipped right" data-position="bottom" data-tooltip="Geri"><i class="material-icons left">arrow_back</i></a>
    </div>
@endsection
@section('content')
    <div class="section users-edit">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12" id="account">
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('users.create') }}" enctype="multipart/form-data" >
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
                                        <div class="col s12 input-field mb-3">
                                            <label for="username">{{ __('Profil Fotoğrafı') }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s3 input-field">
                                            <input type="file" name="photo_path" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6 input-field">
                                            <input id="first_name" name="first_name" type="text" class=" @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
                                                   data-error=".first_name">
                                            <label for="username">{{ __('İsim') }}</label>
                                            @error('first_name')
                                                <small class="first_name">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="last_name" name="last_name" type="text"
                                                   class=" @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"
                                                   data-error=".last_name">
                                            <label for="username">{{ __('Soyisim') }}</label>
                                            @error('last_name')
                                                <small class="last_name">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="phone" name="phone" type="text"
                                                   class=" @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                                   data-error=".phone">
                                            <label for="username">{{ __('Telefon') }}</label>
                                            @error('phone')
                                                <small class="phone">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="email" name="email" type="text"
                                                   class=" @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                                   data-error=".email">
                                            <label for="username">{{ __('Eposta') }}</label>
                                            @error('email')
                                                <small class="email">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="password" name="password" type="password"
                                                   class=" @error('password') is-invalid @enderror" data-error=".password">
                                            <label for="username">{{ __('Şifre') }}</label>
                                            @error('password')
                                            <small class="password">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="col s6 input-field">
                                            <input id="password_confirmation" name="password_confirmation" type="password" data-error=".password_confirmation">
                                            <label for="username">{{ __('Şifre Tekrar') }}</label>
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
@endsection