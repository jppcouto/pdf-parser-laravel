<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pdfdata;
use App\Models\pdfFiles;

class DBController extends Controller
{
    public function db() {
        /*
        foreach ($utilizadores as $u) {
            echo '<p>'.$u->id.'</p>';
            echo '<p>'.$u->nome.'</p>';
        }
        */    
        $pdf = new pdfFiles();
        $resultados = $pdf->get_pdfs();
        dd($resultados);
    }
}
