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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->string('IdSeg');
            $table->string('idEst');
            $table->integer('traAct');
            $table->integer('ofiAct');
            $table->integer('satEst'); //1,2,3
            $table->date('fecSeg'); 
            $table->integer('estSeg'); //0,1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
