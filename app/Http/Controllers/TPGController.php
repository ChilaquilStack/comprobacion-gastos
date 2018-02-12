<?php

namespace App\Http\Controllers;

use App\Tpg;

use Illuminate\Http\Request;

class TPGController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        return view('tpg.index');
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request) {
        Tpg::create($request->all());
        return response()->json("Ok",200);
    }

    
    public function show(tpg $tpg)
    {
        //
    }

    
    public function edit(tpg $tpg)
    {
        //
    }

    
    public function update(Request $request, Tpg $tpg) {
        $tpg->update($request->all());
        return response()->json("Se actualizo con exito el Tipo de Programa General", 200);
    }

    public function destroy(Tpg $tpg) {
        $tpg->estatus = 0;
        $tpg->save();
        return response()->json("Exito", 200);
    }

    public function tpgs() {
        $tpgs = Tpg::where('estatus', 1)->paginate(10);
        $response = [
            'pagination' => [
                'total' => $tpgs->total(),
                'per_page' => $tpgs->perPage(),
                'current_page' => $tpgs->currentPage(),
                'last_page' => $tpgs->lastPage(),
                'from' => $tpgs->firstItem(),
                'to' => $tpgs->lastItem()
            ],
            'data' => $tpgs
        ];
        return response()->json($response, 200);
    }

}
