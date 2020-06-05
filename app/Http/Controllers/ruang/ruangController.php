<?php

namespace App\Http\Controllers\ruang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ruangController extends Controller
{
    public function getRuang(){
        $data = DB::table('m_ruang')
                    ->get();
        return $data;
    }
}
