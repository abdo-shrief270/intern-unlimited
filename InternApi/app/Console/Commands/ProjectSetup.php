<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class ProjectSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Project Setup ........');
        Artisan::call('migrate:refresh');
        $this->info('Migration Completed');
        $this->info('Setup Admin Account');
        $name= $this->ask('Enter Your Name');
        $email=$this->ask('Enter your email');
        $password=$this->secret('Enter your Password');
        Admin::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password)
        ]);
        $this->info('Setup Completed :)');
    }
}
