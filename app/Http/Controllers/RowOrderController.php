<?php

namespace App\Http\Controllers;

use App\Models\RowOrder;
use App\Models\RowOrderExtra;
use App\Models\OrderHeader;
use App\Models\User;



use App\Models\Pizza;

use Illuminate\Http\Request;

class RowOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utente = User::all();

        dd($utente->id);
        //$carrelloUtente = $utente->id;

        session()->put('carrelloUtente', $carrelloUtente);

        $carrelloUtente = session('carrelloUtente');

        //dd($carrelloUtente);
        // RowOrder::create($request->all());
        // $orderHeader = new OrderHeader;
        // $orderHeader->id = $request->id;
        // $orderHeader->save();
        
        $order = new RowOrder;
        $order->order_header_id = $request->id;
        $order->pizza_id = $request->pizza_id;
        $order->quantity = $request->quantity;
        $order->save();

        if($request->extra_id) {
            $orderExtra = new RowOrderExtra;
            $orderExtra->row_order_id = $order->id;
            $orderExtra->extra_id = $request->extra_id;
            $orderExtra->save();
        }

        return redirect()->route('home');
    }

    // public function sessionUser(Request $request)
    // {
        
    //     $carrelloUtente = $request->input('nomeProdotto');

    //     session()->put('carrelloUtente', $carrelloUtente);

    //     return redirect()->route('home');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RowOrder  $rowOrder
     * @return \Illuminate\Http\Response
     */
    public function show(RowOrder $rowOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RowOrder  $rowOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(RowOrder $rowOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RowOrder  $rowOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RowOrder $rowOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RowOrder  $rowOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(RowOrder $rowOrder)
    {
        //
    }
}
