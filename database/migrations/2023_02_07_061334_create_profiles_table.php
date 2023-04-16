<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('name');
            $table->bigInteger('mobile');
            $table->string('email')->unique();
            $table->string('social');
            $table->text('information');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
