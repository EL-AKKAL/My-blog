<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    // show the home page for users
    public function index(){
        return view('user.home');
    }

    // show a single post for users
    public function post(){
        return view('user.post');
    }
}
