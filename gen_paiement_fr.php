<?php
/**
 * Payment Pages Generator for lesgetsinfo.com
 * 250+ pages: countries × methods × questions
 * Each page unique angle, real local context
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

// TOP 10 PAYS (grand marché)
$TOP_COUNTRIES = [
    'congo-rdc' => [
        'name' => 'RD Congo',
        'adj' => 'congolais',
        'currency' => 'Franc Congolais (CDF)',
        'pop' => '100 millions',
        'flag' => '🇨🇩',
        'color1' => '#007FFF',
        'color2' => '#CE1126',
        'mobile_methods' => [
            'mpesa' => ['name' => 'M-Pesa', 'operator' => 'Vodacom Congo', 'min' => '1 000 CDF', 'max' => '5 000 000 CDF', 'time' => 'Instantané', 'fee' => '1-2%'],
            'airtel-money' => ['name' => 'Airtel Money', 'operator' => 'Airtel Congo', 'min' => '500 CDF', 'max' => '3 000 000 CDF', 'time' => 'Instantané', 'fee' => '1%'],
            'orange-money' => ['name' => 'Orange Money', 'operator' => 'Orange RDC', 'min' => '1 000 CDF', 'max' => '4 000 000 CDF', 'time' => 'Instantané', 'fee' => '1.5%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum', 'bnb'],
    ],
    'cameroun' => [
        'name' => 'Cameroun',
        'adj' => 'camerounais',
        'currency' => 'Franc CFA (XAF)',
        'pop' => '28 millions',
        'flag' => '🇨🇲',
        'color1' => '#007A5E',
        'color2' => '#CE1126',
        'mobile_methods' => [
            'mtn-money' => ['name' => 'MTN Mobile Money', 'operator' => 'MTN Cameroon', 'min' => '500 XAF', 'max' => '2 000 000 XAF', 'time' => 'Instantané', 'fee' => '1%'],
            'orange-money' => ['name' => 'Orange Money', 'operator' => 'Orange Cameroun', 'min' => '500 XAF', 'max' => '2 000 000 XAF', 'time' => 'Instantané', 'fee' => '1%'],
            'express-union' => ['name' => 'Express Union', 'operator' => 'Express Union Finance', 'min' => '1 000 XAF', 'max' => '5 000 000 XAF', 'time' => '15-30 min', 'fee' => '2%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum', 'bnb'],
    ],
    'cote-divoire' => [
        'name' => "Côte d'Ivoire",
        'adj' => 'ivoirien',
        'currency' => 'Franc CFA (XOF)',
        'pop' => '27 millions',
        'flag' => '🇨🇮',
        'color1' => '#F77F00',
        'color2' => '#009A44',
        'mobile_methods' => [
            'orange-money' => ['name' => 'Orange Money CI', 'operator' => 'Orange Côte d\'Ivoire', 'min' => '200 XOF', 'max' => '2 000 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
            'wave' => ['name' => 'Wave', 'operator' => 'Wave Mobile Money', 'min' => '100 XOF', 'max' => '3 000 000 XOF', 'time' => 'Instantané', 'fee' => '0%'],
            'mtn-money' => ['name' => 'MTN Mobile Money CI', 'operator' => 'MTN Côte d\'Ivoire', 'min' => '200 XOF', 'max' => '2 000 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
            'moov-money' => ['name' => 'Moov Money', 'operator' => 'Moov Africa CI', 'min' => '200 XOF', 'max' => '1 000 000 XOF', 'time' => 'Instantané', 'fee' => '1.5%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'wave-crypto', 'ethereum'],
    ],
    'senegal' => [
        'name' => 'Sénégal',
        'adj' => 'sénégalais',
        'currency' => 'Franc CFA (XOF)',
        'pop' => '18 millions',
        'flag' => '🇸🇳',
        'color1' => '#00853F',
        'color2' => '#FDEF42',
        'mobile_methods' => [
            'wave' => ['name' => 'Wave', 'operator' => 'Wave Mobile Money SN', 'min' => '100 XOF', 'max' => '5 000 000 XOF', 'time' => 'Instantané', 'fee' => '0%'],
            'orange-money' => ['name' => 'Orange Money SN', 'operator' => 'Orange Sénégal', 'min' => '200 XOF', 'max' => '2 000 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
            'free-money' => ['name' => 'Free Money', 'operator' => 'Free Sénégal', 'min' => '200 XOF', 'max' => '1 000 000 XOF', 'time' => 'Instantané', 'fee' => '0.5%'],
            'wari' => ['name' => 'Wari', 'operator' => 'Wari SN', 'min' => '500 XOF', 'max' => '3 000 000 XOF', 'time' => '30 min', 'fee' => '2%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum', 'litecoin'],
    ],
    'mali' => [
        'name' => 'Mali',
        'adj' => 'malien',
        'currency' => 'Franc CFA (XOF)',
        'pop' => '22 millions',
        'flag' => '🇲🇱',
        'color1' => '#14B53A',
        'color2' => '#CE1126',
        'mobile_methods' => [
            'orange-money' => ['name' => 'Orange Money ML', 'operator' => 'Orange Mali', 'min' => '200 XOF', 'max' => '2 000 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
            'moov-money' => ['name' => 'Moov Money ML', 'operator' => 'Moov Africa Mali', 'min' => '200 XOF', 'max' => '1 500 000 XOF', 'time' => 'Instantané', 'fee' => '1.5%'],
            'wave' => ['name' => 'Wave Mali', 'operator' => 'Wave ML', 'min' => '100 XOF', 'max' => '3 000 000 XOF', 'time' => 'Instantané', 'fee' => '0%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum', 'bnb'],
    ],
    'niger' => [
        'name' => 'Niger',
        'adj' => 'nigérien',
        'currency' => 'Franc CFA (XOF)',
        'pop' => '25 millions',
        'flag' => '🇳🇪',
        'color1' => '#E05206',
        'color2' => '#009A00',
        'mobile_methods' => [
            'airtel-money' => ['name' => 'Airtel Money NE', 'operator' => 'Airtel Niger', 'min' => '200 XOF', 'max' => '1 000 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
            'moov-money' => ['name' => 'Moov Money NE', 'operator' => 'Moov Africa Niger', 'min' => '200 XOF', 'max' => '1 000 000 XOF', 'time' => 'Instantané', 'fee' => '1.5%'],
            'orange-money' => ['name' => 'Orange Money NE', 'operator' => 'Orange Niger', 'min' => '200 XOF', 'max' => '1 500 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum'],
    ],
    'burkina-faso' => [
        'name' => 'Burkina Faso',
        'adj' => 'burkinabè',
        'currency' => 'Franc CFA (XOF)',
        'pop' => '23 millions',
        'flag' => '🇧🇫',
        'color1' => '#EF2B2D',
        'color2' => '#009A00',
        'mobile_methods' => [
            'orange-money' => ['name' => 'Orange Money BF', 'operator' => 'Orange Burkina Faso', 'min' => '200 XOF', 'max' => '2 000 000 XOF', 'time' => 'Instantané', 'fee' => '1%'],
            'moov-money' => ['name' => 'Moov Money BF', 'operator' => 'Moov Africa BF', 'min' => '200 XOF', 'max' => '1 500 000 XOF', 'time' => 'Instantané', 'fee' => '1.5%'],
            'coris-money' => ['name' => 'Coris Money', 'operator' => 'Coris Bank BF', 'min' => '500 XOF', 'max' => '5 000 000 XOF', 'time' => '1-2h', 'fee' => '1%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum'],
    ],
    'guinee' => [
        'name' => 'Guinée',
        'adj' => 'guinéen',
        'currency' => 'Franc Guinéen (GNF)',
        'pop' => '14 millions',
        'flag' => '🇬🇳',
        'color1' => '#CE1126',
        'color2' => '#009460',
        'mobile_methods' => [
            'orange-money' => ['name' => 'Orange Money GN', 'operator' => 'Orange Guinée', 'min' => '5 000 GNF', 'max' => '10 000 000 GNF', 'time' => 'Instantané', 'fee' => '1%'],
            'mtn-money' => ['name' => 'MTN Mobile Money GN', 'operator' => 'MTN Guinée', 'min' => '5 000 GNF', 'max' => '8 000 000 GNF', 'time' => 'Instantané', 'fee' => '1%'],
            'cellcom' => ['name' => 'Cellcom Money', 'operator' => 'Cellcom Guinée', 'min' => '10 000 GNF', 'max' => '5 000 000 GNF', 'time' => '30 min', 'fee' => '2%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum'],
    ],
    'rwanda' => [
        'name' => 'Rwanda',
        'adj' => 'rwandais',
        'currency' => 'Franc Rwandais (RWF)',
        'pop' => '14 millions',
        'flag' => '🇷🇼',
        'color1' => '#20603D',
        'color2' => '#00A1DE',
        'mobile_methods' => [
            'mtn-momo' => ['name' => 'MTN Mobile Money RW', 'operator' => 'MTN Rwanda', 'min' => '500 RWF', 'max' => '3 000 000 RWF', 'time' => 'Instantané', 'fee' => '1%'],
            'airtel-money' => ['name' => 'Airtel Money RW', 'operator' => 'Airtel Rwanda', 'min' => '500 RWF', 'max' => '2 000 000 RWF', 'time' => 'Instantané', 'fee' => '1%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum', 'bnb'],
    ],
    'madagascar' => [
        'name' => 'Madagascar',
        'adj' => 'malgache',
        'currency' => 'Ariary (MGA)',
        'pop' => '29 millions',
        'flag' => '🇲🇬',
        'color1' => '#FC3D32',
        'color2' => '#007E3A',
        'mobile_methods' => [
            'mvola' => ['name' => 'MVola', 'operator' => 'Telma Madagascar', 'min' => '1 000 MGA', 'max' => '5 000 000 MGA', 'time' => 'Instantané', 'fee' => '1%'],
            'airtel-money' => ['name' => 'Airtel Money MG', 'operator' => 'Airtel Madagascar', 'min' => '1 000 MGA', 'max' => '4 000 000 MGA', 'time' => 'Instantané', 'fee' => '1.5%'],
            'orange-money' => ['name' => 'Orange Money MG', 'operator' => 'Orange Madagascar', 'min' => '1 000 MGA', 'max' => '3 000 000 MGA', 'time' => 'Instantané', 'fee' => '1%'],
        ],
        'crypto_priority' => ['bitcoin', 'usdt', 'ethereum'],
    ],
];

// PETITS PAYS (10)
$SMALL_COUNTRIES = [
    'togo' => ['name'=>'Togo','adj'=>'togolais','currency'=>'Franc CFA (XOF)','flag'=>'🇹🇬','method'=>'T-Money, Moov Money','color1'=>'#006A4E','color2'=>'#D21034'],
    'benin' => ['name'=>'Bénin','adj'=>'béninois','currency'=>'Franc CFA (XOF)','flag'=>'🇧🇯','method'=>'MTN Mobile Money, Moov Money','color1'=>'#008751','color2'=>'#E8112D'],
    'gabon' => ['name'=>'Gabon','adj'=>'gabonais','currency'=>'Franc CFA (XAF)','flag'=>'🇬🇦','method'=>'Airtel Money, Moov Money','color1'=>'#009E60','color2'=>'#003189'],
    'congo-brazzaville' => ['name'=>'Congo Brazzaville','adj'=>'congolais','currency'=>'Franc CFA (XAF)','flag'=>'🇨🇬','method'=>'Airtel Money, MTN Money','color1'=>'#009543','color2'=>'#DC241F'],
    'tchad' => ['name'=>'Tchad','adj'=>'tchadien','currency'=>'Franc CFA (XAF)','flag'=>'🇹🇩','method'=>'Airtel Money, Moov Money','color1'=>'#002664','color2'=>'#C60C30'],
    'burundi' => ['name'=>'Burundi','adj'=>'burundais','currency'=>'Franc Burundais (BIF)','flag'=>'🇧🇮','method'=>'Lumicash, Leo Cash','color1'=>'#CE1126','color2'=>'#1EB53A'],
    'centrafrique' => ['name'=>'Centrafrique','adj'=>'centrafricain','currency'=>'Franc CFA (XAF)','flag'=>'🇨🇫','method'=>'Orange Money, Moov Money','color1'=>'#003082','color2'=>'#BE0027'],
    'djibouti' => ['name'=>'Djibouti','adj'=>'djiboutien','currency'=>'Franc Djiboutien (DJF)','flag'=>'🇩🇯','method'=>'Waafi Money, D-Money','color1'=>'#6AB2E7','color2'=>'#12AD2B'],
    'mauritanie' => ['name'=>'Mauritanie','adj'=>'mauritanien','currency'=>'Ouguiya (MRU)','flag'=>'🇲🇷','method'=>'Bankily, Chinguipass','color1'=>'#006233','color2'=>'#FFD700'],
    'comores' => ['name'=>'Comores','adj'=>'comorien','currency'=>'Franc Comorien (KMF)','flag'=>'🇰🇲','method'=>'Huri Money, virement','color1'=>'#3A75C4','color2'=>'#009A44'],
];

// CRYPTO METHODS
$CRYPTO_METHODS = [
    'bitcoin' => ['name'=>'Bitcoin','symbol'=>'BTC','network'=>'Bitcoin','min'=>'0.0001 BTC','fee'=>'Variable','time'=>'10-60 min','img_prompt'=>'Bitcoin BTC cryptocurrency golden coin digital wallet casino deposit Africa mobile'],
    'usdt' => ['name'=>'USDT Tether','symbol'=>'USDT','network'=>'TRC20 / ERC20','min'=>'10 USDT','fee'=>'1-3 USDT','time'=>'1-5 min','img_prompt'=>'USDT Tether stablecoin green dollar crypto casino Africa fast transfer'],
    'ethereum' => ['name'=>'Ethereum','symbol'=>'ETH','network'=>'Ethereum','min'=>'0.01 ETH','fee'=>'Variable','time'=>'5-15 min','img_prompt'=>'Ethereum ETH cryptocurrency diamond logo digital casino deposit Africa'],
    'bnb' => ['name'=>'BNB Binance','symbol'=>'BNB','network'=>'BSC','min'=>'0.01 BNB','fee'=>'0.5 BNB','time'=>'3-5 min','img_prompt'=>'BNB Binance cryptocurrency yellow coin fast low fee casino Africa'],
    'litecoin' => ['name'=>'Litecoin','symbol'=>'LTC','network'=>'Litecoin','min'=>'0.1 LTC','fee'=>'0.001 LTC','time'=>'2-5 min','img_prompt'=>'Litecoin LTC silver cryptocurrency fast cheap casino Africa deposit'],
];

// PAGE TYPES per method
$PAGE_TYPES = [
    'general' => ['slug_suffix'=>'', 'h1_template'=>'Casino {method} {country}', 'angle'=>'vue générale, avantages, casinos qui acceptent'],
    'depot' => ['slug_suffix'=>'-depot', 'h1_template'=>'Déposer au Casino via {method} en {country}', 'angle'=>'guide étape par étape pour déposer, captures d\'écran mentales, conseils pratiques'],
    'retrait' => ['slug_suffix'=>'-retrait', 'h1_template'=>'Retirer ses Gains Casino via {method} au {country}', 'angle'=>'comment retirer, délais, limites, problèmes fréquents et solutions'],
    'bonus' => ['slug_suffix'=>'-bonus', 'h1_template'=>'Bonus Casino avec {method} en {country}', 'angle'=>'bonus exclusifs pour ce mode de paiement, cashback, offres spéciales'],
    'limites' => ['slug_suffix'=>'-limites', 'h1_template'=>'{method} Casino : Limites et Frais en {country}', 'angle'=>'limites min/max, frais, comparatif, comment optimiser ses dépôts'],
];

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
.method-badge{display:inline-flex;align-items:center;gap:6px;background:rgba(82,183,136,.1);border:1px solid rgba(82,183,136,.2);color:var(--gn);padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;margin-bottom:10px}
.h1{font-size:20px;font-weight:900;line-height:1.28;margin-bottom:8px}
.h1 em{font-style:normal;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.intro{font-size:13px;color:var(--mt);line-height:1.65}
.info-pills{display:flex;gap:8px;flex-wrap:wrap;padding:10px 16px;border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05)}
.pill{background:var(--cd);border-radius:8px;padding:8px 12px;font-size:11px;font-weight:700;border:1px solid rgba(255,255,255,.06)}
.pill-lbl{color:var(--mt);margin-bottom:2px}
.pill-val{color:var(--a)}
.cta-box{margin:12px 16px;background:linear-gradient(135deg,#0D2318,#162E1E);border:1px solid rgba(82,183,136,.2);border-radius:14px;padding:16px;text-align:center}
.cta-title{font-size:20px;font-weight:900;margin-bottom:4px}
.cta-title span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.cta-sub{font-size:12px;color:var(--mt);margin-bottom:12px}
.cta-btn{display:block;background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;padding:13px;border-radius:11px;font-weight:800;font-size:15px;text-align:center}
.wrap{padding:0 16px}
.sec{margin-bottom:18px}
.sec-ttl{font-size:15px;font-weight:800;margin-bottom:10px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.06)}
.sec-ttl span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.btext{font-size:13px;color:rgba(232,245,233,.88);line-height:1.72}
.btext p{margin-bottom:12px}
.btext h2{font-size:16px;font-weight:800;margin:18px 0 10px}
.btext h3{font-size:14px;font-weight:700;margin:14px 0 8px;color:var(--a)}
.btext ul,.btext ol{margin:0 0 12px 20px}
.btext li{margin-bottom:6px}
.btext strong{color:var(--tx)}
.btext a{color:var(--gn);font-weight:600}
.steps{display:flex;flex-direction:column;gap:10px;margin-bottom:16px}
.step{background:var(--cd);border-radius:12px;padding:14px;display:flex;gap:12px;border:1px solid rgba(255,255,255,.06)}
.snum{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--a),var(--a2));display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#0A0F0D;flex-shrink:0}
.stxt{font-size:13px;color:var(--mt);line-height:1.5}
.stxt strong{color:var(--tx);display:block;margin-bottom:3px}
.faq-item{background:var(--cd);border-radius:11px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:13px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;align-items:center;cursor:pointer;line-height:1.4}
.fi{color:var(--gn);font-size:18px;transition:.2s;flex-shrink:0;margin-left:8px}
.faq-item.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--mt);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq-item.open .fa{max-height:300px;padding:0 16px 14px}
.rel-methods{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.rel-methods{grid-template-columns:repeat(3,1fr)}}
.rel-card{background:var(--cd);border-radius:10px;padding:10px;border:1px solid rgba(255,255,255,.06);display:block;font-size:12px;font-weight:700}
.rel-card:hover{border-color:rgba(255,209,102,.3)}
.rel-name{margin-bottom:3px}
.rel-sub{font-size:11px;color:var(--mt)}
.bnav{position:fixed;bottom:0;left:0;right:0;background:rgba(10,15,13,.97);backdrop-filter:blur(10px);border-top:1px solid rgba(82,183,136,.1);display:flex;padding:8px 0 max(8px,env(safe-area-inset-bottom));z-index:200}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--mt);font-size:10px;font-weight:700}
.ni.on{color:var(--a)}
.ni-ico{font-size:22px}
';

$NAV = '<nav class="bar">
  <a href="/" class="logo">🎲 CasinoAfrique</a>
  <div class="dnav">
    <a href="/casino/">Pays</a>
    <a href="/bonus/">Bonus</a>
    <a href="/jeux/">Jeux</a>
    <a href="/paiement/" style="color:var(--a)">Paiement</a>
  </div>
  <a href="'.$AFF[0].'" target="_blank" rel="noopener" class="top-cta">Jouer →</a>
</nav>';

$BNAV = '<nav class="bnav">
  <a href="/" class="ni"><span class="ni-ico">🏠</span>Accueil</a>
  <a href="/casino/" class="ni"><span class="ni-ico">🌍</span>Pays</a>
  <a href="/bonus/" class="ni"><span class="ni-ico">🎁</span>Bonus</a>
  <a href="/jeux/" class="ni"><span class="ni-ico">🎰</span>Jeux</a>
  <a href="/paiement/" class="ni on"><span class="ni-ico">💳</span>Paiement</a>
</nav>';

function claude($prompt, $key, $tokens = 600) {
    $data = json_encode(['model'=>'claude-sonnet-4-6','max_tokens'=>$tokens,'messages'=>[['role'=>'user','content'=>$prompt]]]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','x-api-key: '.$key,'anthropic-version: 2023-06-01'],CURLOPT_TIMEOUT=>60]);
    $r = json_decode(curl_exec($ch),true);
    curl_close($ch);
    $t = trim($r['content'][0]['text'] ?? '');
    return preg_replace('/```html|```/i','',$t);
}

function genImg($prompt, $file, $key, $dir) {
    $path = $dir.'/'.$file;
    $jpg = str_replace('.png','.jpg',$path);
    if (file_exists($jpg)) { echo "    ✓\n"; return '/images/paiement/'.str_replace('.png','.jpg',$file); }
    echo "    🎨\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', professional, no text, no watermark','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_TIMEOUT=>90]);
    $r = json_decode(curl_exec($ch),true);
    curl_close($ch);
    if (!isset($r['data'][0]['b64_json'])) { echo "    ❌\n"; return null; }
    file_put_contents($path, base64_decode($r['data'][0]['b64_json']));
    $img = imagecreatefrompng($path);
    imagejpeg($img,$jpg,83);
    imagedestroy($img);
    unlink($path);
    echo "    ✅\n";
    return '/images/paiement/'.str_replace('.png','.jpg',$file);
}

function buildPage($h1, $meta, $intro, $body, $steps, $faqHtml, $pills, $relHtml, $affLink, $imgPath, $flagColor1, $flagColor2, $badge) {
    global $NAV, $BNAV, $CSS;
    $imgTag = $imgPath ? '<img src="'.$imgPath.'" alt="'.htmlspecialchars($h1).'" class="hero">' : '';
    $flagBar = '<div class="flag-bar" style="background:linear-gradient(90deg,'.$flagColor1.','.$flagColor2.')"></div>';
    $pillsHtml = '';
    foreach ($pills as $lbl => $val) {
        $pillsHtml .= '<div class="pill"><div class="pill-lbl">'.$lbl.'</div><div class="pill-val">'.$val.'</div></div>';
    }
    return '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A0F0D">
<title>'.htmlspecialchars($h1).' | CasinoAfrique</title>
<meta name="description" content="'.htmlspecialchars($meta).'">
<link rel="icon" type="image/png" href="/favicon.png">
<style>'.$CSS.'</style>
</head>
<body>
'.$NAV.'
'.$imgTag.$flagBar.'
<div class="hdr">
  <div class="method-badge">💳 '.$badge.'</div>
  <h1 class="h1"><em>'.htmlspecialchars($h1).'</em></h1>
  <p class="intro">'.$intro.'</p>
</div>
<div class="info-pills">'.$pillsHtml.'</div>
<div class="cta-box">
  <div class="cta-title">🎰 <span>Jouer Maintenant</span></div>
  <div class="cta-sub">Dépôt accepté · Mobile Money & Crypto · Bonus exclusif</div>
  <a href="'.$affLink.'" target="_blank" rel="noopener" class="cta-btn">Jouer avec ce Mode de Paiement →</a>
</div>
<div class="wrap">
  <div class="sec">
    <div class="sec-ttl">📖 <span>Guide Complet</span></div>
    <div class="btext">'.$body.'</div>
  </div>
  <div class="sec">
    <div class="sec-ttl">🚀 <span>Comment Procéder</span></div>
    <div class="steps">'.$steps.'</div>
  </div>
  <div class="cta-box" style="margin:0 0 18px">
    <div class="cta-title">🔥 <span>Prêt à Jouer?</span></div>
    <div class="cta-sub">Inscription gratuite · Bonus de bienvenue</div>
    <a href="'.$affLink.'" target="_blank" rel="noopener" class="cta-btn">S\'inscrire et Déposer →</a>
  </div>
  <div class="sec">
    <div class="sec-ttl">❓ <span>Questions Fréquentes</span></div>
    '.$faqHtml.'
  </div>
  <div class="sec">
    <div class="sec-ttl">💳 <span>Autres Options</span></div>
    <div class="rel-methods">'.$relHtml.'</div>
  </div>
</div>
'.$BNAV.'
<script>document.querySelectorAll(".fq").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));</script>
</body>
</html>';
}

$allPages = [];
$pageCount = 0;

echo "=== PAYMENT GENERATOR ===\n\n";

// ============================================
// TOP 10 COUNTRIES - MOBILE MONEY PAGES
// ============================================
echo "📱 TOP 10 COUNTRIES - MOBILE MONEY\n\n";

foreach ($TOP_COUNTRIES as $countrySlug => $country) {
    echo "🌍 ".$country['name']."\n";

    foreach ($country['mobile_methods'] as $methodSlug => $method) {
        echo "  💳 ".$method['name']."\n";

        // Image for general page only
        $imgPath = null;
        $imgFile = $countrySlug.'-'.$methodSlug.'.png';
        $imgPrompt = $method['name'].' mobile payment casino '.$country['name'].' African smartphone '.$country['color1'].' '.$country['color2'].' colors';

        foreach ($PAGE_TYPES as $typeKey => $pageType) {
            $pageCount++;
            $slug = 'casino-'.$methodSlug.'-'.$countrySlug.$pageType['slug_suffix'];
            $dir = $PAY_DIR.'/'.$slug;
            if (!is_dir($dir)) mkdir($dir, 0755, true);

            // Image only for general page
            if ($typeKey === 'general') {
                $imgPath = genImg($imgPrompt, $imgFile, $OPENAI_KEY, $IMG_DIR);
            }

            $h1 = str_replace(['{method}','{country}'], [$method['name'], $country['name']], $pageType['h1_template']);
            $meta = $h1.' — Guide complet pour les joueurs '.$country['adj'].'s. '.$method['name'].' via '.$method['operator'].'. Dépôt minimum '.$method['min'].', retrait en '.$method['time'].'.';

            echo "    [".$pageCount."] ".$h1."\n";

            $intro = claude(
                "Expert casino africain. 2 phrases d'accroche vendeuses et UNIQUES sur: \"".
                $h1."\" pour joueurs ".$country['adj']."s. Angle: ".$pageType['angle'].
                ". Opérateur: ".$method['operator'].", min: ".$method['min'].", frais: ".$method['fee'].
                ". Monnaie: ".$country['currency'].". Naturel, vendeur. Seulement 2 phrases.",
                $ANTHROPIC_KEY, 150
            );

            $body = claude(
                "Rédige un guide UNIQUE et vendeur sur: \"".$h1."\" pour joueurs d'".$country['name']." (".$country['adj']."s).\n\n".
                "Données locales précises:\n- Opérateur: ".$method['operator']."\n- Dépôt min: ".$method['min']."\n- Max: ".$method['max']."\n".
                "- Frais: ".$method['fee']."\n- Délai: ".$method['time']."\n- Monnaie: ".$country['currency']."\n- Population: ".$country['pop']."\n\n".
                "Angle spécifique: ".$pageType['angle']."\n\n".
                "4 sections avec <h2>, paragraphes <p>. 600-800 mots. Conseils pratiques, données réelles. ".
                "Mentionne comment utiliser ".$method['name']." spécifiquement en ".$country['name'].". ".
                "Vendeur mais honnête. Français naturel. Pas d'année. Seulement le HTML.",
                $ANTHROPIC_KEY, 1200
            );

            // Steps based on type
            $stepPrompts = [
                'general' => ["Étape 1 pour utiliser ".$method['name']." dans un casino en ".$country['name'],"Étape 2: activer le paiement","Étape 3: confirmer la transaction en ".$country['currency']],
                'depot' => ["Ouvrir son app ".$method['name']." et choisir casino","Saisir le montant en ".$country['currency']." (min ".$method['min'].")","Confirmer avec son code PIN ".$method['operator']],
                'retrait' => ["Demander le retrait depuis le casino","Saisir son numéro ".$method['name']." en ".$country['name'],"Recevoir ses gains en ".$country['currency']." sous ".$method['time']],
                'bonus' => ["S'inscrire au casino avec ".$method['name']." actif","Déposer le montant minimum pour le bonus","Activer le bonus et jouer avec ".$method['name']],
                'limites' => ["Vérifier ses limites ".$method['name']." (max ".$method['max'].")","Calculer les frais: ".$method['fee']." sur chaque transaction","Optimiser en regroupant ses dépôts"],
            ];

            $stepsArr = $stepPrompts[$typeKey] ?? $stepPrompts['general'];
            $stepsHtml = '';
            foreach ($stepsArr as $idx => $step) {
                $stepsHtml .= '<div class="step"><div class="snum">'.($idx+1).'</div><div class="stxt"><strong>'.$step.'</strong></div></div>';
            }

            // FAQ
            $faqQs = [
                'general' => [$method['name']." est-il sécurisé pour les casinos en ".$country['name']."?", "Quels casinos acceptent ".$method['name']." au ".$country['name']."?", "Y a-t-il des bonus spéciaux pour ".$method['name']." en ".$country['name']."?"],
                'depot' => ["Comment déposer via ".$method['name']." en ".$country['currency']."?", "Quel est le dépôt minimum avec ".$method['name']." au ".$country['name']."?", "Combien de temps prend un dépôt ".$method['name']." au casino?"],
                'retrait' => ["Comment retirer ses gains vers ".$method['name']." en ".$country['name']."?", "Combien de temps pour recevoir ses gains en ".$country['currency']."?", "Y a-t-il des frais de retrait avec ".$method['name']." au ".$country['name']."?"],
                'bonus' => ["Peut-on obtenir un bonus casino avec ".$method['name']." en ".$country['name']."?", "Le bonus change-t-il selon le mode de paiement au ".$country['name']."?", "Comment maximiser son bonus avec ".$method['name']."?"],
                'limites' => ["Quelles sont les limites de ".$method['name']." pour les casinos au ".$country['name']."?", "Les frais de ".$method['fee']." sont-ils négociables?", "Comment augmenter ses limites ".$method['operator']."?"],
            ];

            $questions = $faqQs[$typeKey] ?? $faqQs['general'];
            $faqHtml = '';
            foreach ($questions as $q) {
                $ans = claude("2 phrases précises et vendeuses: \"".$q."\" pour joueurs ".$country['adj']."s. ".$method['name']." via ".$method['operator'].", ".$country['currency'].". Français naturel.", $ANTHROPIC_KEY, 100);
                $faqHtml .= '<div class="faq-item"><div class="fq">'.$q.' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
            }

            // Related
            $relHtml = '';
            foreach ($country['mobile_methods'] as $rSlug => $rMethod) {
                if ($rSlug === $methodSlug) continue;
                $relHtml .= '<a href="/paiement/casino-'.$rSlug.'-'.$countrySlug.'/" class="rel-card"><div class="rel-name">'.$rMethod['name'].'</div><div class="rel-sub">'.$country['name'].' · '.$rMethod['time'].'</div></a>';
            }
            // Add crypto
            foreach (array_slice($country['crypto_priority'], 0, 2) as $cSlug) {
                if (isset($CRYPTO_METHODS[$cSlug])) {
                    $cm = $CRYPTO_METHODS[$cSlug];
                    $relHtml .= '<a href="/paiement/casino-'.$cSlug.'-'.$countrySlug.'/" class="rel-card"><div class="rel-name">'.$cm['name'].'</div><div class="rel-sub">'.$country['name'].' · Crypto</div></a>';
                }
            }

            $pills = ['Opérateur'=>$method['operator'],'Min'=>$method['min'],'Max'=>$method['max'],'Frais'=>$method['fee'],'Délai'=>$method['time'],'Monnaie'=>$country['currency']];
            $affLink = $AFF[$pageCount % 3];

            $html = buildPage($h1, $meta, $intro, $body, $stepsHtml, $faqHtml, $pills, $relHtml, $affLink, $typeKey === 'general' ? $imgPath : null, $country['color1'], $country['color2'], $method['name'].' · '.$country['flag']);
            file_put_contents($dir.'/index.html', $html);
            $allPages[] = $slug;
            echo "    ✅ /paiement/".$slug."/\n";
            sleep(1);
        }
    }
}

// ============================================
// TOP 10 COUNTRIES - CRYPTO PAGES
// ============================================
echo "\n₿ TOP 10 COUNTRIES - CRYPTO\n\n";

foreach ($TOP_COUNTRIES as $countrySlug => $country) {
    foreach ($country['crypto_priority'] as $cryptoSlug) {
        if (!isset($CRYPTO_METHODS[$cryptoSlug])) continue;
        $crypto = $CRYPTO_METHODS[$cryptoSlug];
        $pageCount++;

        $slug = 'casino-'.$cryptoSlug.'-'.$countrySlug;
        $dir = $PAY_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $imgPath = genImg($crypto['img_prompt'].' '.$country['name'], $slug.'.png', $OPENAI_KEY, $IMG_DIR);

        $h1 = 'Casino '.$crypto['name'].' en '.$country['name'].' — Guide Complet';
        $meta = 'Jouez au casino avec '.$crypto['name'].' ('.$crypto['symbol'].') depuis '.$country['name'].'. Dépôt min '.$crypto['min'].', réseau '.$crypto['network'].'. Guide pour joueurs '.$country['adj'].'s.';

        echo "[".$pageCount."] ".$h1."\n";

        $intro = claude("2 phrases vendeuses sur \"".$h1."\" pour joueurs ".$country['adj']."s. Focus: avantage crypto vs Mobile Money, rapidité, anonymat. Naturel, vendeur. Seulement 2 phrases.", $ANTHROPIC_KEY, 150);

        $body = claude(
            "Guide UNIQUE sur \"".$h1."\" pour joueurs d'".$country['name'].".\n\n".
            "Contexte: pays avec ".$country['pop']." habitants, monnaie ".$country['currency'].", mobile money local: ".implode(', ', array_column($country['mobile_methods'], 'name'))."\n".
            "Crypto: ".$crypto['name']." (".$crypto['symbol']."), réseau ".$crypto['network'].", min ".$crypto['min'].", frais ".$crypto['fee'].", délai ".$crypto['time']."\n\n".
            "Angle: POURQUOI un joueur ".$country['adj']." choisirait la crypto plutôt que le mobile money local? Avantages concrets.\n\n".
            "4 sections <h2>: 1) Pourquoi choisir ".$crypto['name']." au ".$country['name']." 2) Comment acheter ".$crypto['symbol']." depuis ".$country['name']." 3) Déposer et retirer au casino 4) Casinos recommandés et sécurité.\n\n".
            "600-800 mots. Français naturel. Pas d'année. Seulement HTML.",
            $ANTHROPIC_KEY, 1200
        );

        $stepsHtml = '<div class="step"><div class="snum">1</div><div class="stxt"><strong>Acheter '.$crypto['symbol'].'</strong>Utiliser un exchange disponible en '.$country['name'].' ou P2P pour obtenir des '.$crypto['name'].'.</div></div>
        <div class="step"><div class="snum">2</div><div class="stxt"><strong>Envoyer au casino</strong>Copier l\'adresse de dépôt du casino sur le réseau '.$crypto['network'].' et envoyer minimum '.$crypto['min'].'.</div></div>
        <div class="step"><div class="snum">3</div><div class="stxt"><strong>Jouer et retirer</strong>Après '.$crypto['time'].' de confirmation, jouer et retirer directement vers votre wallet '.$crypto['symbol'].'.</div></div>';

        $faqHtml = '';
        $faqQs = [
            "Comment acheter ".$crypto['name']." depuis ".$country['name']."?",
            "Le casino ".$crypto['name']." est-il légal en ".$country['name']."?",
            "Quels sont les frais pour jouer au casino en ".$crypto['symbol']." au ".$country['name']."?",
        ];
        foreach ($faqQs as $q) {
            $ans = claude("2 phrases précises: \"".$q."\" pour joueurs ".$country['adj']."s. ".$crypto['name'].", ".$country['currency'].", contexte africain. Français naturel.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.$q.' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($country['mobile_methods'] as $rSlug => $rMethod) {
            $relHtml .= '<a href="/paiement/casino-'.$rSlug.'-'.$countrySlug.'/" class="rel-card"><div class="rel-name">'.$rMethod['name'].'</div><div class="rel-sub">'.$country['name'].' · Mobile Money</div></a>';
        }
        foreach ($CRYPTO_METHODS as $rCSlug => $rCrypto) {
            if ($rCSlug === $cryptoSlug) continue;
            $relHtml .= '<a href="/paiement/casino-'.$rCSlug.'-'.$countrySlug.'/" class="rel-card"><div class="rel-name">'.$rCrypto['name'].'</div><div class="rel-sub">'.$country['name'].' · Crypto</div></a>';
            if (substr_count($relHtml, 'rel-card') >= 4) break;
        }

        $pills = ['Crypto'=>$crypto['name'],'Réseau'=>$crypto['network'],'Min'=>$crypto['min'],'Frais'=>$crypto['fee'],'Délai'=>$crypto['time'],'Pays'=>$country['name']];
        $affLink = $AFF[$pageCount % 3];

        $html = buildPage($h1, $meta, $intro, $body, $stepsHtml, $faqHtml, $pills, $relHtml, $affLink, $imgPath, $country['color1'], $country['color2'], $crypto['name'].' · '.$country['flag']);
        file_put_contents($dir.'/index.html', $html);
        $allPages[] = $slug;
        echo "  ✅ /paiement/".$slug."/\n";
        sleep(1);
    }
}

// ============================================
// SMALL COUNTRIES - 3 PAGES EACH
// ============================================
echo "\n🌍 SMALL COUNTRIES\n\n";

foreach ($SMALL_COUNTRIES as $countrySlug => $country) {
    $types = [
        ['h1'=>'Casino en Ligne '.$country['name'].' — Méthodes de Paiement','meta'=>'Toutes les méthodes de paiement casino pour les joueurs '.$country['adj'].'s. '.$country['method'].'. Guide complet.','angle'=>'vue générale toutes méthodes','img_prompt'=>'Casino payment methods '.$country['name'].' African mobile money cryptocurrency '.$country['flag']],
        ['h1'=>'Déposer au Casino depuis '.$country['name'].' — Guide','meta'=>'Comment déposer dans un casino en ligne depuis '.$country['name'].'. '.$country['method'].'. Étapes simples pour joueurs '.$country['adj'].'s.','angle'=>'guide dépôt pratique étapes','img_prompt'=>'Casino deposit '.$country['name'].' mobile phone payment '.$country['flag'].' African'],
        ['h1'=>'Bonus Casino '.$country['name'].' avec Mobile Money','meta'=>'Bonus exclusifs casino pour joueurs '.$country['adj'].'s. Dépôt via '.$country['method'].'. Offres sans dépôt disponibles.','angle'=>'bonus et offres pour ce pays','img_prompt'=>'Casino bonus '.$country['name'].' gift money mobile African player '.$country['flag']],
    ];

    foreach ($types as $j => $type) {
        $pageCount++;
        $slug = 'casino-paiement-'.$countrySlug.($j > 0 ? '-'.($j+1) : '');
        $dir = $PAY_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $imgPath = $j === 0 ? genImg($type['img_prompt'], $slug.'.png', $OPENAI_KEY, $IMG_DIR) : null;

        echo "[".$pageCount."] ".$type['h1']."\n";

        $intro = claude("2 phrases vendeuses sur \"".$type['h1']."\" pour joueurs ".$country['adj']."s. Méthodes: ".$country['method'].". Monnaie: ".$country['currency'].". Naturel. Seulement 2 phrases.", $ANTHROPIC_KEY, 150);

        $body = claude(
            "Guide UNIQUE sur \"".$type['h1']."\" pour joueurs de ".$country['name'].".\n\n".
            "Contexte local: méthodes dispo: ".$country['method'].", monnaie: ".$country['currency']."\n".
            "Angle: ".$type['angle']."\n\n".
            "3 sections <h2> avec <p>. 400-600 mots. Pratique, vendeur. Français naturel. Seulement HTML.",
            $ANTHROPIC_KEY, 800
        );

        $stepsHtml = '<div class="step"><div class="snum">1</div><div class="stxt"><strong>Choisir son casino</strong>Sélectionner un casino qui accepte les joueurs de '.$country['name'].' et les méthodes locales.</div></div>
        <div class="step"><div class="snum">2</div><div class="stxt"><strong>Déposer via '.$country['method'].'</strong>Utiliser sa méthode préférée pour alimenter son compte en '.$country['currency'].'.</div></div>
        <div class="step"><div class="snum">3</div><div class="stxt"><strong>Profiter et retirer</strong>Jouer et retirer ses gains rapidement vers son compte '.$country['method'].'.</div></div>';

        $faqHtml = '';
        $faqQs = ["Peut-on jouer au casino en ligne depuis ".$country['name']."?","Quelles méthodes de paiement sont disponibles au ".$country['name']."?","Comment retirer ses gains depuis ".$country['name']."?"];
        foreach ($faqQs as $q) {
            $ans = claude("2 phrases: \"".$q."\" joueurs ".$country['adj']."s, méthodes: ".$country['method'].", ".$country['currency'].". Naturel.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.$q.' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($SMALL_COUNTRIES as $rSlug => $rCountry) {
            if ($rSlug === $countrySlug) continue;
            $relHtml .= '<a href="/paiement/casino-paiement-'.$rSlug.'/" class="rel-card"><div class="rel-name">'.$rCountry['flag'].' '.$rCountry['name'].'</div><div class="rel-sub">'.$rCountry['method'].'</div></a>';
            if (substr_count($relHtml, 'rel-card') >= 4) break;
        }

        $pills = ['Pays'=>$country['flag'].' '.$country['name'],'Monnaie'=>$country['currency'],'Méthodes'=>$country['method']];
        $affLink = $AFF[$pageCount % 3];
        $color1 = $country['color1']; $color2 = $country['color2'];

        $html = buildPage($type['h1'], $type['meta'], $intro, $body, $stepsHtml, $faqHtml, $pills, $relHtml, $affLink, $imgPath, $color1, $color2, $country['flag'].' '.$country['name']);
        file_put_contents($dir.'/index.html', $html);
        $allPages[] = $slug;
        echo "  ✅ /paiement/".$slug."/\n";
        sleep(1);
    }
}

// ============================================
// GENERAL CRYPTO PAGES (Afrique)
// ============================================
echo "\n₿ GENERAL CRYPTO PAGES\n\n";

$generalCryptoPages = [
    ['slug'=>'bitcoin-casino-afrique','h1'=>'Bitcoin Casino en Afrique Francophone','meta'=>'Casinos Bitcoin pour l\'Afrique francophone. Dépôt BTC, retrait rapide, bonus crypto. Guide complet 20 pays.','crypto'=>'bitcoin','img_prompt'=>'Bitcoin casino Africa continent gold coins mobile African player cryptocurrency'],
    ['slug'=>'usdt-casino-afrique','h1'=>'Casino USDT Afrique — Jouer avec Tether','meta'=>'Casino USDT en Afrique. Tether stablecoin pour éviter la volatilité. Dépôt et retrait rapides. Guide.','crypto'=>'usdt','img_prompt'=>'USDT Tether casino Africa stablecoin green dollar African mobile player'],
    ['slug'=>'ethereum-casino-afrique','h1'=>'Casino Ethereum Afrique Francophone','meta'=>'Casino Ethereum (ETH) en Afrique francophone. Guide dépôt ETH, meilleurs casinos, bonus crypto.','crypto'=>'ethereum','img_prompt'=>'Ethereum casino Africa diamond logo crypto African mobile gambling'],
    ['slug'=>'crypto-casino-afrique','h1'=>'Meilleurs Casinos Crypto en Afrique Francophone','meta'=>'Top casinos crypto pour l\'Afrique francophone. Bitcoin, USDT, ETH, BNB. Comparatif, bonus et guide.','crypto'=>null,'img_prompt'=>'Crypto casino Africa multiple currencies Bitcoin USDT Ethereum African players'],
    ['slug'=>'casino-sans-kyc-afrique','h1'=>'Casino Sans KYC en Afrique — Jouer Anonymement','meta'=>'Casinos sans vérification KYC pour les joueurs africains. Crypto, anonymat, rapidité. Guide complet.','crypto'=>null,'img_prompt'=>'Anonymous casino no KYC Africa privacy shield mobile dark background'],
];

foreach ($generalCryptoPages as $gp) {
    $pageCount++;
    $dir = $PAY_DIR.'/'.$gp['slug'];
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $imgPath = genImg($gp['img_prompt'], $gp['slug'].'.png', $OPENAI_KEY, $IMG_DIR);

    echo "[".$pageCount."] ".$gp['h1']."\n";

    $cryptoContext = $gp['crypto'] ? "Focus sur ".$CRYPTO_METHODS[$gp['crypto']]['name']."." : "Couvre Bitcoin, USDT, Ethereum, BNB.";

    $intro = claude("2 phrases vendeuses sur \"".$gp['h1']."\" pour joueurs africains francophones. ".$cryptoContext." Avantages crypto vs mobile money. Naturel. Seulement 2 phrases.", $ANTHROPIC_KEY, 150);

    $body = claude(
        "Guide complet et vendeur sur \"".$gp['h1']."\".\n\nCouvre: 20 pays Afrique francophone, méthodes crypto disponibles, comment acheter crypto en Afrique, avantages vs Mobile Money.\n4 sections <h2>, 700-900 mots. Pratique, données concrètes. Seulement HTML.",
        $ANTHROPIC_KEY, 1400
    );

    $stepsHtml = '<div class="step"><div class="snum">1</div><div class="stxt"><strong>Acheter des crypto</strong>Utiliser Binance P2P, LocalBitcoins ou un exchange local pour obtenir du BTC, USDT ou ETH en Afrique.</div></div>
    <div class="step"><div class="snum">2</div><div class="stxt"><strong>Choisir son casino crypto</strong>Sélectionner un casino qui accepte la crypto et les joueurs africains, avec bonus de bienvenue.</div></div>
    <div class="step"><div class="snum">3</div><div class="stxt"><strong>Déposer et jouer</strong>Envoyer vos crypto au casino, jouer et retirer directement vers votre wallet personnel.</div></div>';

    $faqHtml = '';
    $faqQs = ["La crypto est-elle la meilleure option pour les casinos africains?","Comment acheter du Bitcoin depuis l'Afrique francophone?","Les casinos crypto sont-ils sécurisés pour les joueurs africains?"];
    foreach ($faqQs as $q) {
        $ans = claude("2 phrases: \"".$q."\". Contexte Afrique francophone. Naturel et vendeur.", $ANTHROPIC_KEY, 100);
        $faqHtml .= '<div class="faq-item"><div class="fq">'.$q.' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
    }

    $relHtml = '';
    foreach ($generalCryptoPages as $rp) {
        if ($rp['slug'] === $gp['slug']) continue;
        $relHtml .= '<a href="/paiement/'.$rp['slug'].'/" class="rel-card"><div class="rel-name">'.$rp['h1'].'</div><div class="rel-sub">Crypto · Afrique</div></a>';
    }

    $pills = ['Type'=>'Crypto','Réseau'=>'Multi-chain','Anonymat'=>'Élevé','Vitesse'=>'Rapide'];
    $affLink = $AFF[$pageCount % 3];

    $html = buildPage($gp['h1'], $gp['meta'], $intro, $body, $stepsHtml, $faqHtml, $pills, $relHtml, $affLink, $imgPath, '#F7931A', '#627EEA', '₿ Crypto Afrique');
    file_put_contents($dir.'/index.html', $html);
    $allPages[] = $gp['slug'];
    echo "  ✅ /paiement/".$gp['slug']."/\n";
    sleep(1);
}

// ============================================
// LISTING PAGE
// ============================================
echo "\n📋 LISTING PAGE\n";

$listing = '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Paiement Casino Afrique | Mobile Money, Bitcoin, Orange Money, Wave</title>
<meta name="description" content="Tous les modes de paiement casino disponibles en Afrique francophone. Orange Money, Wave, MTN, M-Pesa, Bitcoin, USDT. Guides de dépôt et retrait par pays.">
<link rel="icon" type="image/png" href="/favicon.png">
<style>'.$CSS.'
.ph{padding:20px 16px 10px}
.ph h1{font-size:22px;font-weight:900;margin-bottom:6px}
.ph h1 span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.ph p{font-size:13px;color:var(--mt);margin-bottom:16px}
.country-section{padding:0 16px;margin-bottom:24px}
.cs-header{display:flex;align-items:center;gap:8px;margin-bottom:12px;padding-bottom:8px;border-bottom:1px solid rgba(255,255,255,.06)}
.cs-flag{font-size:22px}
.cs-name{font-size:16px;font-weight:800}
.method-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.method-grid{grid-template-columns:repeat(3,1fr)}}
.method-card{background:var(--cd);border-radius:10px;padding:10px;border:1px solid rgba(255,255,255,.06);text-decoration:none;color:var(--tx);display:block}
.method-card:hover{border-color:rgba(255,209,102,.3)}
.mc-name{font-size:12px;font-weight:800;margin-bottom:3px}
.mc-type{font-size:11px;color:var(--mt)}
.mc-sub{font-size:11px;color:var(--gn);margin-top:2px;font-weight:700}
</style>
</head>
<body>
'.$NAV.'
<div class="ph">
  <h1>Paiement <span>Casino Afrique</span></h1>
  <p>'.count($allPages).'+ guides par pays et méthode</p>
</div>
<div style="padding:0 16px;margin-bottom:20px">';

// Crypto section
$listing .= '<div class="country-section" style="padding:0">
  <div class="cs-header"><span class="cs-flag">₿</span><span class="cs-name">Crypto — Toute l\'Afrique</span></div>
  <div class="method-grid">';
foreach ($generalCryptoPages as $gp) {
    $listing .= '<a href="/paiement/'.$gp['slug'].'/" class="method-card"><div class="mc-name">'.explode(' —', $gp['h1'])[0].'</div><div class="mc-type">Crypto</div><div class="mc-sub">Guide complet</div></a>';
}
$listing .= '</div></div>';

// Top countries
foreach ($TOP_COUNTRIES as $countrySlug => $country) {
    $listing .= '<div class="country-section" style="padding:0">
      <div class="cs-header"><span class="cs-flag">'.$country['flag'].'</span><span class="cs-name">'.$country['name'].'</span></div>
      <div class="method-grid">';
    foreach ($country['mobile_methods'] as $mSlug => $method) {
        $listing .= '<a href="/paiement/casino-'.$mSlug.'-'.$countrySlug.'/" class="method-card"><div class="mc-name">'.$method['name'].'</div><div class="mc-type">Mobile Money</div><div class="mc-sub">'.$method['time'].' · '.$method['fee'].'</div></a>';
    }
    foreach ($country['crypto_priority'] as $cSlug) {
        if (!isset($CRYPTO_METHODS[$cSlug])) continue;
        $cm = $CRYPTO_METHODS[$cSlug];
        $listing .= '<a href="/paiement/casino-'.$cSlug.'-'.$countrySlug.'/" class="method-card"><div class="mc-name">'.$cm['name'].'</div><div class="mc-type">Crypto</div><div class="mc-sub">'.$cm['time'].' · '.$cm['symbol'].'</div></a>';
    }
    $listing .= '</div></div>';
}

// Small countries
$listing .= '<div class="country-section" style="padding:0">
  <div class="cs-header"><span class="cs-flag">🌍</span><span class="cs-name">Autres Pays</span></div>
  <div class="method-grid">';
foreach ($SMALL_COUNTRIES as $cSlug => $c) {
    $listing .= '<a href="/paiement/casino-paiement-'.$cSlug.'/" class="method-card"><div class="mc-name">'.$c['flag'].' '.$c['name'].'</div><div class="mc-type">Mobile Money</div><div class="mc-sub">'.$c['method'].'</div></a>';
}
$listing .= '</div></div>';
$listing .= '</div>'.$BNAV.'</body></html>';

file_put_contents($PAY_DIR.'/index.html', $listing);
echo "  ✅ /paiement/\n\n";

// UPDATE SITEMAP
echo "📋 UPDATING SITEMAP\n";
$existing = file_get_contents($BASE.'/sitemap.xml');
$date = date('Y-m-d');
$newUrls = '<url><loc>https://www.lesgetsinfo.com/paiement/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>'."\n";
foreach ($allPages as $p) {
    $newUrls .= '<url><loc>https://www.lesgetsinfo.com/paiement/'.$p.'/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>'."\n";
}
$existing = str_replace('</urlset>', $newUrls.'</urlset>', $existing);
file_put_contents($BASE.'/sitemap.xml', $existing);
$total = substr_count($existing, '<url>');
echo "  ✅ sitemap: ".$total." URLs\n\n";

echo "=== DONE ===\n";
echo "✅ ".count($allPages)." payment pages\n";
echo "✅ /paiement/ listing\n";
echo "✅ Sitemap: ".$total." total URLs\n";
echo "⚠️  Run: rm gen_paiement_fr.php\n";
