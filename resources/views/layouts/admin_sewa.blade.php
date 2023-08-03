<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
      #dropdownToggle{
        display: fixed;
      }
    </style>
</head>
<body>
    <div id="app">
    <nav class="navbar-expand-md navbar-light navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
            Rental mobil
            </a>
            <!-- Right Side Of Navbar -->
            <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
              <li class="nav-item" role="presentation">
                <form action="{{route('admin_sewa')}}" method="get" >
                <button class="nav-link {{Session::get('bokingan')}} rounded-5" id="bokingan" data-bs-toggle="tab" type="submit" role="tab" aria-selected="true">Bokingan</button>
                </form>
              </li>
              <li class="nav-item" role="presentation">
                <form action="{{route('admin_tersewa')}}" method="get" >
                  <button class="nav-link {{Session::get('disewa')}} rounded-5" id="disewa" data-bs-toggle="tab" type="submit" role="tab" aria-selected="false">Sewa</button>
                </form>
              </li>
              <li class="nav-item" role="presentation">
                <form action="{{route('admin_terima')}}" method="get" >
                  <button class="nav-link {{Session::get('terima')}} rounded-5" id="disewa" data-bs-toggle="tab" type="submit" role="tab" aria-selected="false">Terima</button>
                </form>
              </li>
              <li class="nav-item" role="presentation">
                <form action="{{route('admin_denda')}}" method="get" >
                  <button class="nav-link {{Session::get('denda')}} rounded-5" id="disewa" data-bs-toggle="tab" type="submit" role="tab" aria-selected="false">Denda</button>
                </form>
              </li>
              <li class="nav-item" role="presentation">
                <form action="{{route('admin_selesai')}}" method="get" >
                  <button class="nav-link {{Session::get('selesai')}} rounded-5" id="disewa" data-bs-toggle="tab" type="submit" role="tab" aria-selected="false">Selesai</button>
                </form>
              </li>


            </ul>
            <li class="nav-item dropdown">
            
            <ul class="navbar-nav ms-auto ">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                    @endif
                        @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                    @endif
                    
                    @else
                    
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 'admin')
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('create_mobil1').submit();">
                                {{ __('Create mobil') }}
                            </a>
                            <form id="create_mobil1" action="{{ route('create_mobil') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('home-form').submit();">
                                {{ __('home') }}
                            </a>
                            <form id="home-form" action="{{ route('home') }}" method="get" class="d-none">
                              @csrf
                            </form>
                        </div>
                    </li>
                      
                      @endguest
                    </ul>
            </div>
        </div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>