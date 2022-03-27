<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getProducts()
    {
        return Product::with('category')->orderBy('created_at', 'DESC')->paginate(10);
    }
}
