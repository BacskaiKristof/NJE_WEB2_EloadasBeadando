<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Pizzák: név (elsődleges kulcs), kategória, vegetáriánus-e.
     */
    public function up(): void
    {
        Schema::create('pizza', function (Blueprint $table) {
            $table->string('nev', 50)->primary();
            $table->string('kategorianev', 50)->nullable();
            $table->boolean('vegetarianus')->default(false);

            $table->foreign('kategorianev')
                ->references('nev')->on('kategoria')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pizza');
    }
};
