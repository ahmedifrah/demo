<?php

namespace App\Http\Controllers;

use App\Models\Shop\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Brand::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'website' => 'required|string',
            'description' => 'required|string',
            'position' => 'required|boolean',
            'is_visible' => 'required|boolean',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'sort' => 'nullable|integer',
        ]);

        Brand::create($validatedData);

        return response()->json(['message' => 'Brand created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return $brand;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'website' => 'required|string',
            'description' => 'required|string',
            'position' => 'required|boolean',
            'is_visible' => 'required|boolean',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'sort' => 'nullable|integer',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($validatedData);

        return response()->json(['message' => 'Brand updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json(['message' => 'Brand deleted successfully']);
    }
}
