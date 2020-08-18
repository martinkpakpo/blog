<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
        $table->unsignedbigInteger('Gr_id');
        $table->foreign('Gr_id')
  ->references('id')->on('gr_livraisons')
  ->onDelete('cascade');
              $table->date('dateCr');
              $table->float('Qte');
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
        Schema::dropIfExists('livraisons');
    }
}
