<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\ProducIdRequest;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Cart[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Cart::all()->load('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(ProducIdRequest $request, Cart $cart)
    {
        $data = (object)[
            'quantity' => null,
            'product' => null
        ];

        $product = Product::findOrFail($request->product_id);

            $data->product = $product;
            $cartProduct = Cart::where('product_id', $product->id)->first();

            if ($cartProduct) {
                $cart->where('product_id',$request->product_id )->increment('quantity');
                $updatedCart = $cart->where('product_id',$request->product_id )->first();
                $data->quantity = $updatedCart->quantity;

                return response()->json($data);
            }
            else {
                $cart->quantity = 1;
                $cart->product_id = $request->product_id;
                $cart->save();
                $data->quantity = $cart->quantity;
                return response()->json($data);
            }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->truncate();
    }

    public function delete(Cart $cart, Request $request)
    {
        $delete = Cart::where('product_id', $request->product_id)->firstOrFail();

        if ($delete) {
            $delete = $cart->where('product_id', $request->product_id)->delete();
        }

    }
}
