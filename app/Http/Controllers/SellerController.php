<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function index() {
        $sellers = Seller::join('users', 'users.id','=','sellers.user_id')
                ->select(['users.name','users.email','sellers.*'])
                ->with('store')
                ->orderBy('users.name')->get();

        return response()->json([
            'sellers' => $sellers
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|numeric',
            'store_id' => 'required|numeric',
            'designation' => 'required'
        ]);

        $seller = Seller::create($request->only('user_id','store_id','designation'));

        return response()->json([
            'seller' => $seller
        ], 201);
    }

    public function update($id, Request $request) {
        $seller = Seller::find($id);
        if(!$seller) {
            return response()->json([
                'message' => "Seller ID Number $id not found."
            ], 404);
        }

        $seller->update($request->all());

        return response()->json([
            'seller' => $seller
        ], 201);
    }

    public function show($id) {
        $seller = Seller::find($id);

        if(!$seller) {
            return response()->json([
                'message' => "Seller ID Number $id does not exists."
            ], 404);
        }

        return response()->json([
            'seller' => $seller
        ], 200);
    }

    public function destroy($id) {
        $seller = Seller::find($id);

        if(!$seller) {
            return response()->json([
                'message' => "Seller ID Number $id does not exists."
            ], 404);
        }

        $seller->delete();

        return response()->json([
            'message'=>"The seller account has been deleted."
        ],201);
    }
}
