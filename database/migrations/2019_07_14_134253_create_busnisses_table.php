<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusnissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busnisses', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->boolean('state')->default(1);
            $table->enum('type', ['lab', 'pharmacie','hospital'])->nullable();
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
        Schema::dropIfExists('busnisses');
    }
}
