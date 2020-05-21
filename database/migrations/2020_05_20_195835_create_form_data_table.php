<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->integer('milage')->nullable();
            $table->dateTime('buy_at')->nullable();
            $table->string('color')->nullable();
            $table->string('drivetrain')->nullable();
            $table->text('picture_url')->nullable();
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
        Schema::dropIfExists('form_data');
    }
}
