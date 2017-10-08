<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Validate;

class UserController extends Controller
{
    public function edit()
    {
        $title = 'Admin - Megatech';

        $admin = User::find(Auth::user()->id);

        return view('edit-admin', compact('title', 'admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $admin->username = $request->input('username');

        if($request->input('senha_atual') != '')
        {
            $this->validate($request, [
                'senha_nova' => 'required',
                'senha_repetir' => 'required|same:senha_nova']);

            if(!Hash::check($request->get('senha_atual'), $admin->password))
                return redirect()->route('admin-edit')->withErrors(['senha_atual' => 'Senha incorreta'])->withInput();

           $admin->password = bcrypt($request->input('senha_nova'));
        }

        $admin->save();

        return redirect()->route('admin-edit');
    }
}
