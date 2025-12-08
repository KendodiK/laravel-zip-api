<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index(){
        $counties = County::all();

        return response()->json(["counties"=>$counties]);
    }

    public function show($id){
        $county = County::where("id",$id)->get();

        return response()->json(["county"=>$county]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $county = new County();
        $county->name = $request->name;
        $county->save();

        return response()->json(["county"=>$county]);
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $county = County::where("id",$request->id)->first();
        $county->name = $request->name;
        $county->save();

        return response()->json(["county"=>$county]);
    }

    public function destroy($id){
        $county = County::where("id",$id)->delete();

        return response()->json($county);
    }
}
