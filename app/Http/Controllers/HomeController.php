<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Extra;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ElencoPizze = Pizza::all();
        $ElencoExtra = Extra::all();
        
        // Vedere se l'utente ha un carrello
        $carrelli = OrderHeader::where('type', 0)->where('user_id', Auth::user()->id)->get();

        $righeOrdine = 0;

        // Prendere tutti i record della colonna row_order_id 
        foreach ($carrelli as $carrello) { 
            // Sommare quantity 
            $righeOrdine = $righeOrdine + $carrello->row_orders->sum('quantity');  
        } 

        return view('home',compact('ElencoPizze','ElencoExtra','righeOrdine'));
    }
    
}
