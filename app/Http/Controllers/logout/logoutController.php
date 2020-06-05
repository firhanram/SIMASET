<?php

namespace App\Http\Controllers\logout;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class logoutController extends Controller
{
    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}
