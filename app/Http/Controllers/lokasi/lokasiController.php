<?php

namespace App\Http\Controllers\lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class lokasiController extends Controller
{
    public function getLokasi(){
        $data = DB::table('m_lokasi')
                    ->get();
        return $data;
    }
}
