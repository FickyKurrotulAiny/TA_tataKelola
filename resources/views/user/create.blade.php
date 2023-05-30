@extends('layouts.master')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3>
                            Tambah User</h3>
                    </div>
                    <div class="card">
                    </div>
                    <div class="modal-body">
                        <form class="main-form row" action="{{ route('user.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- @method('PUT') -->
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" name="name" placeholder="Nama"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="username" placeholder="Username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 col-xl-4">
                                <label>Level</label>
                                <select name="level" class="form-control" id="level"
                                    class="form-control @error('level') is-invalid @enderror" value="{{ old('level') }}">
                                    <option selected value="">--Pilih Level--</option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                                @error('level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
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
    </section>
@endsection
