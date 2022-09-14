<?php

namespace App\Http\ViewComposers;

use App\Models\Client;
use Illuminate\View\View;

class ProfileComposer
{

    public function compose(View $view){
        $countOfClients=Client::count();
        $view->with('countOfClients',$countOfClients);

    }
}
