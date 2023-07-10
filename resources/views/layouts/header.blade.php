<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li>
            <a class="nav-link nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block" style="font-size:16px">Selamat datang {{ auth()->user()->name }}!! </div>
            </a>
        </li>
    </ul>
</nav>
