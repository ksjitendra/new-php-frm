<?php

namespace App\Controllers;

class HomeController
{

    public function __construct()
    {
    }

    public function dashboard() {

        return view('admin.dashboard');

    }
}