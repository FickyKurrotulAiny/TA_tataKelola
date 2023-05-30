@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Edit User</h3>
                    </div>
                    <div class="card">
                    </div>
                        <div class="card-body">
                            <form class="main-form row" action="{{ route('user.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="name" placeholder="Nama" class="form-control"
                                        value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="username" placeholder="Username"
                                        class="form-control"value="{{ old('username', $user->username) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Password"
                                        class="form-control"value="{{ old('password', $user->password) }}">
                                </div>
                                <div class="mb-3 col-md-6 col-xl-4">
                                    <label for="" class="form-label">Level</label>
                                    <input type="" name="level" class="form-control"
                                        value="{{ old('level', $user->level) }}">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
