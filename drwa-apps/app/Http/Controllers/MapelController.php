<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function getMapelAll()
  {
     $posts = DB::table('mapel')->get();
        
     return response()->json([
         'mapel' => $posts
     ], 200);
  }
  public function getMapelID($id)
    {
        $posts = DB::table('mapel')->where('id_mapel',$id)->get();
        
     return response()->json([
         'mapel' => $posts
     ], 200);
    }

    public function InsertMapel(Request $request)
    {
        DB::table('mapel')->insert([
            'nama_Mapel'=>$request->input('nama_Mapel'),
            'deskripsi'=>$request->input('deskripsi')
        ]);
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Masuk ke Database"
         ]
     ], 200);
    }

    public function UpdateMapel(Request $request)
    {
        DB::table('mapel')->where('id_mapel',$request->input('id_Mapel'))->update([
            'nama_Mapel'=>$request->input('nama_Mapel'),
            'deskripsi'=>$request->input('deskripsi')
        ]);
    }
    
    public function DeleteMapel(Request $request)
    {
        DB::table('mapel')->where('id_mapel',$request->input('id_Mapel'))->delete();
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Hapus dari Database"
         ]
     ], 200);
    }
}
