@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit User</h1>
    </div>
</section>
<div class="modal-body">
    <form class="main-form" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" name="name" placeholder="Nama" class="form-control" value="{{old('name', $user->name)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="username" placeholder="Username" class="form-control"value="{{old('username', $user->username)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control"value="{{old('password', $user->password)}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Level</label>
            <input type="" name="level" class="form-control"
                value="{{old('level', $user->level)}}">
        </div>
            <!-- <div class="form-group">
                <div class="col-sm-2"> -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Kembali</a>
                <!-- </div>
            </div> -->
    </form>
</div>

@endsection
