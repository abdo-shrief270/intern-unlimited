<?php


namespace App\Http\Repositories\Admin;


use App\Exports\ProductsExport;
use App\Http\Interfaces\Admin\ProductInterface;
use App\Http\Traits\ImageTrait;
use App\Models\ActivityLog;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class ProductRepository implements ProductInterface
{
    use ImageTrait;
    public function index($datatable)
    {
        return $datatable->render('admin.products.index');
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store($request)
    {
        $image=null;
        if($request->has('image')){
            $image=$this->upload($request->image,'PRODUCTS');
        }
        $product=Product::create([
            'name'=>$request->name,
            'buy_price'=>$request->buy_price,
            'price'=>$request->price,
            'description'=>$request->description,
            'color'=>$request->color,
            'active'=>1,
            'image'=>$image
        ]);

        Alert::success('Success','Product Has Been Created Successfully :)');
        return redirect(route('admin.product.index'));
    }
    public function edit($id)
    {
        $product=Product::find($id);
        dd($product->image);
        if(!$product){
            Alert::error('Error','Product Not Found !');
            return redirect(route('admin.product.index'));
        }
        return view('admin.products.edit',compact('product'));
    }

    public function update($request)
    {
        $product=Product::find($request->product_id);
        if(!$product){
            Alert::error('Error','Product Not Found !');
            return redirect(route('admin.product.index'));
        }
        $product->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'tax_number'=>$request->tax_number,
        ]);
        Alert::success('Success','Product Has Been Updated Successfully :)');
        return redirect(route('admin.product.index'));
    }

    public function delete($request)
    {
        $product=Product::find($request->product_id);
        if(!$product){
            Alert::error('Error','Product Not Found !');
            return redirect(route('admin.product.index'));
        }
        $product->delete();
        Alert::success('Success','Product Has Been Deleted Successfully :)');
        return redirect(route('admin.product.index'));
    }

    public function export()
    {
       return Excel::download(new ProductsExport(),'Products-sheet.xlsx');
//        Alert::success('success','Products Sheet Has Been Created Successfully :)');
//        return back();
    }
}
