<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ProductInterface;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $product)
    {
        $this->productInterface = $product;
    }

    public function index(ProductsDatatable $datatable)
    {
        return $this->productInterface->index($datatable);
    }
    public function create()
    {
        return $this->productInterface->create();
    }
    public function store(StoreProductRequest $request)
    {
        return $this->productInterface->store($request);
    }
    public function edit($id)
    {
        return $this->productInterface->edit($id);
    }
    public function update(UpdateProductRequest $request)
    {
        return $this->productInterface->update($request);
    }
    public function delete(DeleteProductRequest $request)
    {
        return $this->productInterface->delete($request);
    }
    public function export()
    {
        return $this->productInterface->export();
    }
}
