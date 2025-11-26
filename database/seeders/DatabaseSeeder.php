<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Species;
use App\Models\Water;
use App\Models\Contest;
use App\Models\Ban;
use App\Models\CatchRecord;
use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        /*
            $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'engedelyszam' => 'ADMIN-001',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        */

        $userNames = [
            'Nagy Péter', 'Kovács János', 'Tóth István', 'Szabó Gábor', 
            'Horváth Márk', 'Varga Zoltán', 'Kiss Balázs', 'Farkas Dávid',
            'Lakatos Ádám', 'Molnár Tamás'
        ];

        $users = [];
        foreach ($userNames as $index => $name) {
            $users[] = User::create([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@gmail.com',
                'password' => Hash::make('password'),
                'engedelyszam' => 'HU-2024-' . str_pad($index + 1000, 5, '0', STR_PAD_LEFT),
                'role' => 'user',
                'email_verified_at' => now(),
            ]);
        }

        $speciesData = [
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

        $speciesModels = [];
        foreach ($speciesData as $spec) {
            $speciesModels[] = Species::create($spec);
        }

        $watersData = [
            [
                'nev' => 'Tisza',
                'helyszin' => 'Szolnok',
                'tipus' => 'Folyó',
                'leiras' => 'A Tisza Magyarország második legnagyobb folyója, amely kiváló horgászhelyet nyújt. A Szolnok környéki szakaszon bőséges halállomány található, főleg ponty, harcsa, amur és keszeg. A folyó nyugodt, sekély részei ideálisak kezdő horgászoknak, míg a mélyebb, sodrásos részek tapasztalt horgászoknak kínálnak kihívást. A partszakaszok jól karbantartottak, számos horgászállás található a part mentén. A Tisza változatos halfauna miatt évszakonként eltérő horgászélményt nyújt. Tavasszal és nyáron a legaktívabb a halak viselkedése, ilyenkor a legjobb a fogási lehetőség. A víz minősége jó, a halak állapota kiváló.',
                'kep' => 'vizek/tisza.jpg',
            ],
            [
                'nev' => 'Fehér-tó',
                'helyszin' => 'Szeged',
                'tipus' => 'Tó',
                'leiras' => 'A Fehér-tó egy természetes eredetű tó Szeged közelében, amely kiváló horgászhelyet biztosít mind kezdő, mind haladó horgászok számára. A tó sekély, növényzettel teli területei gazdag halállománnyal rendelkeznek. Főleg ponty, keszeg, busa és amur található benne nagy számban. A tó környezete családbarát, nyugodt, ideális pihenésre és horgászásra egyaránt. A partszakaszok könnyen megközelíthetők, jól karbantartottak. A tó vizében élő növényzet miatt a halak elég táplálékhoz jutnak, ezért jó állapotban vannak. A horgászat során tiszteletben kell tartani a környezetet és a halállományt.',
                'kep' => 'vizek/feher-to.jpg',
            ],
            [
                'nev' => 'Tisza-tó',
                'helyszin' => 'Tiszafüred',
                'tipus' => 'Tó',
                'leiras' => 'A Tisza-tó Magyarország legnagyobb mesterséges tava, amely a horgászok egyik kedvenc helye. A tó hatalmas területe változatos horgászhelyeket kínál: sekély öblöket, mély vízrészeket, növényzettel teli területeket. A halállomány rendkívül gazdag, főleg ponty, harcsa, süllő, fogas és amur található benne nagy számban. A tó professzionális horgászversenyek helyszíne is, jól felszerelt horgászcentrumokkal és kempingekkel. A tiszafüredi partszakaszok különösen népszerűek, de a tó minden része kínál kiváló horgászlehetőségeket. A víz minősége kiváló, a halak állapota remek. A tó környezete szép, természetközeli, ideális pihenésre és horgászásra.',
                'kep' =>  'vizek/tisza-to.jpg',
            ],
            [
                'nev' => 'Velencei-tó',
                'helyszin' => 'Velence',
                'tipus' => 'Tó',
                'leiras' => 'A Velencei-tó egy családbarát horgászhely, amely mind kezdőknek, mind tapasztalt horgászoknak kiváló lehetőségeket nyújt. A tó sekély, meleg vízű, növényzettel teli területei ideálisak a ponty, keszeg és busa horgászásához. A partszakaszok könnyen megközelíthetők, jól karbantartottak, számos horgászállás található rajtuk. A tó környezete nyugodt, csendes, ideális pihenésre és horgászásra. A halállomány gazdag, a halak jó állapotban vannak. A tó népszerű családi horgászhely, ahol élményt lehet szerezni minden korosztály számára.',
                'kep' => 'vizek/velencei-to.jpg',
            ],
            [
                'nev' => 'Péda-tó',
                'helyszin' => 'Bács-Kiskun megye',
                'tipus' => 'Tó',
                'leiras' => 'A Péda-tó egy professzionális horgászversenyek helyszíne, amely kiváló lehetőségeket nyújt haladó és profi horgászoknak. A tó mély, tiszta vize gazdag halállománnyal rendelkezik, főleg nagy pontyok, harcsák és süllők találhatók benne. A tó jól felszerelt, professzionális horgászcentrumokkal és kempingekkel rendelkezik. A partszakaszok karbantartottak, számos kényelmes horgászállás található. A tó népszerű versenyhelyszín, rendszeresen rendeznek rajta országos és regionális versenyeket. A víz minősége kiváló, a halak állapota remek. A környezet szép, természetközeli, de jól karbantartott.',
                'kep' => 'vizek/peda-to.jpg',
            ],
            [
                'nev' => 'Balaton',
                'helyszin' => 'Siófok',
                'tipus' => 'Tó',
                'leiras' => 'A Balaton Közép-Európa legnagyobb tava, amely változatos horgászhelyeket kínál. A Siófok környéki partszakaszok népszerűek a horgászok körében. A tó halállománya gazdag és változatos: ponty, harcsa, süllő, fogas, keszeg és számos más halfaj megtalálható benne. A tó sekélyebb részei ideálisak a ponty és keszeg horgászásához, míg a mélyebb részek a harcsa és süllő horgászását kínálják. A partszakaszok jól karbantartottak, számos horgászállás található. A tó környezete szép, népszerű turisztikai célpont, ahol horgászás mellett pihenésre is lehetőség van. A víz minősége jó, a halak állapota kiváló.',
                'kep' => 'vizek/balaton.jpg',
            ],
            [
                'nev' => 'Duna',
                'helyszin' => 'Budapest',
                'tipus' => 'Folyó',
                'leiras' => 'A Duna Budapesten keresztül folyik, és számos kiváló horgászhelyet kínál a városban és környékén. A folyó változatos halállománnyal rendelkezik, főleg ponty, harcsa, süllő, fogas és keszeg található benne. A budapesti partszakaszok jól karbantartottak, számos horgászállás található rajtuk. A folyó mély, sodrásos részei kihívást jelentenek, míg a nyugodtabb részek kezdőknek is alkalmasak. A víz minősége változó, de általában elfogadható a horgászathoz. A folyó környezete városi, de számos zöld terület található a part mentén.',
                'kep' => 'vizek/duna.jpg',
            ],
            [
                'nev' => 'Hortobágyi Holt-Tisza',
                'helyszin' => 'Hortobágy',
                'tipus' => 'Holtág',
                'leiras' => 'A Hortobágyi Holt-Tisza egy természetközeli holtág, amely kiváló horgászhelyet biztosít. A holtág nyugodt, sekély vize gazdag halállománnyal rendelkezik, főleg ponty, keszeg, busa és amur található benne. A növényzettel teli területek ideálisak a halak számára, ezért nagy számban találhatók meg itt. A partszakaszok természetközeli állapotban vannak, a horgászat során tiszteletben kell tartani a környezetet. A holtág környezete szép, természetes, a Hortobágy Nemzeti Park része. Ideális helyszín a természetközeli horgászathoz és megfigyeléshez.',
                'kep' => 'vizek/hortobagy-holt-tisza.jpg',
            ],
            [
                'nev' => 'Rába',
                'helyszin' => 'Győr',
                'tipus' => 'Folyó',
                'leiras' => 'A Rába egy gyors folyású folyó, amely Győr közelében kiváló horgászhelyeket kínál. A folyó változatos halállománnyal rendelkezik, főleg ponty, harcsa, süllő, fogas és keszeg található benne. A gyorsabb folyású részek kihívást jelentenek, de kiváló fogási lehetőségeket kínálnak. A partszakaszok jól karbantartottak, számos horgászállás található rajtuk. A víz minősége jó, a halak állapota kiváló. A folyó környezete szép, természetközeli, ideális horgászathoz.',
                'kep' => 'vizek/raba.jpg',
            ],
            [
                'nev' => 'Szamos',
                'helyszin' => 'Szamosújvár',
                'tipus' => 'Folyó',
                'leiras' => 'A Szamos egy kavicsos fenekű, gyors folyású folyó, amely kiváló horgászhelyeket kínál. A folyó változatos halállománnyal rendelkezik, főleg ponty, harcsa, süllő, márna és balin található benne. A gyors folyású, kavicsos részek ideálisak a márna és balin horgászásához. A partszakaszok természetközeli állapotban vannak, a horgászat során tiszteletben kell tartani a környezetet. A víz minősége kiváló, tiszta, oxigéndús. A folyó környezete szép, természetes, ideális a természetközeli horgászathoz.',
                'kep' => 'vizek/szamos.jpg',
            ],
            [
                'nev' => 'Zala folyó',
                'helyszin' => 'Zalaegerszeg',
                'tipus' => 'Folyó',
                'leiras' => 'A Zala egy lassú folyású folyó, amely nyugodt horgászhelyeket kínál. A folyó halállománya gazdag, főleg ponty, keszeg, busa és amur található benne. A lassú folyású, sekély részek ideálisak kezdő horgászoknak. A partszakaszok jól karbantartottak, számos horgászállás található rajtuk. A víz minősége jó, a halak állapota kiváló. A folyó környezete szép, természetközeli, ideális horgászathoz és pihenéshez.',
                'kep' => 'vizek/zala.jpg',
            ],
            [
                'nev' => 'Kapos folyó',
                'helyszin' => 'Kaposvár',
                'tipus' => 'Folyó',
                'leiras' => 'A Kapos egy közepes folyású folyó, amely változatos horgászhelyeket kínál. A folyó halállománya gazdag, főleg ponty, keszeg, busa, harcsa és süllő található benne. A változatos folyású részek különböző horgásztechnikákat igényelnek. A partszakaszok jól karbantartottak, számos horgászállás található rajtuk. A víz minősége jó, a halak állapota kiváló. A folyó környezete szép, természetközeli, ideális horgászathoz.',
                'kep' => 'vizek/kapos.jpg',
            ],
            [
                'nev' => 'Dráva',
                'helyszin' => 'Pécs',
                'tipus' => 'Folyó',
                'leiras' => 'A Dráva egy nagy folyó, amely Pécs közelében kiváló horgászhelyeket kínál. A folyó mély, változatos halállománnyal rendelkezik, főleg ponty, harcsa, süllő, fogas és keszeg található benne. A mély részek a nagy harcsák és süllők horgászását kínálják, míg a sekélyebb részek a ponty és keszeg horgászását. A partszakaszok jól karbantartottak, számos horgászállás található rajtuk. A víz minősége jó, a halak állapota kiváló. A folyó környezete szép, természetközeli.',
                'kep' => 'vizek/drava.jpg',
            ],
            [
                'nev' => 'Hortobágyi Halastó',
                'helyszin' => 'Hortobágy',
                'tipus' => 'Halastó',
                'leiras' => 'A Hortobágyi Halastó egy mesterséges halastó, amely kiváló horgászhelyet biztosít. A halastó gazdag halállománnyal rendelkezik, főleg ponty, amur és keszeg található benne nagy számban. A halastó jól karbantartott, professzionális horgászhelyekkel rendelkezik. A partszakaszok könnyen megközelíthetők, jól karbantartottak. A víz minősége jó, a halak állapota kiváló. A halastó környezete szép, természetközeli, a Hortobágy Nemzeti Park része. Ideális helyszín a horgászathoz és pihenéshez.',
                'kep' => 'vizek/hortobagy-halasto.jpg',
            ],
            [
                'nev' => 'Fertő-tó',
                'helyszin' => 'Fertőd',
                'tipus' => 'Tó',
                'leiras' => 'A Fertő-tó egy természetes tó, amely kiváló horgászhelyeket kínál. A tó változatos halállománnyal rendelkezik, főleg ponty, keszeg, busa és süllő található benne. A tó sekélyebb részei ideálisak a ponty és keszeg horgászásához, míg a mélyebb részek a süllő horgászását kínálják. A partszakaszok jól karbantartottak, számos horgászállás található. A víz minősége jó, a halak állapota kiváló. A tó környezete szép, természetközeli, a Fertő-Hanság Nemzeti Park része. Ideális helyszín a horgászathoz és pihenéshez.',
                'kep' => 'vizek/ferto-to.jpg',
            ],
        ];

        $waterModels = [];
        foreach ($watersData as $water) {
            $waterModels[] = Water::create($water);
        }

        $contestsData = [
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

        $contestModels = [];
        foreach ($contestsData as $contest) {
            $contestModels[] = Contest::create($contest);
        }

        $bansData = [];
        $banMonths = [
            ['start' => 5, 'end' => 6, 'days' => 15],
            ['start' => 2, 'end' => 3, 'days' => 28],
            ['start' => 3, 'end' => 4, 'days' => 30],
            ['start' => 4, 'end' => 5, 'days' => 31],  
            ['start' => 5, 'end' => 6, 'days' => 15], 
            ['start' => 2, 'end' => 3, 'days' => 31], 
            ['start' => 3, 'end' => 4, 'days' => 30],  
            ['start' => 4, 'end' => 5, 'days' => 31], 
            ['start' => 5, 'end' => 6, 'days' => 15], 
            ['start' => 2, 'end' => 3, 'days' => 28],  
            ['start' => 10, 'end' => 11, 'days' => 15],
            ['start' => 4, 'end' => 5, 'days' => 30],  
        ];

        foreach ($speciesModels as $index => $species) {
            if (isset($banMonths[$index])) {
                $ban = $banMonths[$index];
                $bansData[] = [
                    'species_id' => $species->id,
                    'kezdete' => Carbon::create(2025, $ban['start'], 1),
                    'vege' => Carbon::create(2025, $ban['end'], $ban['days']),
                    'megjegyzes' => 'Országos tilalmi idő',
                ];
            }
        }

        foreach ($bansData as $ban) {
            Ban::create($ban);
        }

        $catchDescriptions = [
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

        $catchDates = [];
        for ($i = 0; $i < 180; $i++) {
            $catchDates[] = Carbon::now()->subDays(rand(1, 180))->format('Y-m-d');
        }

        foreach ($users as $user) {
            $catchCount = rand(8, 15);
            for ($i = 0; $i < $catchCount; $i++) {
                $species = $speciesModels[array_rand($speciesModels)];
                $water = $waterModels[array_rand($waterModels)];
                
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
                    'megjegyzes' => rand(0, 3) === 0 ? null : $catchDescriptions[array_rand($catchDescriptions)],
                    'foto' => $foto,
                ]);
            }
        }

        foreach ($users as $user) {
            $registrationCount = rand(1, 3);
            $selectedContests = array_rand($contestModels, min($registrationCount, count($contestModels)));
            
            if (!is_array($selectedContests)) {
                $selectedContests = [$selectedContests];
            }
            
            foreach ($selectedContests as $contestIndex) {
                Registration::create([
                    'user_id' => $user->id,
                    'contest_id' => $contestModels[$contestIndex]->id,
                ]);
            }
        }

        $this->command->info('✅ Adatbázis sikeresen feltöltve demó adatokkal!');
        $this->command->info('👤 Admin bejelentkezés: admin@gmail.com / admin');
        $this->command->info('👥 10 normál felhasználó létrehozva (@gmail.com végződéssel, jelszó: password)');
        $this->command->info('🐟 ' . count($speciesModels) . ' halfaj, ' . count($waterModels) . ' víz, ' . count($contestModels) . ' verseny');
    }
}
