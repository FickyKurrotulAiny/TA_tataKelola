<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <br>
        <div class="sidebar-brand">
            <img src="{{url('/assets/img/polindra.png')}}" alt="logo" width="70" class="shadow-light rounded-circle">
        </div>
        <br>
        <div class="sidebar-brand">
            <a href="index.html">Maintenance Jurusan TI</a>
        </div>
        <br>
        @if (Auth::user()->level == 'admin')
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-dolly-flatbed"></i><span>Barang</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('inventaris.index') }}">Inventaris</a></li>
                    <li><a class="nav-link" href="{{ route('persediaan.index') }}">Persediaan</a></li>
                </ul>
            </li>
            </li>
            <li><a class="nav-link" href="{{ route('peminjaman.index') }}"><i class="fas fa-sticky-note"></i> <span>Peminjaman</span></a>
            </li>
            <li><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-user-plus"></i><span>User</span></a></li>
            <li><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Laporan</span></a></li>
        </ul>
        @else (Auth::user()->level == 'user')
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-sticky-note"></i> <span>Peminjaman</span></a>
            </li>
        </ul>
        @endif
    </aside>
</div>
