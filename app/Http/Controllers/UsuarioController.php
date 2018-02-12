<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class UsuarioController extends Controller {
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
    }

    public function create() {
    }

    public function store(RegisterRequest $request) {
        Usuario::create([
            'nombre' => $request['nombre'],
            'apellido_paterno' => $request['apellido_paterno'],
            'apellido_materno' => $request['apellido_materno'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        return response()->json('Usuario creado con exito', 200);
    }

    public function show(Usuario $usuario) {

    }

    
    public function edit(Usuario $usuario) {

    }

    public function update(Request $request, Usuario $usuario) {
        
    }

    public function destroy(Usuario $usuario) {

    }
}
