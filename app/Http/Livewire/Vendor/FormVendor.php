<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormVendor extends Component
{   
    public $nmVendor;
    public $alamat;
    public $noTelp;
    public $noFax;

    public function addVendor(){
        $query = DB::table('m_vendor')
                        ->insert([
                            'nm_vendor' => $this->nmVendor,
                            'alamat' => $this->alamat,
                            'no_telp' => $this->noTelp,
                            'no_fax' => $this->noFax
                        ]);
        if($query){
            $this->emit('vendorAdded');
            $this->nmVendor = '';
            $this->alamat = '';
            $this->noTelp = '';
            $this->noFax = '';
        }
    }
    public function render()
    {
        return view('livewire.vendor.form-vendor');
    }
}
