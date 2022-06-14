<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreHarianController extends Controller
{
    public function getPreHarianAll()
  {
     $posts = DB::table('presensi_harian')->get();
        
     return response()->json([
         'presensi_harian' => $posts
     ], 200);
  }
  public function getPreHarianID($id)
    {
        $posts = DB::table('presensi_harian')->where('id_presensi_harian',$id)->get();
        
     return response()->json([
        "User"=>"Owen",
        "waktuakses"=>today(),
         'presensi_harian' => $posts
     ], 200);
    }

    public function InsertPreHarian(Request $request)
    {
        DB::table('presensi_harian')->insert([
            'tahun_akademik'=>$request->input('tahun_akademik'),
            'semester'=>$request->input('semester'),
            'tanggal'=>$request->input('tanggal'),
            'hari'=>$request->input('hari'),
            'id_guru'=>$request->input('id_guru'),
            'jam_masuk'=>$request->input('jam_masuk'),
            'jam_pulang'=>$request->input('jam_pulang'),
            'metode'=>$request->input('metode')
        ]);
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Masuk ke Database"
         ]
     ], 200);
    }

    public function UpdatePreHarian(Request $request)
    {
        DB::table('presensi_harian')->where('id_presensi_harian',$request->input('id_presensi_harian'))->update([
            'tahun_akademik'=>$request->input('tahun_akademik'),
            'semester'=>$request->input('semester'),
            'tanggal'=>$request->input('tanggal'),
            'hari'=>$request->input('hari'),
            'id_guru'=>$request->input('id_guru'),
            'jam_masuk'=>$request->input('jam_masuk'),
            'jam_pulang'=>$request->input('jam_pulang'),
            'metode'=>$request->input('metode')
        ]);
    }
    
    public function DeletePreHarian(Request $request)
    {
        DB::table('presensi_harian')->where('id_presensi_harian',$request->input('id_presensi_harian'))->delete();
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Hapus dari Database"
         ]
     ], 200);
    }
}
