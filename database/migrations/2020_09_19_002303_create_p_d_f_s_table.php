<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_d_f_s', function (Blueprint $table) {
            $table->id();
            $table->string('ficheiro', 200);
            $table->string('criador', 100);
            $table->string('created_at', 100);
            $table->integer('pages', 10);
            $table->text('texto');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_d_f_s');
    }
}
