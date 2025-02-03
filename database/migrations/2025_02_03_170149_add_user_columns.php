<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserColumns extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('english_level')->nullable();
            $table->string('arabic_level')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('color')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('english_level');
            $table->dropColumn('arabic_level');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('color');
        });
    }
}