<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;
use App\Models\Species;

class SpeciesSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'species';

    private static $speciesData = [
            [
                'nev' => 'Ponty',
                'leiras' => 'A ponty (Cyprinus carpio) Magyarország egyik legkedveltebb halfaja. Közepes és nagy testű halfaj, amely akár 40-50 kg-ot is elérhet. Mindenevő hal, de főleg növényi részeket, rovarokat és kisebb halakat fogyaszt. A ponty jól alkalmazkodik a különböző vízkörnyezetekhez, előfordul folyókban és tavakban egyaránt. Kedvenc élőhelye a növényzettel teli, sekélyebb vizek. Színezete változó, általában aranyos-bronz színű háttal és világosabb hasoldallal.',
                'kep' => 'fogasok/ponty.jpg',
                'előhely' => 'Különböző vizekben megtalálható: folyókban, tavakban, holtágakban. Előnyben részesíti a növényzettel teli, sekélyebb, meleg vízű területeket. Magyarországon szinte minden vízben megtalálható.',
            ],
            [
                'nev' => 'Harcsa',
                'leiras' => 'A harcsa (Silurus glanis) Európa legnagyobb édesvízi ragadozó halfaja. Akár 2-3 méteres hosszúságot és 100 kg feletti súlyt is elérhet. A harcsa éjszakai ragadozó, amely elsősorban halakat, vízi állatokat és esetenként madarakat is zsákmányol. Teste hosszúkás, pikkelytelen, színezete sötétszürke vagy feketés, hasoldala világosabb. Jellegzetes bársonyos bőre és hosszú bajusza van. A harcsa általában a vizek mélyebb részeiben tartózkodik, üregekben, roncsokban rejtőzködik.',
                'kep' => 'fogasok/harcsa.jpg',
                'előhely' => 'Nagyobb folyókban és tavakban, ahol mély, rejtett helyeket talál. Kedvenc élőhelyei: a folyómeder mélyebb részei, hajóroncsok környéke, víz alatti üregek, gátak és hidak közelében.',
            ],
            [
                'nev' => 'Amur',
                'leiras' => 'Az amur vagy tiszai amur (Ctenopharyngodon idella) növényevő halfaj, amelyet eredetileg Ázsiából hoztak be. Átlagosan 5-15 kg közötti, de akár 30-40 kg-ot is elérhet. Az amur kizárólag növényi táplálékot fogyaszt, főleg vízinövényeket, algákat és nádakat. Ezért gyakran használják víztisztítási célokra. Teste hosszúkás, színezete sárgás-zöldes háttal és fehéres hasoldallal. Az amur aktív nappal, jól harap és erős horgászélményt nyújt.',
                'kep' => 'fogasok/amur.jpg',
                'előhely' => 'Főleg tározókban, tavakban és lassú folyású vizekben található meg. Előnyben részesíti a növényzettel bővelkedő, meleg vízű területeket. Magyarországon többnyire mesterségesen telepített állományokban él.',
            ],
            [
                'nev' => 'Keszeg',
                'leiras' => 'A keszeg (Abramis brama) közepes testű, társas halfaj, amely nagy csapatokban él. Átlagos mérete 30-50 cm, súlya 0.5-2 kg között mozog. A keszeg mindenevő, de főleg zooplanktont, algákat és kisebb rovarokat fogyaszt. Színezete ezüstös-halvány szürke, oldalvonala sötét. A keszeg kedvelt halfaj a sport- és étkezési horgászatban. Aktív nappal, jól harap különböző csalikra.',
                'kep' => 'fogasok/keszeg.jpg',
                'előhely' => 'Folyókban, tavakban, holtágakban megtalálható. Előnyben részesíti a sekélyebb, meleg vízű területeket, ahol bőséges táplálékforrás található. Általában a víztestek nyugodtabb részeiben él.',
            ],
            [
                'nev' => 'Busa',
                'leiras' => 'A busa (Abramis bjoerkna) a keszeghez hasonló, de kisebb testű halfaj. Átlagosan 20-35 cm hosszú és 0.3-1 kg súlyú. Színezete világosabb, mint a keszegé, és magasabb teste van. A busa is társas halfaj, nagy csapatokban él. Tápláléka hasonló a keszegéhez: zooplanktont, algákat és apró rovarokat fogyaszt. Könnyen megfogható, aktív halfaj.',
                'kep' => 'fogasok/busa.jpg',
                'előhely' => 'Folyókban és tavakban, főleg a sekélyebb, növényzettel teli területeken. Előnyben részesíti a meleg vízű, nyugodt vizeket.',
            ],
            [
                'nev' => 'Csuka',
                'leiras' => 'A csuka (Esox lucius) egyik legkedveltebb ragadozó halfaj Magyarországon. Átlagos mérete 50-80 cm, súlya 2-5 kg, de akár 1.5 méteres hosszúságot és 20 kg feletti súlyt is elérhet. A csuka ragadozó, elsősorban halakat és vízi állatokat zsákmányol. Teste hosszúkás, pikkelyes, színezete változó: zöldes-sárgás háttal és világos foltokkal. A csuka rejtőzködő ragadozó, amely növényzetben, roncsokban várja áldozatait. Nagy horgászélményt nyújt, erős harcot vív.',
                'kep' => 'fogasok/csuka.jpg',
                'előhely' => 'Folyókban, tavakban, holtágakban, ahol növényzet vagy rejtett helyek találhatók. Előnyben részesíti a sekélyebb, növényzettel teli területeket, ahol könnyen rejtőzhet.',
            ],
            [
                'nev' => 'Süllő',
                'leiras' => 'A süllő (Sander lucioperca) értékes ragadozó halfaj, amely általában 40-60 cm hosszú és 1-3 kg súlyú, de akár 90 cm-t és 10 kg-ot is elérhet. A süllő ragadozó, elsősorban halakat zsákmányol. Teste hosszúkás, színezete sötétszürke vagy zöldes háttal világosabb foltokkal. Jellegzetes, nagy szeme van. A süllő éjszakai aktív, de nappal is harap. Kiváló horgászélményt nyújt, finom húsa miatt kedvelt halfaj.',
                'kep' => 'fogasok/sullo.jpg',
                'előhely' => 'Folyókban, tavakban, főleg a mélyebb, kavicsos vagy homokos fenekű területeken. Előnyben részesíti a tiszta, oxigéndús vizeket.',
            ],
            [
                'nev' => 'Márna',
                'leiras' => 'A márna (Barbus barbus) folyóvízi halfaj, amely általában 30-50 cm hosszú és 1-3 kg súlyú, de akár 70 cm-t és 5-6 kg-ot is elérhet. A márna mindenevő, de főleg fenéklakó életmódot folytat. Tápláléka: férgek, rovarok, puhatestűek és növényi részek. Színezete bronz-barnás háttal és világosabb hasoldallal. A márna erős hal, jó horgászélményt nyújt. Védett halfaj, csak szezonban fogható.',
                'kep' => 'fogasok/marna.jpg',
                'előhely' => 'Folyókban, főleg a kavicsos, homokos fenekű, gyorsabb folyású szakaszokon. Előnyben részesíti a tiszta, oxigéndús vizeket.',
            ],
            [
                'nev' => 'Balin',
                'leiras' => 'A balin (Leuciscus aspius) ragadozó halfaj, amely általában 40-60 cm hosszú és 1-3 kg súlyú, de akár 80 cm-t és 6-7 kg-ot is elérhet. A balin ragadozó, elsősorban halakat zsákmányol, főleg kisebb halfajokat. Teste hosszúkás, színezete ezüstös-szürke háttal. A balin aktív nappal, jó horgászélményt nyújt. Védett halfaj, csak szezonban fogható.',
                'kep' => 'fogasok/balin.jpg',
                'előhely' => 'Folyókban, főleg a gyorsabb folyású, kavicsos fenekű területeken. Előnyben részesíti a tiszta, oxigéndús vizeket.',
            ],
            [
                'nev' => 'Tok',
                'leiras' => 'A tok (Leuciscus cephalus) mindenevő halfaj, amely általában 25-40 cm hosszú és 0.5-1.5 kg súlyú, de akár 50 cm-t és 2-3 kg-ot is elérhet. A tok mindenevő: rovarokat, férgeket, gyümölcsöket, kis halakat is fogyaszt. Színezete sötétszürke vagy olajzöld háttal és világosabb hasoldallal. A tok aktív, harapós halfaj, könnyen megfogható. Védett halfaj, csak szezonban fogható.',
                'kep' => 'fogasok/tok.jpg',
                'előhely' => 'Folyókban és patakokban, főleg a sekélyebb, kavicsos vagy homokos fenekű területeken. Előnyben részesíti a tiszta, oxigéndús vizeket.',
            ],
            [
                'nev' => 'Pisztráng',
                'leiras' => 'A pisztráng (Salmo trutta) értékes ragadozó halfaj, amely általában 30-50 cm hosszú és 1-2 kg súlyú, de akár 70 cm-t és 5 kg-ot is elérhet. A pisztráng ragadozó, elsősorban rovarokat, kisebb halakat és vízi állatokat zsákmányol. Teste hosszúkás, színezete változó: sötét háttal és világosabb foltokkal. A pisztráng csak hideg, tiszta, oxigéndús vizekben él. Kiváló horgászélményt nyújt, finom húsa miatt kedvelt halfaj.',
                'kep' => 'fogasok/pisztrang.jpg',
                'előhely' => 'Csak hideg, tiszta, gyors folyású patakokban és folyókban. Előnyben részesíti a kavicsos, oxigéndús vizeket. Magyarországon főleg hegységi patakokban található.',
            ],
            [
                'nev' => 'Fogas',
                'leiras' => 'A fogas (Sander volgensis) ragadozó halfaj, amely általában 30-50 cm hosszú és 0.5-2 kg súlyú, de akár 60 cm-t és 3 kg-ot is elérhet. A fogas a süllőhöz hasonló, de kisebb és vékonyabb testű. Ragadozó, elsősorban halakat zsákmányol. Teste hosszúkás, színezete világosabb, mint a süllőé. A fogas aktív nappal és éjszaka is, jó horgászélményt nyújt. Finom húsa miatt kedvelt halfaj.',
                'kep' => 'fogasok/fogas.jpg',
                'előhely' => 'Folyókban és tavakban, főleg a mélyebb, kavicsos vagy homokos fenekű területeken. Előnyben részesíti a tiszta, oxigéndús vizeket.',
            ],
        ];


    public function run(): void
    {
        $speciesModels = [];
        foreach (self::$speciesData as $spec) 
        {
            $speciesModels[] = Species::create($spec);
        }   
    }
}
