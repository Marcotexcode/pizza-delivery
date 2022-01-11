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
        

        // se l'utente non ha il carrello l'ho crea
        $testata = OrderHeader::firstOrCreate(['user_id' => Auth::user()->id, 'type' => 0]);
        
        // Quando il carello (order_headers) è creato aggiungere una pizza con la riga
        // Crea la riga dell ordine (RowOrder)
        $order = new RowOrder;
        $order->order_header_id = $testata->id;
        $order->pizza_id = $request->pizza_id;
        $order->quantity = $request->quantity;
        $order->save();

        // Inserire gli extra alla riga se vengono scelti 
        if($request->extra_id) {
            $prova = $request->extra_id;

            foreach ($prova as $prov) {
                $orderExtra = new RowOrderExtra;
                $orderExtra->row_order_id = $order->id;
                $orderExtra->extra_id = $prov;
                $orderExtra->save();
            }
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
