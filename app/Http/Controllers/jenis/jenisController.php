<?php

namespace App\Http\Controllers\jenis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jenisController extends Controller
{
    public function tbJenis(){
        $data = DB::table('m_jenis')->paginate(5);
        return $data;
    }

    public function getJenis(){
        $jenis = DB::table('m_jenis')->get();
        return $jenis;
    }
}
