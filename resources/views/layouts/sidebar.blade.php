<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <br>
        <div class="sidebar-brand">
            <img src="{{ url('/assets/img/polindra.png') }}" alt="logo" width="70"
                class="shadow-light rounded-circle">
        </div>
        <br><br>
        <div class="sidebar-brand">
            <a>Maintenance Jurusan TI</a>
        </div>
        <br>
        @if (Auth::user()->level == 'admin')
            <ul class="sidebar-menu">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li @if (Route::current()->getName() == 'inventaris.index' ||
                        Route::current()->getName() == 'inventaris.show' ||
                        Route::current()->getName() == 'inventaris.create' ||
                        Route::current()->getName() == 'inventaris.edit' ||
                        Route::current()->getName() == 'persediaan.index' ||
                        Route::current()->getName() == 'persediaan.show' ||
                        Route::current()->getName() == 'persediaan.create' ||
                        Route::current()->getName() == 'persediaan.edit') class="active" @endif>
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-dolly-flatbed"></i><span>Barang</span></a>
                    <ul class="dropdown-menu">
                        <li @if (Route::current()->getName() == 'inventaris.index' ||
                                Route::current()->getName() == 'inventaris.show' ||
                                Route::current()->getName() == 'inventaris.create' ||
                                Route::current()->getName() == 'inventaris.edit') class="active" @endif><a class="nav-link"
                                href="{{ route('inventaris.index') }}">Inventaris</a></li>
                        <li @if (Route::current()->getName() == 'persediaan.index' ||
                                Route::current()->getName() == 'persediaan.show' ||
                                Route::current()->getName() == 'persediaan.create' ||
                                Route::current()->getName() == 'persediaan.edit') class="active" @endif>
                            <a class="nav-link" href="{{ route('persediaan.index') }}">Persediaan</a>
                        </li>
                    </ul>
                </li>
                </li>
                <li @if (Route::current()->getName() == 'peminjaman.index' ||
                        Route::current()->getName() == 'peminjaman.show' ||
                        Route::current()->getName() == 'peminjaman.create' ||
                        Route::current()->getName() == 'peminjaman.edit') class="active" @endif>
                        <a class="nav-link"
                        href="{{ route('peminjaman.index') }}"><i class="fas fa-sticky-note"></i>
                        <span>Peminjaman</span></a>
                </li>
                {{-- <li @if (Route::current()->getName() == 'minta.index' ||
                        Route::current()->getName() == 'minta.show' ||
                        Route::current()->getName() == 'minta.create' ||
                        Route::current()->getName() == 'minta.edit') class="active" @endif><a class="nav-link"
                        href="{{ route('minta.index') }}"><i class="fas fa-file-alt"></i>
                        <span>Permintaanan</span></a>
                </li> --}}
                <li @if (Route::current()->getName() == 'permintaan.index' ||
                        Route::current()->getName() == 'permintaan.show' ||
                        Route::current()->getName() == 'permintaan.create' ||
                        Route::current()->getName() == 'permintaan.edit') class="active" @endif><a class="nav-link"
                        href="{{ route('permintaan.index') }}"><i class="fas fa-file-alt"></i>
                        <span>Permintaanan</span></a>
                </li>
                <li @if (Route::current()->getName() == 'user.index' ||
                        Route::current()->getName() == 'user.show' ||
                        Route::current()->getName() == 'user.create' ||
                        Route::current()->getName() == 'user.edit') class="active" @endif><a class="nav-link"
                        href="{{ route('user.index') }}"><i class="fas fa-user-plus"></i><span>User</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Laporan</span></a></li>
                <li><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span></a></li>
            </ul>
        @else (Auth::user()->level == 'user')
            <ul class="sidebar-menu">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li @if (Route::current()->getName() == 'pinjam.index' ||
                        Route::current()->getName() == 'pinjam.show' ||
                        Route::current()->getName() == 'pinjam.create' ||
                        Route::current()->getName() == 'pinjam.edit') class="active" @endif><a class="nav-link"
                        href="{{ route('pinjam.index') }}"><i class="fas fa-sticky-note"></i>
                        <span>Peminjaman</span></a>
                </li>
                <li @if (Route::current()->getName() == 'permintaan.index' ||
                        Route::current()->getName() == 'permintaan.show' ||
                        Route::current()->getName() == 'permintaan.create' ||
                        Route::current()->getName() == 'permintaan.edit') class="active" @endif><a class="nav-link"
                        href="{{ route('permintaan.index') }}"><i class="fas fa-file-alt"></i>
                        <span>Permintaanan</span></a>
                </li>
                <li><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span></a></li>
            </ul>
        @endif
    </aside>
</div>
