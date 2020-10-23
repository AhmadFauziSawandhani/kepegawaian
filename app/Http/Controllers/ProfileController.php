<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function edit($id){
        $profile = User::find($id);
        return view('auth/profile' ,compact('profile'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $profile = User::find($id);
        $profile->name = $request->name;
        $profile->email = $profile->email;
        $profile->password = $pass;
        $profile->save();
        return redirect()->route('home')->with(['success' => 'Data telah berhasil diubah']);
    }
}
