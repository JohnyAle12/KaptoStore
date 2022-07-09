<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if( $user->roles()->get()->first()->id == 4 ){
            return view('admin.home_agent');
        }

        if( $user->roles()->get()->first()->id == 3 ){
            return view('admin.home_agent');
        }
        
        if( $user->roles()->get()->first()->id == 2 ){
            return view('admin.home');
        }

        return view('admin.home_admin');
    }
}
