<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PDF extends Model
{
    protected $table = 'p_d_f_s';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
        'ficheiro', 'texto',
    ];

    public function get_pdfs() {
        return DB::select('select * from p_d_f_s');
    }

    public function add_pdf() {
        return DB::insert("INSERT INTO p_d_f_s VALUES (0,$ficheiro,'texto')");
    }

}
