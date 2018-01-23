<?php

namespace App\Http\Controllers;

use App\Up;
use Illuminate\Http\Request;
use App\Http\Requests\UPRequest;

class UPController extends Controller {
    
    public function index() {
        return view('up.index');
    }

    public function create() {
        //
    }

    public function store(UPRequest $request) {
        up::create($request->all());
        return response()->json('Unidad Presupuestal creada con exito', 200);
    }

    public function show(Up $up) {
        //
    }

    public function edit(Up $up) {
        
    }

    public function update(Request $request, Up $up) {
        $up->update($request->all());
        return response()->json("Unidad Presupuestal actualizada con exito", 200);
    }

    public function destroy(Up $up) {
        $up->estatus = 0;
        $up->save();
        return response()->json("Unida Presupuestal dada de baja con exito");
    }

    public function ups() {
        $ups = UP::where('estatus', 1)->paginate(10);
        $response = [
            'pagination' => [
                'total' => $ups->total(),
                'per_page' => $ups->perPage(),
                'current_page' => $ups->currentPage(),
                'last_page' => $ups->lastPage(),
                'from' => $ups->firstItem(),
                'to' => $ups->lastItem()
            ],
            'data' => $ups
        ];
        return response()->json($response, 200);
    }

    public function ups_all(){
        $ups = UP::where('estatus', 1)->get();
        return response()->json($ups,200);
    }
}
