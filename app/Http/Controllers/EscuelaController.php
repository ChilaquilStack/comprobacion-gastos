<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('escuelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return response()->json("Escuela creada con exito", 200);
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
        return response()->json("La escuela se actualizo con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuela $escuela)
    {
        //
    }

    public function escuelas(){
        $escuelas = Escuela::orderBy('id', 'asc')->paginate(10);
        foreach($escuelas as $escuela) {
            $escuela->region->municipio;
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
