<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * A Kapcsolat űrlapon elküldött üzenetek.
     * created_at = a küldés ideje.
     */
    public function up(): void
    {
        Schema::create('uzenetek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nev', 100);
            $table->string('email', 150);
            $table->string('targy', 150);
            $table->text('uzenet');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uzenetek');
    }
};
