<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogFormRequest;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::latest()->paginate(5);
        return view('catalogs.index', compact('catalogs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CatalogFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogFormRequest $request)
    {
        Catalog::create($request->all());

        return redirect()->route('catalogs.index')->with('success', 'Catalog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        return view('catalogs.show', compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
        return view('catalogs.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CatalogFormRequest  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogFormRequest $request, Catalog $catalog)
    {
        $catalog->update($request->all());

        return redirect()->route('catalogs.index')->with('success', 'Catalog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect()->route('catalogs.index')->with('success', 'Catalog deleted successfully');
    }
}
