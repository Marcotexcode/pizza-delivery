<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\RowOrder;
use App\Models\OrderHeader;
use App\Models\Extra;
use App\Models\PizzaExtra;
use App\Models\RowOrderExtra;


class CartController extends Controller
{

    public function index()
    {
        // Controllo se ce il carrello senno lo crea
        $carrello = OrderHeader::firstOrCreate(['user_id' => Auth::user()->id, 'type' => 0]);

        $rigaOrdini = $carrello->row_orders;
        
        return view('carrello.index',compact('rigaOrdini'));
    }

    public function edit($id)
    {
        $rigaOrdine = RowOrder::find($id);  

        $extraIdEsistenti = collect($rigaOrdine->row_order_extras)->pluck('extra_id')->toArray();

        // Prendere  extra_id
        $elencoddExtra = PizzaExtra::where('pizza_id',$rigaOrdine->pizza_id )->pluck('extra_id')->toArray();

        // Prendere l'elenco che combacia con l'id di extra
        $elencoExtraScelti = Extra::whereIn('id', $elencoddExtra)->get();
        
        return view('carrello.edit', compact('rigaOrdine','extraIdEsistenti', 'elencoExtraScelti'));
    }

    public function update(Request $request, $id)
    {
        $rigaOrdine = RowOrder::find($id);

        $rigaOrdine->update($request->all());

        // recupera tutti i record in cui il valore colonna 'row_order_id' sia uguale al id
        // riga_order e lo elimina
        $deleted = RowOrderExtra::where('row_order_id', $id)->delete();

        // se la request extra_id e stata modificata
        if($request->extra_id) {

            $idExtras = $request->extra_id;

            foreach ($idExtras as $idExtra) {
                $orderExtra = new RowOrderExtra;
                $orderExtra->row_order_id = $rigaOrdine->id;
                $orderExtra->extra_id = $idExtra;
                $orderExtra->save();
            }
        }

        return redirect()->route('carrello.index');
    }


    public function destroy($id)
    {
        $rigaOrdine = RowOrder::find($id);
        $rigaOrdine->delete();

        return redirect()->route('carrello.index');
    }
}
