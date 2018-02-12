<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        return view('uog.index');
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Escuela::create($request->all());
        return response()->json("Unidad Operadora del Gasto creada con exito", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit(Escuela $escuela)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escuela $escuela)
    {
        $escuela->update($request->all());
        return response()->json("Unidad Operadora del Gasto actualizada con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuela $escuela){
        $escuela->delete();
        return response()->json("Unidad Operadora del Gasto dada de baja con exito", 200);
    }

    public function escuelas(){
        $escuelas = Escuela::orderBy('id', 'asc')->paginate(5);
        foreach($escuelas as $escuela) {
            $escuela->municipio->region;
            $escuela->ueg;
            $escuela->ueg->ur;
            $escuela->ueg->ur->up;
        }
        $response = [
            'pagination' => [
                'total' => $escuelas->total(),
                'per_page' => $escuelas->perPage(),
                'current_page' => $escuelas->currentPage(),
                'last_page' => $escuelas->lastPage(),
                'from' => $escuelas->firstItem(),
                'to' => $escuelas->lastItem()
            ],
            'data' => $escuelas
        ];
        return response()->json($response, 200);
    }
}
