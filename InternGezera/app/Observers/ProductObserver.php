<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        ActivityLog::create([
            'name' => $product->name,
            'recordable_id' => $product->id,
            'recordable_type' => 'App\Models\Product',
            'admin_id' => Auth::guard('admin')->user()->id,
            'action' => 'add',
            'properties' => [
                'name'=>$product->name,
                'price'=>$product->price,
                'buy_price'=>$product->buy_price,
                'image'=>$product->image,
                'color'=>$product->color,
                'active'=>$product->active,
                'description'=>$product->description,
            ],
        ]);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        ActivityLog::create([
            'name' => $product->name,
            'recordable_id' => $product->id,
            'recordable_type' => 'App\Models\Product',
            'admin_id' => Auth::guard('admin')->user()->id,
            'action' => 'edit',
            'properties' => json_encode([
                'name'=>$product->name,
                'price'=>$product->price,
                'buy_price'=>$product->buy_price,
                'image'=>$product->image,
                'color'=>$product->color,
                'active'=>$product->active,
                'description'=>$product->description,
            ]),
        ]);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
