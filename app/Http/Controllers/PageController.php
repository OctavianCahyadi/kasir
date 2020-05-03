<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboardadmin()
    {
        return view('admin.dashboard');
    }
    public function kasir()
    {
        return view('kasir.dashboard');
    }
}
