<?php


namespace App\Http\Repositories\Admin;


use App\Events\NewClientEvent;
use App\Http\Interfaces\Admin\ClientInterface;
use App\Models\ActivityLog;
use App\Models\Client;
use RealRashid\SweetAlert\Facades\Alert;


class ClientRepository implements ClientInterface
{
    public function index($datatable)
    {
        return $datatable->render('admin.clients.index');
    }
    public function create()
    {
        return view('admin.clients.create');
    }
    public function store($request)
    {
        Client::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'tax_number'=>$request->tax_number,
        ]);
        Alert::success('Success','Client Has Been Created Successfully :)');
        return redirect(route('admin.client.index'));
    }
    public function edit($id)
    {
        $client=Client::find($id);
        if(!$client){
            Alert::error('Error','Client Not Found !');
            return redirect(route('admin.client.index'));
        }
        return view('admin.clients.edit',compact('client'));
    }

    public function update($request)
    {
        $client=Client::find($request->client_id);
        if(!$client){
            Alert::error('Error','Client Not Found !');
            return redirect(route('admin.client.index'));
        }
        $client->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'tax_number'=>$request->tax_number,
        ]);
        Alert::success('Success','Client Has Been Updated Successfully :)');
        return redirect(route('admin.client.index'));
    }

    public function delete($request)
    {
        $client=Client::find($request->client_id);
        if(!$client){
            Alert::error('Error','Client Not Found !');
            return redirect(route('admin.client.index'));
        }
        $client->delete();
        Alert::success('Success','Client Has Been Deleted Successfully :)');
        return redirect(route('admin.client.index'));
    }

}
