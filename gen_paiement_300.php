<?php
/**
 * Payment Pages Generator - 300 UNIQUE pages
 * lesgetsinfo.com - Afrique francophone casino payments
 */

$OPENAI_KEY = 'OPENAI_KEY_HERE';
$ANTHROPIC_KEY = 'ANTHROPIC_KEY_HERE';

$BASE = '/home/admin/web/lesgetsinfo.com/public_html';
$PAY_DIR = $BASE . '/paiement';
$IMG_DIR = $BASE . '/images/paiement';

$AFF = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($PAY_DIR)) mkdir($PAY_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

// 10 GRANDS PAYS avec leurs méthodes locales complètes
$BIG_COUNTRIES = [
    'congo-rdc' => [
        'name' => 'RD Congo', 'adj' => 'congolais', 'currency' => 'Franc Congolais (CDF)',
        'capital' => 'Kinshasa', 'flag' => '🇨🇩', 'pop' => '100 millions',
        'color1' => '#007FFF', 'color2' => '#CE1126',
        'methods' => [
            'mpesa' => ['name'=>'M-Pesa','op'=>'Vodacom Congo','min'=>'1 000 CDF','max'=>'5 000 000 CDF','fee'=>'1-2%','time'=>'Instantané','ussd'=>'*111#'],
            'airtel-money' => ['name'=>'Airtel Money','op'=>'Airtel Congo','min'=>'500 CDF','max'=>'3 000 000 CDF','fee'=>'1%','time'=>'Instantané','ussd'=>'*185#'],
            'orange-money' => ['name'=>'Orange Money','op'=>'Orange RDC','min'=>'1 000 CDF','max'=>'4 000 000 CDF','fee'=>'1.5%','time'=>'Instantané','ussd'=>'*144#'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT Tether','op'=>'TRC20/ERC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'Réseau ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB Binance','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'0.5 BNB','time'=>'3-5 min','ussd'=>'Wallet'],
            'virement' => ['name'=>'Virement Bancaire','op'=>'Banques RDC','min'=>'50 000 CDF','max'=>'Illimité','fee'=>'2-5%','time'=>'1-3 jours','ussd'=>'Banque'],
        ],
    ],
    'cameroun' => [
        'name' => 'Cameroun', 'adj' => 'camerounais', 'currency' => 'Franc CFA (XAF)',
        'capital' => 'Yaoundé', 'flag' => '🇨🇲', 'pop' => '28 millions',
        'color1' => '#007A5E', 'color2' => '#CE1126',
        'methods' => [
            'mtn-money' => ['name'=>'MTN Mobile Money','op'=>'MTN Cameroon','min'=>'500 XAF','max'=>'2 000 000 XAF','fee'=>'1%','time'=>'Instantané','ussd'=>'*126#'],
            'orange-money' => ['name'=>'Orange Money','op'=>'Orange Cameroun','min'=>'500 XAF','max'=>'2 000 000 XAF','fee'=>'1%','time'=>'Instantané','ussd'=>'*150#'],
            'express-union' => ['name'=>'Express Union','op'=>'Express Union Finance','min'=>'1 000 XAF','max'=>'5 000 000 XAF','fee'=>'2%','time'=>'15-30 min','ussd'=>'Agence'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT Tether','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'Réseau ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC Binance','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'carte-visa' => ['name'=>'Carte Visa/Mastercard','op'=>'Banques Cameroun','min'=>'5 000 XAF','max'=>'500 000 XAF','fee'=>'2-3%','time'=>'Instantané','ussd'=>'Carte'],
        ],
    ],
    'cote-divoire' => [
        'name' => "Côte d'Ivoire", 'adj' => 'ivoirien', 'currency' => 'Franc CFA (XOF)',
        'capital' => 'Abidjan', 'flag' => '🇨🇮', 'pop' => '27 millions',
        'color1' => '#F77F00', 'color2' => '#009A44',
        'methods' => [
            'orange-money' => ['name'=>'Orange Money CI','op'=>'Orange CI','min'=>'200 XOF','max'=>'2 000 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'wave' => ['name'=>'Wave','op'=>'Wave CI','min'=>'100 XOF','max'=>'3 000 000 XOF','fee'=>'0%','time'=>'Instantané','ussd'=>'App Wave'],
            'mtn-money' => ['name'=>'MTN Mobile Money','op'=>'MTN CI','min'=>'200 XOF','max'=>'2 000 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*133#'],
            'moov-money' => ['name'=>'Moov Money','op'=>'Moov Africa CI','min'=>'200 XOF','max'=>'1 000 000 XOF','fee'=>'1.5%','time'=>'Instantané','ussd'=>'*155#'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'carte-bancaire' => ['name'=>'Carte Bancaire','op'=>'Banques CI','min'=>'1 000 XOF','max'=>'500 000 XOF','fee'=>'2%','time'=>'Instantané','ussd'=>'Carte'],
        ],
    ],
    'senegal' => [
        'name' => 'Sénégal', 'adj' => 'sénégalais', 'currency' => 'Franc CFA (XOF)',
        'capital' => 'Dakar', 'flag' => '🇸🇳', 'pop' => '18 millions',
        'color1' => '#00853F', 'color2' => '#FDEF42',
        'methods' => [
            'wave' => ['name'=>'Wave Sénégal','op'=>'Wave SN','min'=>'100 XOF','max'=>'5 000 000 XOF','fee'=>'0%','time'=>'Instantané','ussd'=>'App Wave'],
            'orange-money' => ['name'=>'Orange Money SN','op'=>'Orange SN','min'=>'200 XOF','max'=>'2 000 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'free-money' => ['name'=>'Free Money','op'=>'Free SN','min'=>'200 XOF','max'=>'1 000 000 XOF','fee'=>'0.5%','time'=>'Instantané','ussd'=>'*355#'],
            'wari' => ['name'=>'Wari','op'=>'Wari SN','min'=>'500 XOF','max'=>'3 000 000 XOF','fee'=>'2%','time'=>'30 min','ussd'=>'Agence'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
        ],
    ],
    'mali' => [
        'name' => 'Mali', 'adj' => 'malien', 'currency' => 'Franc CFA (XOF)',
        'capital' => 'Bamako', 'flag' => '🇲🇱', 'pop' => '22 millions',
        'color1' => '#14B53A', 'color2' => '#CE1126',
        'methods' => [
            'orange-money' => ['name'=>'Orange Money Mali','op'=>'Orange Mali','min'=>'200 XOF','max'=>'2 000 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'moov-money' => ['name'=>'Moov Money Mali','op'=>'Moov Africa Mali','min'=>'200 XOF','max'=>'1 500 000 XOF','fee'=>'1.5%','time'=>'Instantané','ussd'=>'*155#'],
            'wave' => ['name'=>'Wave Mali','op'=>'Wave ML','min'=>'100 XOF','max'=>'3 000 000 XOF','fee'=>'0%','time'=>'Instantané','ussd'=>'App Wave'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'litecoin' => ['name'=>'Litecoin','op'=>'LTC','min'=>'0.1 LTC','max'=>'Illimité','fee'=>'Très faible','time'=>'2-5 min','ussd'=>'Wallet'],
        ],
    ],
    'niger' => [
        'name' => 'Niger', 'adj' => 'nigérien', 'currency' => 'Franc CFA (XOF)',
        'capital' => 'Niamey', 'flag' => '🇳🇪', 'pop' => '25 millions',
        'color1' => '#E05206', 'color2' => '#009A00',
        'methods' => [
            'airtel-money' => ['name'=>'Airtel Money Niger','op'=>'Airtel Niger','min'=>'200 XOF','max'=>'1 000 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*185#'],
            'moov-money' => ['name'=>'Moov Money Niger','op'=>'Moov Africa Niger','min'=>'200 XOF','max'=>'1 000 000 XOF','fee'=>'1.5%','time'=>'Instantané','ussd'=>'*155#'],
            'orange-money' => ['name'=>'Orange Money Niger','op'=>'Orange Niger','min'=>'200 XOF','max'=>'1 500 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'litecoin' => ['name'=>'Litecoin','op'=>'LTC','min'=>'0.1 LTC','max'=>'Illimité','fee'=>'Très faible','time'=>'2-5 min','ussd'=>'Wallet'],
        ],
    ],
    'burkina-faso' => [
        'name' => 'Burkina Faso', 'adj' => 'burkinabè', 'currency' => 'Franc CFA (XOF)',
        'capital' => 'Ouagadougou', 'flag' => '🇧🇫', 'pop' => '23 millions',
        'color1' => '#EF2B2D', 'color2' => '#009A00',
        'methods' => [
            'orange-money' => ['name'=>'Orange Money BF','op'=>'Orange Burkina','min'=>'200 XOF','max'=>'2 000 000 XOF','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'moov-money' => ['name'=>'Moov Money BF','op'=>'Moov Africa BF','min'=>'200 XOF','max'=>'1 500 000 XOF','fee'=>'1.5%','time'=>'Instantané','ussd'=>'*155#'],
            'coris-money' => ['name'=>'Coris Money','op'=>'Coris Bank BF','min'=>'500 XOF','max'=>'5 000 000 XOF','fee'=>'1%','time'=>'1-2h','ussd'=>'Agence'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'wave' => ['name'=>'Wave BF','op'=>'Wave Burkina','min'=>'100 XOF','max'=>'2 000 000 XOF','fee'=>'0%','time'=>'Instantané','ussd'=>'App Wave'],
        ],
    ],
    'guinee' => [
        'name' => 'Guinée', 'adj' => 'guinéen', 'currency' => 'Franc Guinéen (GNF)',
        'capital' => 'Conakry', 'flag' => '🇬🇳', 'pop' => '14 millions',
        'color1' => '#CE1126', 'color2' => '#009460',
        'methods' => [
            'orange-money' => ['name'=>'Orange Money Guinée','op'=>'Orange GN','min'=>'5 000 GNF','max'=>'10 000 000 GNF','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'mtn-money' => ['name'=>'MTN Mobile Money GN','op'=>'MTN Guinée','min'=>'5 000 GNF','max'=>'8 000 000 GNF','fee'=>'1%','time'=>'Instantané','ussd'=>'*126#'],
            'cellcom' => ['name'=>'Cellcom Money','op'=>'Cellcom GN','min'=>'10 000 GNF','max'=>'5 000 000 GNF','fee'=>'2%','time'=>'30 min','ussd'=>'Agence'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'litecoin' => ['name'=>'Litecoin','op'=>'LTC','min'=>'0.1 LTC','max'=>'Illimité','fee'=>'Très faible','time'=>'2-5 min','ussd'=>'Wallet'],
        ],
    ],
    'rwanda' => [
        'name' => 'Rwanda', 'adj' => 'rwandais', 'currency' => 'Franc Rwandais (RWF)',
        'capital' => 'Kigali', 'flag' => '🇷🇼', 'pop' => '14 millions',
        'color1' => '#20603D', 'color2' => '#00A1DE',
        'methods' => [
            'mtn-momo' => ['name'=>'MTN Mobile Money RW','op'=>'MTN Rwanda','min'=>'500 RWF','max'=>'3 000 000 RWF','fee'=>'1%','time'=>'Instantané','ussd'=>'*182#'],
            'airtel-money' => ['name'=>'Airtel Money RW','op'=>'Airtel Rwanda','min'=>'500 RWF','max'=>'2 000 000 RWF','fee'=>'1%','time'=>'Instantané','ussd'=>'*185#'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'carte-visa' => ['name'=>'Carte Visa','op'=>'Banques Rwanda','min'=>'1 000 RWF','max'=>'500 000 RWF','fee'=>'2%','time'=>'Instantané','ussd'=>'Carte'],
            'litecoin' => ['name'=>'Litecoin','op'=>'LTC','min'=>'0.1 LTC','max'=>'Illimité','fee'=>'Très faible','time'=>'2-5 min','ussd'=>'Wallet'],
        ],
    ],
    'madagascar' => [
        'name' => 'Madagascar', 'adj' => 'malgache', 'currency' => 'Ariary (MGA)',
        'capital' => 'Antananarivo', 'flag' => '🇲🇬', 'pop' => '29 millions',
        'color1' => '#FC3D32', 'color2' => '#007E3A',
        'methods' => [
            'mvola' => ['name'=>'MVola','op'=>'Telma Madagascar','min'=>'1 000 MGA','max'=>'5 000 000 MGA','fee'=>'1%','time'=>'Instantané','ussd'=>'*111#'],
            'airtel-money' => ['name'=>'Airtel Money MG','op'=>'Airtel Madagascar','min'=>'1 000 MGA','max'=>'4 000 000 MGA','fee'=>'1.5%','time'=>'Instantané','ussd'=>'*185#'],
            'orange-money' => ['name'=>'Orange Money MG','op'=>'Orange Madagascar','min'=>'1 000 MGA','max'=>'3 000 000 MGA','fee'=>'1%','time'=>'Instantané','ussd'=>'*144#'],
            'bitcoin' => ['name'=>'Bitcoin','op'=>'Crypto','min'=>'0.0001 BTC','max'=>'Illimité','fee'=>'Variable','time'=>'30-60 min','ussd'=>'Wallet'],
            'usdt' => ['name'=>'USDT','op'=>'TRC20','min'=>'10 USDT','max'=>'Illimité','fee'=>'1-3 USDT','time'=>'1-5 min','ussd'=>'Wallet'],
            'ethereum' => ['name'=>'Ethereum','op'=>'ETH','min'=>'0.01 ETH','max'=>'Illimité','fee'=>'Variable','time'=>'5-15 min','ussd'=>'Wallet'],
            'bnb' => ['name'=>'BNB','op'=>'BSC','min'=>'0.01 BNB','max'=>'Illimité','fee'=>'Faible','time'=>'3-5 min','ussd'=>'Wallet'],
            'litecoin' => ['name'=>'Litecoin','op'=>'LTC','min'=>'0.1 LTC','max'=>'Illimité','fee'=>'Très faible','time'=>'2-5 min','ussd'=>'Wallet'],
        ],
    ],
];

// 3 types de pages par méthode - ANGLES TOTALEMENT DIFFÉRENTS
$PAGE_TYPES = [
    'comment-deposer' => [
        'h1_tpl' => 'Comment Déposer au Casino avec {method} au {country}',
        'meta_tpl' => 'Guide pratique dépôt casino {method} depuis {country}. {op}, min {min}, {time}. Étapes détaillées pour joueurs {adj}s.',
        'angle' => 'Guide pratique ultra-détaillé pour faire son PREMIER dépôt casino via {method} depuis {country}. Étapes concrètes avec codes USSD {ussd}, montants en {currency}, erreurs à éviter, confirmation de transaction. Très accessible pour débutant.',
        'img' => true,
    ],
    'retrait-gains' => [
        'h1_tpl' => 'Retirer ses Gains de Casino vers {method} au {country} — Guide Complet',
        'meta_tpl' => 'Comment retirer ses gains casino vers {method} au {country}. Délais, limites {max}, problèmes fréquents résolus. Pour joueurs {adj}s.',
        'angle' => 'Focus sur l\'anxiété du retrait casino via {method} au {country}. Explique exactement combien de temps prend le retrait (pas les délais marketing), les limites réelles, pourquoi parfois ça prend plus longtemps, et que faire si le retrait est bloqué. Très honnête et pratique.',
        'img' => false,
    ],
    'bonus-methode' => [
        'h1_tpl' => 'Bonus Casino Exclusifs pour Dépôts {method} en {country}',
        'meta_tpl' => 'Bonus casino spéciaux {method} pour joueurs {adj}s. Offres bienvenue, cashback, free spins. Maximiser ses gains depuis {country}.',
        'angle' => 'Présente les bonus EXCLUSIFS disponibles pour les joueurs {adj}s qui déposent via {method}. Explique pourquoi certains casinos font des offres spéciales pour ce mode de paiement, comment les activer, et comment maximiser sa valeur avec {method} depuis {country}.',
        'img' => false,
    ],
];

// 10 PETITS PAYS
$SMALL_COUNTRIES = [
    'togo' => ['name'=>'Togo','adj'=>'togolais','currency'=>'XOF','flag'=>'🇹🇬','capital'=>'Lomé','methods'=>'T-Money (*145#) et Moov Money (*155#)','color1'=>'#006A4E','color2'=>'#D21034'],
    'benin' => ['name'=>'Bénin','adj'=>'béninois','currency'=>'XOF','flag'=>'🇧🇯','capital'=>'Cotonou','methods'=>'MTN BJ (*126#) et Moov Money (*155#)','color1'=>'#008751','color2'=>'#E8112D'],
    'gabon' => ['name'=>'Gabon','adj'=>'gabonais','currency'=>'XAF','flag'=>'🇬🇦','capital'=>'Libreville','methods'=>'Airtel Money GA et Moov Money GA','color1'=>'#009E60','color2'=>'#003189'],
    'congo-brazzaville' => ['name'=>'Congo Brazzaville','adj'=>'congolais','currency'=>'XAF','flag'=>'🇨🇬','capital'=>'Brazzaville','methods'=>'Airtel Money CG et MTN Money CG','color1'=>'#009543','color2'=>'#DC241F'],
    'tchad' => ['name'=>'Tchad','adj'=>'tchadien','currency'=>'XAF','flag'=>'🇹🇩','capital'=>"N'Djamena",'methods'=>'Airtel Money TD et Moov Money TD','color1'=>'#002664','color2'=>'#C60C30'],
    'burundi' => ['name'=>'Burundi','adj'=>'burundais','currency'=>'BIF','flag'=>'🇧🇮','capital'=>'Bujumbura','methods'=>'Lumicash et Leo Cash','color1'=>'#CE1126','color2'=>'#1EB53A'],
    'centrafrique' => ['name'=>'Centrafrique','adj'=>'centrafricain','currency'=>'XAF','flag'=>'🇨🇫','capital'=>'Bangui','methods'=>'Orange Money CF et Moov Money CF','color1'=>'#003082','color2'=>'#BE0027'],
    'djibouti' => ['name'=>'Djibouti','adj'=>'djiboutien','currency'=>'DJF','flag'=>'🇩🇯','capital'=>'Djibouti','methods'=>'Waafi Money et D-Money','color1'=>'#6AB2E7','color2'=>'#12AD2B'],
    'mauritanie' => ['name'=>'Mauritanie','adj'=>'mauritanien','currency'=>'MRU','flag'=>'🇲🇷','capital'=>'Nouakchott','methods'=>'Bankily et Chinguipass','color1'=>'#006233','color2'=>'#FFD700'],
    'comores' => ['name'=>'Comores','adj'=>'comorien','currency'=>'KMF','flag'=>'🇰🇲','capital'=>'Moroni','methods'=>'Huri Money et virement bancaire','color1'=>'#3A75C4','color2'=>'#009A44'],
];

// Pages générales thématiques (30 pages)
$GENERAL_PAGES = [
    ['slug'=>'bitcoin-casino-afrique','h1'=>'Bitcoin Casino Afrique Francophone : La Liberté de Jouer Sans Frontières Ni Banque','meta'=>'Casino Bitcoin pour 20 pays africains francophones. Acheter BTC avec Mobile Money, déposer, retirer. Guide complet sans compte bancaire requis.','angle'=>'Bitcoin comme outil de liberté financière pour les africains. Explique comment acheter BTC avec Orange Money, Wave ou MTN depuis n\'importe quel pays africain francophone, puis déposer et jouer au casino. Très pratique, sans banque requise.','img'=>'Bitcoin casino Africa map coins mobile freedom no bank gold dark'],
    ['slug'=>'usdt-casino-afrique','h1'=>'USDT Casino Afrique : La Stablecoin Qui Protège Votre Argent des Fluctuations','meta'=>'Casino USDT Tether en Afrique francophone. Pas de volatilité, 1 USDT = 1 USD. TRC20 recommandé, dépôt rapide depuis Congo, Sénégal, CI.','angle'=>'USDT résout le problème de volatilité Bitcoin. Pour les africains qui ont peur que leurs gains baissent pendant un retrait. Explique TRC20 vs ERC20 (TRC20 moins cher pour l\'Afrique), comment acheter USDT avec Mobile Money via P2P Binance.','img'=>'USDT Tether casino Africa stable dollar green mobile payment fast'],
    ['slug'=>'ethereum-casino-afrique','h1'=>'Ethereum Casino en Afrique : Pour les Joueurs qui Veulent Plus que Bitcoin','meta'=>'Casino Ethereum pour Afrique francophone. ETH rapide, smart contracts, dépôt min 0.01 ETH. Alternative premium à Bitcoin pour joueurs africains connectés.','angle'=>'Ethereum pour les joueurs africains tech-savvy qui ont déjà utilisé Bitcoin et veulent explorer ETH. Explique les smart contracts, pourquoi ETH est plus rapide que BTC, mais aussi ses frais gas qui peuvent être élevés et comment les minimiser.','img'=>'Ethereum casino Africa tech savvy diamond logo digital speed'],
    ['slug'=>'bnb-casino-afrique','h1'=>'BNB Binance Casino Afrique : La Crypto la Plus Rapide et la Moins Chère','meta'=>'Casino BNB Binance Smart Chain en Afrique. Frais ultra-bas 0.5 BNB, confirmation en 3 secondes, disponible via Binance P2P. Guide africains.','angle'=>'BNB/BSC est objectivement la crypto la moins chère et la plus rapide pour les casinos. Explique pourquoi les joueurs africains qui ont Binance devraient utiliser BNB plutôt que BTC ou ETH pour leurs dépôts casino.','img'=>'BNB Binance coin yellow casino fast cheap Africa smart chain'],
    ['slug'=>'litecoin-casino-afrique','h1'=>'Litecoin Casino Afrique : L\'Argent Numérique Méconnu qui Vaut le Détour','meta'=>'Casino Litecoin en Afrique francophone. 4x plus rapide que Bitcoin, frais très bas, disponible via exchanges. Le choix des initiés africains.','angle'=>'Litecoin est méconnu mais excellent pour casino en Afrique. Positiver comme le secret des joueurs avertis: plus rapide que Bitcoin, moins cher qu\'Ethereum, plus stable que les altcoins. Comment acheter LTC depuis l\'Afrique.','img'=>'Litecoin silver crypto casino Africa fast underrated alternative'],
    ['slug'=>'wave-casino-afrique-ouest','h1'=>'Wave Casino Afrique de l\'Ouest : Jouer à 0% de Frais dans 5 Pays','meta'=>'Wave pour casino en Côte d\'Ivoire, Sénégal, Mali, Burkina, Guinée. 0% de frais, transferts instantanés. Le choix révolutionnaire pour l\'Afrique de l\'Ouest.','angle'=>'Wave est disponible dans 5 pays d\'Afrique de l\'Ouest et offre 0% de frais. Pour les joueurs qui voyagent ou ont des contacts dans plusieurs pays, Wave est LA solution unique. Compare les 5 pays et leurs spécificités.','img'=>'Wave casino West Africa 5 countries free transfer green revolution'],
    ['slug'=>'orange-money-casino-afrique','h1'=>'Orange Money Casino : Le Guide Ultime pour les 12 Pays où Orange Domine','meta'=>'Orange Money pour casino dans 12 pays africains. Congo, CI, Cameroun, Sénégal, Mali, Burkina, Niger, Guinée, Madagascar, Tchad, Centrafrique, Comores. Guide complet.','angle'=>'Orange Money est disponible dans 12+ pays africains francophones. Pour les joueurs qui voyagent ou qui ont de la famille dans différents pays, Orange Money est la solution universelle. Guide unifié pour tous les pays avec leurs spécificités.','img'=>'Orange Money casino Africa 12 countries orange universal payment'],
    ['slug'=>'mtn-money-casino-afrique','h1'=>'MTN Mobile Money Casino : Jouer dans 6 Pays avec un Seul Opérateur','meta'=>'MTN Mobile Money pour casino dans 6 pays africains francophones. Cameroun, CI, Rwanda, Guinée et plus. Le réseau panafricain le plus grand.','angle'=>'MTN est le plus grand réseau mobile en Afrique. Explique la présence MTN dans les pays francophones, comment MTN money fonctionne de façon similaire dans tous les pays, et les avantages d\'être client MTN pour les voyageurs africains.','img'=>'MTN Mobile Money casino Africa 6 countries yellow largest network'],
    ['slug'=>'casino-mobile-money-afrique','h1'=>'Mobile Money Casino en Afrique : Tout Comprendre en 10 Minutes','meta'=>'Guide complet Mobile Money pour casinos en Afrique francophone. M-Pesa, Orange, Wave, MTN, Airtel. Comment choisir, déposer, retirer. Pour débutants.','angle'=>'Le guide DÉFINITIF Mobile Money pour casino en Afrique. Pour quelqu\'un qui ne sait pas encore quel mobile money utiliser. Explique les différences entre tous les opérateurs, comment choisir selon son pays et son opérateur téléphonique.','img'=>'Mobile money casino Africa all operators comparison guide beginners'],
    ['slug'=>'casino-sans-compte-bancaire-afrique','h1'=>'Casino Sans Compte en Banque en Afrique : Mobile Money et Crypto Suffisent','meta'=>'Jouer au casino en Afrique sans compte bancaire. Mobile Money + Crypto = la solution pour 60% des africains non bancarisés. Guide pratique complet.','angle'=>'60% des africains n\'ont pas de compte bancaire. Guide spécifique pour eux: comment jouer au casino uniquement avec Mobile Money ou Crypto, sans jamais avoir besoin d\'une banque. Très important et sous-représenté dans les guides casino.','img'=>'Africa casino no bank account mobile money crypto freedom unbanked'],
    ['slug'=>'depot-minimum-casino-afrique','h1'=>'Casinos avec Dépôt Minimum de 1 000 XOF en Afrique : La Liste Complète','meta'=>'Casinos acceptant de petits dépôts depuis l\'Afrique. Min 200 XOF Wave, 500 XOF MTN, 100 XOF Wave CI. Pour joueurs africains avec petit budget.','angle'=>'Guide des petits budgets africains. Beaucoup de joueurs en Afrique veulent commencer avec très peu. Quels casinos acceptent des dépôts de 200-500 XOF? Comment maximiser son plaisir avec un petit budget via Mobile Money.','img'=>'Casino minimum deposit Africa small budget 1000 XOF accessible'],
    ['slug'=>'retrait-rapide-casino-afrique','h1'=>'Retrait Rapide Casino en Afrique : Quelle Méthode Pour Recevoir en Moins d\'1 Heure','meta'=>'Méthodes de retrait casino les plus rapides en Afrique. Wave 0% en 5 min, USDT TRC20 en 2 min, MTN en 20 min. Classement vitesse par pays africain.','angle'=>'Classement des méthodes de retrait casino par VITESSE en Afrique. De la plus rapide (USDT TRC20: 2 min) à la plus lente (virement bancaire: 3 jours). Données réelles, pas du marketing. Quel joueur africain devrait choisir quoi.','img'=>'Fast withdrawal casino Africa speed clock mobile money crypto quick'],
    ['slug'=>'casino-afrique-sans-frais','h1'=>'Jouer au Casino en Afrique Sans Payer de Frais de Transaction : C\'est Possible','meta'=>'Casino Afrique sans frais. Wave 0%, USDT TRC20 quasi-gratuit, BNB ultra-faible. Économisez sur chaque transaction. Guide pour joueurs africains.','angle'=>'Obsession africaine: les frais. Chaque franc CFA compte. Guide des méthodes SANS frais ou quasi-sans frais pour le casino en Afrique. Wave 0%, comment minimiser les frais crypto, et pourquoi certains joueurs économisent 5% de frais chaque mois.','img'=>'Zero fee casino Africa Wave free transaction save money African'],
    ['slug'=>'binance-p2p-afrique-casino','h1'=>'Binance P2P en Afrique : Comment Acheter de la Crypto pour Jouer au Casino','meta'=>'Acheter crypto via Binance P2P depuis l\'Afrique francophone. Payer en Mobile Money, recevoir BTC/USDT/BNB. Guide pour joueurs africains sans carte bancaire.','angle'=>'Binance P2P est LA solution pour les africains qui veulent acheter de la crypto sans carte bancaire internationale. Explique exactement comment ça marche: trouver un vendeur P2P, payer avec Orange Money ou Wave, recevoir sa crypto en minutes.','img'=>'Binance P2P Africa buy crypto mobile money orange wave tutorial'],
    ['slug'=>'securite-paiement-casino-afrique','h1'=>'Sécurité des Paiements Casino en Afrique : Comment Protéger Son Argent','meta'=>'Sécuriser ses paiements casino depuis l\'Afrique. Fraudes fréquentes, casinos légitimes, protection Mobile Money. Guide sécurité pour joueurs africains.','angle'=>'Guide sécurité indispensable pour les africains. Les arnaques casino ciblant les africains, comment repérer un casino frauduleux, comment protéger son compte Mobile Money, et pourquoi la crypto offre plus de sécurité contre certains types de fraude.','img'=>'Security casino payment Africa shield protection fraud mobile money'],
    // 15 pages supplémentaires générales
    ['slug'=>'airtel-money-casino-afrique','h1'=>'Airtel Money Casino : Guide pour les Pays où Airtel Domine','meta'=>'Casino Airtel Money en Afrique francophone. Congo RDC, Niger, Rwanda, Madagascar, Guinée. Le réseau Airtel pour le casino. Guide complet par pays.','angle'=>'Airtel est souvent sous-estimé mais dominant dans certains pays africains. Cartographie précise des pays où Airtel domine sur Orange/MTN pour le casino: Congo RDC (Airtel = #2), Niger (Airtel = #1), Rwanda (Airtel = #2). Guide par pays.','img'=>'Airtel Money casino Africa red network countries guide'],
    ['slug'=>'casino-afrique-francophone-guide','h1'=>'Casino en Ligne Afrique Francophone : Le Guide Complet pour Tous les Pays','meta'=>'Guide complet casino en ligne pour les 20 pays d\'Afrique francophone. Méthodes de paiement, bonus, jeux populaires. Tout ce qu\'il faut savoir pour jouer depuis l\'Afrique.','angle'=>'L\'article de référence ultime sur le casino en ligne en Afrique francophone. Couvre les 20 pays, les méthodes de paiement par région, les jeux les plus populaires (Aviator en tête), les bonus disponibles, et les considérations légales de base.','img'=>'Africa francophone casino guide map 20 countries complete reference'],
    ['slug'=>'casino-afrique-aviator','h1'=>'Aviator Casino en Afrique : Jouer au Jeu le Plus Populaire du Continent','meta'=>'Aviator casino en Afrique francophone. Le jeu crash le plus joué d\'Afrique. Comment déposer via Mobile Money pour jouer à Aviator depuis le Congo, Sénégal, CI.','angle'=>'Aviator est le jeu le plus populaire en Afrique subsaharienne. Explique pourquoi (accessibilité, gains rapides, mobile-friendly), comment déposer via Mobile Money pour jouer à Aviator, et les stratégies que les africains utilisent (cashout précoce vs risqué).','img'=>'Aviator game Africa most popular airplane multiplier mobile casino'],
    ['slug'=>'crypto-mobile-money-combo-afrique','h1'=>'Combiner Mobile Money et Crypto au Casino : La Stratégie des Joueurs Africains Avertis','meta'=>'Utiliser Mobile Money ET crypto pour le casino en Afrique. Dépôt Mobile Money + retrait crypto = stratégie optimale. Guide pour joueurs africains expérimentés.','angle'=>'Les joueurs africains expérimentés utilisent les DEUX: Mobile Money pour déposer (simple, instantané), crypto pour retirer (pas de limites, anonymat). Explique cette stratégie hybride, ses avantages, et comment la mettre en place.','img'=>'Mobile money crypto combo Africa strategy experienced player hybrid'],
    ['slug'=>'casino-afrique-vip-paiement','h1'=>'Casino VIP en Afrique : Méthodes de Paiement pour les Gros Joueurs Africains','meta'=>'Paiements casino VIP pour gros joueurs africains. Dépasser les limites Mobile Money avec crypto. Services VIP disponibles depuis le Congo, Cameroun, CI.','angle'=>'Pour les joueurs africains qui ont des montants importants à déposer/retirer. Les limites Mobile Money deviennent bloquantes. Explique les méthodes sans limites (crypto), les casinos VIP qui acceptent les africains, et comment accéder aux tables hauts enjeux.','img'=>'VIP casino Africa high roller crypto no limits premium service'],
    ['slug'=>'casino-afrique-bonus-bienvenue-paiement','h1'=>'Bonus de Bienvenue Casino en Afrique : Quelle Méthode de Paiement Donne le Plus?','meta'=>'Maximiser son bonus casino bienvenue en Afrique selon la méthode de paiement. Wave 0% frais = plus de bonus. Bitcoin = bonus crypto supplémentaire. Guide.','angle'=>'Angle financier unique: quel mode de paiement MAXIMISE la valeur du bonus? Si tu déposes 10 000 XOF avec Wave (0% frais) vs Orange Money (1% frais), tu reçois plus de bonus effectif. Et les casinos qui ont des bonus SPÉCIAUX pour crypto.','img'=>'Bonus casino Africa payment method maximize value comparison'],
    ['slug'=>'paiement-casino-afrique-2024','h1'=>'Méthodes de Paiement Casino Afrique : Ce qui a Changé et Ce qui Fonctionne Maintenant','meta'=>'État actuel des paiements casino en Afrique francophone. Nouvelles méthodes, casinos qui ont arrêté certaines options, meilleures alternatives. Guide actualisé.','angle'=>'Article "actualité": qu\'est-ce qui a changé dans les paiements casino en Afrique? Nouvelles intégrations Wave dans des casinos, crypto de plus en plus acceptée, certains casinos qui ont arrêté accepter certains pays. Bref, l\'état réel du marché.','img'=>'Casino payment Africa current state update new methods trends'],
    ['slug'=>'problemes-paiement-casino-afrique','h1'=>'Problèmes de Paiement Casino en Afrique : Solutions pour les 10 Cas les Plus Fréquents','meta'=>'Résoudre les problèmes de paiement casino en Afrique. Dépôt non crédité, retrait bloqué, compte suspendu. Solutions pratiques pour joueurs africains.','angle'=>'Article de résolution de problèmes - unique et très cherché. Les 10 problèmes les plus fréquents des joueurs africains avec les paiements casino: dépôt non crédité, retrait qui tarde, compte bloqué, Mobile Money refusé. Solution concrète pour chacun.','img'=>'Problem solving casino payment Africa solutions troubleshoot mobile'],
    ['slug'=>'casino-afrique-premier-depot','h1'=>'Premier Dépôt Casino en Afrique : Le Guide Zéro Stress pour Commencer','meta'=>'Faire son premier dépôt casino depuis l\'Afrique. Choisir sa méthode, montant recommandé, activer le bonus. Guide rassurant pour nouveaux joueurs africains.','angle'=>'Pour les africains qui n\'ont JAMAIS fait de dépôt casino. Guide ultra-rassurant et bienveillant. Normalise le jeu en ligne, explique que c\'est sûr si on choisit les bons casinos, guide le premier dépôt de 500 XOF à 1000 XOF avec Mobile Money.','img'=>'First deposit casino Africa beginner guide reassuring mobile money'],
    ['slug'=>'casino-afrique-android-mobile-money','h1'=>'Jouer au Casino depuis Android avec Mobile Money en Afrique : Guide Optimisé','meta'=>'Casino Android avec Mobile Money en Afrique. Tecno, Infinix, Samsung A-series, connexion 3G/4G variable. Guide optimisé pour la réalité africaine.','angle'=>'La réalité technologique africaine: Tecno, Infinix, Samsung A-series (pas les flagships). Connexion 4G dans les villes, 3G instable en régions. Guide optimisé pour ces conditions réelles: quels jeux casino sont légers, comment Mobile Money fonctionne sur ces appareils.','img'=>'Android casino Africa mobile money Tecno Infinix budget smartphone'],
    ['slug'=>'casino-afrique-litecoin-bnb','h1'=>'Litecoin et BNB au Casino en Afrique : Les Deux Cryptos que Personne ne Mentionne','meta'=>'Litecoin et BNB pour casino en Afrique. Moins connus mais souvent meilleurs que Bitcoin. Frais ultra-bas, rapidité, comment acheter depuis l\'Afrique.','angle'=>'Article sur les cryptos OUBLIÉES mais excellentes pour casino en Afrique. LTC et BNB sont souvent meilleurs que BTC/ETH pour les africains mais personne n\'en parle. Explique pourquoi et comment les obtenir depuis l\'Afrique via Binance P2P.','img'=>'Litecoin BNB casino Africa hidden gems crypto fast cheap underrated'],
    ['slug'=>'casino-afrique-compte-verifie','h1'=>'Vérification de Compte Casino en Afrique : Comment s\'en Sortir Sans Document Officiel','meta'=>'KYC casino en Afrique. Comment vérifier son compte sans passeport ou carte nationale. Alternatives pour joueurs africains. Astuces pour accélérer la vérification.','angle'=>'Le KYC est un obstacle majeur pour les africains. Beaucoup n\'ont pas de passeport ou leurs documents sont difficiles à scanner. Guide pratique: quels documents sont acceptés, comment photographier ses pièces, les casinos les plus faciles pour la vérification africaine.','img'=>'KYC verification casino Africa documents ID card mobile scan'],
    ['slug'=>'casino-afrique-retraits-limites','h1'=>'Retrait Casino Afrique : Comment Dépasser les Limites de Vos Méthodes de Paiement','meta'=>'Dépasser les limites de retrait casino en Afrique. Mobile Money plafonné? Solutions crypto, virement bancaire, méthodes combinées. Guide pour gros gains.','angle'=>'Quand on gagne gros au casino en Afrique, les limites Mobile Money deviennent un problème. Guide pour ceux qui ont un retrait de 500 000 XOF+ à effectuer: comment combiner plusieurs méthodes, passer à la crypto, contacter le support VIP du casino.','img'=>'Casino withdrawal limit Africa big win solution crypto bank'],
    ['slug'=>'casino-afrique-francais','h1'=>'Casinos en Ligne en Français pour l\'Afrique : Interface, Support et Jeux Localisés','meta'=>'Casinos en français adaptés aux joueurs africains. Interface locale, support francophone, jeux populaires en Afrique. Guide sélection pour joueurs africains francophones.','angle'=>'L\'importance de jouer dans sa langue. Les africains francophones veulent un casino EN FRANÇAIS avec un support qui comprend leur réalité. Explique comment reconnaître un vrai casino francophone vs un simple site traduit, et quels critères privilegier.','img'=>'French casino Africa francophone support interface local language'],
    ['slug'=>'casino-afrique-gains-argent-reel','h1'=>'Gagner de l\'Argent Réel au Casino depuis l\'Afrique : Ce que Personne n\'Ose Dire','meta'=>'Gains réels casino en Afrique. Vérité sur les probabilités, Mobile Money pour retirer, cas de vrais gagnants africains. Guide honnête sur les gains casino.','angle'=>'Article honnête et courageux: peut-on VRAIMENT gagner de l\'argent réel au casino depuis l\'Afrique? Présente les deux côtés: oui des africains gagnent (et retirent via Mobile Money), mais aussi les réalités des probabilités. Honnête sans être décourageant.','img'=>'Real money casino Africa honest truth winning mobile money withdraw'],
];

// CSS
$CSS = '
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
:root{--p:#1B4332;--p2:#2D6A4F;--a:#FFD166;--a2:#F4A261;--dk:#0A0F0D;--cd:#111A15;--cd2:#192219;--tx:#E8F5E9;--mt:#7A9E7E;--rd:#E63946;--gn:#52B788;--gl:#FFD166}
html{scroll-behavior:smooth}
body{background:var(--dk);color:var(--tx);font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;overflow-x:hidden;padding-bottom:80px}
a{text-decoration:none;color:inherit}
.bar{background:rgba(10,15,13,.97);backdrop-filter:blur(10px);padding:10px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:200;border-bottom:1px solid rgba(82,183,136,.15)}
.logo{font-size:19px;font-weight:800;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.top-cta{background:linear-gradient(135deg,var(--p),var(--p2));color:#fff;padding:7px 14px;border-radius:8px;font-size:12px;font-weight:700}
.dnav{display:none}
@media(min-width:768px){.dnav{display:flex;gap:24px}.dnav a{color:var(--mt);font-size:14px;font-weight:600}.dnav a:hover{color:var(--a)}.bar{padding:14px 40px}.wrap{max-width:900px;margin:0 auto}.bnav{display:none!important}body{padding-bottom:20px}}
.hero{width:100%;height:200px;object-fit:cover;display:block}
.flag-bar{height:5px}
.hdr{padding:14px 16px}
.badge{display:inline-flex;align-items:center;gap:6px;background:rgba(82,183,136,.1);border:1px solid rgba(82,183,136,.2);color:var(--gn);padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;margin-bottom:10px}
.h1{font-size:20px;font-weight:900;line-height:1.28;margin-bottom:8px}
.h1 em{font-style:normal;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.intro{font-size:13px;color:var(--mt);line-height:1.65}
.pills{display:flex;gap:8px;flex-wrap:wrap;padding:10px 16px;border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05)}
.pill{background:var(--cd);border-radius:8px;padding:7px 11px;border:1px solid rgba(255,255,255,.06)}
.pill-l{color:var(--mt);font-size:10px;margin-bottom:2px}
.pill-v{color:var(--a);font-weight:700;font-size:12px}
.cta-box{margin:12px 16px;background:linear-gradient(135deg,#0D2318,#162E1E);border:1px solid rgba(82,183,136,.2);border-radius:14px;padding:16px;text-align:center}
.cta-t{font-size:20px;font-weight:900;margin-bottom:4px}
.cta-t span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.cta-s{font-size:12px;color:var(--mt);margin-bottom:12px}
.cta-btn{display:block;background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;padding:13px;border-radius:11px;font-weight:800;font-size:15px;text-align:center}
.wrap{padding:0 16px}
.sec{margin-bottom:18px}
.sec-t{font-size:15px;font-weight:800;margin-bottom:10px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.06)}
.sec-t span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.btext{font-size:13px;color:rgba(232,245,233,.88);line-height:1.72}
.btext p{margin-bottom:12px}
.btext h2{font-size:16px;font-weight:800;margin:18px 0 10px}
.btext h3{font-size:14px;font-weight:700;margin:14px 0 8px;color:var(--a)}
.btext ul,.btext ol{margin:0 0 12px 20px}
.btext li{margin-bottom:6px}
.btext strong{color:var(--tx)}
.btext a{color:var(--gn);font-weight:600}
.faq-item{background:var(--cd);border-radius:11px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:13px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;align-items:center;cursor:pointer;line-height:1.4}
.fi{color:var(--gn);font-size:18px;transition:.2s;flex-shrink:0;margin-left:8px}
.faq-item.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--mt);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq-item.open .fa{max-height:300px;padding:0 16px 14px}
.rel-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.rel-grid{grid-template-columns:repeat(3,1fr)}}
.rel-card{background:var(--cd);border-radius:10px;padding:10px;border:1px solid rgba(255,255,255,.06);display:block;font-size:12px;font-weight:700;line-height:1.4}
.rel-card:hover{border-color:rgba(255,209,102,.3)}
.rel-sub{font-size:11px;color:var(--mt);margin-top:3px}
.bnav{position:fixed;bottom:0;left:0;right:0;background:rgba(10,15,13,.97);backdrop-filter:blur(10px);border-top:1px solid rgba(82,183,136,.1);display:flex;padding:8px 0 max(8px,env(safe-area-inset-bottom));z-index:200}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--mt);font-size:10px;font-weight:700}
.ni.on{color:var(--a)}
.ni-ico{font-size:22px}
';

$NAV = '<nav class="bar"><a href="/" class="logo">🎲 CasinoAfrique</a><div class="dnav"><a href="/casino/">Pays</a><a href="/bonus/">Bonus</a><a href="/jeux/">Jeux</a><a href="/paiement/" style="color:var(--a)">Paiement</a></div><a href="'.$AFF[0].'" target="_blank" rel="noopener" class="top-cta">Jouer →</a></nav>';
$BNAV = '<nav class="bnav"><a href="/" class="ni"><span class="ni-ico">🏠</span>Accueil</a><a href="/casino/" class="ni"><span class="ni-ico">🌍</span>Pays</a><a href="/bonus/" class="ni"><span class="ni-ico">🎁</span>Bonus</a><a href="/jeux/" class="ni"><span class="ni-ico">🎰</span>Jeux</a><a href="/paiement/" class="ni on"><span class="ni-ico">💳</span>Paiement</a></nav>';

function claude($prompt, $key, $tokens = 800) {
    $data = json_encode(['model'=>'claude-sonnet-4-6','max_tokens'=>$tokens,'messages'=>[['role'=>'user','content'=>$prompt]]]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','x-api-key: '.$key,'anthropic-version: 2023-06-01'],CURLOPT_TIMEOUT=>60]);
    $r = json_decode(curl_exec($ch),true);
    curl_close($ch);
    $t = trim($r['content'][0]['text'] ?? '');
    return preg_replace('/```html|```/i','',$t);
}

function genImg($prompt, $file, $key, $dir) {
    if (empty($prompt)) return null;
    $path = $dir.'/'.$file;
    $jpg = str_replace('.png','.jpg',$path);
    if (file_exists($jpg)) { return '/images/paiement/'.str_replace('.png','.jpg',$file); }
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', professional, vibrant, no text','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_TIMEOUT=>90]);
    $r = json_decode(curl_exec($ch),true);
    curl_close($ch);
    if (!isset($r['data'][0]['b64_json'])) return null;
    file_put_contents($path, base64_decode($r['data'][0]['b64_json']));
    $img = imagecreatefrompng($path);
    imagejpeg($img,$jpg,83);
    imagedestroy($img);
    unlink($path);
    return '/images/paiement/'.str_replace('.png','.jpg',$file);
}

function buildPage($h1, $meta, $intro, $body, $faqHtml, $pills, $relHtml, $affLink, $imgPath, $c1, $c2, $badge) {
    global $NAV, $BNAV, $CSS;
    $imgTag = $imgPath ? '<img src="'.$imgPath.'" alt="'.htmlspecialchars($h1).'" class="hero">' : '';
    $flagBar = '<div class="flag-bar" style="background:linear-gradient(90deg,'.$c1.','.$c2.')"></div>';
    $pillsHtml = '';
    foreach ($pills as $l=>$v) $pillsHtml .= '<div class="pill"><div class="pill-l">'.$l.'</div><div class="pill-v">'.$v.'</div></div>';
    return '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><meta name="theme-color" content="#0A0F0D"><title>'.htmlspecialchars($h1).' | CasinoAfrique</title><meta name="description" content="'.htmlspecialchars($meta).'"><link rel="icon" type="image/png" href="/favicon.png"><style>'.$CSS.'</style></head><body>'.$NAV.$imgTag.$flagBar.'<div class="hdr"><div class="badge">💳 '.$badge.'</div><h1 class="h1"><em>'.htmlspecialchars($h1).'</em></h1><p class="intro">'.$intro.'</p></div><div class="pills">'.$pillsHtml.'</div><div class="cta-box"><div class="cta-t">🎰 <span>Jouer Maintenant</span></div><div class="cta-s">Mobile Money & Crypto · Bonus exclusif · Inscription gratuite</div><a href="'.$affLink.'" target="_blank" rel="noopener" class="cta-btn">Jouer avec ce Mode de Paiement →</a></div><div class="wrap"><div class="sec"><div class="sec-t">📖 <span>Guide Complet</span></div><div class="btext">'.$body.'</div></div><div class="cta-box" style="margin:0 0 18px"><div class="cta-t">🔥 <span>Prêt à Jouer?</span></div><div class="cta-s">Bonus de bienvenue · Retrait rapide · Mobile Money</div><a href="'.$affLink.'" target="_blank" rel="noopener" class="cta-btn">S\'inscrire et Déposer →</a></div><div class="sec"><div class="sec-t">❓ <span>Questions Fréquentes</span></div>'.$faqHtml.'</div><div class="sec"><div class="sec-t">💳 <span>Voir Aussi</span></div><div class="rel-grid">'.$relHtml.'</div></div></div>'.$BNAV.'<script>document.querySelectorAll(".fq").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));</script></body></html>';
}

$allSlugs = [];
$pageCount = 0;

echo "=== PAYMENT GENERATOR 300 PAGES ===\n\n";

// ============================================
// GRANDS PAYS: 10 pays × 8 méthodes × 3 types = 240 pages
// ============================================
echo "📱 GRANDS PAYS (240 pages)\n\n";

foreach ($BIG_COUNTRIES as $countrySlug => $country) {
    echo "🌍 ".$country['name']."\n";

    foreach ($country['methods'] as $methodSlug => $method) {
        foreach ($PAGE_TYPES as $typeKey => $ptype) {
            $pageCount++;

            // Build slug
            $slug = $typeKey.'-'.$methodSlug.'-'.$countrySlug;
            $dir = $PAY_DIR.'/'.$slug;
            if (!is_dir($dir)) mkdir($dir, 0755, true);

            // Replace placeholders
            $h1 = str_replace(['{method}','{country}','{op}','{min}','{max}','{time}','{ussd}','{currency}','{adj}'],
                [$method['name'],$country['name'],$method['op'],$method['min'],$method['max'],$method['time'],$method['ussd'],$country['currency'],$country['adj']],
                $ptype['h1_tpl']);

            $meta = str_replace(['{method}','{country}','{op}','{min}','{max}','{time}','{ussd}','{currency}','{adj}'],
                [$method['name'],$country['name'],$method['op'],$method['min'],$method['max'],$method['time'],$method['ussd'],$country['currency'],$country['adj']],
                $ptype['meta_tpl']);

            $angle = str_replace(['{method}','{country}','{op}','{min}','{max}','{time}','{ussd}','{currency}','{adj}'],
                [$method['name'],$country['name'],$method['op'],$method['min'],$method['max'],$method['time'],$method['ussd'],$country['currency'],$country['adj']],
                $ptype['angle']);

            echo "  [".$pageCount."] ".$h1."\n";

            // Image seulement pour comment-deposer
            $imgPath = null;
            if ($typeKey === 'comment-deposer') {
                $imgPrompt = $method['name'].' '.$country['name'].' casino payment mobile '.$country['color1'].' African';
                $imgPath = genImg($imgPrompt, $slug.'.png', $OPENAI_KEY, $IMG_DIR);
            }

            // Intro
            $intro = claude(
                "Expert casino africain. 2 phrases d'accroche PERCUTANTES et vendeuses pour: \"".$h1."\"\nAngle: ".$angle."\nCes phrases doivent être UNIQUES, pas génériques. Directes, actionnables, en français naturel africain. SEULEMENT 2 phrases.",
                $ANTHROPIC_KEY, 150
            );

            // Body
            $body = claude(
                "Journaliste casino Afrique francophone. Article UNIQUE sur: \"".$h1."\"\n\nAngle OBLIGATOIRE: ".$angle."\n\nContexte précis:\n- Méthode: ".$method['name']." via ".$method['op']."\n- USSD: ".$method['ussd']."\n- Min: ".$method['min'].", Max: ".$method['max']."\n- Frais: ".$method['fee'].", Délai: ".$method['time']."\n- Pays: ".$country['name'].", Capitale: ".$country['capital']."\n- Monnaie: ".$country['currency']."\n- Population: ".$country['pop']."\n\n4 sections <h2> avec <p>. 700-900 mots. Pratique, données réelles, exemples concrets. Vendeur sans être publicitaire. Français naturel. Pas d'année. Seulement le HTML.",
                $ANTHROPIC_KEY, 1500
            );

            // FAQ - 3 questions uniques selon type
            $faqSeeds = [
                'comment-deposer' => [
                    "Que faire si mon dépôt ".$method['name']." n'arrive pas au casino?",
                    "Quel est le montant minimum recommandé pour déposer avec ".$method['name']." au ".$country['name']."?",
                    "Peut-on déposer ".$method['name']." depuis ".$country['capital']." et les régions?"
                ],
                'retrait-gains' => [
                    "Combien de temps prend RÉELLEMENT un retrait vers ".$method['name']." au ".$country['name']."?",
                    "Y a-t-il des frais de retrait casino vers ".$method['name']." en plus des frais ".$method['op']."?",
                    "Que faire si mon retrait ".$method['name']." est bloqué depuis ".$country['name']."?"
                ],
                'bonus-methode' => [
                    "Les casinos offrent-ils vraiment des bonus spéciaux pour ".$method['name']." au ".$country['name']."?",
                    "Comment activer un bonus casino après un dépôt ".$method['name']." depuis ".$country['name']."?",
                    "Le cashback est-il disponible pour les joueurs ".$country['adj']."s qui utilisent ".$method['name']."?"
                ],
            ];

            $questions = $faqSeeds[$typeKey];
            $faqHtml = '';
            foreach ($questions as $q) {
                $ans = claude("2 phrases précises: \"".$q."\". Contexte: ".$method['name'].", ".$country['name'].", ".$country['currency'].". Pratique et honnête.", $ANTHROPIC_KEY, 120);
                $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
            }

            // Related
            $relHtml = '';
            $relCount = 0;
            foreach ($country['methods'] as $rSlug => $rMethod) {
                if ($rSlug === $methodSlug) continue;
                $rUrl = '/paiement/comment-deposer-'.$rSlug.'-'.$countrySlug.'/';
                $relHtml .= '<a href="'.$rUrl.'" class="rel-card">'.htmlspecialchars($rMethod['name']).' — '.$country['name'].'<div class="rel-sub">'.$rMethod['time'].' · '.$rMethod['fee'].'</div></a>';
                if (++$relCount >= 4) break;
            }

            $pills = ['Méthode'=>$method['name'],'Opérateur'=>$method['op'],'Min'=>$method['min'],'Frais'=>$method['fee'],'Délai'=>$method['time'],'Pays'=>$country['flag'].' '.$country['name']];
            $affLink = $AFF[$pageCount % 3];

            $html = buildPage($h1,$meta,$intro,$body,$faqHtml,$pills,$relHtml,$affLink,$imgPath,$country['color1'],$country['color2'],$method['name'].' · '.$country['flag']);
            file_put_contents($dir.'/index.html', $html);
            $allSlugs[] = $slug;
            echo "    ✅\n";
            sleep(1);
        }
    }
}

// ============================================
// PETITS PAYS: 10 pays × 3 pages = 30 pages
// ============================================
echo "\n🌍 PETITS PAYS (30 pages)\n\n";

$smallTypes = [
    '' => ['h1_tpl'=>'Casino en Ligne {country} : Payer avec {methods} depuis {capital}','meta_tpl'=>'Casino {country} avec {methods}. Guide complet pour joueurs {adj}s à {capital}. Dépôt, retrait, bonus. Tout en {currency}.','angle'=>'Vue d\'ensemble des méthodes de paiement disponibles au {country}. Explique le contexte local, quelle méthode choisir selon sa région, les avantages et limites. Guide complet pour un {adj} qui débute au casino.','img'=>true],
    '-depot' => ['h1_tpl'=>'Premier Dépôt Casino depuis {country} : Guide Pratique {capital}','meta_tpl'=>'Faire son premier dépôt casino depuis {country} avec {methods}. Étapes simples, montants en {currency}. Pour joueurs {adj}s.','angle'=>'Guide pour les {adj}s qui font leur PREMIER dépôt casino. Très bienveillant et rassurant. Choisir sa méthode ({methods}), montant recommandé, activer le bonus bienvenue.','img'=>false],
    '-bonus' => ['h1_tpl'=>'Bonus Casino pour Joueurs {adj}s : Ce qui Est Vraiment Disponible depuis {country}','meta_tpl'=>'Bonus casino accessibles depuis {country}. Offres bienvenue, cashback, free spins. Ce qui fonctionne vraiment pour les {adj}s avec {methods}.','angle'=>'Article honnête sur les bonus accessibles aux joueurs de {country}. Tous les bonus ne sont pas disponibles partout. Explique ce qui fonctionne vraiment, les restrictions géographiques, et comment maximiser les offres disponibles.','img'=>false],
];

foreach ($SMALL_COUNTRIES as $cSlug => $c) {
    echo "🌍 ".$c['name']."\n";
    foreach ($smallTypes as $suffix => $stype) {
        $pageCount++;
        $slug = 'casino-'.$cSlug.$suffix;
        $dir = $PAY_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $h1 = str_replace(['{country}','{adj}','{currency}','{methods}','{capital}'],[$c['name'],$c['adj'],$c['currency'],$c['methods'],$c['capital']],$stype['h1_tpl']);
        $meta = str_replace(['{country}','{adj}','{currency}','{methods}','{capital}'],[$c['name'],$c['adj'],$c['currency'],$c['methods'],$c['capital']],$stype['meta_tpl']);
        $angle = str_replace(['{country}','{adj}','{currency}','{methods}','{capital}'],[$c['name'],$c['adj'],$c['currency'],$c['methods'],$c['capital']],$stype['angle']);

        echo "  [".$pageCount."] ".$h1."\n";

        $imgPath = null;
        if ($stype['img']) {
            $imgPath = genImg($c['name'].' casino mobile money payment '.$c['flag'].' African', $slug.'.png', $OPENAI_KEY, $IMG_DIR);
        }

        $intro = claude("2 phrases d'accroche uniques pour: \"".$h1."\"\nAngle: ".$angle."\nFrançais naturel africain. SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);
        $body = claude("Article UNIQUE sur: \"".$h1."\"\nAngle: ".$angle."\nContexte: ".$c['name'].", capitale ".$c['capital'].", devise ".$c['currency'].", méthodes dispo: ".$c['methods']."\n3 sections <h2>. 500-700 mots. Pratique. Pas d'année. Seulement HTML.", $ANTHROPIC_KEY, 1000);

        $faqHtml = '';
        $fqs = ["Peut-on vraiment jouer au casino en ligne depuis ".$c['name']."?","Quelles sont les meilleures méthodes de paiement au ".$c['name']."?","Comment retirer ses gains de casino en ".$c['currency']."?"];
        foreach ($fqs as $q) {
            $ans = claude("2 phrases: \"".$q."\". ".$c['name'].", ".$c['currency'].", ".$c['methods'].". Naturel.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($SMALL_COUNTRIES as $rSlug => $rc) {
            if ($rSlug === $cSlug) continue;
            $relHtml .= '<a href="/paiement/casino-'.$rSlug.'/" class="rel-card">'.$rc['flag'].' '.$rc['name'].'<div class="rel-sub">'.$rc['methods'].'</div></a>';
            if (substr_count($relHtml,'rel-card') >= 4) break;
        }

        $pills = ['Pays'=>$c['flag'].' '.$c['name'],'Méthodes'=>$c['methods'],'Devise'=>$c['currency'],'Capitale'=>$c['capital']];
        $affLink = $AFF[$pageCount % 3];
        $html = buildPage($h1,$meta,$intro,$body,$faqHtml,$pills,$relHtml,$affLink,$imgPath,$c['color1'],$c['color2'],$c['flag'].' '.$c['name']);
        file_put_contents($dir.'/index.html', $html);
        $allSlugs[] = $slug;
        echo "    ✅\n";
        sleep(1);
    }
}

// ============================================
// PAGES GÉNÉRALES (30 pages)
// ============================================
echo "\n🌍 PAGES GÉNÉRALES (30 pages)\n\n";

foreach ($GENERAL_PAGES as $gp) {
    $pageCount++;
    $dir = $PAY_DIR.'/'.$gp['slug'];
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    echo "[".$pageCount."] ".$gp['h1']."\n";

    $imgPath = null;
    if (!empty($gp['img'])) {
        $imgPath = genImg($gp['img'], $gp['slug'].'.png', $OPENAI_KEY, $IMG_DIR);
    }

    $intro = claude("2 phrases d'accroche UNIQUES et vendeuses pour: \"".$gp['h1']."\"\nAngle: ".$gp['angle']."\nFrançais naturel africain. SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);
    $body = claude("Article UNIQUE sur: \"".$gp['h1']."\"\nAngle obligatoire: ".$gp['angle']."\n4 sections <h2>, 700-900 mots, pratique, données concrètes, exemples africains réels. Pas d'année. Seulement HTML.", $ANTHROPIC_KEY, 1500);

    $faqHtml = '';
    $fqRaw = claude("3 questions FAQ uniques pour: \"".$gp['h1']."\". Ce que les africains cherchent VRAIMENT sur ce sujet. Format: q1|||q2|||q3. Seulement ça.", $ANTHROPIC_KEY, 150);
    foreach (explode('|||', $fqRaw) as $q) {
        $q = trim($q);
        if (empty($q)) continue;
        $ans = claude("2 phrases: \"".$q."\". Contexte africain francophone. Naturel et vendeur.", $ANTHROPIC_KEY, 100);
        $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
    }

    $relHtml = '';
    foreach (array_slice($GENERAL_PAGES, 0, 5) as $rp) {
        if ($rp['slug'] === $gp['slug']) continue;
        $relHtml .= '<a href="/paiement/'.$rp['slug'].'/" class="rel-card">'.htmlspecialchars($rp['h1']).'<div class="rel-sub">Guide paiement Afrique</div></a>';
        if (substr_count($relHtml,'rel-card') >= 4) break;
    }

    $pills = ['Type'=>'Guide Afrique','Mobile Money'=>'Tous pays','Crypto'=>'Bitcoin, USDT, ETH','Public'=>'Joueurs africains'];
    $affLink = $AFF[$pageCount % 3];
    $html = buildPage($gp['h1'],$gp['meta'],$intro,$body,$faqHtml,$pills,$relHtml,$affLink,$imgPath,'#1B4332','#FFD166','💳 Guide Afrique');
    file_put_contents($dir.'/index.html', $html);
    $allSlugs[] = $gp['slug'];
    echo "  ✅\n";
    sleep(1);
}

// LISTING
echo "\n📋 LISTING PAGE\n";
$listing = '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><title>Paiement Casino Afrique | '.count($allSlugs).'+ Guides Mobile Money et Crypto</title><meta name="description" content="Tous les guides de paiement casino pour l\'Afrique francophone. M-Pesa, Orange Money, Wave, MTN, Bitcoin, USDT. '.count($allSlugs).'+ guides par pays et méthode."><link rel="icon" type="image/png" href="/favicon.png"><style>'.$CSS.'
.ph{padding:20px 16px 10px}.ph h1{font-size:22px;font-weight:900;margin-bottom:6px}.ph h1 span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}.ph p{font-size:13px;color:var(--mt);margin-bottom:16px}
.list{padding:0 16px 100px;display:flex;flex-direction:column;gap:8px}
.it{background:var(--cd);border-radius:12px;padding:12px 14px;display:flex;align-items:center;gap:10px;text-decoration:none;color:var(--tx);border:1px solid rgba(255,255,255,.06)}
.it:hover{border-color:rgba(255,209,102,.3)}.it-info{flex:1}.it-h{font-size:13px;font-weight:700;line-height:1.35;margin-bottom:2px}.it-s{font-size:11px;color:var(--mt)}.it-arr{color:var(--gn);font-size:18px}
</style></head><body>'.$NAV.'<div class="ph"><h1>Paiement <span>Casino Afrique</span></h1><p>'.count($allSlugs).'+ guides — Mobile Money, Crypto, par pays</p></div><div class="list">';

foreach ($allSlugs as $s) {
    $listing .= '<a href="/paiement/'.$s.'/" class="it"><div class="it-info"><div class="it-h">'.htmlspecialchars(str_replace('-',' ',$s)).'</div><div class="it-s">Guide paiement casino Afrique</div></div><div class="it-arr">›</div></a>';
}
$listing .= '</div>'.$BNAV.'</body></html>';
file_put_contents($PAY_DIR.'/index.html', $listing);
echo "✅ /paiement/ listing\n\n";

// SITEMAP
echo "📋 SITEMAP\n";
$existing = file_get_contents($BASE.'/sitemap.xml');
$date = date('Y-m-d');
$new = '<url><loc>https://www.lesgetsinfo.com/paiement/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>'."\n";
foreach ($allSlugs as $s) {
    $new .= '<url><loc>https://www.lesgetsinfo.com/paiement/'.$s.'/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>'."\n";
}
$existing = str_replace('</urlset>',$new.'</urlset>',$existing);
file_put_contents($BASE.'/sitemap.xml',$existing);
$total = substr_count($existing,'<url>');
echo "✅ ".$total." URLs total\n\n";

echo "=== DONE ===\n✅ ".$pageCount." pages générées\n✅ Sitemap: ".$total." URLs\n⚠️  rm gen_paiement_300.php\n";
