<?php

namespace Database\Seeders;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;
use Illuminate\Database\Seeder;

/**
 * A pizzeria adatbázis (db.sql) adatai: kategoria, pizza, rendeles táblák.
 * Eloquent modelleken keresztül töltjük fel (ORM).
 */
class PizzeriaSeeder extends Seeder
{
    public function run(): void
    {
        // [nev, ar]
        $kategoriak = [
            ['apród', 850],
            ['főnemes', 950],
            ['király', 1250],
            ['lovag', 1150],
        ];
        foreach ($kategoriak as [$nev, $ar]) {
            Kategoria::create(['nev' => $nev, 'ar' => $ar]);
        }

        // [nev, kategorianev, vegetarianus]
        $pizzak = [
            ['Áfonyás', 'király', 0],
            ['Babos', 'lovag', 0],
            ['Barbecue chicken', 'lovag', 0],
            ['Betyáros', 'király', 0],
            ['Caribi', 'apród', 0],
            ['Country', 'király', 0],
            ['Csabesz', 'király', 0],
            ['Csupa sajt', 'lovag', 1],
            ['Erdő kapitánya', 'apród', 0],
            ['Erős János', 'lovag', 0],
            ['Excellent', 'király', 0],
            ['Főnök kedvence', 'lovag', 0],
            ['Francia', 'főnemes', 0],
            ['Frankfurti', 'király', 0],
            ['Füstös', 'lovag', 0],
            ['Gino', 'király', 0],
            ['Gombás', 'apród', 1],
            ['Góré', 'lovag', 0],
            ['Görög', 'király', 0],
            ['Gyros pizza', 'király', 0],
            ['HamAndEggs', 'lovag', 0],
            ['Hamm', 'lovag', 0],
            ['Hawaii', 'főnemes', 0],
            ['Hellas', 'király', 0],
            ['Hercegnő', 'király', 0],
            ['Ilike', 'lovag', 0],
            ['Ínyenc', 'lovag', 0],
            ['Jázmin álma', 'lovag', 0],
            ['Jobbágy', 'király', 0],
            ['Juhtúrós', 'lovag', 0],
            ['Kagylós', 'király', 0],
            ['Kétszínű', 'lovag', 0],
            ['Kiadós', 'király', 0],
            ['Király pizza', 'király', 0],
            ['Kívánság', 'lovag', 1],
            ['Kolbászos', 'apród', 0],
            ['Lagúna', 'király', 1],
            ['Lecsó', 'király', 0],
            ['Maffiózó', 'lovag', 0],
            ['Magvas', 'király', 1],
            ['Magyaros', 'lovag', 0],
            ['Máj Fair Lady', 'király', 0],
            ['Mamma fia', 'király', 0],
            ['Mexikói', 'főnemes', 0],
            ['Mixi', 'főnemes', 1],
            ['Nikó', 'király', 0],
            ['Nordic', 'király', 0],
            ['Nyuszó-Muszó', 'király', 0],
            ['Pacalos', 'lovag', 0],
            ['Pástétomos', 'király', 0],
            ['Pásztor', 'lovag', 0],
            ['Pipis', 'lovag', 0],
            ['Popey', 'király', 0],
            ['Quattro', 'király', 0],
            ['Ráki', 'király', 0],
            ['Rettenetes magyar', 'lovag', 0],
            ['Röfi', 'király', 0],
            ['Sajtos', 'apród', 1],
            ['So-ku', 'apród', 0],
            ['Son-go-ku', 'főnemes', 1],
            ['Sonkás', 'apród', 0],
            ['Spanyol', 'király', 0],
            ['Spencer', 'főnemes', 0],
            ['Szalámis', 'apród', 0],
            ['Szardíniás', 'lovag', 0],
            ['Szerzetes', 'király', 0],
            ['Szőke kapitány', 'király', 0],
            ['Tenger gyümölcsei', 'király', 0],
            ['Tonhalas', 'lovag', 0],
            ['Törperős', 'lovag', 0],
            ['Tündi kedvence', 'király', 0],
            ['Tüzes halál', 'király', 0],
            ['Vega', 'lovag', 1],
            ['Zöldike', 'főnemes', 1],
        ];
        foreach ($pizzak as [$nev, $kategoria, $vega]) {
            Pizza::create(['nev' => $nev, 'kategorianev' => $kategoria, 'vegetarianus' => (bool) $vega]);
        }

        // [pizzanev, darab, felvetel, kiszallitas]
        $rendelesek = [
            ['Popey', 2, '2005-11-12 11:21:00', '2005-11-12 12:11:00'],
            ['Kagylós', 1, '2005-11-12 11:41:00', '2005-11-12 12:26:00'],
            ['Barbecue chicken', 1, '2005-11-12 12:38:00', '2005-11-12 13:02:00'],
            ['Röfi', 1, '2005-11-12 13:18:00', '2005-11-12 13:58:00'],
            ['Tündi kedvence', 1, '2005-11-12 13:44:00', '2005-11-12 16:53:00'],
            ['Hercegnő', 2, '2005-11-12 14:10:00', '2005-11-12 14:57:00'],
            ['Mixi', 1, '2005-11-12 14:20:00', '2005-11-12 16:25:00'],
            ['Ráki', 3, '2005-11-12 14:51:00', '2005-11-12 17:06:00'],
            ['Szőke kapitány', 1, '2005-11-12 15:13:00', '2005-11-12 17:12:00'],
            ['Kagylós', 1, '2005-11-12 15:42:00', '2005-11-12 16:48:00'],
            ['Sonkás', 1, '2005-11-12 16:31:00', '2005-11-12 16:53:00'],
            ['Excellent', 1, '2005-11-12 17:01:00', '2005-11-12 19:41:00'],
            ['Máj Fair Lady', 2, '2005-11-12 17:58:00', '2005-11-12 20:39:00'],
            ['Frankfurti', 1, '2005-11-12 18:48:00', '2005-11-12 21:45:00'],
            ['Pástétomos', 1, '2005-11-12 19:15:00', '2005-11-12 21:04:00'],
            ['Máj Fair Lady', 1, '2005-11-12 19:45:00', '2005-11-12 21:46:00'],
            ['Tüzes halál', 2, '2005-11-12 19:54:00', '2005-11-12 22:48:00'],
            ['Hellas', 1, '2005-11-12 20:25:00', '2005-11-12 23:15:00'],
            ['Lecsó', 1, '2005-11-12 21:21:00', '2005-11-13 00:31:00'],
            ['Mamma fia', 1, '2005-11-12 21:41:00', '2005-11-13 00:06:00'],
            ['Country', 3, '2005-11-12 22:18:00', '2005-11-13 00:01:00'],
            ['HamAndEggs', 2, '2005-12-15 04:17:00', '2005-12-15 06:57:00'],
            ['Főnök kedvence', 1, '2005-12-15 04:36:00', '2005-12-15 06:32:00'],
            ['Kagylós', 1, '2005-12-15 04:39:00', '2005-12-15 05:45:00'],
            ['Francia', 2, '2005-12-15 05:03:00', '2005-12-15 07:45:00'],
            ['HamAndEggs', 1, '2006-04-27 06:05:00', '2006-04-27 06:30:00'],
            ['Csabesz', 1, '2006-04-27 06:49:00', '2006-04-27 08:16:00'],
            ['Gyros pizza', 1, '2006-04-27 07:31:00', '2006-04-27 08:23:00'],
            ['Caribi', 3, '2006-04-27 08:19:00', '2006-04-27 09:05:00'],
            ['Szalámis', 1, '2006-04-27 08:22:00', '2006-04-27 10:52:00'],
            ['Áfonyás', 1, '2006-04-27 08:44:00', '2006-04-27 09:54:00'],
            ['Mamma fia', 1, '2006-04-27 09:04:00', '2006-04-27 11:46:00'],
            ['Pacalos', 1, '2006-04-27 09:18:00', '2006-04-27 12:05:00'],
            ['Gino', 1, '2006-04-27 09:52:00', '2006-04-27 10:30:00'],
            ['Ínyenc', 1, '2006-04-27 10:04:00', '2006-04-27 12:28:00'],
            ['Góré', 1, '2006-04-27 10:08:00', '2006-04-27 12:50:00'],
            ['Jobbágy', 1, '2006-04-27 10:28:00', '2006-04-27 11:24:00'],
            ['Spencer', 1, '2006-12-30 21:27:00', '2006-12-30 22:09:00'],
            ['Máj Fair Lady', 3, '2006-12-30 21:27:00', '2006-12-30 22:23:00'],
            ['Magvas', 3, '2006-12-30 21:59:00', '2006-12-30 22:56:00'],
            ['Frankfurti', 1, '2006-12-30 22:29:00', '2006-12-30 23:56:00'],
            ['Szerzetes', 1, '2006-12-30 22:52:00', '2006-12-31 00:04:00'],
            ['Csabesz', 1, '2006-12-30 23:16:00', '2006-12-31 01:33:00'],
            ['Tüzes halál', 1, '2006-12-30 23:42:00', '2006-12-31 00:16:00'],
            ['Csupa sajt', 1, '2006-12-31 00:28:00', '2006-12-31 03:38:00'],
            ['Kolbászos', 1, '2006-12-31 00:29:00', '2006-12-31 00:59:00'],
            ['Gino', 1, '2006-12-31 01:15:00', '2006-12-31 02:24:00'],
            ['Sonkás', 1, '2006-12-31 01:43:00', '2006-12-31 02:12:00'],
            ['Quattro', 1, '2006-12-31 02:03:00', '2006-12-31 04:11:00'],
            ['Country', 1, '2006-12-31 02:50:00', '2006-12-31 03:43:00'],
            ['Gombás', 2, '2006-12-31 03:40:00', '2006-12-31 05:36:00'],
            ['Quattro', 3, '2006-12-31 04:18:00', '2006-12-31 06:07:00'],
            ['Babos', 3, '2006-12-31 05:11:00', '2006-12-31 06:28:00'],
            ['Hellas', 1, '2006-12-31 05:42:00', '2006-12-31 07:04:00'],
            ['Nordic', 1, '2006-12-31 05:42:00', '2006-12-31 07:16:00'],
            ['Francia', 1, '2006-12-31 06:36:00', '2006-12-31 07:59:00'],
            ['Kétszínű', 1, '2006-12-31 06:38:00', '2006-12-31 09:29:00'],
            ['Csabesz', 1, '2006-12-31 07:12:00', '2006-12-31 10:13:00'],
            ['Erős János', 1, '2006-12-31 07:50:00', '2006-12-31 08:23:00'],
            ['Kolbászos', 1, '2006-12-31 08:35:00', '2006-12-31 11:36:00'],
        ];
        foreach ($rendelesek as [$pizza, $darab, $felvetel, $kiszallitas]) {
            Rendeles::create([
                'pizzanev' => $pizza,
                'darab' => $darab,
                'felvetel' => $felvetel,
                'kiszallitas' => $kiszallitas,
            ]);
        }
    }
}
