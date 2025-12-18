<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Concerns\SeedsTable;

class WatersSeeder extends Seeder
{
    use SeedsTable;

    protected static string $table = 'waters';

    private static $records = [
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

    public function run(): void
    {
        DB::table(self::$table)->insert(self::$records);
    }
}
