<?php


namespace App\Http\Repositories\Admin;


use App\Http\Interfaces\Admin\HomeInterface;


class HomeRepository implements HomeInterface
{

    public function Dashboard()
    {
        return view('admin.index');
    }
}
