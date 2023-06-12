<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->restrictOnDelete();
        });
    }


    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropForeign('tests_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
};
