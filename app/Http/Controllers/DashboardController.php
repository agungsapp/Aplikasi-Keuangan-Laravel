<?php

namespace App\Http\Controllers;

use App\Models\DashboardModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.index');
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
     * @param  \App\Models\DashboardModel  $dashboardModel
     * @return \Illuminate\Http\Response
     */
    public function show(DashboardModel $dashboardModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DashboardModel  $dashboardModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DashboardModel $dashboardModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashboardModel  $dashboardModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashboardModel $dashboardModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashboardModel  $dashboardModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashboardModel $dashboardModel)
    {
        //
    }
}
