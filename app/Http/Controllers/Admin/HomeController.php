<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use function view;

class HomeController extends Controller
{
    public function show()
    {
        return view('admin.home');
    }
}
