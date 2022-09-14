<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $products=Product::get();
        return $this->apiResponse(200,null,null,$products);
    }

    public function store(ProductStoreRequest $request)
    {
        //Store product
    }

    public function view($product_id)
    {
        //return product

    }


    public function delete(ProductDeleteRequest $request)
    {
        //Delete product
    }
}
