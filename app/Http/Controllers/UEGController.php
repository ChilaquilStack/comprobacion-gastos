<?php

namespace App\Http\Controllers;

use App\UEG;
use Illuminate\Http\Request;
use App\Http\Requests\UEGRequest;

class UEGController extends Controller {

    public function index() {
        return view('ueg.index');
    }

    public function create() {
        //
    }

    public function store(UEGRequest $request) {
        UEG::create($request->all());
        return response()->json("Se agrego la Unidad Ejecutora del Gasto con exito", 200);
    }

    
    public function show(UEG $uEG)
    {
        //
    }


    public function edit(UEG $uEG)
    {
        //
    }


    public function update(Request $request, UEG $ueg) {
        $ueg->update($request->all());
        return response()->json("Se actualizo con exito", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UEG  $uEG
     * @return \Illuminate\Http\Response
     */
    public function destroy(UEG $ueg) {
        $ueg->estataus = 1;
        $ueg->save();
        return response()->json("Se elimino correctament", 200);
    }

    public function uegs(){
        $uegs = UEG::where('estatus', 1)->paginate(10);
        foreach ($uegs as $ueg) {
            $ueg->ur;
            $ueg->ur->up;
        }
        $response = [
            'pagination' => [
                'total' => $uegs->total(),
                'per_page' => $uegs->perPage(),
                'current_page' => $uegs->currentPage(),
                'last_page' => $uegs->lastPage(),
                'from' => $uegs->firstItem(),
                'to' => $uegs->lastItem()
            ],
            'data' => $uegs
        ];
        return response()->json($response, 200);
    }

    public function uegs_all() {
        $ueg = UEG::where('estatus', 1)->get();
        return response()->json($ueg, 200);
    }
}
