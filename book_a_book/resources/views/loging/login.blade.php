@extends('_layout.offline')

<!-- Titre de la page -->

@section('title')
register
@endsection


<!-- Contenu de la page -->

@section('content')

    <main class="register_contener">

        <input type="checkbox" id="log_reg_toggle" class="log_reg_check">


        <div class="login">
            <div class="login_inside">
                <h1><img src="{{ asset('../img/logo.svg') }}" alt="" class="reg_title"></h1>
            <p class="desc">Book a book est une application qui permet aux étudiant de la section infographie de la haute école de la province de Liége de commander les livres nécessaires pour leur  année scolaire. </p>


            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <div class="alert_box">
                                <span class="invalid-feedback" role="alert" class="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="cta hcta from_w_cta">
                                {{ __('Login') }}
                            </button>

                            <p>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </p>
                        </div>
                    </div>
                </form>

                <div class="register_btn">
                    Vous n'avez pas encore de comptes ? <label for="log_reg_toggle" class="log_reg_toggle">Crée un compte</label>
                </div>
            </div>
            </div>

        </div>

        <div class="register">
            <h2 class="card-header">{{ __('Register') }}</h2>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password"  name="password" required autocomplete="group">
                            @error('password')
                                <span class="invalid-feedback" role="alert" class="alert">
                                    <strong>Vous devez indiquer votre numéro de groupe</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div>
                        <label for="group">Groupe</label>

                        <div>
                            <input id="group" type="text"  name="group">
                        </div>
                        @error('group')
                        <div>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <div>
                            <button type="submit" class="hcta cta form_cta">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="register_btn">
                    Vous avez déjà un compte ? <label for="log_reg_toggle" class="log_reg_toggle">Se connecter</label>
                </div>
            </div>
        </div>







    </main>
@endsection
