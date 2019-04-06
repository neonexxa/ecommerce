<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use Neonexxa\BillplzWrapperV3\BillplzBill;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $params = $request->all();
        $product = Product::find($params['product']);

        // from the guide
        $res0 = new BillplzBill;
        $res0->collection_id = $product->payment_link; 
        $res0->description = "New BIll"; 
        $res0->email = Auth::user()->email; 
        $res0->name = Auth::user()->name; 
        $res0->amount = $product->price*100; 
        $res0->callback_url = "yourwebsite@example.com"; 
        // and other optional params
        $res0 = $res0->create_bill();
        list($rhead ,$rbody, $rurl) = explode("\n\r\n", $res0);
        $bplz_result = json_decode($rurl);

        // Store the bill into our purchases
        $purchase = new Purchase;
        $purchase->user_id = Auth::user()->id;
        $purchase->product_id = $product->id;
        $purchase->bill_id = $bplz_result->id;
        $purchase->save();
        return redirect($bplz_result->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
