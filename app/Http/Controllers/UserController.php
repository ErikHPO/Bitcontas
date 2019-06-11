<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit($user)
    {

    	$user = Auth::user();
    	// dd($user);
          return view('auth.edit', compact('user'));
    }

    public function update(User $user)
    {

  		if ($user->id !== Auth::id() ){
            abort(403);
        }

        $user->update(request()->validate([
            'name' => ['required','string','min:6'],
            'birthdate' => ['required','date'],
            'cpf' => ['cpf']
        ]));
        return redirect('/home')->with('success', 'Seu perfil foi alterado com sucesso.');
    }
}
