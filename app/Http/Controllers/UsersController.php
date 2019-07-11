<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //kollar om man är inloggad och om man inte är det så redirectas man till logginsidan
    public function __construct(){
        $this->middleware('auth');
    }

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
        
        
        $user = User::find(Auth::id());
        if (password_verify($request->password_old, $user->password)) {
            $user->password = $request->password;
            $user->save();

            return back();
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
