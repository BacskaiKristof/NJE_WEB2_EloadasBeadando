<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Pizza kategóriák (apród, lovag, főnemes, király) és áraik.
     */
    public function up(): void
    {
        Schema::create('kategoria', function (Blueprint $table) {
            $table->string('nev', 50)->primary();
            $table->integer('ar');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoria');
    }
};
