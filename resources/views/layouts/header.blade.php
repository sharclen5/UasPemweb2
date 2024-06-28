<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('welcome') }}">UAS PEMWEB 2</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::currentRouteName() == 'pelanggan.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">Pelanggan</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'produk.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'pesanan.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pesanan.index') }}">Pesanan</a>
            </li>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'pembayaran.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pembayaran.index') }}">Pembayaran</a>
            </li>
        </ul>
        @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Halo, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger ml-4 text-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        @else
        @endauth
    </div>
</nav>