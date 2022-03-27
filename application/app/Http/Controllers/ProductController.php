<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $product;

    public function __construct()
    {
        $this->product = new ProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->getProducts();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        // return        $request->all();
        // return $request->file('image');

        $file = $request->file('image')->store('products');

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'description' => $request->description,
            'image' => $file
        ]);

        if (!$product) {
            return to_route('products.index')->with('message', ['css' => 'alert-danger', 'message' => 'Produk gagal di tambahkan']);
        }
        return to_route('products.index')->with('message', ['css' => 'alert-success', 'message' => 'Produk berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, Product $product)
    {
        $image = $product->image;
        if ($request->hasFile('image')) {
            Storage::delete($image);

            $image = $request->file('image')->store('products');
        }

        $product = $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'description' => $request->description,
            'image' => $image
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);

        $product->delete();

        return to_route('products.index')->with('message', ['css' => 'btn-success', 'message' => 'Produk berhasil di hapus']);
    }
}
