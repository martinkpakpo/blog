<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('total');
            $table->float('pu');
            $table->float('Qte');
            $table->float('taux');
            $table->string('totalR');
            $table->unsignedbigInteger('vente_id');
            $table->foreign('vente_id')
            ->references('id')->on('ventes')
            ->onDelete('cascade');


      $table->unsignedbigInteger('art_id');

      $table->foreign('art_id')
->references('id')->on('articles')
->onDelete('cascade');
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
        Schema::dropIfExists('details');
    }
}
