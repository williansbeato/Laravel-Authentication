
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>SISAR @yield('titulo')</title>

        <title>SISAR - Sistema de Avaliação Remota</title>
        <link rel="icon" href="{{ asset('img/ge_icon.ico') }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                padding: 60px;
                padding-top: 20px;
                padding-bottom: 20px;
            }
            footer {
                padding: 50px;
                padding-top: 30px;
            }
            .navbar { margin-bottom: 30px; }
            .nav-link { color: white; }

            .loading {
                position: fixed;
                z-index: 999;
                overflow: show;
                margin: auto;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                width: 50px;
                height: 50px;
            }
        </style>
    </head>

    <body role="document">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav">
                    @if($tag=="MEN")
                        <img src="{{ asset('/image/home_ico.png') }}" width="36px" height="36px">
                    @elseif($tag=="LOG")
                        <img src="{{ asset('/image/login_ico.png') }}" width="36px" height="36px">
                    @elseif($tag=="REG")
                        <img src="{{ asset('/image/registro_ico.png') }}" width="36px" height="36px">
                    @elseif($tag=="ALU")
                        <img src="{{ asset('/image/aluno_ico.png') }}" width="36px" height="36px">
                    @elseif($tag=="PRO")
                        <img src="{{ asset('/image/professor_ico.png') }}" width="36px" height="36px">
                    @elseif($tag=="DIS")
                        <img src="{{ asset('/image/componente_ico.png') }}" width="36px" height="36px">
                    @elseif($tag=="CUR")
                        <img src="{{ asset('/image/curso_ico.png') }}" width="36px" height="36px">
                    @endif
                    &nbsp;&nbsp;&nbsp; <a class="navbar-brand mx-auto"><b>{{ $titulo }}</b></a>
                </ul>
            </div>
       
       
        <div class="mx-auto order-0">
            <a class="navbar-brand" href="{{ url('/') }}"><b>SISAR</b></a>
        </div>

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff" href="{{ route('login') }}"><b>| {{ __('Login') }} |</b></a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff" href="{{ route('register') }}"><b>| {{ __('Register') }} |</b></a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #fff" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <b>{{ Auth::user()->name }}</b><span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">
                            <u>E-mail</u>: {{ Auth::user()->email }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <b>Sair</b>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                <li class="active">
                        <a class="nav-link" href="{{ url('/') }}"><b>| Home |</b></a>
                    </li>
            </ul>
        </div>
    </nav>


        <div class="card">
            <div class="card-header bg-dark">
                <h3><b style="color: white";>{{ $titulo }}</b></h2>
            </div>
            <div class="card-body">
                @yield("conteudo")
            </div>
        </div>

    </body>
    <footer>
        <b>&copy;2021 &nbsp;&nbsp;&raquo;&nbsp;&nbsp; Willians Beato.</b>
    </footer>

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @yield('script')


</html>