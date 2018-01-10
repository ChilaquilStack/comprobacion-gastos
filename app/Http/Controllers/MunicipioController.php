<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use DB;

class MunicipioController extends Controller {
    public function index() {
        return view("municipios.index");
    }

    public function create()
    {

    }

    public function store(Request $request) {
        Municipio::create($request->all());
        return response()->json("Municipio creado con exito", 200);
    }


    public function show(Municipio $municipio) {
        //
    }

    public function edit(Municipio $municipio) {
        //
    }

    public function update(Request $request, Municipio $municipio) {
        $municipio->update($request->all());
        return response()->json("Se actualizo con exito el municipio", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio){
        $municipio->delete();
        return response()->json("Se elimino con exito", 200);
    }

    public function municipios(Request $request){
        $municipios = Municipio::orderBy('id', 'desc')->paginate(10);
        $response = [
            'pagination' => [
                'total' => $municipios->total(),
                'per_page' => $municipios->perPage(),
                'current_page' => $municipios->currentPage(),
                'last_page' => $municipios->lastPage(),
                'from' => $municipios->firstItem(),
                'to' => $municipios->lastItem()
            ],
            'data' => $municipios
        ];
        return response()->json($response, 200);
    }

    public function municipios_all(){
        return response()->json(Municipio::all(),200);
    }
}
