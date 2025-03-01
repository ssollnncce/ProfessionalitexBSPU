<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //Remove the columns * Удаление столбцов - 

            $table->dropColumn('name');

            //Add the columns * Добавление столбцов - 

            $table->string('first_name', 50)->after('id');
            $table->string('last_name', 50)->after('first_name',);
            $table->string('patronomyc', 50)->after('last_name');
            $table->string('phone', 15)->after('email_verified_at')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            //Remove the columns * Удаление столбцов - 
    
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('patronomyc');
            $table->dropColumn('phone');
    
            //Add the columns * Добавление столбцов - 
    
            $table->string('name');

        });
    }
};
