<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rendeles extends Model
{
    protected $table = 'rendeles';

    protected $primaryKey = 'az';

    public $timestamps = false;

    protected $fillable = ['pizzanev', 'darab', 'felvetel', 'kiszallitas'];

    protected $casts = [
        'felvetel' => 'datetime',
        'kiszallitas' => 'datetime',
    ];

    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class, 'pizzanev', 'nev');
    }

    /** Kiszállítási idő percben (felvételtől a kiszállításig). */
    public function getSzallitasiIdoAttribute(): ?int
    {
        if (! $this->felvetel || ! $this->kiszallitas) {
            return null;
        }

        return (int) $this->felvetel->diffInMinutes($this->kiszallitas);
    }
}
