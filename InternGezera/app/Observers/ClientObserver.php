<?php

namespace App\Observers;

use App\Events\NewClientEvent;
use App\Models\ActivityLog;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function created(Client $client)
    {
        NewClientEvent::dispatch($client);
        ActivityLog::create([
            'name' => $client->name,
            'recordable_id' => $client->id,
            'recordable_type' => 'App\Models\Client',
            'admin_id' => Auth::guard('admin')->user()->id,
            'action' => 'add',
            'properties' => [
                'name'=>$client->name,
                'phone'=>$client->phone,
                'tax_number'=>$client->tax_number,
            ],
        ]);
    }

    /**
     * Handle the Client "updated" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function updated(Client $client)
    {
        ActivityLog::create([
            'name' => $client->name,
            'recordable_id' => $client->id,
            'recordable_type' => 'App\Models\Client',
            'admin_id' => Auth::guard('admin')->user()->id,
            'action' => 'edit',
            'properties' => json_encode([
                'name'=>$client->name,
                'phone'=>$client->phone,
                'tax_number'=>$client->tax_number,
            ]),
        ]);
    }

    /**
     * Handle the Client "deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function deleted(Client $client)
    {
        //
    }

    /**
     * Handle the Client "restored" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function restored(Client $client)
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        //
    }
}
