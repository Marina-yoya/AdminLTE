@extends('adminlte::page')

@section('title', 'Manage Users')

@section('content_header')
    <h1>Manage Users</h1>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage User</h3>
            </div>
            <div class="card-body">
                <form method="POST" class="userForm">
                   
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                            @error('name')
                            <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                            @error('email')
                            <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pnone">Pnone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                            @error('phone')
                            <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="password" id="password">
                            @error('password')
                            <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>

                    </div>
                    <input type="submit" value="Save">
                </form>
            </div>
        </div>
    </div>
    
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop