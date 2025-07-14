<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use App\Http\Requests\StoreAdminSettingRequest;
use App\Http\Requests\UpdateAdminSettingRequest;

class AdminSettingController extends Controller
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
     * @param  \App\Http\Requests\StoreAdminSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminSetting  $adminSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSetting $adminSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSetting  $adminSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSetting $adminSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminSettingRequest  $request
     * @param  \App\Models\AdminSetting  $adminSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminSettingRequest $request, AdminSetting $adminSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminSetting  $adminSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSetting $adminSetting)
    {
        //
    }
}
