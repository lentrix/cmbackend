<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'proprietor'=>'required',
            'address' => 'required',
        ]);

        $store = Store::create($request->only('name','proprietor','address','phone'));

        return response()->json(['store'=>$store],201);
    }

    public function show($id) {
        $store = Store::find($id);

        if(!$store) {
            return response()->json([
                'message'=>"Store account# $id does not exists."
            ], 404);
        }

        return response()->json(['store'=>$store],200);
    }

    public function update($id, Request $request) {
        $store = Store::find($id);
        if(!$store) {
            return response()->json([
                'message'=>'Store account does not exists.'
            ], 404);
        }

        $store->update($request->all());

        return response()->json(['store'=>$store], 201);
    }

    public function destroy($id) {
        $store = Store::find($id);
        if(!$store) {
            return response()->json([
                'message'=>'Store account does not exists.'
            ], 404);
        }

        if(!$store->delete()){
            return response()->json([
                'message' => 'This store account cannot be deleted.'
            ]);
        }

        return response()->json([
            'message'=>'Store account has been deleted.'
        ],201);
    }
}
