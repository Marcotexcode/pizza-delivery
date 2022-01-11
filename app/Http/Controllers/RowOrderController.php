<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
        // se l'utente ha il carrello
        $testata = OrderHeader::firstOrNew(['user_id' => Auth::user()->id, 'type' => 0]);
        
        // se l'utente non ha il carrello l'ho crea
        $testata = OrderHeader::firstOrCreate(['user_id' => Auth::user()->id,'type' => 0]);

        // Prende l'id el carrello (order_header_id)
        $orderHeaders = OrderHeader::where('user_id', Auth::user()->id)->pluck('id')->first();
        
        // Quando il carello (order_headers) è creato aggiungere una pizza con la riga
        // Crea la riga dell ordine (RowOrder)
        $order = new RowOrder;
        $order->order_header_id = $orderHeaders;
        $order->pizza_id = $request->pizza_id;
        $order->quantity = $request->quantity;
        $order->save();

        
        // Inserire gli extra alla riga se vengono scelti 
        $prova = $request->extra_id;

        dd($prova);

        if($request->extra_id) {
            $orderExtra = new RowOrderExtra;
            $orderExtra->row_order_id = $order->id;
            $orderExtra->extra_id = $request->extra_id;
            $orderExtra->save();
        }

        return redirect()->route('home');
    }

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
