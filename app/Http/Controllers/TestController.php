<?php

namespace App\Http\Controllers;

use App\Utilities\FindOrCreateFolders;
use App\Utilities\MakeConfigFile;
use App\Utilities\MakeWords;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Utilities\RandomWordGenerator;
use App\Utilities\CreateSeeds;

class TestController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {

        $words =['solax',
            'staxseum',
            'daxiri',
            'veorel',
            'arisae',
            'daxum aeries',
            'xalcrus',
            'drapaxella',
            'eosteum',
            'haxares',
            'palthar',
            'bacchuso',
            'magnateo',
            'cronaeveum',
            'thaedal',
            'opaxal',
            'igniso',
            'magnatael',
            'maxpolaris',
            'larisus',
            'magnatox',
            'ravax',
            'daxorsal',
            'firi',
            'theum',
            'daxega',
            'paxares',
            'albaseo',
            'ceumsella',
            'ubuntares',
            'poluxareum',
            'lagomo',
            'kaxebasor',
            'craetreum',
            'igniseum',
            'sola',
            'dreum',
            'paxella',
            'vaepolar',
            'polux',
            'zeomar',
            'voxelvor',
            'neumsar',
            'seocri',
            'vura',
            'polis etares',
            'geotura',
            'thospax aeries',
            'daxeo',
            'zacronix',
            'laegal',
            'komoreum',
            'cronaxsal',
            'cronella',
            'paxkaelor',
            'ignisae',
            'flamaal',
            'tegatax',
            'magnatae',
            'klura',
            'ubuntiri',
            'ciri',
            'komoreo',
            'poleopar',
            'daxura',
            'daxeol',
            'ubuntar',
            'cronomaxa',
            'daxaepor',
            'tikomora',
            'cronar',
            'veum',
            'ebasor',
            'komorel',
            'croneo',
            'ceotor',
            'stellafax',
            'albaeum',
            'bacchuse',
            'soleum',
            'paxor',
            'flamaar',
            'albae',
            'forcelleum',
            'vetor',
            'croneum',
            'daxar feum',
            'soli',
            'lapral',
            'draltae',
            'klae ripa',
            'dal',
            'zudlor',
            'kleo',
            'ledeo',
            'klor',
            'llor',
            'kellor',
            'talzeo',
            'slor',
            'keoval',
            'zal',
            'pebal',
            'heveo',
            'cexeo',
            'kimal',
            'kevou',
            'raxo',
            'lakla',
            'viteo',
            'naruke',
            'creodo',
            'diboshou',
            'kabego',
            'prosiki',
            'prolo',
            'prafi',
            'shepi',
            'tikeo',
            'mete',
            'gikoha',
            'yoluna',
            'teodi',
            'brato',
            'kotatro',
            'daeseo',
            'naetari',
            'dabo',
            'lorunae',
            'gelithor',
            'gelipeo',
            'siri abiri',
            'narupae',
            'taurateum',
            'thorocreum',
            'thanocral',
            'thorabares',
            'thanizax',
            'thanedreum',
            'thorebus',
            'excelsior',
            'narugel',
            'tauristus lobrum',
            'lorudal',
            'siri pax',
            'taurodeum',
            'thoristus',
            'thanubrel',
            'narivus',
            'crega',
            'loro siri',
            'gelapax',
            'sirinares',
            'narideo',
            'thanasares',
            'thoriceres',
            'siriokor',
            'lorelax',
            'siriodax',
            'taurecrux',
            'loretheum',
            'thorobral',
            'thanutheum',
            'narexae',
            'thorasar',
            'lorimax',
            'siriobeum',
            'tauratura',
            'tauracar',
            'thorevega',
            'lorumel',
            'taurator',
            'loravax',
            'tauraxa',
            'siri axor',
            'lorovel',
            'lorikella',
            'siriemel',
            'loridares',
            'thanudura',
            'taurotrae',
            'siri jal',
            'lorileo',
            'rusobrax',
            'siri thax',
            'narocares',
            'thanatheum',
            'tratheo',
            'theobe',
            'dripal',
            'besu',
            'calpega',
            'taureum',
            'siriel',
            'taurax',
            'thoreo',
            'gax',
            'vala',
            'xakares',
            'xega',
            'zar',
            'zarastella',
            'thanaries',
            'daetho',
            'keltrax',
            'delphinus',
            'lepreo',
            'klaxhares',
            'siria',
            'halvax',
            'thorel',
            'neomax',
            'pelthoreum',
            'crinus',
            'taepistar',
            'karxeum',
            'craxtaur',
            'tauri',
            'zaeyares',
            'galactaceum',
            'aereumi',
            'xi',
            'crili',
            'vaeshi',
            'taesurit',
            'grouma',
            'routri',
            'gela',
            'woun',
            'paero',
            'sutro',
            'kipen',
            'hanebu',
            'favo',
            'kaeru',
            'dra',
            'xiku',
            'cusudri',
            'kohisa',
            'zaexa',
            'reklato',
            'retric',
            'koku',
            'trae',
            'xucobae',
            'saera',
            'kaba',
            'craeki',
            'kopeo',
            'kipra',
            'dorose',
            'bicraxis',
            'socusti',
            'proka',
            'nidae',
            'trute',
            'vexam',
            'dishi',
            'trivut',
            'kandri',
            'bropova',
            'kloushumo',
            'crokuk',
            'trixae',
            'horukono',
            'kalidae',
            'coubrae',
            'taekus',
            'rovo',
            'zaere',
            'cousae',
            'kae',
            'etheo',
            'surae',
            'cyonleo',
            'calloc',
            'teo',
            'taires',
            'kistowal',
            'sepi',
            'taedal',
            'geoven',
            'raex',
            'cerus',
            'thaesidis',
            'rayal',
            'zaethor',
            'telae',
            'trathal',
            'craxl',
            'xaedrek',
            'xoracae',
            'duprucae',
            'letra',
            'xaki',
            'caetra',
            'haebro',
            'dozomu',
            'siki',
            'disaede',
            'drevud',
            'hocetre',
            'didroso',
            'tyson',
            'klouka',
            'stidae',
            'vamizae',
            'ledrist',
            'pacrae',
            'klust',
            'drae',
            'lalato',
            'xirus',
            'kaeparo',
            'cyona',
            'keum',
            'halnarax',
            'cyonal',
            'conar',
            'telcyno',
            'cyonar',
            'wislor',
            'xares',
            'xax',
            'kiwo',
            'sipreneum',
            'breum',
            'druxxor',
            'gorthe',
            'gaxvella',
            'cyoneum',
            'nari',
            'xlor',
            'nareum',
            'setheum',
            'narel',
            'daecyon',
            'kaval',
            'krasal',
            'heradies',
            'hedraes',
            'premae',
            'dadra',
            'caesae',
            'brunae',
            'kluraex',
            'dekaewae',
            'xuli',
            'baelok',
            'trece',
            'voco',
            'heliva',
            'hasu vaedro',
            'prekenae',
            'baele',
            'kaetae',
            'duse',
            'vudra',
            'sharo',
            'browae',
            'croxo',
            'kuzo',
            'tisevu',
            'shae',
            'xirumen',
            'klehu',
            'rutova',
            'kli',
            'kivaku',
            'siveti',
            'somuri',
            'traekor',
            'kamae',
            'polacrax',
            'cro',
            'hubae cofu',
            'hecrosto',
            'yenu',
            'kecre',
            'luku',
            'kaebro',
            'dakacene',
            'kilae',
            'stoko',
            'genere',
            'sheyu',
            'daetrae',
            'lecre',
            'gorgona',
            'supri',
            'vaka prato',
            'binae crae',
            'zaba',
            'naranal',
            'gelopae',
            'narurax',
            'gelitheum',
            'thori venum',
            'siri ukares',
            'gelaveo',
            'thanapar',
            'tauratar',
            'narilae',
            'narotus',
            'klaelo',
            'ruvelo',
            'bezou',
            'cotrebo',
            'prar',
            'traegur',
            'vaex',
            'staem',
            'diobo',
            'kida',
            'ladre',
            'irides',
            'crifu',
            'klokae',
            'sidozi',
            'crebe',
            'nibu',
            'daes',
            'xari',
            'deko',
            'wora',
            'kezou',
            'zepre',
            'vamou',
            'dapu',
            'zaxa',
            'keme',
            'nemesi',
            'klut',
            'shoso',
            'vudus',
            'athenus',
            'poseidor',
            'kovadu',
            'craey',
            'boxu',
            'phaestus',
            'keru',
            'sila',
            'demeterus',
            'janum',
            'hecatus',
            'prutae',
            'udiki',
            'yazidi',
            'tyche',
            'sitira',
            'truxe',
            'drucuv',
            'nike',
            'dionysus',
            'iris',
            'yudrae',
            'preko',
            'yinae',
            'noxae',
            'kudux',
            'koge',
            'pravi',
            'wukou',
            'kluca',
            'kato',
            'uvuru',
            'dacrae',
            'fountaes',
            'paxi',
            'xaetra',
            'crato',
            'vaedu',
            'capaeus',
            'artemis',
            'kalaeum',
            'brovi',
            'secrota',
            'traegis',
            'vihas',
            'lura',
            'klaedra',
            'lorpovum',
            'bruvim',
            'xouziki',
            'klarae',
            'hermes',
            'alpha devi',
            'teco',
            'dalkuse',
            'zadrae',
            'raeyo',
            'vugum',
            'raezet',
            'kaevuk',
            'morblum',
            'teyes',
            'dramule',
            'kebre',
            'mabosho',
            'kilo centauri',
            'caelo',
            'zinamus',
            'drovadel',
            'caeprakella',
            'cyon astris',
            'neraldus',
            'naribega',
            'galgalor',
            'trubeum',
            'xinares',
            'keo dinarus',
            'vax',
            'voshal',
            'luci',
            'kori',
            'probae theta',
            'fortis',
            'pensus',
            'alpha vulan',
            'braloc',
            'klosho',
            'preco',
            'ceri beta',
            'volo',
            'laetus',
            'laetans',
            'fevi gamma',
            'vela theta',
            'hastolae',
            'braeko',
            'kosini',
            'travect',
            'xibricae',
            'dolus',
            'drastus',
            'raedum',
            'perxae',
            'lucidus',
            'illustris',
            'biro',
            'drisa',
            'ikarus',
            'solis',
            'capri aura',
            'alpha solis',
            'preza',
            'kaevox',
            'digamma',
            'bralus',
            'mixal',
            'telum',
            'nemus',
            'strateum',
            'sikus',
            'aurum',
            'pegaser',
            'hubre',
            'praetum',
            'xanapoli',
            'eros beta',
            'codri',
            'imersa',
            'vaego',
            'vaegum',
            'novus',
            'braetum',
            'solens',
            'druvum',
            'alpha maximus',
            'naen',
            'cilapede',
            'nexum',
            'divaestra',
            'satiraes',
            'xaepri',
            'aeon',
            'aeon epsilon',
            'ionika',
            'melos',
            'daeshevu',
            'oestrus',
            'saturnila',
            'mirus',
            'incre minor',
            'kedi',
            'doru',
            'cephusis',
            'daxlar',
            'lavi',
            'decrudae',
            'loku',
            'eximus',
            'sabum',
            'ebella',
            'trunek',
            'privus',
            'navitus',
            'astrum',
            'sidus',
            'nacrae',
            'lumen',
            'kaffa',
            'tristis',
            'draxeri',
            'lux',
            'podaepar',
            'polareum',
            'cena',
            'klifos',
            'caepra',
            'talpa',
            'volatus',
            'tauruk',
            'xaeko crono',
            'sicraffi',
            'alpha cronos',
            'natandra',
            'dagov',
            'supra',
            'voltus',
            'kaetus',
            'duki',
            'kistu',
            'klostim',
            'yora',
            'praesus',
            'libek',
            'signum',
            'divi',
            'traeko',
            'veris',
            'klubae',
            'reklave',
            'kaere',
            'drisen',
            'yokoshana',
            'imperium',
            'huku royo',
            'lacertus',
            'sanguis',
            'neyedur',
            'pollentia',
            'copus',
            'bovum',
            'lufae',
            'exoro',
            'venero',
            'vega prima',
            'toxor',
            'kovae',
            'vantum',
            'naebis',
            'zubi',
            'pridum',
            'opicus',
            'sparticul',
            'caele',
            'xuto',
            'laesto',
            'secor',
            'nocru',
            'sipcalor',
            'pugo',
            'zael',
            'traet',
            'krista',
            'beta ret',
            'supremus',
            'optimaxis',
            'draekae',
            'lividus',
            'lippi',
            'cereum',
            'nepi',
            'nebru',
            'memor',
            'subdomus',
            'akropoli',
            'sapens',
            'xae',
            'trapaeki',
            'alpha magus',
            'vigil',
            'voluns',
            'brae',
            'bellum',
            'praelior',
            'cassis',
            'sipa',
            'colos',
            'draezu',
            'accipio',
            'opacus',
            'immotus',
            'xici',
            'codra',
            'trutinor',
            'nitor',
            'lituus',
            'tereo',
            'praesan',
            'xanawae',
            'colossaeus',
            'alba ignis',
            'pra',
            'flavo ignis',
            'ceruleum ignis',
            'novissimus',
            'elatus',
            'celsus',
            'xaevu',
            'lucrum',
            'tripodo',
            'protaveras',
            'ardeo',
            'celox',
            'velox',
            'citipies',
            'muzeka',
            'angelus',
            'shaen',
            'sursum',
            'bella taurus',
            'crystallis',
            'trena',
            'omnis',
            'accutis',
            'silex',
            'naexudi',
            'klaeri',
            'zume',
            'klubo',
            'cemae',
            'apprecor',
            'theta vega',
            'caelum',
            'cymatil',
            'marculus',
            'kovuna',
            'drali',
            'lusus',
            'tropaeum',
            'huconeum',
            'sitis',
            'pumil',
            'taurosus',
            'shiko',
            'alatum',
            'opulentus',
            'xexae',
            'xastor',
            'volucris',
            'ominor',
            'kabrae minor',
            'virtus',
            'keya',
            'klama',
            'heliox',
            'virkan',
            'trelor',
            'uridies',
            'xazebu',
            'bella tulis',
            'konadro',
            'mitra',
            'alpha corvum',
            'aquaris',
            'venaticus',
            'equus',
            'sol blanca',
            'velum',
            'mireum',
            'Praxinus',
            'xaepolo',
            'braxo',
            'sophis',
            'gravar',
            'paneous',
            'trelip',
            'cebredo',
            'caeceus',
            'pratas',
            'caprican',
            'libros',
            'craecix',
            'auron',
            'drovi',
            'ignis libra',
            'ignis blanca',
            'ceruleum',
            'taurim',
            'aerasa',
            'gemma theta',
            'kaddaverium',
            'Scorpax',
            'picene',
            'siprae',
            'aquarioso',
            'rigelis',
            'antarus',
            'betel',
            'polarica',
            'pledis',
            'Siros',
            'kofax',
            'cignum',
            'torion',
            'neshe',
            'scorpadus',
            'andarum',
            'kalae',
            'pledacene',
            'castoria',
            'Polluxis',
            'cyon',
            'koutra',
            'trotos',
            'capeleum',
            'kidra',
            'picrae',
            'protonus',
            'kax',
            'cruxis',
            'tritis',
            'drotica',
            'xuro',
            'sapren',
            'maxeum',
            'karsella',
            'atracyon',
            'apexeum',
            'baslor',
            'hax',
            'pinares',
            'Kruslar',
            'nekelmax',
            'sartae',
            'xivares',
            'haecyon',
            'klaxal',
            'xuma',
            'theozal',
            'cebella',
            'hecreo',
            'vares',
            'parestal',
            'haege',
            'vellapus',
            'yotra',
            'geokus',
            'theokitrus',
            'creodus',
            'tapaestra',
            'cyonus',
            'kal',
            'thal',
            'kupi',
            'tataires',
            'kupeo',
            'dadocus',
            'ko',
            'kleorae',
            'cyaedra',
            'creteo',
            'vosha',
            'klae',
            'daxsor',
            'telarius',
            'zereum',
            'cyonella',
            'azamax',
            'vaetheus',
            'cyonax',
            'tharxe',
            'umbreum',
            'xixilor',
            'celaires',
            'telbeo',
            'pravikus',
            'medimaxus',
            'varsheum',
            'aetreo',
            'nexares',
            'melladreum',
            'caldax',
            'aires axis',
            'waefal',
            'buxnar',
            'teresae',
            'cylor',
            'varmor',
            'heva',
            'vaxalor',
            'heo',
            'halcro',
            'veldares',
            'satarseum',
            'halprae',
            'theta tayal',
            'dabi',
            'glordax',
            'narus',
            'tayel',
            'kalmares',
            'ceum',
            'prax',
            'haxceum',
            'paela',
            'beko',
            'beta cruxar',
            'pri',
            'nanova',
            'zibru',
            'alpha cetar',
            'cru',
            'dramu',
            'herae',
            'craxo',
            'ledae',
            'soti',
            'sufo',
            'xidro',
            'pae',
            'luli',
            'kappa tierra',
            'brovus',
            'staelor',
            'zeya creda',
            'klako',
            'kaezo',
            'theta castor',
            'zerilu',
            'kapita',
            'kiri',
            'civae',
            'kitici',
            'gemae',
            'xenae',
            'xaka',
            'altaireum',
            'nazaso',
            'holocyon',
            'cobre',
            'rumi',
            'xuxa',
            'duka',
            'kaester',
            'truxeo',
            'zopo',
            'duradae',
            'traklo',
            'solste',
            'vishe',
            'zeora',
            'thobeo',
            'stalo',
            'lumo',
            'pax leo',
            'medeo',
            'draeki',
            'geoxi',
            'kateo',
            'lepa',
            'traelus',
            'kribus',
            'xal',
            'kaxlor',
            'trikalor',
            'cenus',
            'xaemus',
            'kedlor',
            'halycon',
            'pallaxus',
            'viro vega',
            'rigel klae',
            'articus',
            'capella gamma',
            'eridneum',
            'betel sorra',
            'canoprovo',
            'galileum',
            'provius',
            'bella novae',
            'centaura prima',
            'marveleum',
            'tyri',
            'theta dyson',
            'saga neum',
            'nutonium',
            'hawkeon',
            'higeum',
            'antaria',
            'cassia polis',
            'archipeliga',
            'tysor',
            'denebreum',
            'thorus',
            'taural',
            'lorella',
            'sirior',
            'sireum',
            'sirial',
            'loreo',
            'naruxsis',
            'thanel',
            'thanares',
            'thoreum',
            'loreum',
            'taurae',
            'lorus',

        ];


       $words = array_unique($words);


        $filename = base_path('/config/' . 'star-name-seeds' . '.php');



        foreach( $words as $key => $value){

            $contents = file($filename);
            $contents[12] = $contents[12] . "\n\n"; // Gives a new line
            file_put_contents($filename, implode('',$contents));

            $contents = file($filename);
            $contents[13] = "'" . $value . "',";
            file_put_contents($filename, implode('',$contents));

        }











           // return view('test.index');

    }


}
