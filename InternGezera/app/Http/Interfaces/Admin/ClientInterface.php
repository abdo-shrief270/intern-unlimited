<?php

namespace App\Http\Interfaces\Admin;

interface ClientInterface
{
    public function index($datatable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
