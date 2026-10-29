<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Uzenet extends Model
{
    protected $table = 'uzenetek';

    protected $fillable = ['user_id', 'nev', 'email', 'targy', 'uzenet'];

    /** A küldő felhasználó (ha bejelentkezve küldte). */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
