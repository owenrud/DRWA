<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreMengajarController extends Controller
{
    public function getPreMengajarAll()
    {
       $posts = DB::table('presensi_mengajar')->get();
          
       return response()->json([
           'presensi_mengajar' => $posts
       ], 200);
    }
    public function getPreMengajarID($id)
      {
          $posts = DB::table('presensi_mengajar')->where('id_presensi_mengajar',$id)->get();
          
       return response()->json([
           'presensi_mengajar' => $posts
       ], 200);
      }
  
      public function InsertPreMengajar(Request $request)
      {
          DB::table('presensi_mengajar')->insert([
              'id_jadwal_guru'=>$request->input('id_jadwal_guru'),
              'tanggal'=>$request->input('tanggal'),
              'jam_mulai'=>$request->input('jam_mulai'),
              'jam_selesai'=>$request->input('jam_selesai'),
              'metode'=>$request->input('metode')
          ]);
          
       return response()->json([
           "Result" => [
               "ResultCode"=>0,
               "ResultMessage"=>"Success Data Masuk ke Database"
           ]
       ], 200);
      }
  
      public function UpdatePreMengajar(Request $request)
      {
          DB::table('presensi_mengajar')->where('id_presensi_mengajar',$request->input('id_presensi_mengajar'))->update([
            'id_jadwal_guru'=>$request->input('id_jadwal_guru'),
            'tanggal'=>$request->input('tanggal'),
            'jam_mulai'=>$request->input('jam_mulai'),
            'jam_selesai'=>$request->input('jam_selesai'),
            'metode'=>$request->input('metode')
          ]);
      }
      
      public function DeletePreMengajar(Request $request)
      {
          DB::table('presensi_mengajar')->where('id_presensi_mengajar',$request->input('id_presensi_mengajar'))->delete();
          
       return response()->json([
           "Result" => [
               "ResultCode"=>0,
               "ResultMessage"=>"Success Data Hapus dari Database"
           ]
       ], 200);
      }
}
