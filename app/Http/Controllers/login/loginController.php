<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    public function historyLogin($user_id){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('loginhistory')
                ->insert([
                    'user_id' => $user_id,
                    'date' => date('Y-m-d H:i:s')
                ]);
    }
    
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $check = DB::table('users')
                    ->join('user_roles','users.role_id','=','user_roles.role_id')
                    ->where('username', $username)
                    ->first();
        if($check){
            if(Hash::check($password, $check->password)){
                $this->historyLogin($check->user_id);
                Session::put([
                    'username'=> $check->username,
                    'name'=>$check->fullName,
                    'user_id'=>$check->user_id,
                    'role_id'=>$check->role_id,
                    'role'=>$check->role,
                    'login'=>TRUE]);
                if($check->role_id == 1){
                    return redirect('/admin');
                } else if($check->role_id == 2) {
                    return redirect('/manager');
                } else if($check->role_id == 3) {
                    return redirect('/direkturUtama');
                } 
                
            }else {
                return redirect('/login')->with('status','Password is incorrect');
            }
        }else {
            return redirect('/login')->with('status','Username or Password is incorrect');
        }
    }

    public function getHistoryLogin(Request $request){
        $data = DB::table('loginhistory')
                    ->where('user_id',$request->session()->get('user_id'))
                    ->paginate(5);
        return $data;
    }
}
