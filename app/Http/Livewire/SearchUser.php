<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\withPagination;
use Illuminate\Support\Facades\DB;

class SearchUser extends Component
{
    public $search = '';
    use withPagination;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
       

        if($this->search != ''){
            $data = DB::table('users')
                            ->join('user_roles','users.role_id','=','user_roles.role_id')
                            ->where('users.username','like','%'.$this->search.'%')
                            ->orWhere('users.fullName','like','%'.$this->search.'%')
                            ->paginate(5);
            
        } else {
            $data = DB::table('users')
                            ->join('user_roles','users.role_id','=','user_roles.role_id')
                            ->paginate(5);
        }

        return view('livewire.search-user',['data' => $data]);
    }
}
