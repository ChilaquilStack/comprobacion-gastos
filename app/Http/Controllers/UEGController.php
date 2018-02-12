<?php

namespace App\Http\Controllers;

use App\UEG;
use Illuminate\Http\Request;
use App\Http\Requests\UEGRequestUpdate;
use App\Http\Requests\UEGRequestStore;

class UEGController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        return view('ueg.index');
    }

    public function create() {
        //
    }

    public function store(UEGRequestStore $request) {
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


    public function update(UEGRequestUpdate $request, UEG $ueg) {
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
        $ueg->estatus = 0;
        $ueg->save();
        return response()->json("Se elimino correctamente", 200);
    }

    public function uegs(){
        $uegs = UEG::activos();
        foreach ($uegs as $ueg) {
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
