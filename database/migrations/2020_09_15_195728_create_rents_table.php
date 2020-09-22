<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->integer('user_id_to');
            $table->integer('user_id_from');
            $table->boolean('sent')->nullable();
            $table->boolean('rejected')->default(0)->nullable();
            $table->boolean('accepted')->default(0)->nullable();
            $table->date('from');
            $table->date('to');
            $table->timestamps();

            $table->foreign('article_id')
            ->references('id')
            ->on('articles')
            ->onDelete('cascade');

            $table->foreign('user_id_from')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
