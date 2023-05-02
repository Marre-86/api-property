<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if (is_array($filter)) {
            $query = House::query();

            if (isset($filter['name'])) {
                $query->where('name', 'like', "%{$filter['name']}%");
            }

            if (isset($filter['price-gte'])) {
                $query->where('price', '>', $filter['price-gte']);
            }

            if (isset($filter['price-lte'])) {
                $query->where('price', '<', $filter['price-lte']);
            }

            if (isset($filter['bedrooms'])) {
                $query->where('bedrooms', $filter['bedrooms']);
            }

            if (isset($filter['bathrooms'])) {
                $query->where('bathrooms', $filter['bathrooms']);
            }

            if (isset($filter['storeys'])) {
                $query->where('storeys', $filter['storeys']);
            }

            if (isset($filter['garages'])) {
                $query->where('garages', $filter['garages']);
            }

            $houses = $query->orderBy('id')->get();
            if ($houses->isEmpty()) {
                return response()->json([
                    'message' => 'No items with these parameters.'
                ], 200);
            }
            return "<pre>" . json_encode(json_decode($houses), JSON_PRETTY_PRINT) . "</pre>";
        }
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
