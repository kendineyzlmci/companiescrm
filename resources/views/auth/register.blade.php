@extends('layouts.app')
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8" style="border-radius: 0 !important;background: #fff;border-top-left-radius: 10px !important;border-bottom-right-radius: 10px !important;">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="" style="text-align: center;">{{ __('Kayıt Ol') }}</h5>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input type="text" id="first_name"  name="first_name" class="@error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autofocus required>
                        <label for="username" class="center-align">{{ __('Ad') }}</label>
                        @error('first_name')
                        <span class="helper-text" data-error="wrong" data-success="right">
                                {{ $message }}
	                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input type="text" id="last_name"  name="last_name" class="@error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autofocus required>
                        <label for="username" class="center-align">{{ __('Soyad') }}</label>
                        @error('last_name')
                        <span class="helper-text" data-error="wrong" data-success="right">
                                {{ $message }}
	                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">contact_phone</i>
                        <input type="text" id="phone"  name="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" autofocus required>
                        <label for="username" class="center-align">{{ __('Telefon') }}</label>
                        @error('phone')
                        <span class="helper-text" data-error="wrong" data-success="right">
                                {{ $message }}
	                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">contact_mail</i>
                        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        <label for="username" class="center-align">{{ __('E-Mail Adresi') }}</label>
                        @error('email')
                        <span class="helper-text" data-error="wrong" data-success="right">
                                {{ $message }}
	                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" required>
                        <label for="password">{{ __('Şifre') }}</label>
                        @error('password')
                        <span class="helper-text" data-error="wrong" data-success="right">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password-confirm" type="password" name="password_confirmation" required>
                        <label for="password">{{ __('Şifre Tekrar') }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12" style="background: -webkit-linear-gradient(45deg, #303f9f, #7b1fa2) !important;background: linear-gradient(45deg, #303f9f, #7b1fa2) !important;box-shadow: 3px 3px 20px 0 rgba(123, 31, 162, .5);}">
                            {{ __('Kayıt Ol') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    @if (Route::has('login'))
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small">
                                <a href="{{ route('login') }}">
                                    {{ __('Giriş Yap') }}
                                </a>
                            </p>
                        </div>
                    @endif
                    @if (Route::has('password.request'))
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Şifremi Unuttum!') }}
                                </a>
                            </p>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
