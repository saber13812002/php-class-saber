<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();

            $table->string('username');
            $table->string('namefa');
            $table->string('familynamefa');
            $table->string('firstnamefa');
            $table->string('nameunicode');
            $table->string('telegram');
            $table->string('instagram');
            $table->integer('priority');
            $table->integer('active');
            $table->integer('height');

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
        Schema::dropIfExists('players');
    }
}
