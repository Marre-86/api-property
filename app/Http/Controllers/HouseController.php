<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function index()
    {
        return House::all();
    }

    public function show(House $house)
    {
        return $house;
    }

    public function store(Request $request)
    {
        $house = House::create($request->all());

        return response()->json($house, 201);
    }

    public function update(Request $request, House $house)
    {
        $house->update($request->all());

        return response()->json($house, 200);
    }

    public function delete(House $house)
    {
        $house->delete();

        return response()->json(null, 204);
    }
}
