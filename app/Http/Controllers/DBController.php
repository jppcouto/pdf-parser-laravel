<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDF;

class DBController extends Controller
{
    public function db() {
        /*
        foreach ($utilizadores as $u) {
            echo '<p>'.$u->id.'</p>';
            echo '<p>'.$u->nome.'</p>';
        }
        */    
        $pdf = new PDF();
        $resultados = $pdf->get_pdfs();
        dd($resultados);
    }
}
