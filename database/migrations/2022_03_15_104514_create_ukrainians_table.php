<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ukrainians', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birth');
            $table->string('telephone')->nullable();
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('work')->nullable();
            $table->string('stay')->nullable();
            $table->string('children')->nullable();
            $table->text('remarks')->nullable();
            $table->text('card_id')->unique()->nullable();
            $table->text('rfid')->unique()->nullable();
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ukrainians');
    }
};
