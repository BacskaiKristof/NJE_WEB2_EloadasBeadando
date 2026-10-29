<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pizza extends Model
{
    protected $table = 'pizza';

    protected $primaryKey = 'nev';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['nev', 'kategorianev', 'vegetarianus'];

    protected $casts = [
        'vegetarianus' => 'boolean',
    ];

    /** A pizza kategóriája (ebből jön az ár). */
    public function kategoria(): BelongsTo
    {
        return $this->belongsTo(Kategoria::class, 'kategorianev', 'nev');
    }

    /** A pizzára leadott rendelések. */
    public function rendelesek(): HasMany
    {
        return $this->hasMany(Rendeles::class, 'pizzanev', 'nev');
    }
}
