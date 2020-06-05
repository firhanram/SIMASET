<?php

namespace App\Http\Controllers\kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kategoriController extends Controller
{
    public function getKategori(){
        $kategori = DB::table('m_kategori')->get();
        return $kategori;
    }
}
