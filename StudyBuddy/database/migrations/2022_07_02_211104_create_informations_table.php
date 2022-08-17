<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 

            $table->string('g_name');
            $table->string('g_phone');
            $table->string('phone');
            $table->string('location');
            $table->string('gender');

            $table->string('s_institute');
            $table->string('s_group');
            $table->string('s_result');
            $table->string('s_year');
            $table->string('s_curriculum');

            $table->string('h_institute');
            $table->string('h_group');
            $table->string('h_result');
            $table->string('h_year');
            $table->string('h_curriculum');

            $table->string('u_institute');
            $table->string('u_major');
            $table->string('u_sem');
            $table->string('u_result');
            $table->string('u_year');
            $table->string('u_type');
            
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
        Schema::dropIfExists('informations');
    }
};
