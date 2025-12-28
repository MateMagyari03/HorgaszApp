<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;
use App\Models\User;
use Carbon\Carbon;
use App\Models\CatchRecord;
use App\Models\Species;
use App\Models\Water;
use App\Models\Contest;
use App\Models\Registration;



class fCatchSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'catch_records';

    private static $catchDescriptions = [
            'Reggeli fogás, kiváló időjárás',
            'Éjszakai horgászat, sikeres fogás',
            'Délutáni horgászat, kedvező körülmények',
            'Kora reggeli fogás, csendes környezet',
            'Nappali horgászat, jó időjárás',
            'Esti horgászat, nyugodt víz',
            'Rekord fogás! Fantasztikus élmény',
            'Kiváló csalival fogtam',
            'Váratlanul nagy hal, izgalmas harc',
            'Családos horgászat, gyerekekkel',
            'Barátokkal együtt, szuper nap',
            'Egyedül horgásztam, békés hangulat',
            'Versenyhelyszínen fogtam',
            'Új helyszín, első alkalommal',
            'Kedvenc helyszínem, mindig sikeres',
        ];




    public function run(): void
    {
        $catchDates = [];
        for ($i = 0; $i < 180; $i++) {
            $catchDates[] = Carbon::now()->subDays(rand(1, 180))->format('Y-m-d');
        }
        $users = User::all();
        $speciesModels = Species::all();
        $waterModels = Water::all();   
        $contestModels = Contest::all();


        foreach ($users as $user) {
            $catchCount = rand(8, 15);
            for ($i = 0; $i < $catchCount; $i++) {
                $species = $speciesModels->random();
                $water   = $waterModels->random();

                $weightRanges = [
                    'Ponty' => [2.0, 12.0],
                    'Harcsa' => [3.0, 25.0],
                    'Amur' => [2.5, 15.0],
                    'Keszeg' => [0.3, 2.5],
                    'Busa' => [0.2, 2.0],
                    'Csuka' => [1.5, 8.0],
                    'Süllő' => [0.8, 5.0],
                    'Márna' => [0.8, 4.0],
                    'Balin' => [1.0, 5.0],
                    'Tok' => [0.3, 2.0],
                    'Pisztráng' => [0.5, 3.0],
                    'Fogas' => [0.5, 3.5],
                ];
                
                $speciesName = $species->nev;
                $minWeight = $weightRanges[$speciesName][0] ?? 0.5;
                $maxWeight = $weightRanges[$speciesName][1] ?? 5.0;
                
                $suly = round(rand($minWeight * 10, $maxWeight * 10) / 10, 1);
                $hossz = round($suly * 15 + rand(-5, 10), 0);
                
                $hasPhoto = rand(0, 10) < 3;
                $foto = $hasPhoto ? 'fogások/' . strtolower(str_replace(' ', '-', $speciesName)) . '-' . rand(1, 5) . '.jpg' : null;
                
                CatchRecord::create([
                    'user_id' => $user->id,
                    'species_id' => $species->id,
                    'water_id' => $water->id,
                    'datum' => $catchDates[array_rand($catchDates)],
                    'suly' => $suly,
                    'hossz' => max(20, $hossz),
                    'megjegyzes' => rand(0, 3) === 0 ? null : self::$catchDescriptions[array_rand(self::$catchDescriptions)],
                    'foto' => $foto,
                ]);
            }
        }

        foreach ($users as $user) {
            $registrationCount = rand(1, 3);
             $registrationCount = rand(1, 3);

            if ($contestModels->isEmpty()) {
                continue;
            }

            $n = min($registrationCount, $contestModels->count());
            $selected = $contestModels->random($n);
            $selectedContests = $selected instanceof Contest ? collect([$selected]) : $selected;

            foreach ($selectedContests as $contest) {
                Registration::create([
                    'user_id' => $user->id,
                    'contest_id' => $contest->id,
                ]);
            }

        } 
    }
}
