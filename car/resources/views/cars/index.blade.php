@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Cars</h1>
@stop

@section('content')
    <p>Car List</p>
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
                        <h3 class="card-title">Car</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Color</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->id }}</td>
                                    <td>{{ $car->make }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>
                                        <a href="{{ route('carAdmin.cars.delete', $car->id) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('carAdmin.cars.edit', $car->id) }}" class="btn btn-primary">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                               
                            </tbody>


                        </table>

                        {{ $cars->links() }}
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
    <script> console.log('Hi!'); </script>
@stop