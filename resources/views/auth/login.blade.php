@extends('layouts.app')

@section('content')

<div class="container-fluid login-container-bg">
    <div class="container">
    <div class="row padding-top-15 ">
        <div class="offset-sm-1 col-sm-6 offset-md-1 col-md-4">
            <div class="animated card bounceInDown">
                <div class="card-header text-center login-card-header">
                    <h1>Login</h1>
                </div>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" id="login-form">
                    @csrf
                <div class="card-body">
                        <div class="form-group">
                            <label for="email" class="">Email</label>

                            <div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" >Senha</label>

                            <div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar-se de mim.') }}
                                    </label><br>
                                </div>
                            </div>
                            <a class="link-color" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        </div>
                </div>
                <a href="" onclick="event.preventDefault(); document.getElementById('login-form').submit();"><div class="card-footer btn-ativo text-center">
                    <i class="fas fa-sign-in-alt"></i> Acessar o Sistema
                </div></a>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
