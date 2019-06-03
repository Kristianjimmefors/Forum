<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $user = User::find(Auth::id());

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'password_old' => 'required|max:50',
            'password' => 'required|min:8|max:50|confirmed',
        ]);
            dd($request);
        $user = User::find(Auth::id());
        dd($user);
        if ($user->password == $request->password_old) {
            $user->password = $request->password;
            $user->save();

            
        }
         else{
            dd('fuck');
        }

    }

    public function destroy($id)
    {
        //
    }
}
