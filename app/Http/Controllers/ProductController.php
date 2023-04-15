<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $rows = 10;
        if(strlen($keyword)){
            $data = Product::where('product_name', 'like', "%$keyword%")
                ->orWhere('product_code', 'like', "%$keyword%")
                ->orWhere('product_category', 'like', "%$keyword%")
                ->paginate($rows);
        }else{
            $data = Product::orderBy('id', 'asc')->paginate($rows);
        }
        return view('product.index')->with('product', $data);
    }

    /**
     * Show the form for creating a new  resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'product_category' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $data = [
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
        Product::create($data);
        return redirect()->to('main')->with('success', 'Data added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product.edit')->with([
            'product' => Product::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'product_category' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $data = [
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
        Product::where('id', $id)->update($data);
        return redirect()->to('main')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('success','Data deleted successfully');
    }
    public function search(Request $request){
        
        return view('product.index')->with([
            'product' => Product::all(),
        ]);
    }
}
