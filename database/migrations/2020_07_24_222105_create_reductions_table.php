<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->date('dateD');
            $table->date('dateF');
            $table->float('min');
            $table->float('max');
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
        Schema::dropIfExists('reductions');
    }
}
