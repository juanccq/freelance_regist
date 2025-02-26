<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $view = view('dashboard');

        $view = view('admin.tracking.index');

        return $view;
    }
}
