@extends('adminlte::page')

@section('title', $user ? 'Edit User' : 'Create User')

@section('content_header')
    
</section>

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user ? 'Edit User' : 'Create User' }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $user ? route('carAdmin.users.update', $user->id) : route('carAdmin.users.store') }}" class="userForm">
                    @csrf
                    @if($user)
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user ? $user->name : "" }}">
                            @error('name')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user ? $user->email : "" }}">
                            @error('email')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $user ? $user->phone : "" }}">
                            @error('phone')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        @if (!$user) 
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <div class="alert alert-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                        @endif
                    </div>
                    <input type="submit" value="{{ $user ? 'Save' : 'Create User' }}">
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
