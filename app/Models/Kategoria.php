<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategoria extends Model
{
    protected $table = 'kategoria';

    // A tábla elsődleges kulcsa a szöveges "nev" mező
    protected $primaryKey = 'nev';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['nev', 'ar'];

    /** Egy kategóriába több pizza tartozik. */
    public function pizzak(): HasMany
    {
        return $this->hasMany(Pizza::class, 'kategorianev', 'nev');
    }
}
