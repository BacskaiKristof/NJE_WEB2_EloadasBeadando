<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Rendelések: azonosító, pizza neve, darabszám, felvétel és kiszállítás ideje.
     */
    public function up(): void
    {
        Schema::create('rendeles', function (Blueprint $table) {
            $table->id('az');
            $table->string('pizzanev', 50)->nullable();
            $table->integer('darab');
            $table->dateTime('felvetel');
            $table->dateTime('kiszallitas')->nullable();

            $table->foreign('pizzanev')
                ->references('nev')->on('pizza')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rendeles');
    }
};
