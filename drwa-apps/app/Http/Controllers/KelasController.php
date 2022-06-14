<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class KelasController extends Controller
{
    public function getKelasAll()
  {
     $posts = DB::table('kelas')->get();
        
     return response()->json([
         'kelas' => $posts
     ], 200);
  }
  public function getKelasID($id)
    {
        $posts = DB::table('kelas')->where('id_kelas',$id)->get();
        
     return response()->json([
         'kelas' => $posts
     ], 200);
    }

    public function InsertKelas(Request $request)
    {
        DB::table('kelas')->insert([
            'kelas'=>$request->input('kelas'),
            'jurusan'=>$request->input('jurusan'),
            'sub'=>$request->input('sub')
        ]);
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Masuk ke Database"
         ]
     ], 200);
    }

    public function UpdateKelas(Request $request)
    {
        DB::table('kelas')->where('id_kelas',$request->input('id_kelas'))->update([
            'kelas'=>$request->input('kelas'),
            'jurusan'=>$request->input('jurusan'),
            'sub'=>$request->input('sub')
        ]);
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Masuk ke Database"
         ]
     ], 200);
    }
    
    public function DeleteKelas(Request $request)
    {
        DB::table('kelas')->where('id_kelas',$request->input('id_kelas'))->delete();
        
     return response()->json([
         "Result" => [
             "ResultCode"=>0,
             "ResultMessage"=>"Success Data Hapus dari Database"
         ]
     ], 200);
    }

}

?>