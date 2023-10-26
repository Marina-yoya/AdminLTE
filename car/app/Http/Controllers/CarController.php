<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('id', 'desc')->paginate(10); 

        return view('cars.index', ['cars' => $cars]);
    }

    public function create()
    {
        $users = User::all();
        return view('cars.manage', ['car' => null, 'users' => $users]);
        // return view('cars.manage', ['car' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'user_id' => 'required',
        ]);

        $car = new Car();
        $car->make = $request->make;
        $car->model = $request->model;
        $car->color = $request->color;
        $car->user_id = $request->user_id;
        $car->save();

        return redirect()->route('carAdmin.cars.index')->with('success', 'Car created successfully');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.manage', ['car' => $car]);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
        ]);

        $car->make = $request->make;
        $car->model = $request->model;
        $car->color = $request->color;
        $car->save();

        return redirect()->route('carAdmin.cars.index')->with('success', 'Car updated successfully');
    }

    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect()->route('carAdmin.cars.index')->with('success', 'Car deleted successfully');
    }
}