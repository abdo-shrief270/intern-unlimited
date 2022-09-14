<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ClientInterface;
use App\Http\Requests\DeleteClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;


class ClientController extends Controller
{
    private ClientInterface $clientInterface;

    public function __construct(ClientInterface $client)
    {
        $this->clientInterface = $client;
    }

    public function index(ClientsDatatable $datatable)
    {
        return $this->clientInterface->index($datatable);
    }
    public function create()
    {
        return $this->clientInterface->create();
    }
    public function store(StoreClientRequest $request)
    {
        return $this->clientInterface->store($request);
    }
    public function edit($id)
    {
        return $this->clientInterface->edit($id);
    }
    public function update(UpdateClientRequest $request)
    {
        return $this->clientInterface->update($request);
    }
    public function delete(DeleteClientRequest $request)
    {
        return $this->clientInterface->delete($request);
    }
}
