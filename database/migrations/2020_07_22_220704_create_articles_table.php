<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('cat_id');
            $table->foreign('cat_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->timestamps();
            $table->string('libart');
            $table->float('QteMin');
            $table->float('Pu');
            $table->float('entree');
            $table->float('sortie');
            $table->float('QteStock');
            $table->float('reductible');
            $table->float('Qtered');
            $table->float('montantmax');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
