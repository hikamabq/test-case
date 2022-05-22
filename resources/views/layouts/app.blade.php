<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/icons/css/line-awesome.css') }}">

    <link href="{{ asset('theme/css/select2.min.css') }}" rel="stylesheet" />

    <title>majoo</title>
  </head>
  <body>


    <input type="checkbox" name="" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
                <h3 class="comforta-font">majoo</h3>
                <small class="back-white">Aplikasi Wirausaha</small>
            </div>
            <br>
        </div>

        <div class="sidebar-main">

            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Menu</span>
                </div>
                <ul>
                    <li class="{{ request()->is('home*') ? 'active' : '' }}">
                        <a href="{{url('/home')}}">
                            <i class="las la-chart-bar"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="{{ request()->is('transaksi*') ? 'active' : '' }}">
                        <a href="{{url('/transaksi')}}">
                            <i class="las la-file-invoice-dollar"></i>
                            Transaksi
                        </a>
                    </li>
                    <li class="{{ request()->is('laporan*') ? 'active' : '' }}">
                        <a href="{{url('/laporan')}}">
                            <i class="las la-file-invoice-dollar"></i>
                            Laporan Transaksi
                        </a>
                    </li>
                </ul>


                <div class="menu-head">
                    <span>Master Data</span>
                </div>
                <ul>
                    <li class="{{ request()->is('produk*') ? 'active' : '' }}">
                        <a href="{{url('/produk')}}">
                            <i class="las la-archive"></i>
                            Data Produk
                        </a>
                    </li>
                    <li class="{{ request()->is('pelanggan*') ? 'active' : '' }}">
                        <a href="{{url('/pelanggan')}}">
                            <i class="las la-users"></i>
                            Data Pelanggan
                        </a>
                    </li>
                    <li class="{{ request()->is('supplier*') ? 'active' : '' }}">
                        <a href="{{url('/supplier')}}">
                            <i class="las la-truck"></i>
                            Data Supplier
                        </a>
                    </li>
                    <li class="{{ request()->is('kategori*') ? 'active' : '' }}">
                        <a href="{{url('/kategori')}}">
                            <i class="las la-tags"></i>
                            Data Kategori
                        </a>
                    </li>
                </ul>

   
               
                {{-- <a href="" class="copy-contact">&copy; copyright 2022</a> --}}
            </div>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <i class="las la-bars"></i>
                </label>
            </div>

            <div class="header-icons">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="las la-power-off"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </header>

        <main>

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>

        </main>
    </div>

    <label for="sidebar-toggle" class="body-label"></label>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('theme/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery1-9-1.js') }}"></script>
	<script src="{{ asset('theme/js/select2.min.js') }}"></script>
    <script src="{{ asset('theme/js/form.js') }}"></script>
    

  </body>
</html>