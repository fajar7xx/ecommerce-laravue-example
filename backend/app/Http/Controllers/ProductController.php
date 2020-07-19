<?php

namespace App\Http\Controllers;

use App\{Product, ProductGallery};
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::latest()->paginate(20);
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // dd($request->all());
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product Has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product_id = $product->id;
        $product->delete();

        // kalau hapus product maka product gallery juga harus terhapus kalau gak error
        ProductGallery::where('product_id', $product_id)->delete();

        return redirect()->route('product.index')->with('deleted', 'The product has been deleted');
    }

    public function getProducts(Request $request)
    {   
        $search = $request->search;
        if($search == ''){
            $products = Product::orderBy('name', 'asc')->select('id', 'name')->limit(10)->get();
        }else{
            $products = Product::orderBy('name', 'asc')->select('id', 'name')
                            ->where('name', 'like', '%' . $search . '%')
                            ->limit(10)
                            ->get();
        }
        // $products = Product::all();
        $response = [];
        foreach($products as $product){
            $response[] = [
                'id' => $product->id,
                'name' => $product->name
            ];
        }

        // return response()->json($response);
        echo json_encode($response);
        exit;
    }

    public function gallery(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $items = ProductGallery::with('product')
                    ->where('product_id', $id)
                    ->get();
        return view('pages.products.gallery')->with([
            'product' => $product,
            'items' => $items
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->keyword;
        $products = Product::where('name', 'like', '%'.$search.'%')->latest()->paginate(10);
        return view('pages.products.index', compact('products'));
    }
}
