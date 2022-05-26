<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function render(){
        return view('login');
    }

    public function authenticate(Request $request){
        $data = $request->only([
            'email',
            'password'
        ]);

        $validator = Validator::make($data,[
            'email'=>['required','string', 'email'],
            'password'=>['required','string','min:4']
        ]);

        if($validator->fails()){
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        if(Auth::attempt($data)){
            return redirect()->route('painel');
        }else{
            $validator->errors()->add('password', 'E-mail e/ou senha incorretos!');
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

    }

    
}
