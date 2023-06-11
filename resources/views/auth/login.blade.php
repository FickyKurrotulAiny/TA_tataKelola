@extends('layouts.main')
@section('content')
    <div id="app">
        <div class="container mt-8">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 offset-md-3 col-lg-6 offset-lg-1 col-xl-4 offset-xl-3">
                    <div class="login-brand">
                        <img src="assets/img/polindra.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <h5 align="center">Informasi dan Peminjaman Barang</h5>
                    <h6 align="center">Jurusan Teknik Informatika</h6>
                    <br>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('postlogin') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                    <div class="invalid-feedback">
                                        Username Wajib diisi!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Password wajib diisi!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
