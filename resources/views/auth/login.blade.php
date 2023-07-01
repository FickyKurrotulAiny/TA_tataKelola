@extends('layouts.main')
@section('content')
    <div id="app">
        <div class="container mt-8">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 offset-md-3 col-lg-6 offset-lg-1 col-xl-4 offset-xl-3">
                    <div class="card card-primary">
                        <div class="login-brand">
                            <img src="assets/img/polindra.png" alt="logo" width="90"
                                class="shadow-light rounded-circle">
                        </div>
                            <p class="text-center" style="font-size:20px"><strong>INFORMASI DAN PEMINJAMAN BARANG/ALAT</strong>
                            </p>
                            <p class="text-center" style="font-size:15px"><strong>JURUSAN TEKNIK INFORMATIKA</strong></p>
                            <hr>
                        <div class="card-body">
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible text-center">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('postlogin') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                                    <div class="invalid-feedback">
                                        Username Wajib diisi!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label" >Password</label>
                                    </div>
                                    <input id="password" type="password" placeholder="Masukan Password" class="form-control" name="password"
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
