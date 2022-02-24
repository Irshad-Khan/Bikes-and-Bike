<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Show create form
     */
    public function create()
    {
        $companies = Company::all();
        return view('vehicles.create', compact('companies'));
    }

    /**
     * store car data in databse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:vehicles,name',
            'model' => 'required',
            'price' => 'required|numeric',
            'company_id' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $vehicle = Vehicle::create([
            'name' => $request->name,
            'model' => $request->model,
            'price' => $request->price,
            'company_id' => $request->company_id,
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        VehicleImage::create([
            'name' => $imageName,
            'vehicle_id' => $vehicle->id
        ]);
        return redirect()->route('home')->with('status', 'Car added successfully!');
    }


    /**
     * Show Car Detail
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Return car detail to update record
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $companies = Company::all();
        return view('vehicles.edit', compact('vehicle', 'companies'));
    }

    /**
     * update car detail
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'company_id' => 'required|numeric',
        ]);

        $vehicle = Vehicle::findOrFail($request->id);
        $vehicle->update([
            'name' => $request->name,
            'model' => $request->model,
            'price' => $request->price,
            'company_id' => $request->company_id,
        ]);

        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            VehicleImage::where('vehicle_id', $vehicle->id)
                ->update([
                    'name' => $imageName
                ]);
        }

        return redirect()->route('home')->with('status', 'Car update successfully!');
    }

    /**
     * delete car detail
     */
    public function delete($id)
    {
        Vehicle::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'Car deleted successfully!');
    }
}
