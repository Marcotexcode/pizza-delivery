<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::query()->paginate(3);
    
        return view('utenti.index',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        
        return view('utenti.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
    
        return redirect()->route('utente.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    
        return redirect()->route('utente.index');
    }

}
