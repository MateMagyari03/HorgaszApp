<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;
use App\Models\Contest;

class ContestsSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'contests';

    private static $contestsData = [
            [
                'nev' => 'Tavaszi Pontyverseny 2025',
                'helyszin' => 'Tisza-tó, Tiszafüred',
                'datum_kezdete' => '2025-05-15',
                'datum_vege' => '2025-05-17',
                'dij' => 15000,
                'max_letszam' => 50,
                'leiras' => 'Háromnapos tavaszi pontyverseny profi és amatőr horgászoknak. A verseny célja a legnagyobb ponty kifogása. A verseny során szigorú szabályok vonatkoznak, csak ponty fogható. A győztes díjai mellett értékes ajándékokat is kap. A verseny során szakmai segítség, felszerelés és élelmiszer biztosított. A részvétel előzetes nevezéssel lehetséges. A verseny helyszíne: Tisza-tó, Tiszafüred partszakasz. A verseny szervezése professzionális, biztosítva van az igazságos versenyzés feltétele.',
            ],
            [
                'nev' => 'Nyári Horgász Kupa',
                'helyszin' => 'Velencei-tó, Velence',
                'datum_kezdete' => '2025-06-22',
                'datum_vege' => '2025-06-23',
                'dij' => 12000,
                'max_letszam' => 40,
                'leiras' => 'Kétnapos családias verseny kezdőknek is. A verseny célja a legtöbb hal kifogása. Minden halfaj elfogadott, a legtöbb hal súlyának összege dönt. A verseny során családias hangulat, szakmai segítség és felszerelés biztosított. A győztesek értékes díjakat és ajándékokat kapnak. A verseny helyszíne: Velencei-tó, Velence partszakasz. A részvétel előzetes nevezéssel lehetséges. A verseny szervezése barátságos, ideális kezdő horgászoknak is.',
            ],
            [
                'nev' => 'Balaton Harcsa Kupa',
                'helyszin' => 'Balaton, Siófok',
                'datum_kezdete' => '2025-07-10',
                'datum_vege' => '2025-07-12',
                'dij' => 20000,
                'max_letszam' => 30,
                'leiras' => 'Háromnapos harcsa szakági verseny tapasztalt horgászoknak. A verseny célja a legnagyobb harcsa kifogása. A verseny során csak harcsa fogható, szigorú szabályok vonatkoznak. Éjszakai horgászat is része a versenynek. A győztes nagy pénzdíjat és értékes ajándékokat kap. A verseny helyszíne: Balaton, Siófok partszakasz. A verseny szervezése professzionális, biztosítva van az igazságos versenyzés feltétele. A részvétel előzetes nevezéssel lehetséges. A verseny során szakmai segítség és felszerelés biztosított.',
            ],
            [
                'nev' => 'Őszi Bajnokság',
                'helyszin' => 'Péda-tó, Bács-Kiskun megye',
                'datum_kezdete' => '2025-09-05',
                'datum_vege' => '2025-09-07',
                'dij' => 18000,
                'max_letszam' => 45,
                'leiras' => 'Éves bajnokság záró fordulója. A verseny célja az év legjobb horgászainak kiválasztása. Minden halfaj elfogadott, a legnagyobb hal súlya és a legtöbb hal összsúlya dönt. A verseny során professzionális szervezés, szakmai segítség és felszerelés biztosított. A győztesek értékes díjakat, trófeákat és ajándékokat kapnak. A verseny helyszíne: Péda-tó, Bács-Kiskun megye. A részvétel előzetes nevezéssel lehetséges. A verseny szervezése kiváló, ideális profi horgászoknak.',
            ],
            [
                'nev' => 'Téli Süllőverseny',
                'helyszin' => 'Tisza-tó, Tiszafüred',
                'datum_kezdete' => '2025-12-15',
                'datum_vege' => '2025-12-16',
                'dij' => 10000,
                'max_letszam' => 35,
                'leiras' => 'Kétnapos téli süllőverseny bátor horgászoknak. A verseny célja a legnagyobb süllő kifogása téli körülmények között. A verseny során csak süllő fogható, szigorú szabályok vonatkoznak. A verseny során meleg italok és ételek biztosítottak. A győztes értékes díjakat kap. A verseny helyszíne: Tisza-tó, Tiszafüred partszakasz. A részvétel előzetes nevezéssel lehetséges. A verseny szervezése professzionális, biztosítva van a résztvevők kényelme.',
            ],
            [
                'nev' => 'Nyitó Verseny 2025',
                'helyszin' => 'Fehér-tó, Szeged',
                'datum_kezdete' => '2025-04-10',
                'datum_vege' => '2025-04-12',
                'dij' => 15000,
                'max_letszam' => 50,
                'leiras' => 'Háromnapos nyitó verseny az évad kezdetén. A verseny célja a szezon megnyitása és a horgász közösség összegyűjtése. Minden halfaj elfogadott, a legtöbb hal összsúlya dönt. A verseny során barátságos hangulat, szakmai segítség és felszerelés biztosított. A győztesek értékes díjakat és ajándékokat kapnak. A verseny helyszíne: Fehér-tó, Szeged. A részvétel előzetes nevezéssel lehetséges. A verseny szervezése kiváló, ideális minden horgásznak.',
            ],
        ];



    public function run(): void
    {
        $contestModels = [];
        foreach (self::$contestsData as $contest) {
            $contestModels[] = Contest::create($contest);
        }  
    }
}
