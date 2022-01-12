<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RowOrder;
use App\Models\RowOrderExtra;
use App\Models\OrderHeader;
use App\Models\Pizza;
use Illuminate\Http\Request;

class RowOrderController extends Controller
{
    public function store(Request $request)
    {   
        $request->validate([
            'quantity' => 'numeric|max:10',
        ]);
        
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
            $idExtras = $request->extra_id;

            foreach ($idExtras as $idExtra) {
                $orderExtra = new RowOrderExtra;
                $orderExtra->row_order_id = $order->id;
                $orderExtra->extra_id = $idExtra;
                $orderExtra->save();
            }
        }

        return redirect()->route('home');
    }

}
