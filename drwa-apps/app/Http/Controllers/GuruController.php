<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function getGuruAll()
  {
    /*$token = str::random(60);
    $hash_token = hash('sha256',$token);
    print_r($hash_token);
    exit;*/
     $posts = DB::table('guru')->get();
        
     return response()->json([
         'guru' => $posts
     ], 200);
  }
  public function getGuruID($id)
    {
        $posts = DB::table('guru')->where('id_guru',$id)->get();
        
     return response()->json([
         'guru' => $posts
     ], 200);
    }

    public function InsertGuru(Request $request)
    {
        DB::table('guru')->insert([
            'rfid'=>$request->input('rfid'),
            'nip'=>$request->input('nip'),
            'nama_guru'=>$request->input('nama_guru'),
            'alamat'=>$request->input('alamat'),
            'status_guru'=>1
        ]);
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Masuk ke Database"
         ]
     ], 200);
    }

    public function UpdateGuru(Request $request)
    {
        DB::table('guru')->where('id_guru',$request->input('id_guru'))->update([
            'rfid'=>$request->input('rfid'),
            'nip'=>$request->input('nip'),
            'nama_guru'=>$request->input('nama_guru'),
            'alamat'=>$request->input('alamat'),
            'status_guru'=>1
        ]);
    }
    
    public function DeleteGuru(Request $request)
    {
        DB::table('guru')->where('id_guru',$request->input('id_guru'))->delete();
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Hapus dari Database"
         ]
     ], 200);
    }
}
