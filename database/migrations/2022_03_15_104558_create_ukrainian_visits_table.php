<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ukrainian_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ukrainian_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('ukrainian_id')->references('id')->on('ukrainians')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ukrainian_visits');
    }
};
