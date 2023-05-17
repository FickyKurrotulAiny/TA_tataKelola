@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah User</h1>
    </div>
</section>
<div class="modal-body">
    <form class="main-form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- @method('PUT') -->
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" name="name" placeholder="Nama" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}">
            @error('username')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="div-3">
            <label for="" class="form-label">Level</label>
            <input type="text" name="level" placeholder="Level" class="form-control @error('level') is-invalid @enderror">
            @error('level')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
            <!-- <div class="form-group">
                <div class="col-sm-2"> -->
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Batal</a>
                <!-- </div>
            </div> -->
    </form>
</div>

@endsection
