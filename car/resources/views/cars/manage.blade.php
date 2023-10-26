@extends('adminlte::page')

@section('title', $car ? 'Edit Car' : 'Create Car')

@section('content_header')
   
</section>

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $car ? 'Edit Car' : 'Create Car' }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $car ? route('carAdmin.cars.update', $car->id) : route('carAdmin.cars.store') }}" class="carForm">
                    @csrf
                    @if($car)
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="form-group">
                            <label for="make">Make</label>
                            <input type="text" class="form-control @error('make') is-invalid @enderror" name="make" id="make" value="{{ $car ? $car->make : "" }}">
                            @error('make')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" id="model" value="{{ $car ? $car->model : "" }}">
                            @error('model')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" id="color" value="{{ $car ? $car->color : "" }}">
                            @error('color')
                            <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" value="{{ $car ? 'Save' : 'Create Car' }}">
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
