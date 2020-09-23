<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertController extends Controller
{
    
    public function insertform() {
        return view('upload');
    }
      
     public function add(Request $request) {
        $ficheiro = $request->input('ficheiro');
        $criador = $request->input('criador');
        $data = $request->input('data');
        $paginas = $request->input('paginas');
        $texto = $request->input('texto');
        DB::insert('insert into pdf_files (ficheiro, criador, data, paginas, texto) values(?,?,?,?,?)',[$ficheiro,$criador,$data,$paginas,$texto]);
        echo "Os registos foram adicionados com sucesso!.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
