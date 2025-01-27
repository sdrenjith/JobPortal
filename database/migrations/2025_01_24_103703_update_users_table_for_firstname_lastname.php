<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the 'name' column
            $table->dropColumn('name');
    
            // Add 'first_name' and 'last_name' columns
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the 'name' column back
            $table->string('name')->after('id');
    
            // Drop 'first_name' and 'last_name' columns
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
};
