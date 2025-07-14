<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiplomaRequest;
use App\Http\Requests\UpdateDiplomaRequest;
use App\Models\Diploma;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDiplomaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiplomaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function show(Diploma $diploma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function edit(Diploma $diploma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiplomaRequest  $request
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiplomaRequest $request, Diploma $diploma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diploma $diploma)
    {
        //
    }
}
