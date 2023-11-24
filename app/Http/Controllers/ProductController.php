<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = 'products.';
    const PATH_UPLOAD = 'products';
    public function index()
    {
        $data = Product::query()->latest('id')->paginate(2);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Product::query()->create($request->all());
        // return back()->with('msg', 'created successfully');
        $data = $request->except(['img']);
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
            Product::query()->create($data);
            return back()->with('msg', 'success');
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // $product->update($request->all());
        // return back()->with('msg', 'updated successfully');

        $data = $request->except(['img']);
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        $oldPathImg = $product->img;
        $product->update($data);
        if ($request->hasFile('img')) {
            Storage::delete($oldPathImg);
        }

        return back()->with('msg', 'thao tac thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
      
        // $product->delete();
        // return back()->with('msg', 'updated successfully');

        $product->delete();
        if (Storage::exists($product->img)) {
            Storage::delete($product->img);
        }
        return back()->with('msg', 'thao tac thanh cong');
    }
}
