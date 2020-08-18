<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('donne');
            $table->string('montant');
            $table->string('reste');
            $table->date('datecr');
            $table->string('relicat');
            $table->unsignedbigInteger('vente_id');
            $table->foreign('vente_id')
            ->references('id')->on('ventes')
            ->onDelete('cascade');
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedbigInteger('mode_id');
            $table->foreign('mode_id')
            ->references('id')->on('modes')
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
        Schema::dropIfExists('reglements');
    }
}
