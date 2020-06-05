<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class VendorUpdate extends Component
{
    public $kd_vendor;
    public $nmVendor;
    public $alamat;
    public $noTelp;
    public $noFax;

    protected $listeners = [
        'getVendor'
    ];

    public function getVendor($vendor){
        foreach ($vendor as $row) {
            $this->kd_vendor = $row['kd_vendor'];
            $this->nmVendor = $row['nm_vendor'];
            $this->alamat = $row['alamat'];
            $this->noTelp = $row['no_telp'];
            $this->noFax = $row['no_fax'];
        }
    }

    public function updateVendor(){
        $query = DB::table('m_vendor')
                        ->where('kd_vendor',$this->kd_vendor)
                        ->update([
                            'nm_vendor' => $this->nmVendor,
                            'alamat' => $this->alamat,
                            'no_telp' => $this->noTelp,
                            'no_fax' => $this->noFax
                        ]);
        if($query){
            $this->emit('statusUpdate');
            $this->emit('vendorUpdated');

            $this->kd_vendor = '';
            $this->nmVendor = '';
            $this->noTelp = '';
            $this->alamat = '';
            $this->noFax = '';
        }
    }
    
    public function render()
    {
        return view('livewire.vendor.vendor-update');
    }
}
