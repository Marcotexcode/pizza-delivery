<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
{

    public function index()
    {
        $extra = Extra::all();
    
        return view('extra.index',compact('extra'));
    }

    public function create()
    {
        return view('extra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
    
        Extra::create($request->all());
     
        return redirect()->route('extras.index');
    }

    public function show(Extra $extra)
    {
        return view('extra.show',compact('extra'));
        
    }

    public function edit(Extra $extra)
    {
        return view('extra.edit',compact('extra'));
        
    }

    public function update(Request $request, Extra $extra)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
    
        $extra->update($request->all());
    
        return redirect()->route('extras.index');
    }

    public function destroy(Extra $extra)
    {
        $extra->delete();
    
        return redirect()->route('extras.index');
    }
}
