<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->jsonb('monday')->nullable();
            $table->jsonb('tuesday')->nullable();
            $table->jsonb('wednesday')->nullable();
            $table->jsonb('thursday')->nullable();
            $table->jsonb('friday')->nullable();
            $table->jsonb('saturday')->nullable();
            $table->jsonb('sunday')->nullable();
            $table->boolean('is_published')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('weeks');
    }
}
