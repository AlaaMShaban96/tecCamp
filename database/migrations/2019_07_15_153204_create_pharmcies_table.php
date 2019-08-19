<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmcies', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('busnisses_id')->unsigned();
            $table->string('usernmae');
            $table->string('photo')->nullable();
            $table->string('descrbtion')->nullable();
            $table->tinyInteger('disericts_id');
            $table->integer('number');
            $table->time('opning_time');
            $table->time('closing_time');
            $table->string('lincese');
            $table->enum('day_week', ['Sat', 'Sun','Mon','Tue','Wed','Thu','Fri']);
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
        Schema::dropIfExists('pharmcies');
    }
}
