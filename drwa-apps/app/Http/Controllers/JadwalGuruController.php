<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalGuruController extends Controller
{
    public function getJadwalGuruAll()
  {
     $posts = DB::table('jadwal_guru')->get();
        
     return response()->json([
         'jadwal_guru' => $posts
     ], 200);
  }
  public function getJadwalGuruID($id)
    {
        $posts = DB::table('jadwal_guru')->where('id_jadwal_guru',$id)->get();
        
     return response()->json([
         'jadwal_guru' => $posts
     ], 200);
    }

    public function InsertJadwalGuru(Request $request)
    {
        DB::table('jadwal_guru')->insert([
            'tahun_akademik'=>$request->input('tahun_akademik'),
            'semester'=>$request->input('semester'),
            'id_guru'=>$request->input('id_guru'),
            'hari'=>$request->input('hari'),
            'id_kelas'=>$request->input('id_kelas'),
            'id_mapel'=>$request->input('semester'),
            'jam_mulai'=>$request->input('jam_mulai'),
            'jam_selesai'=>$request->input('jam_selesai')
        ]);
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Masuk ke Database"
         ]
     ], 200);
    }

    public function UpdateJadwalGuru(Request $request)
    {
        DB::table('jadwal_guru')->where('id_jadwal_guru',$request->input('id_jadwal_guru'))->update([
            'tahun_akademik'=>$request->input('tahun_akademik'),
            'semester'=>$request->input('semester'),
            'id_guru'=>$request->input('id_guru'),
            'hari'=>$request->input('hari'),
            'id_kelas'=>$request->input('id_kelas'),
            'id_mapel'=>$request->input('semester'),
            'jam_mulai'=>$request->input('jam_mulai'),
            'jam_selesai'=>$request->input('jam_selesai')
        ]);
    }
    
    public function DeleteJadwalGuru(Request $request)
    {
        DB::table('jadwal_guru')->where('id_jadwal_guru',$request->input('id_jadwal_guru'))->delete();
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Hapus dari Database"
         ]
     ], 200);
    }
}
