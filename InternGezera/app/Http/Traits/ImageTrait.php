<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{

    public function upload($file,$name)
    {
        $ext=$file->getClientOriginalExtension();
        $imageName = $name.'_' . time() . '.' . $ext;
        $file->storeAs('public/Images/'.$name, $imageName);
        return $imageName;
    }

}
