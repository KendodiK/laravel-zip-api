<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = City::all();

        return response()->json($cities);
    }

    public function show($id){
        $city = City::where('id', $id)->first();

        return response()->json($city);
    }

    public function store(Request $request){
        $request->validate([ //basic validation more could be done
            'name' => 'required',
            'postal_code' => 'required',
            'county_id' => 'required',
        ]);
        $city = new City();
        $city->name = $request->name;
        $city->postalCode = $request->postal_code;
        $city->countyId = $request->countyId;

        $city->save();

        return response()->json($city);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'postal_code' => 'required',
            'county_id' => 'required',
        ]);

        $city = City::where('id', $id)->first();
        $city->name = $request->name;
        $city->postalCode = $request->postal_code;
        $city->countyId = $request->county_id;
        $city->save();

        return response()->json($city);
    }

    public function destroy($id){
        $city = City::destroy($id);

        return response()->json($city);
    }
}
