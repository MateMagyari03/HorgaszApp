<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;
use App\Models\Species;
use App\Models\Ban;
use Carbon\Carbon;


class BansSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'bans';

    private static $bansData = [];
    private static $banMonths = [
      
        'Ponty' => ['start' => 5, 'end' => 5, 'days' => 30],
        'Harcsa' => ['start' => 5, 'end' => 6, 'days' => 45],
        'Amur' => ['start' => 7, 'end' => 7, 'days' => 14],
        'Keszeg' => ['start' => 9, 'end' => 9, 'days' => 10],
        'Busa' => ['start' => 8, 'end' => 8, 'days' => 10],
        'Csuka' => ['start' => 2, 'end' => 3, 'days' => 59],
        'Süllő' => ['start' => 3, 'end' => 4, 'days' => 61],
        'Márna' => ['start' => 4, 'end' => 5, 'days' => 47],
        'Balin' => ['start' => 3, 'end' => 4, 'days' => 61],
        'Tok' => ['start' => 10, 'end' => 11, 'days' => 30],
        'Pisztráng' => ['start' => 10, 'end' => 12, 'days' => 92],
        'Fogas' => ['start' => 3, 'end' => 4, 'days' => 61],

    ];

    public function run(): void
    {
        $speciesModels = Species::all();
        foreach ($speciesModels as $species) {
            if (isset(self::$banMonths[$species->nev])) {
                $ban = self::$banMonths[$species->nev];
                self::$bansData[] = [
                    'species_id' => $species->id,
                    'kezdete' => Carbon::create(2025, $ban['start'], 1),
                    'vege' => Carbon::create(2025, $ban['end'], $ban['days']),
                    'megjegyzes' => 'Országos tilalmi idő',
                ];
            }
        }

        foreach (self::$bansData as $ban) {
            Ban::create($ban);
        }  
    }
}
