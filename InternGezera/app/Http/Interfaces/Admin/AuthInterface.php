<?php


namespace App\Http\Interfaces\Admin;


interface AuthInterface
{
    public function loginPage();
    public function login($request);
    public function logout($request);
}
