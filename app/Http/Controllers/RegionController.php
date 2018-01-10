<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use DB;

class RegionController extends Controller {

    public function index(){
        return view('regiones.index');
    }

    public function create(){
        //
    }

    public function store(Request $request){
        Region::create($request->all());
        return response()->json("Region creada con exito", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region) {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region) {
        $region->update($request->all());
        return response()->json("Se actualizo con exito la region", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region){
        $region->delete();
        return response()->json("Se elimino con exito", 200);
    }

    public function regiones() {
        $regiones = Region::orderBy('id', 'desc')->paginate(10);
        foreach ($regiones as $region) {
            $region->municipio;
        }
        $response = [
            'pagination' => [
                'total' => $regiones->total(),
                'per_page' => $regiones->perPage(),
                'current_page' => $regiones->currentPage(),
                'last_page' => $regiones->lastPage(),
                'from' => $regiones->firstItem(),
                'to' => $regiones->lastItem()
            ],
            'data' => $regiones
        ];
        return response()->json($response, 200);
    }

    public function regiones_all() {
        $regiones = Region::all();
        return response()->json($regiones, 200);
    }
}