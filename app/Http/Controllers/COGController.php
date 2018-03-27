<?php

namespace App\Http\Controllers;

use App\cog;
use Illuminate\Http\Request;

class COGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('COG.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cog  $cog
     * @return \Illuminate\Http\Response
     */
    public function show(cog $cog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cog  $cog
     * @return \Illuminate\Http\Response
     */
    public function edit(cog $cog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cog  $cog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cog $cog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cog  $cog
     * @return \Illuminate\Http\Response
     */
    public function destroy(cog $cog)
    {
        //
    }
}
