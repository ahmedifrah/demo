<?php

namespace App\Http\Controllers;

use App\Filament\Resources\Shop\ProductResource;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (Product::all());
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
            'shop_brand_id'=> 'required|numeric',
            'name' => 'required|string',
            'slug' => 'required',
            'sku' => 'required|numeric',
            'barcode'=> 'required|string',
            'description'=> 'required|string',
            'qty'=> 'required|numeric',
            'security_stock' => 'required|numeric',
            'featured' => 'required|numeric',
            'is_visible' => 'required|numeric',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'type'=> 'required|in:downloadable,deliverable',
            'backorder'=> 'required|numeric',
            'requires_shipping' => 'required|numeric',
            'seo_title' => 'nullable|string',
            'seo_description'=> 'nullable|string',
            'weight_value'=> 'required|numeric',
            'weight_unit' => 'required|string',
            'height_value' => 'required|numeric',
            'height_unit'=> 'required|string',
            'width_value'=> 'required|numeric',
            'width_unit'=> 'required|string',
            'depth_value'=> 'required|numeric',
            'depth_unit' =>'required|string',
            'volume_value'=> 'required|numeric',
            'volume_unit'=> 'required|string'
        ]);

        Product::create($validatedData);
        

        return response()->json(['message' => 'Product created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
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
            'shop_brand_id'=> 'required|numeric',
            'name' => 'required|string',
            'slug' => 'required',
            'sku' => 'required|numeric',
            'barcode'=> 'required|string',
            'description'=> 'required|string',
            'qty'=> 'required|numeric',
            'security_stock' => 'required|numeric',
            'featured' => 'required|numeric',
            'is_visible' => 'required|numeric',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'type'=> 'required|in:downloadable,deliverable',
            'backorder'=> 'required|numeric',
            'requires_shipping' => 'required|numeric',
            'seo_title' => 'nullable|string',
            'seo_description'=> 'nullable|string',
            'weight_value'=> 'required|numeric',
            'weight_unit' => 'required|string',
            'height_value' => 'required|numeric',
            'height_unit'=> 'required|string',
            'width_value'=> 'required|numeric',
            'width_unit'=> 'required|string',
            'depth_value'=> 'required|numeric',
            'depth_unit' =>'required|string',
            'volume_value'=> 'required|numeric',
            'volume_unit'=> 'required|string'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return response()->json(['message' => 'Product updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully!']);

    }
}
