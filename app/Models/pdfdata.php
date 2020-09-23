<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pdfdata extends Model
{
    protected $table = 'pdfdatas';
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
        return DB::select('select * from pdfdatas');
    }

    public function add_pdf() {
        return DB::insert("INSERT INTO pdfdatas VALUES (0,$ficheiro,'$texto')");
    }

}
