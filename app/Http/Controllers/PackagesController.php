<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackagesRequest;
use App\Http\Requests\UpdatePackagesRequest;
use App\Models\Packages;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackagesRequest $request, Packages $packages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packages $packages)
    {
        //
    }
}
