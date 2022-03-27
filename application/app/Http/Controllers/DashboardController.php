<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new ProductService;
    }

    public function index(Request $request)
    {
        $products = $this->product->getProducts();
        if ($request->ajax()) {
            $html = view('dashboard.pages.card', compact('products'))->render();
            return response()->json(['html' => $html]);
        }

        return view('dashboard.pages.index', compact('products'));
    }
}
