<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        // dd(getTransactionsCategories());
        return view('admin.home_admin');
    }
}
