@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <p>Users List</p>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Info</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->get_user_info()}}</td>
                               
                                    <td>
                                        <a href="{{ route('carAdmin.users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('carAdmin.users.edit', $user->id) }}" class="btn btn-primary">Update</a>
                                    </td>
                                    
                        
                                    
                                </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
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