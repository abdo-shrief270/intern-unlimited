<?php

namespace App\Http\Listeners;

use App\Http\Events\UserRegisteredEvent;
use App\Mail\UserRegisterMail;
use App\Models\Admin;
use App\Models\RecentUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserRegisteredListener implements ShouldQueue
{

    public function handle(UserRegisteredEvent $event)
    {
//        $admins=Admin::get();
//        foreach ($admins as $admin){
//            Mail::to($admin)
//                ->send(new UserRegisterMail($event->user));
//        }
        RecentUser::create([
           'user_id'=>$event->user->id
        ]);
    }
}
