<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class ProjectSetupCommand extends Command
{

    protected $signature = 'project:setup';
    protected $description = 'This Command is Used To Setup Project :)';

    public function handle()
    {
        $this->call('key:generate');
        $this->call('migrate:fresh');
        $permissions=['clients','products','invoices','admins','managers','users'];
        foreach ($permissions as $permission){
            Permission::create([
               'name'=>$permission
            ]);
        }
        $this->info('Permissions Has been Created Successfully :) ');

        $flag=$this->ask('Do You Want To Create An Super Account ? [yes,no]');

        if($flag=='yes'){
            $name=null;
            $email=null;
            $password=null;
            while($name==null){
                $name=$this->ask('Enter Your Name  ');
            }

            while($email==null) {
                $email = $this->ask('Enter Your Email  ');
            }

            while($password==null) {
                $password = $this->secret('Enter Your Password  ');
            }
           $admin=Admin::create([
               'name'=>$name,
               'email'=>$email,
               'password'=>Hash::make($password),
           ]);
            foreach (Permission::get() as $permission){
                AdminPermission::create([
                   'permission_id'=>$permission->id ,
                    'admin_id'=>$admin->id
                ]);
            }

            $this->info('Super Account Has been Created Successfully :) ');
        }

        $this->info('Project Has been Setup Successfully :) ');
    }
}
