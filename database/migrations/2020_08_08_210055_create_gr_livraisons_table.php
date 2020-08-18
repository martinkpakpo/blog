<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('frs_id');
              $table->foreign('frs_id')
        ->references('id')->on('fournisseurs')
        ->onDelete('cascade');
        $table->string('ref');
        $table->date('datecr');
        $table->string('total');
        $table->unsignedbigInteger('receptionniste');
        $table->foreign('receptionniste')
  ->references('id')->on('users')
  ->onDelete('cascade');
        $table->string('livreur');

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
        Schema::dropIfExists('gr_livraisons');
    }
}
