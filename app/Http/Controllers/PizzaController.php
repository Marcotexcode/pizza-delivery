<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Extra;
use App\Models\PizzaExtra;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    
    public function index()
    {
        $pizze = Pizza::query()->paginate(4);
        
        return view('pizze.index',compact('pizze'));
    }

    public function create()
    {
        $extraIndex = Extra::all();

        return view('pizze.create', compact('extraIndex'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ingrediants' => 'required',
            'price' => 'required'
        ]);

        $pizza = Pizza::create($request->all());
        
        $idExtras = $request->input('extra_id', []);

        foreach ($idExtras as $idExtra) {
            $pizzaExtra = new PizzaExtra;
            $pizzaExtra->pizza_id = $pizza->id;
            $pizzaExtra->extra_id = $idExtra;
            $pizzaExtra->save();  
        }

        return redirect()->route('pizza.index');
    }

    public function show(Pizza $pizza)
    {
        $extraIdEsistenti = collect($pizza->extras);

        //dd($extraIdEsistenti);
        return view('pizze.show',compact('pizza','extraIdEsistenti'));
    }

    public function edit(Pizza $pizza)
    { 
        $elenchiExtra = Extra::all();
        
        $extraIdEsistenti = collect($pizza->extras)->pluck('id')->toArray();
        
        return view('pizze.edit',compact('pizza', 'elenchiExtra', 'extraIdEsistenti'));
    }

    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'name' => 'required',
            'ingrediants' => 'required',
            'price' => 'required'
        ]);
    
        $pizza->update($request->all());

        $deleted = PizzaExtra::where('pizza_id', $pizza->id)->delete();

        if ($request->extra_id) {
            $idExtras = $request->extra_id;
            
            foreach ($idExtras as $idExtra) {
                $pizzaExtra = new PizzaExtra;
                $pizzaExtra->pizza_id = $pizza->id;
                $pizzaExtra->extra_id = $idExtra;
                $pizzaExtra->save();  
            }
        }
        return redirect()->route('pizza.index');
    }

    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
    
        return redirect()->route('pizza.index');
    }  
}
