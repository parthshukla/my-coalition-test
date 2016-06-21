<?php

namespace CoalitionTest\Http\Controllers;

use Illuminate\Http\Request;

use CoalitionTest\Http\Requests;

use CoalitionTest\Models\ProductStocks;

/**
 * ManageProduct class.
 *
 * @since  1.0.0
 * @version 1.0.0
 * @author Parth Shukla <shuklaparth@hotmail.com> 
 */
class ManageProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = ProductStocks::orderBy('created_at', 'desc')->get();

        return view('stock',['stocks' => $stocks]);
    }

    //--------------------------------------------------------------------------

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    //--------------------------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //adding data to the database
        $productStock = new ProductStock;

        $productStock->name = $request->name;
        $productStock->quantity = $request->quantity;
        $productStock->price_per_unit = $request->price_per_unit;

        $productStock->save();

        return response()->json(['status' => 'success']); 



    }

    //--------------------------------------------------------------------------

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
//end of class ManageProduct
//endo of file ManageProduct.php
