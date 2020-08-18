<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redpros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->date('dateD');
            $table->date('dateF');
            $table->unsignedbigInteger('art_id');
            $table->foreign('art_id')
            ->references('id')->on('articles')
            ->onDelete('cascade');
            $table->Float('taux');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redpros');
    }
}
