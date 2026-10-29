<?php

// A projektben használt validációs szabályok magyar üzenetei.
// A többi üzenet az angol alapértelmezésből jön (APP_FALLBACK_LOCALE=en).
return [
    'required' => ':Attribute megadása kötelező.',
    'string' => ':Attribute szöveg kell legyen.',
    'email' => 'Érvényes e-mail címet adjon meg.',
    'lowercase' => ':Attribute csak kisbetűket tartalmazhat.',
    'unique' => 'Ez az :attribute már foglalt.',
    'confirmed' => ':Attribute megerősítése nem egyezik.',
    'exists' => 'A kiválasztott :attribute érvénytelen.',
    'max' => [
        'string' => ':Attribute legfeljebb :max karakter lehet.',
    ],
    'min' => [
        'string' => ':Attribute legalább :min karakter kell legyen.',
    ],
    'password' => [
        'letters' => 'A jelszónak tartalmaznia kell legalább egy betűt.',
        'mixed' => 'A jelszónak tartalmaznia kell kis- és nagybetűt is.',
        'numbers' => 'A jelszónak tartalmaznia kell legalább egy számot.',
        'symbols' => 'A jelszónak tartalmaznia kell legalább egy speciális karaktert.',
        'uncompromised' => 'A megadott jelszó szerepelt egy adatszivárgásban, válasszon másikat.',
    ],

    'attributes' => [
        'name' => 'név',
        'email' => 'e-mail cím',
        'password' => 'jelszó',
        'nev' => 'név',
        'targy' => 'tárgy',
        'uzenet' => 'üzenet',
        'kategorianev' => 'kategória',
    ],
];
