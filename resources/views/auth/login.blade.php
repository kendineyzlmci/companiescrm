@extends('layouts.app')
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8" style="border-radius: 0 !important;background: #fff;border-top-left-radius: 10px !important;border-bottom-right-radius: 10px !important;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="" style="text-align: center;">Giriş Yap</h5>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" required>
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
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        <label for="password">{{ __('Şifre') }}</label>
                        @error('password')
                            <span class="helper-text" data-error="wrong" data-success="right">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-1">
                        <p>
                            <label>
                                <input type="checkbox" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12" style="background: -webkit-linear-gradient(45deg, #303f9f, #7b1fa2) !important;background: linear-gradient(45deg, #303f9f, #7b1fa2) !important;box-shadow: 3px 3px 20px 0 rgba(123, 31, 162, .5);}">
                            {{ __('Giriş Yap') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    @if (Route::has('password.request'))
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Şifremi Unuttum!') }}
                                </a>
                            </p>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small">
                                <a href="{{ route('register') }}">
                                    {{ __('Kayıt Ol') }}
                                </a>
                            </p>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
