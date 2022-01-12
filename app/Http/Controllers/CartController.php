<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RowOrder;
use App\Models\OrderHeader;
use App\Models\Extra;


use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
 
    public function index()
    {
        // Controllo se ce il carrello senno lo crea
        $carrello = OrderHeader::firstOrCreate(['user_id' => Auth::user()->id, 'type' => 0]);

        // Dal carrello passa alla tabella row_orders
        $rigaOrdini = $carrello->row_orders;

        return view('carrello.index',compact('rigaOrdini'));
    }

    public function edit($id)
    {
        $rigaOrdine = RowOrder::find($id);
        $elencoExtra = Extra::all();

        $extraIdEsistenti = collect($rigaOrdine->row_order_extras)->pluck('extra_id')->toArray();

        return view('carrello.edit', compact('rigaOrdine','elencoExtra','extraIdEsistenti'));
    }

    public function update(Request $request, $id)
    {
        $rigaOrdine = RowOrder::find($id);
        $rigaOrdine->update($request->all());

        return redirect()->route('carrello.index');
    }


    public function destroy($id)
    {
        $rigaOrdine = RowOrder::find($id);
        $rigaOrdine->delete();

        return redirect()->route('carrello.index');
    }
}
