<?php

namespace App\Http\Controllers;

use App\Models\Pizza;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    
    public function index()
    {
        $pizze = Pizza::query()->paginate(3);
    
        return view('pizze.index',compact('pizze'));
    }

    
    public function create()
    {
        return view('pizze.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ingrediants' => 'required',
            'price' => 'required'
        ]);
    
        Pizza::create($request->all());
     
        return redirect()->route('pizza.index');
    }

    
    public function show(Pizza $pizza)
    {
        return view('pizze.show',compact('pizza'));
    }

   
    public function edit(Pizza $pizza)
    {
        return view('pizze.edit',compact('pizza'));
    }

    
    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'name' => 'required',
            'ingrediants' => 'required',
            'price' => 'required'
        ]);
    
        $pizza->update($request->all());
    
        return redirect()->route('pizza.index');
    }

    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
    
        return redirect()->route('pizza.index');
    }
    
}
