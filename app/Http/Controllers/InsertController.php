<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertController extends Controller
{
    
    public function insertform() {
        return view('upload');
    }
      
     public function insert(Request $request) {
        $ficheiro = $request->input('ficheiro');
        $criador = $request->input('criador');
        $created_at = $request->input('data');
        $paginas = $request->input('paginas');
        DB::insert('insert into p_d_f_s (ficheiro) values(?)',[$ficheiro]);
        DB::insert('insert into p_d_f_s (criador) values(?)',[$criador]);
        DB::insert('insert into p_d_f_s (data) values(?)',[$created_at]);
        DB::insert('insert into p_d_f_s (paginas) values(?)',[$paginas]);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
