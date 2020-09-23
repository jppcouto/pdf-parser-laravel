<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pdfFiles extends Model
{
    protected $table = 'pdf_files';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
        'ficheiro', 'criador','data','paginas','texto',
    ];

    public function get_pdfs() {
        return DB::select('select * from pdf_files');
    }

    public function add_pdf() {
        return DB::insert("INSERT INTO pdf_files VALUES (0,$ficheiro,'$texto')");
    }

}
