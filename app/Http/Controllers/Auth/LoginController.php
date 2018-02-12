<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function authenticate (request $request) {
        if($request->isMethod('post')){
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], "estatus" => 1])) {
                return redirect('/');
            }
            return redirect('/')->with('status', "Usuario ó contraseña incorrecto");
        }
        return view('index');
    }

    public function logout() {
        Auth::logout();
        return redirect('/')->with('end', 'Se finalizo la secion correctamente');
    }
}
