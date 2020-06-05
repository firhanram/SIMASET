<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class userController extends Controller
{
   public function tbUser(){
       $data = DB::table('users')
                    ->join('user_roles','users.role_id','=','user_roles.role_id')
                    ->simplePaginate(5);
       return $data;
   }

   public function userRoles(){
       $data = DB::table('user_roles')->get();
       return $data;
   }

   public function tambahUser(Request $request){
       try {
           date_default_timezone_set('Asia/Jakarta');
           DB::table('users')->insert([
               'fullName' => $request->fullName,
               'username' => $request->username,
               'password' => Hash::make($request->password),
               'email' => $request->email,
               'role_id' => $request->role,
               'created_at' => date('Y-m-d H:i:s')
           ]);

           return redirect('/user')->with('berhasil','Berhasil Menambahkan User!');
       } catch (\Exception $e) {
           return redirect('/user/tambahUser')->with('gagal','Gagal Menambahkan User');
       }
   }

   public function user_id($id){
       $data = DB::table('users')->where('user_id',$id)->get();
       return $data;
   }

   public function updateUser(Request $request){
       try {
            DB::table('users')
                ->where('user_id',$request->user_id)
                ->update([
                    'fullName' => $request->fullName,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'role_id' => $request->role
                ]);
            return redirect('/user')->with('berhasil','Berhasil Mengupdate Data User!');
       } catch (\Exception $e) {
           return back()->with('gagal','Gagal Mengupdate Data User');
       }
   }

   public function deleteUser($id){
       try {
           DB::table('users')
                ->where('user_id',$id)
                ->delete();
            return redirect('/user')->with('berhasil','Data User Berhasil Di Hapus!');
       } catch (\Exception $th) {
           return redirect('/user')->with('gagal','Gagal Menghapus Data User!');
       }
   }

   public function cariUser(Request $request){
       $data = DB::table('users')
                    ->join('user_roles','users.role_id','=','user_roles.role_id')
                    ->where('users.fullName','like','%'.$request->cari_user.'%')
                    ->simplePaginate(5);
        return view('user.user',['data'=> $data]);
   }

   public function totalUser(){
       $data = DB::table('users')
                    ->count();
        return $data;
   }
}
