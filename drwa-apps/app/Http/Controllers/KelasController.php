<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class KelasController extends Controller
{
    public function index()
  {
     $posts = DB::table('kelas')->get();
        
     return response()->json([
         'kelas' => $posts
     ], 200);
  }
  public function getID($id)
    {
        $posts = DB::table('kelas')->where('id_kelas',$id)->get();
        
     return response()->json([
         'kelas' => $posts
     ], 200);
    }


}

?>