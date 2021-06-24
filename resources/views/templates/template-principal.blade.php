<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body style="background-color: #FBFBFB;">
        <nav class="navbar navbar-light bg-light" style="box-shadow: 2px 10px 53px -6px rgba(0,0,0,0.16);
            -webkit-box-shadow: 2px 10px 53px -6px rgba(0,0,0,0.16);
            -moz-box-shadow: 2px 10px 53px -6px rgba(0,0,0,0.16);">
                <div class="container">
                    <a class="navbar-brand">
                        <img src="{{ asset('img/logo_ufape_concursos.png') }}" alt="Orientação" width="100px"> 
                    </a>
                    <div class="form-group" style="margin-bottom: 0px;">
                        @auth
                            <a style="margin-right: 15px;" href="{{ route('index') }}">Início</a>

                            @if(Auth::user()->tipo_usuario == "admin")
                                <a href="{{ route('show.usuarios') }}" :active="request()->routeIs('show.usuarios')" 
                                    style="margin-right: 15px;">Usuários</a>
                            @endif

                            @if(Auth::user()->tipo_usuario == "admin" || 
                                    Auth::user()->tipo_usuario == "chefeSetorConcursos" )
                                <a href="{{ route('concurso.index') }}" :active="request()->routeIs('concurso.index')" 
                                    style="margin-right: 15px;">Concursos</a>
                            @endif
                            <div class="btn-group">
                                <a href="" class="dropdown-toggle" style="margin-right: 15px;" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false">
                                    Olá, {{ Auth::user()->nome }}
                                </a>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            Sair
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" style="margin-right: 15px;">Entrar</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary my-2 my-sm-0 shadow-sm">Cadastre-se</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </nav>
            @yield('content')
    @include('templates.footer')
    </body>
</html>