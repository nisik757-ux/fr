<?php
/**
 * BONUS MATRIX GENERATOR for lesgetsinfo.com
 * 210 pages: 10 types × 20 countries + 10 general
 * Each page is UNIQUE - different angle, local payment methods, local context
 * Run: php gen_bonus_matrix.php
 */

$OPENAI_KEY = 'OPENAI_KEY_HERE';
$ANTHROPIC_KEY = 'ANTHROPIC_KEY_HERE';

$BASE = '/home/admin/web/lesgetsinfo.com/public_html';
$BONUS_DIR = $BASE . '/bonus';
$IMG_DIR = $BASE . '/images/bonus';

$AFF = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($BONUS_DIR)) mkdir($BONUS_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

// 20 pays avec données locales précises
$COUNTRIES = [
    'congo-rdc' => [
        'name' => 'RD Congo',
        'adjective' => 'congolais',
        'currency' => 'Franc Congolais (CDF)',
        'payments' => 'Vodacom M-Pesa, Airtel Money, Orange Money',
        'top_payments' => 'M-Pesa et Airtel Money',
        'flag' => '🇨🇩',
        'pop' => '100 millions',
        'lang_note' => 'Lingala et français',
        'gambling_note' => 'Les casinos en ligne offshore sont accessibles depuis la RD Congo',
        'popular_games' => 'Aviator, les machines à sous et le sport betting',
        'color1' => '#007FFF', 'color2' => '#F7D618',
    ],
    'cote-divoire' => [
        'name' => "Côte d'Ivoire",
        'adjective' => 'ivoirien',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'Orange Money CI, MTN Mobile Money, Wave, Moov Money',
        'top_payments' => 'Orange Money et Wave',
        'flag' => '🇨🇮',
        'pop' => '27 millions',
        'lang_note' => 'français',
        'gambling_note' => 'Le marché ivoirien est l\'un des plus actifs d\'Afrique de l\'Ouest',
        'popular_games' => 'Aviator, Gates of Olympus et le football betting',
        'color1' => '#F77F00', 'color2' => '#009A44',
    ],
    'cameroun' => [
        'name' => 'Cameroun',
        'adjective' => 'camerounais',
        'currency' => 'Franc CFA (XAF)',
        'payments' => 'MTN Mobile Money, Orange Money CM, Express Union',
        'top_payments' => 'MTN Mobile Money et Orange Money',
        'flag' => '🇨🇲',
        'pop' => '28 millions',
        'lang_note' => 'français et anglais',
        'gambling_note' => 'Le Cameroun possède une population de joueurs très engagée',
        'popular_games' => 'Paris sportifs sur football, Aviator et slots',
        'color1' => '#007A5E', 'color2' => '#CE1126',
    ],
    'senegal' => [
        'name' => 'Sénégal',
        'adjective' => 'sénégalais',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'Wave, Orange Money SN, Free Money, Wari',
        'top_payments' => 'Wave et Orange Money',
        'flag' => '🇸🇳',
        'pop' => '18 millions',
        'lang_note' => 'français et wolof',
        'gambling_note' => 'Le Sénégal a une communauté de joueurs très active notamment sur mobile',
        'popular_games' => 'Aviator, paris sur la Ligue 1 sénégalaise et les slots',
        'color1' => '#00853F', 'color2' => '#FDEF42',
    ],
    'mali' => [
        'name' => 'Mali',
        'adjective' => 'malien',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'Orange Money ML, Moov Money, Wave',
        'top_payments' => 'Orange Money et Moov Money',
        'flag' => '🇲🇱',
        'pop' => '22 millions',
        'lang_note' => 'français et bambara',
        'gambling_note' => 'Les joueurs maliens accèdent aux casinos en ligne via mobile',
        'popular_games' => 'Aviator, machines à sous et paris sportifs',
        'color1' => '#14B53A', 'color2' => '#CE1126',
    ],
    'burkina-faso' => [
        'name' => 'Burkina Faso',
        'adjective' => 'burkinabè',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'Orange Money BF, Moov Money BF, Coris Money',
        'top_payments' => 'Orange Money et Moov Money',
        'flag' => '🇧🇫',
        'pop' => '23 millions',
        'lang_note' => 'français et mooré',
        'gambling_note' => 'Le marché du jeu en ligne se développe rapidement au Burkina',
        'popular_games' => 'Aviator, slots Pragmatic Play et football',
        'color1' => '#EF2B2D', 'color2' => '#009A00',
    ],
    'guinee' => [
        'name' => 'Guinée',
        'adjective' => 'guinéen',
        'currency' => 'Franc Guinéen (GNF)',
        'payments' => 'Orange Money GN, MTN Mobile Money GN, Cellcom',
        'top_payments' => 'Orange Money et MTN Money',
        'flag' => '🇬🇳',
        'pop' => '14 millions',
        'lang_note' => 'français et pular',
        'gambling_note' => 'La Guinée voit une croissance rapide des casinos en ligne',
        'popular_games' => 'Aviator, machines à sous et paris foot',
        'color1' => '#CE1126', 'color2' => '#009460',
    ],
    'benin' => [
        'name' => 'Bénin',
        'adjective' => 'béninois',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'MTN Mobile Money BJ, Moov Money BJ',
        'top_payments' => 'MTN Mobile Money et Moov Money',
        'flag' => '🇧🇯',
        'pop' => '13 millions',
        'lang_note' => 'français et fon',
        'gambling_note' => 'Le Bénin dispose d\'un cadre légal pour certaines formes de jeux',
        'popular_games' => 'Aviator, slots et paris sportifs',
        'color1' => '#008751', 'color2' => '#E8112D',
    ],
    'togo' => [
        'name' => 'Togo',
        'adjective' => 'togolais',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'Togocel T-Money, Moov Money TG, Flooz',
        'top_payments' => 'T-Money et Moov Money',
        'flag' => '🇹🇬',
        'pop' => '9 millions',
        'lang_note' => 'français et ewé',
        'gambling_note' => 'Le Togo a une tradition de jeux bien établie',
        'popular_games' => 'Aviator, Mahjong Ways et paris sportifs',
        'color1' => '#006A4E', 'color2' => '#D21034',
    ],
    'niger' => [
        'name' => 'Niger',
        'adjective' => 'nigérien',
        'currency' => 'Franc CFA (XOF)',
        'payments' => 'Airtel Money NE, Moov Money NE, Orange Money NE',
        'top_payments' => 'Airtel Money et Moov Money',
        'flag' => '🇳🇪',
        'pop' => '25 millions',
        'lang_note' => 'français et haoussa',
        'gambling_note' => 'Les joueurs nigériens accèdent aux casinos via smartphone',
        'popular_games' => 'Aviator, slots et paris sur football',
        'color1' => '#E05206', 'color2' => '#009A00',
    ],
    'tchad' => [
        'name' => 'Tchad',
        'adjective' => 'tchadien',
        'currency' => 'Franc CFA (XAF)',
        'payments' => 'Airtel Money TD, Moov Money TD',
        'top_payments' => 'Airtel Money et Moov Money',
        'flag' => '🇹🇩',
        'pop' => '18 millions',
        'lang_note' => 'français et arabe',
        'gambling_note' => 'Le marché en ligne se développe progressivement au Tchad',
        'popular_games' => 'Aviator et machines à sous',
        'color1' => '#002664', 'color2' => '#C60C30',
    ],
    'gabon' => [
        'name' => 'Gabon',
        'adjective' => 'gabonais',
        'currency' => 'Franc CFA (XAF)',
        'payments' => 'Airtel Money GA, Moov Money GA',
        'top_payments' => 'Airtel Money et Moov Money',
        'flag' => '🇬🇦',
        'pop' => '2,3 millions',
        'lang_note' => 'français',
        'gambling_note' => 'Le Gabon est l\'un des marchés les plus développés d\'Afrique centrale',
        'popular_games' => 'Casino live, machines à sous et paris sportifs',
        'color1' => '#009E60', 'color2' => '#003189',
    ],
    'congo-brazzaville' => [
        'name' => 'Congo Brazzaville',
        'adjective' => 'congolais',
        'currency' => 'Franc CFA (XAF)',
        'payments' => 'Airtel Money CG, MTN Mobile Money CG',
        'top_payments' => 'Airtel Money et MTN Money',
        'flag' => '🇨🇬',
        'pop' => '6 millions',
        'lang_note' => 'français et lingala',
        'gambling_note' => 'Le Congo-Brazzaville offre un accès facile aux plateformes en ligne',
        'popular_games' => 'Aviator, slots et paris foot',
        'color1' => '#009543', 'color2' => '#DC241F',
    ],
    'rwanda' => [
        'name' => 'Rwanda',
        'adjective' => 'rwandais',
        'currency' => 'Franc Rwandais (RWF)',
        'payments' => 'MTN Mobile Money RW, Airtel Money RW',
        'top_payments' => 'MTN Mobile Money',
        'flag' => '🇷🇼',
        'pop' => '14 millions',
        'lang_note' => 'français, kinyarwanda et anglais',
        'gambling_note' => 'Le Rwanda régule les jeux en ligne via le RRA',
        'popular_games' => 'Slots, casino live et paris sportifs',
        'color1' => '#20603D', 'color2' => '#00A1DE',
    ],
    'burundi' => [
        'name' => 'Burundi',
        'adjective' => 'burundais',
        'currency' => 'Franc Burundais (BIF)',
        'payments' => 'Lumicash, Leo Cash, Ecocash BU',
        'top_payments' => 'Lumicash et Leo Cash',
        'flag' => '🇧🇮',
        'pop' => '13 millions',
        'lang_note' => 'français et kirundi',
        'gambling_note' => 'Les joueurs burundais accèdent aux casinos via mobile',
        'popular_games' => 'Aviator et machines à sous',
        'color1' => '#CE1126', 'color2' => '#1EB53A',
    ],
    'madagascar' => [
        'name' => 'Madagascar',
        'adjective' => 'malgache',
        'currency' => 'Ariary (MGA)',
        'payments' => 'MVola, Airtel Money MG, Orange Money MG',
        'top_payments' => 'MVola et Airtel Money',
        'flag' => '🇲🇬',
        'pop' => '29 millions',
        'lang_note' => 'français et malgache',
        'gambling_note' => 'Madagascar dispose d\'un marché du jeu en développement',
        'popular_games' => 'Aviator, slots et paris sportifs',
        'color1' => '#FC3D32', 'color2' => '#007E3A',
    ],
    'djibouti' => [
        'name' => 'Djibouti',
        'adjective' => 'djiboutien',
        'currency' => 'Franc Djiboutien (DJF)',
        'payments' => 'Waafi Money, D-Money',
        'top_payments' => 'Waafi Money',
        'flag' => '🇩🇯',
        'pop' => '1 million',
        'lang_note' => 'français et arabe',
        'gambling_note' => 'Djibouti est un carrefour stratégique avec accès aux plateformes internationales',
        'popular_games' => 'Casino live et machines à sous',
        'color1' => '#6AB2E7', 'color2' => '#12AD2B',
    ],
    'mauritanie' => [
        'name' => 'Mauritanie',
        'adjective' => 'mauritanien',
        'currency' => 'Ouguiya (MRU)',
        'payments' => 'Chinguipass, Bankily',
        'top_payments' => 'Chinguipass et Bankily',
        'flag' => '🇲🇷',
        'pop' => '5 millions',
        'lang_note' => 'français et arabe hassanya',
        'gambling_note' => 'Les joueurs mauritaniens utilisent des VPN pour accéder aux casinos',
        'popular_games' => 'Machines à sous et paris sportifs',
        'color1' => '#006233', 'color2' => '#FFD700',
    ],
    'comores' => [
        'name' => 'Comores',
        'adjective' => 'comorien',
        'currency' => 'Franc Comorien (KMF)',
        'payments' => 'Huri Money, virement bancaire',
        'top_payments' => 'Huri Money et virement',
        'flag' => '🇰🇲',
        'pop' => '900 000',
        'lang_note' => 'français, arabe et comorien',
        'gambling_note' => 'Les Comores offrent un accès aux plateformes internationales',
        'popular_games' => 'Slots et casino live',
        'color1' => '#3A75C4', 'color2' => '#009A44',
    ],
    'centrafrique' => [
        'name' => 'Centrafrique',
        'adjective' => 'centrafricain',
        'currency' => 'Franc CFA (XAF)',
        'payments' => 'Orange Money CF, Moov Money CF',
        'top_payments' => 'Orange Money et Moov Money',
        'flag' => '🇨🇫',
        'pop' => '5 millions',
        'lang_note' => 'français et sango',
        'gambling_note' => 'Les joueurs centrafricains accèdent aux casinos via mobile',
        'popular_games' => 'Aviator et slots',
        'color1' => '#003082', 'color2' => '#BE0027',
    ],
];

// 10 bonus types with unique angles
$BONUS_TYPES = [
    'sans-depot' => [
        'name' => 'Bonus Sans Dépôt',
        'icon' => '🎁',
        'amount_general' => 'Jusqu\'à 50€ gratuit',
        'angle' => 'gratuit sans risque',
        'cta' => 'Réclamez votre bonus gratuit',
        'img_prompt' => 'No deposit bonus casino, free money gift box opening, golden coins flying, African mobile phone, dark green gold theme',
        'h1_general' => 'Bonus Sans Dépôt Casino Afrique Francophone',
        'meta_general' => 'Obtenez un bonus casino sans dépôt en Afrique. Jouez gratuitement sans risquer votre argent. Guide des meilleures offres sans dépôt.',
        'country_h1_template' => 'Bonus Sans Dépôt Casino {country}',
        'country_meta_template' => 'Bonus casino sans dépôt pour les joueurs {adjective}s. Jouez gratuitement au {country} sans risquer votre argent. Offres exclusives.',
    ],
    'free-spins' => [
        'name' => 'Free Spins Gratuits',
        'icon' => '🎰',
        'amount_general' => '50 à 500 tours gratuits',
        'angle' => 'tours gratuits sur les meilleurs slots',
        'cta' => 'Réclamez vos free spins',
        'img_prompt' => 'Free spins casino slot machine, golden spinning reels, coins explosion, African player celebrating, dark background',
        'h1_general' => 'Free Spins Gratuits Casino Afrique',
        'meta_general' => 'Free spins gratuits dans les casinos en ligne en Afrique. Tours gratuits sur Gates of Olympus, Aviator et plus. Sans dépôt ou avec bonus.',
        'country_h1_template' => 'Free Spins Gratuits Casino {country}',
        'country_meta_template' => 'Free spins pour les joueurs {adjective}s. Tours gratuits sur les meilleurs slots disponibles au {country}. Réclamez maintenant.',
    ],
    'free-bet' => [
        'name' => 'Free Bet Paris Sportifs',
        'icon' => '⚽',
        'amount_general' => 'Jusqu\'à 30€ de free bet',
        'angle' => 'pariez sans risque sur vos équipes favorites',
        'cta' => 'Obtenez votre free bet',
        'img_prompt' => 'Free bet sports betting, football stadium, African fans celebrating goal, mobile betting app, green gold colors',
        'h1_general' => 'Free Bet Paris Sportifs Afrique Francophone',
        'meta_general' => 'Free bet gratuit pour paris sportifs en Afrique. Pariez sur le football, la CAN et vos sports favoris sans risque. Meilleures offres.',
        'country_h1_template' => 'Free Bet Paris Sportifs {country}',
        'country_meta_template' => 'Free bet pour les parieurs {adjective}s. Pariez sur le football et les sports au {country} sans risque. Offres exclusives.',
    ],
    'bonus-bienvenue' => [
        'name' => 'Bonus de Bienvenue',
        'icon' => '👋',
        'amount_general' => '100% à 200% sur votre 1er dépôt',
        'angle' => 'doublez ou triplez votre premier dépôt',
        'cta' => 'Réclamez votre bonus bienvenue',
        'img_prompt' => 'Welcome bonus casino, happy African player with phone, golden coins doubling, 200% bonus text effect, celebration',
        'h1_general' => 'Bonus de Bienvenue Casino Afrique Francophone',
        'meta_general' => 'Bonus de bienvenue casino en Afrique. Doublez votre premier dépôt avec 100% à 200% de bonus. Offres exclusives pour joueurs africains.',
        'country_h1_template' => 'Bonus de Bienvenue Casino {country}',
        'country_meta_template' => 'Bonus bienvenue casino pour les joueurs {adjective}s. Doublez votre dépôt au {country}. Offres exclusives avec Mobile Money.',
    ],
    'cashback' => [
        'name' => 'Cashback Casino',
        'icon' => '💰',
        'amount_general' => '10% à 20% de vos pertes remboursées',
        'angle' => 'récupérez une partie de vos pertes chaque semaine',
        'cta' => 'Profitez du cashback',
        'img_prompt' => 'Casino cashback rebate, money returning to African player hand, weekly refund concept, green gold theme mobile',
        'h1_general' => 'Cashback Casino Afrique Francophone',
        'meta_general' => 'Cashback casino en Afrique. Récupérez 10% à 20% de vos pertes chaque semaine. Jouez en confiance avec le filet de sécurité cashback.',
        'country_h1_template' => 'Cashback Casino {country}',
        'country_meta_template' => 'Cashback casino pour joueurs {adjective}s. Récupérez une partie de vos pertes au {country}. Jouez en toute confiance.',
    ],
    'bonus-rechargement' => [
        'name' => 'Bonus de Rechargement',
        'icon' => '🔄',
        'amount_general' => '50% à 100% sur chaque rechargement',
        'angle' => 'bonus sur chaque nouveau dépôt',
        'cta' => 'Rechargez et obtenez plus',
        'img_prompt' => 'Reload bonus casino, money recharging like a battery, African mobile phone deposit, golden percentage, dark theme',
        'h1_general' => 'Bonus de Rechargement Casino Afrique',
        'meta_general' => 'Bonus rechargement casino en Afrique. Recevez 50% à 100% sur chaque nouveau dépôt. Prolongez votre plaisir avec des bonus réguliers.',
        'country_h1_template' => 'Bonus Rechargement Casino {country}',
        'country_meta_template' => 'Bonus rechargement pour joueurs {adjective}s. Recevez plus sur chaque dépôt au {country}. Via {top_payments}.',
    ],
    'bonus-crypto' => [
        'name' => 'Bonus Casino Crypto',
        'icon' => '₿',
        'amount_general' => '+15% à +25% sur dépôts crypto',
        'angle' => 'déposez en Bitcoin et recevez plus',
        'cta' => 'Déposez en crypto',
        'img_prompt' => 'Crypto casino bonus Bitcoin, blockchain African gambling, golden Bitcoin coin, dark tech background, mobile crypto wallet',
        'h1_general' => 'Bonus Casino Crypto Afrique Francophone',
        'meta_general' => 'Bonus casino crypto en Afrique. Déposez en Bitcoin, USDT ou ETH et recevez jusqu\'à 25% de bonus supplémentaire. Paiements rapides.',
        'country_h1_template' => 'Casino Crypto {country}',
        'country_meta_template' => 'Casino crypto pour joueurs {adjective}s. Déposez en Bitcoin au {country} et recevez des bonus exclusifs. Transactions rapides et sécurisées.',
    ],
    'mobile-money' => [
        'name' => 'Bonus Mobile Money',
        'icon' => '📱',
        'amount_general' => 'Bonus exclusifs via Mobile Money',
        'angle' => 'déposez avec votre téléphone, jouez instantanément',
        'cta' => 'Déposez via Mobile Money',
        'img_prompt' => 'Mobile Money casino deposit, African smartphone payment, Orange Money MTN Wave interface, casino coins reward, green gold',
        'h1_general' => 'Bonus Casino Mobile Money Afrique',
        'meta_general' => 'Casino Mobile Money en Afrique. Déposez via Orange Money, Wave, MTN Money et recevez des bonus exclusifs. Simple, rapide, sécurisé.',
        'country_h1_template' => 'Casino Mobile Money {country}',
        'country_meta_template' => 'Casino Mobile Money pour joueurs {adjective}s. Déposez via {top_payments} au {country} et jouez immédiatement. Bonus exclusifs.',
    ],
    'programme-vip' => [
        'name' => 'Programme VIP',
        'icon' => '👑',
        'amount_general' => 'Cashback jusqu\'à 25% + avantages exclusifs',
        'angle' => 'récompenses exclusives pour les joueurs fidèles',
        'cta' => 'Rejoignez le club VIP',
        'img_prompt' => 'VIP casino program, golden crown diamond card, African VIP player exclusive lounge, luxury dark green gold background',
        'h1_general' => 'Programme VIP Casino Afrique Francophone',
        'meta_general' => 'Programme VIP casino en Afrique. Accédez à des cashbacks exclusifs, des bonus personnalisés et un service dédié. Pour les joueurs sérieux.',
        'country_h1_template' => 'Programme VIP Casino {country}',
        'country_meta_template' => 'Programme VIP casino pour joueurs {adjective}s au {country}. Cashback premium, bonus exclusifs et service personnalisé. Accès privilégié.',
    ],
    'tournois' => [
        'name' => 'Tournois Casino',
        'icon' => '🏆',
        'amount_general' => 'Prix pouvant atteindre 10 000€',
        'angle' => 'affrontez d\'autres joueurs pour gagner gros',
        'cta' => 'Rejoindre un tournoi',
        'img_prompt' => 'Casino tournament leaderboard, African players competing, trophy prize pool, slots tournament interface, exciting dark background',
        'h1_general' => 'Tournois Casino Afrique Francophone',
        'meta_general' => 'Tournois casino en Afrique. Participez à des compétitions de slots et blackjack avec des prize pools importants. Affrontez des joueurs africains.',
        'country_h1_template' => 'Tournois Casino {country}',
        'country_meta_template' => 'Tournois casino pour joueurs {adjective}s. Compétitions de slots et casino au {country} avec de vrais prix à gagner. Inscrivez-vous.',
    ],
];

// ============ FUNCTIONS ============

function claude($prompt, $key, $tokens = 500) {
    $data = json_encode([
        'model' => 'claude-sonnet-4-6',
        'max_tokens' => $tokens,
        'messages' => [['role' => 'user', 'content' => $prompt]]
    ]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'x-api-key: ' . $key,
            'anthropic-version: 2023-06-01'
        ],
        CURLOPT_TIMEOUT => 60
    ]);
    $r = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return trim($r['content'][0]['text'] ?? '');
}

function genImg($prompt, $file, $key, $dir) {
    $path = $dir . '/' . $file;
    $jpg = str_replace('.png', '.jpg', $path);
    if (file_exists($jpg)) {
        echo "    ✓ img exists\n";
        return '/images/bonus/' . str_replace('.png', '.jpg', $file);
    }
    echo "    🎨 generating image...\n";
    $data = json_encode([
        'model' => 'gpt-image-1',
        'prompt' => $prompt . ', professional, vibrant, no text, no watermark',
        'n' => 1,
        'size' => '1024x1024',
        'output_format' => 'png'
    ]);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $key
        ],
        CURLOPT_TIMEOUT => 90
    ]);
    $r = json_decode(curl_exec($ch), true);
    curl_close($ch);
    if (!isset($r['data'][0]['b64_json'])) {
        echo "    ❌ " . ($r['error']['message'] ?? 'error') . "\n";
        return null;
    }
    file_put_contents($path, base64_decode($r['data'][0]['b64_json']));
    $img = imagecreatefrompng($path);
    imagejpeg($img, $jpg, 83);
    imagedestroy($img);
    unlink($path);
    echo "    ✅ saved\n";
    return '/images/bonus/' . str_replace('.png', '.jpg', $file);
}

function buildPage($h1, $metaDesc, $intro, $body, $steps, $pros, $cons, $faq, $amount, $icon, $affLink, $imgPath, $relatedHtml, $bonusType, $country = null) {
    global $AFF;
    
    $imgTag = $imgPath ? '<img src="' . $imgPath . '" alt="' . htmlspecialchars($h1) . '" title="' . htmlspecialchars($h1) . '" style="width:100%;height:200px;object-fit:cover">' : '';
    
    $flagBar = '';
    if ($country) {
        $flagBar = '<div style="height:5px;background:linear-gradient(90deg,' . $country['color1'] . ',' . $country['color2'] . ')"></div>';
    }

    return '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A0F0D">
<title>' . htmlspecialchars($h1) . ' | CasinoAfrique</title>
<meta name="description" content="' . htmlspecialchars($metaDesc) . '">
<link rel="canonical" href="https://www.lesgetsinfo.com/bonus/' . ($country ? $bonusType . '-' . key($GLOBALS['COUNTRIES'] ?? []) : $bonusType) . '/">
<link rel="icon" type="image/png" href="/favicon.png">
<link rel="apple-touch-icon" href="/favicon.png">
<style>
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
:root{--p:#1B4332;--p2:#2D6A4F;--a:#FFD166;--a2:#F4A261;--dk:#0A0F0D;--cd:#111A15;--cd2:#192219;--tx:#E8F5E9;--mt:#7A9E7E;--rd:#E63946;--gn:#52B788;--gl:#FFD166}
html{scroll-behavior:smooth}
body{background:var(--dk);color:var(--tx);font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;overflow-x:hidden;padding-bottom:80px}
a{text-decoration:none;color:inherit}
.bar{background:rgba(10,15,13,.97);backdrop-filter:blur(10px);padding:10px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:200;border-bottom:1px solid rgba(82,183,136,.15)}
.logo{font-size:19px;font-weight:800;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.top-cta{background:linear-gradient(135deg,var(--p),var(--p2));color:#fff;padding:7px 14px;border-radius:8px;font-size:12px;font-weight:700}
.dnav{display:none}
@media(min-width:768px){
  .dnav{display:flex;gap:24px}
  .dnav a{color:var(--mt);font-size:14px;font-weight:600}
  .dnav a:hover{color:var(--a)}
  .bar{padding:14px 40px}
  .wrap{max-width:900px;margin:0 auto}
  body{padding-bottom:20px}
  .bnav{display:none!important}
}
.wrap{padding:0 16px}
.hdr{padding:16px 16px 0}
.h1{font-size:22px;font-weight:900;line-height:1.25;margin-bottom:8px}
.h1 em{font-style:normal;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.intro{font-size:13px;color:var(--mt);line-height:1.65;margin-bottom:0}
.bonus-box{background:linear-gradient(135deg,#0D2318,#162E1E);border:1px solid rgba(82,183,136,.25);border-radius:16px;padding:18px;margin:14px 16px;text-align:center}
.bonus-amount{font-size:30px;font-weight:900;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:4px}
.bonus-sub{font-size:12px;color:var(--mt);margin-bottom:14px;line-height:1.5}
.cta{display:block;background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;padding:14px;border-radius:12px;font-weight:800;font-size:15px;text-align:center;letter-spacing:.2px}
.sec{margin-bottom:20px}
.sec-ttl{font-size:15px;font-weight:800;margin-bottom:10px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.06)}
.sec-ttl span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.btext{font-size:13px;color:rgba(232,245,233,.88);line-height:1.7}
.btext p{margin-bottom:11px}
.btext strong{color:var(--tx)}
.steps{display:flex;flex-direction:column;gap:10px}
.step{background:var(--cd);border-radius:12px;padding:14px;display:flex;gap:12px;border:1px solid rgba(255,255,255,.06)}
.snum{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--a),var(--a2));display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#0A0F0D;flex-shrink:0}
.stxt{font-size:13px;color:var(--mt);line-height:1.5}
.stxt strong{color:var(--tx);display:block;margin-bottom:3px;font-size:13px}
.pc{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.pros,.cons{background:var(--cd);border-radius:12px;padding:12px;border:1px solid rgba(255,255,255,.06)}
.ptl{color:var(--gn);font-size:12px;font-weight:800;margin-bottom:8px}
.ctl{color:var(--rd);font-size:12px;font-weight:800;margin-bottom:8px}
.pros li,.cons li{font-size:12px;color:var(--mt);margin-bottom:6px;padding-left:16px;list-style:none;position:relative;line-height:1.4}
.pros li:before{content:"✓";position:absolute;left:0;color:var(--gn)}
.cons li:before{content:"✗";position:absolute;left:0;color:var(--rd)}
.faq-item{background:var(--cd);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:13px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;align-items:center;cursor:pointer;line-height:1.4}
.fi{color:var(--gn);font-size:18px;transition:.2s;flex-shrink:0;margin-left:8px}
.faq-item.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--mt);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq-item.open .fa{max-height:300px;padding:0 16px 14px}
.rel-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.rel-grid{grid-template-columns:repeat(3,1fr)}}
.rel-card{background:var(--cd);border-radius:10px;padding:10px;border:1px solid rgba(255,255,255,.06);display:block;font-size:12px;font-weight:700;line-height:1.4}
.rel-card:hover{border-color:rgba(255,209,102,.3)}
.rel-ico{font-size:18px;margin-bottom:4px;display:block}
.rel-amt{font-size:11px;color:var(--gl);margin-top:3px}
.bnav{position:fixed;bottom:0;left:0;right:0;background:rgba(10,15,13,.97);backdrop-filter:blur(10px);border-top:1px solid rgba(82,183,136,.1);display:flex;padding:8px 0 max(8px,env(safe-area-inset-bottom));z-index:200}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--mt);font-size:10px;font-weight:700}
.ni.on{color:var(--a)}
.ni-ico{font-size:22px}
</style>
</head>
<body>
<nav class="bar">
  <a href="/" class="logo">🎲 CasinoAfrique</a>
  <div class="dnav">
    <a href="/casino/">Pays</a>
    <a href="/bonus/" style="color:var(--a)">Bonus</a>
    <a href="/jeux/">Jeux</a>
    <a href="/guide/">Guides</a>
  </div>
  <a href="' . $affLink . '" target="_blank" rel="noopener" class="top-cta">Jouer →</a>
</nav>

' . $imgTag . $flagBar . '

<div class="hdr">
  <h1 class="h1"><em>' . $icon . ' ' . $h1 . '</em></h1>
  <p class="intro">' . $intro . '</p>
</div>

<div class="bonus-box">
  <div class="bonus-amount">' . $amount . '</div>
  <div class="bonus-sub">' . $metaDesc . '</div>
  <a href="' . $affLink . '" target="_blank" rel="noopener" class="cta">Réclamer ce Bonus Maintenant →</a>
</div>

<div class="wrap">
  <div class="sec">
    <div class="sec-ttl">📖 <span>Tout Savoir sur ce Bonus</span></div>
    <div class="btext">' . $body . '</div>
  </div>

  <div class="sec">
    <div class="sec-ttl">🚀 <span>Comment en Profiter</span></div>
    <div class="steps">' . $steps . '</div>
  </div>

  <div class="bonus-box" style="margin:0 0 20px">
    <div class="bonus-amount">🔥 ' . $amount . '</div>
    <div class="bonus-sub">Disponible maintenant · Mobile Money accepté</div>
    <a href="' . $affLink . '" target="_blank" rel="noopener" class="cta">Jouer Maintenant →</a>
  </div>

  <div class="sec">
    <div class="sec-ttl">⚖️ <span>Avantages & Inconvénients</span></div>
    <div class="pc">
      <div class="pros"><div class="ptl">✅ Avantages</div><ul>' . $pros . '</ul></div>
      <div class="cons"><div class="ctl">❌ Inconvénients</div><ul>' . $cons . '</ul></div>
    </div>
  </div>

  <div class="sec">
    <div class="sec-ttl">❓ <span>Questions Fréquentes</span></div>
    ' . $faq . '
  </div>

  <div class="sec">
    <div class="sec-ttl">🎁 <span>Autres Bonus</span></div>
    <div class="rel-grid">' . $relatedHtml . '</div>
  </div>
</div>

<nav class="bnav">
  <a href="/" class="ni"><span class="ni-ico">🏠</span>Accueil</a>
  <a href="/casino/" class="ni"><span class="ni-ico">🌍</span>Pays</a>
  <a href="/bonus/" class="ni on"><span class="ni-ico">🎁</span>Bonus</a>
  <a href="/jeux/" class="ni"><span class="ni-ico">🎰</span>Jeux</a>
  <a href="/guide/" class="ni"><span class="ni-ico">📖</span>Guide</a>
</nav>
<script>document.querySelectorAll(".fq").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));</script>
</body>
</html>';
}

function makeStep($num, $title, $text) {
    return '<div class="step"><div class="snum">' . $num . '</div><div class="stxt"><strong>' . $title . '</strong>' . $text . '</div></div>';
}

function makeFaq($q, $a) {
    return '<div class="faq-item"><div class="fq">' . $q . ' <span class="fi">+</span></div><div class="fa">' . $a . '</div></div>';
}

function makeRelated($icon, $name, $amount, $url) {
    return '<a href="' . $url . '" class="rel-card"><span class="rel-ico">' . $icon . '</span>' . $name . '<div class="rel-amt">' . $amount . '</div></a>';
}

// ============ GENERATE PAGES ============

echo "=== BONUS MATRIX GENERATOR ===\n";
echo count($BONUS_TYPES) . " types × " . count($COUNTRIES) . " pays = " . (count($BONUS_TYPES) * count($COUNTRIES)) . " pages\n";
echo "+ " . count($BONUS_TYPES) . " pages générales\n";
echo "= TOTAL: " . (count($BONUS_TYPES) * count($COUNTRIES) + count($BONUS_TYPES)) . " pages\n\n";

$imgCounter = 0;
$allPages = []; // for sitemap

// ---- GENERAL PAGES (10) ----
echo "📋 GENERAL BONUS PAGES\n\n";

foreach ($BONUS_TYPES as $typeSlug => $type) {
    echo "[GENERAL] " . $type['name'] . "\n";

    $dir = $BONUS_DIR . '/' . $typeSlug;
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    // Image for general page
    $imgPath = genImg(
        $type['img_prompt'],
        $typeSlug . '_general.png',
        $OPENAI_KEY,
        $IMG_DIR
    );

    echo "    ✍️  writing content...\n";

    $intro = claude(
        "Tu es un expert en casinos en ligne pour l'Afrique francophone. Écris 2 phrases d'accroche percutantes sur '" . $type['name'] . "' pour les joueurs africains. Vendeur, enthousiaste, met en avant '" . $type['angle'] . "'. Français naturel. Pas d'année. Seulement 2 phrases.",
        $ANTHROPIC_KEY, 150
    );

    $body = claude(
        "Tu es un rédacteur casino expert. Écris un guide vendeur sur '" . $type['name'] . "' pour l'Afrique francophone. 4 paragraphes:\n1. Pourquoi ce bonus est exceptionnel (accrocheur, vendeur)\n2. Comment il fonctionne concrètement avec des exemples chiffrés\n3. Les méthodes de paiement africaines compatibles (Mobile Money, Orange Money, Wave, MTN...)\n4. Stratégie pour maximiser ce bonus\nChaque paragraphe 3 phrases. Balise dans <p>. Français naturel et vendeur. Pas d'année. Seulement les paragraphes.",
        $ANTHROPIC_KEY, 800
    );

    $s1 = claude("En 1 phrase courte et vendeuse: l'étape 1 pour obtenir '" . $type['name'] . "' en Afrique.", $ANTHROPIC_KEY, 80);
    $s2 = claude("En 1 phrase courte: l'étape 2 pour activer et utiliser '" . $type['name'] . "'.", $ANTHROPIC_KEY, 80);
    $s3 = claude("En 1 phrase courte: l'étape 3 pour retirer ses gains après '" . $type['name'] . "'.", $ANTHROPIC_KEY, 80);

    $pros = claude("4 avantages concrets de '" . $type['name'] . "' pour joueurs africains. Chacun dans <li>. Court et percutant. Seulement 4 <li>.", $ANTHROPIC_KEY, 150);
    $cons = claude("3 points de vigilance réels sur '" . $type['name'] . "'. Honnête mais rassurant. Chacun dans <li>. Seulement 3 <li>.", $ANTHROPIC_KEY, 120);

    $faq1a = claude("Réponds en 2 phrases percutantes: Comment obtenir '" . $type['name'] . "' maintenant? Vendeur, encourage à s'inscrire.", $ANTHROPIC_KEY, 100);
    $faq2a = claude("Réponds en 2 phrases claires: Quelles sont les conditions de mise pour '" . $type['name'] . "'?", $ANTHROPIC_KEY, 100);
    $faq3a = claude("Réponds en 2 phrases rassurantes: Peut-on vraiment retirer l'argent du '" . $type['name'] . "'?", $ANTHROPIC_KEY, 100);
    $faq4a = claude("Réponds en 2 phrases: '" . $type['name'] . "' est-il disponible sur mobile en Afrique?", $ANTHROPIC_KEY, 100);

    $steps = makeStep(1, "S'inscrire en 2 minutes", $s1)
           . makeStep(2, "Activer le bonus", $s2)
           . makeStep(3, "Jouer et retirer", $s3);

    $faq = makeFaq("Comment obtenir ce bonus maintenant?", $faq1a)
         . makeFaq("Quelles sont les conditions de mise?", $faq2a)
         . makeFaq("Puis-je vraiment retirer mes gains?", $faq3a)
         . makeFaq("Ce bonus est-il disponible sur mobile?", $faq4a);

    // Related: other bonus types
    $related = '';
    $count = 0;
    foreach ($BONUS_TYPES as $rSlug => $rType) {
        if ($rSlug === $typeSlug) continue;
        $related .= makeRelated($rType['icon'], $rType['name'], $rType['amount_general'], '/bonus/' . $rSlug . '/');
        if (++$count >= 6) break;
    }

    $affLink = $AFF[$imgCounter % 3];
    $html = buildPage(
        $type['h1_general'],
        $type['meta_general'],
        $intro, $body, $steps, $pros, $cons, $faq,
        $type['amount_general'],
        $type['icon'],
        $affLink,
        $imgPath,
        $related,
        $typeSlug
    );

    file_put_contents($dir . '/index.html', $html);
    $allPages[] = '/bonus/' . $typeSlug . '/';
    echo "    ✅ /bonus/" . $typeSlug . "/\n\n";
    $imgCounter++;
    sleep(2);
}

// ---- COUNTRY PAGES (10 × 20 = 200) ----
echo "\n🌍 COUNTRY BONUS PAGES\n\n";

$pageCount = 0;
foreach ($BONUS_TYPES as $typeSlug => $type) {
    foreach ($COUNTRIES as $countrySlug => $country) {
        $pageCount++;
        $slug = $typeSlug . '-' . $countrySlug;
        echo "[" . $pageCount . "/200] " . $type['name'] . " — " . $country['name'] . "\n";

        $dir = $BONUS_DIR . '/' . $slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        // Image every 3 pages
        $imgPath = null;
        if ($pageCount % 3 === 0) {
            $imgPrompt = $type['img_prompt'] . ', ' . $country['name'] . ' flag colors ' . $country['color1'] . ' and ' . $country['color2'];
            $imgPath = genImg($imgPrompt, $slug . '.png', $OPENAI_KEY, $IMG_DIR);
        }

        $h1 = str_replace('{country}', $country['name'], $type['country_h1_template']);
        $metaDesc = str_replace(
            ['{country}', '{adjective}', '{top_payments}'],
            [$country['name'], $country['adjective'], $country['top_payments']],
            $type['country_meta_template']
        );

        echo "    ✍️  writing unique content...\n";

        $intro = claude(
            "Tu es un expert casino pour l'Afrique. Écris 2 phrases d'accroche vendeuses et uniques sur '" . $type['name'] . "' SPÉCIFIQUEMENT pour les joueurs de " . $country['name'] . " (" . $country['adjective'] . "s). Mentionne " . $country['top_payments'] . " comme méthode de paiement. Français naturel. Pas d'année. Seulement 2 phrases percutantes.",
            $ANTHROPIC_KEY, 150
        );

        $body = claude(
            "Tu es rédacteur casino expert. Écris un guide UNIQUE et vendeur sur '" . $type['name'] . "' POUR les joueurs de " . $country['name'] . " (" . $country['adjective'] . "s). Intègre ces infos locales:\n- Monnaie: " . $country['currency'] . "\n- Paiements disponibles: " . $country['payments'] . "\n- Jeux populaires: " . $country['popular_games'] . "\n- Contexte: " . $country['gambling_note'] . "\n\nStructure en 4 paragraphes:\n1. Pourquoi ce bonus est parfait pour les " . $country['adjective'] . "s (accrocheur, local)\n2. Comment déposer via " . $country['top_payments'] . " pour obtenir ce bonus\n3. Les jeux recommandés au " . $country['name'] . " avec ce bonus (" . $country['popular_games'] . ")\n4. Conseils exclusifs pour maximiser ce bonus depuis " . $country['name'] . "\n\nChaque paragraphe 3 phrases. Balise dans <p>. Français naturel et vendeur. Pas d'année.",
            $ANTHROPIC_KEY, 900
        );

        $s1 = claude("En 1 phrase vendeuse: l'étape 1 pour un joueur de " . $country['name'] . " pour obtenir '" . $type['name'] . "' (mentionne " . $country['top_payments'] . ").", $ANTHROPIC_KEY, 80);
        $s2 = claude("En 1 phrase: étape 2 spécifique à " . $country['name'] . " pour activer '" . $type['name'] . "'.", $ANTHROPIC_KEY, 80);
        $s3 = claude("En 1 phrase: étape 3 pour retirer ses gains en " . $country['currency'] . " depuis " . $country['name'] . ".", $ANTHROPIC_KEY, 80);

        $pros = claude("4 avantages SPÉCIFIQUES de '" . $type['name'] . "' pour joueurs de " . $country['name'] . ". Mentionne " . $country['top_payments'] . " et " . $country['currency'] . ". Chacun dans <li>. Court et percutant.", $ANTHROPIC_KEY, 150);
        $cons = claude("3 points de vigilance pour joueurs de " . $country['name'] . " sur '" . $type['name'] . "'. Honnête mais rassurant. Dans <li>.", $ANTHROPIC_KEY, 120);

        $faq1a = claude("Réponds en 2 phrases: Comment obtenir '" . $type['name'] . "' depuis " . $country['name'] . " via " . $country['top_payments'] . "? Vendeur.", $ANTHROPIC_KEY, 100);
        $faq2a = claude("Réponds en 2 phrases: Les conditions de mise pour '" . $type['name'] . "' sont-elles adaptées aux joueurs de " . $country['name'] . "?", $ANTHROPIC_KEY, 100);
        $faq3a = claude("Réponds en 2 phrases: Comment retirer ses gains en " . $country['currency'] . " depuis " . $country['name'] . " après avoir utilisé ce bonus?", $ANTHROPIC_KEY, 100);
        $faq4a = claude("Réponds en 2 phrases: Ce bonus est-il accessible depuis " . $country['name'] . " sur smartphone via " . $country['top_payments'] . "?", $ANTHROPIC_KEY, 100);

        $steps = makeStep(1, "Créer son compte", $s1)
               . makeStep(2, "Activer via " . $country['top_payments'], $s2)
               . makeStep(3, "Retirer en " . $country['currency'], $s3);

        $faq = makeFaq("Comment obtenir ce bonus depuis " . $country['name'] . "?", $faq1a)
             . makeFaq("Les conditions sont-elles adaptées au " . $country['name'] . "?", $faq2a)
             . makeFaq("Comment retirer en " . $country['currency'] . "?", $faq3a)
             . makeFaq("Accessible sur mobile via " . $country['top_payments'] . "?", $faq4a);

        // Related: same type other countries + same country other bonuses
        $related = '';
        $count = 0;
        foreach ($COUNTRIES as $rSlug => $rCountry) {
            if ($rSlug === $countrySlug) continue;
            $rUrl = '/bonus/' . $typeSlug . '-' . $rSlug . '/';
            $related .= makeRelated($rCountry['flag'], $type['name'] . ' ' . $rCountry['name'], $type['amount_general'], $rUrl);
            if (++$count >= 3) break;
        }
        foreach ($BONUS_TYPES as $rTypeSlug => $rType) {
            if ($rTypeSlug === $typeSlug) continue;
            $rUrl = '/bonus/' . $rTypeSlug . '-' . $countrySlug . '/';
            $related .= makeRelated($rType['icon'], $rType['name'] . ' ' . $country['name'], $rType['amount_general'], $rUrl);
            if (++$count >= 6) break;
        }

        $affLink = $AFF[$pageCount % 3];
        $html = buildPage(
            $h1, $metaDesc,
            $intro, $body, $steps, $pros, $cons, $faq,
            $type['amount_general'],
            $type['icon'] . ' ' . $country['flag'],
            $affLink,
            $imgPath,
            $related,
            $typeSlug,
            $country
        );

        file_put_contents($dir . '/index.html', $html);
        $allPages[] = '/bonus/' . $slug . '/';
        echo "    ✅ /bonus/" . $slug . "/\n\n";
        sleep(1);
    }
}

// ---- BONUS LISTING ----
echo "📋 GENERATING BONUS LISTING\n";

$listHtml = '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Tous les Bonus Casino Afrique | Free Spins, Sans Dépôt, Cashback et plus</title>
<meta name="description" content="Découvrez ' . (count($BONUS_TYPES) * count($COUNTRIES) + count($BONUS_TYPES)) . ' offres de bonus casino pour l\'Afrique francophone. Bonus sans dépôt, free spins, cashback, VIP et bien plus. Trouvez le meilleur bonus selon votre pays.">
<link rel="icon" type="image/png" href="/favicon.png">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--a:#FFD166;--a2:#F4A261;--dk:#0A0F0D;--cd:#111A15;--tx:#E8F5E9;--mt:#7A9E7E;--gn:#52B788;--p:#1B4332;--p2:#2D6A4F}
body{background:var(--dk);color:var(--tx);font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;padding-bottom:80px}
a{text-decoration:none;color:inherit}
.bar{background:rgba(10,15,13,.97);backdrop-filter:blur(10px);padding:10px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:200;border-bottom:1px solid rgba(82,183,136,.15)}
.logo{font-size:19px;font-weight:800;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.top-cta{background:linear-gradient(135deg,var(--p),var(--p2));color:#fff;padding:7px 14px;border-radius:8px;font-size:12px;font-weight:700}
.dnav{display:none}
@media(min-width:768px){.dnav{display:flex;gap:24px}.dnav a{color:var(--mt);font-size:14px;font-weight:600}.dnav a:hover{color:var(--a)}.bar{padding:14px 40px}.wrap{max-width:1100px;margin:0 auto}.bnav{display:none!important}}
.ph{padding:20px 16px 10px}
.ph h1{font-size:22px;font-weight:900;margin-bottom:6px}
.ph h1 span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.ph p{font-size:13px;color:var(--mt);margin-bottom:4px}
.tabs{display:flex;overflow-x:auto;gap:8px;padding:10px 16px;scrollbar-width:none;border-bottom:1px solid rgba(255,255,255,.04)}
.tabs::-webkit-scrollbar{display:none}
.tab{flex-shrink:0;background:var(--cd);border:1px solid rgba(255,255,255,.06);border-radius:20px;padding:6px 14px;font-size:12px;font-weight:700;color:var(--mt);cursor:pointer}
.tab.active{background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;border-color:transparent}
.wrap{padding:0 16px 20px}
.type-section{margin-bottom:28px}
.type-header{display:flex;align-items:center;gap:8px;margin-bottom:12px;padding-top:16px}
.type-icon{font-size:22px}
.type-name{font-size:16px;font-weight:800}
.type-link{margin-left:auto;font-size:12px;color:var(--gn);font-weight:700}
.country-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.country-grid{grid-template-columns:repeat(3,1fr)}}
@media(min-width:768px){.country-grid{grid-template-columns:repeat(4,1fr)}}
.country-btn{background:var(--cd);border:1px solid rgba(255,255,255,.06);border-radius:10px;padding:10px;display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700}
.country-btn:hover{border-color:rgba(255,209,102,.3)}
.cf{font-size:18px;flex-shrink:0}
.cn{flex:1;line-height:1.3}
.carr{color:var(--gn);font-size:14px}
.general-list{display:flex;flex-direction:column;gap:8px;margin-bottom:16px}
.general-item{background:linear-gradient(135deg,#0D2318,#162E1E);border:1px solid rgba(82,183,136,.2);border-radius:12px;padding:14px;display:flex;align-items:center;gap:12px}
.gi-icon{font-size:26px;flex-shrink:0}
.gi-info{flex:1}
.gi-name{font-size:14px;font-weight:800;margin-bottom:2px}
.gi-amount{font-size:12px;color:var(--a);font-weight:700}
.gi-cta{background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;padding:8px 14px;border-radius:8px;font-size:12px;font-weight:800;flex-shrink:0}
.bnav{position:fixed;bottom:0;left:0;right:0;background:rgba(10,15,13,.97);backdrop-filter:blur(10px);border-top:1px solid rgba(82,183,136,.1);display:flex;padding:8px 0 max(8px,env(safe-area-inset-bottom));z-index:200}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--mt);font-size:10px;font-weight:700}
.ni.on{color:var(--a)}
.ni-ico{font-size:22px}
</style>
</head>
<body>
<nav class="bar">
  <a href="/" class="logo">🎲 CasinoAfrique</a>
  <div class="dnav">
    <a href="/casino/">Pays</a>
    <a href="/bonus/" style="color:var(--a)">Bonus</a>
    <a href="/jeux/">Jeux</a>
    <a href="/guide/">Guides</a>
  </div>
  <a href="' . $AFF[0] . '" target="_blank" rel="noopener" class="top-cta">Jouer →</a>
</nav>

<div class="ph">
  <h1>Tous les <span>Bonus Casino</span></h1>
  <p>' . (count($BONUS_TYPES) * count($COUNTRIES) + count($BONUS_TYPES)) . ' offres pour l\'Afrique francophone</p>
</div>

<div class="wrap">';

// General bonus list
$listHtml .= '<div class="general-list">';
foreach ($BONUS_TYPES as $typeSlug => $type) {
    $listHtml .= '<a href="/bonus/' . $typeSlug . '/" class="general-item">
      <div class="gi-icon">' . $type['icon'] . '</div>
      <div class="gi-info">
        <div class="gi-name">' . $type['name'] . '</div>
        <div class="gi-amount">' . $type['amount_general'] . '</div>
      </div>
      <div class="gi-cta">Voir →</div>
    </a>';
}
$listHtml .= '</div>';

// Per type with countries
foreach ($BONUS_TYPES as $typeSlug => $type) {
    $listHtml .= '<div class="type-section">
      <div class="type-header">
        <span class="type-icon">' . $type['icon'] . '</span>
        <span class="type-name">' . $type['name'] . ' par Pays</span>
        <a href="/bonus/' . $typeSlug . '/" class="type-link">Guide général →</a>
      </div>
      <div class="country-grid">';
    foreach ($COUNTRIES as $countrySlug => $country) {
        $url = '/bonus/' . $typeSlug . '-' . $countrySlug . '/';
        $listHtml .= '<a href="' . $url . '" class="country-btn">
          <span class="cf">' . $country['flag'] . '</span>
          <span class="cn">' . $country['name'] . '</span>
          <span class="carr">›</span>
        </a>';
    }
    $listHtml .= '</div></div>';
}

$listHtml .= '</div>
<nav class="bnav">
  <a href="/" class="ni"><span class="ni-ico">🏠</span>Accueil</a>
  <a href="/casino/" class="ni"><span class="ni-ico">🌍</span>Pays</a>
  <a href="/bonus/" class="ni on"><span class="ni-ico">🎁</span>Bonus</a>
  <a href="/jeux/" class="ni"><span class="ni-ico">🎰</span>Jeux</a>
  <a href="/guide/" class="ni"><span class="ni-ico">📖</span>Guide</a>
</nav>
</body>
</html>';

file_put_contents($BONUS_DIR . '/index.html', $listHtml);
echo "  ✅ /bonus/ listing\n\n";

// ---- UPDATE SITEMAP ----
echo "📋 UPDATING SITEMAP\n";
$date = date('Y-m-d');
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
$sitemap .= '<url><loc>https://www.lesgetsinfo.com/</loc><lastmod>' . $date . '</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>' . "\n";
$sitemap .= '<url><loc>https://www.lesgetsinfo.com/casino/</loc><lastmod>' . $date . '</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>' . "\n";
$sitemap .= '<url><loc>https://www.lesgetsinfo.com/bonus/</loc><lastmod>' . $date . '</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>' . "\n";

$countryList = ['casino-congo-rdc','casino-cote-divoire','casino-cameroun','casino-senegal','casino-mali','casino-burkina-faso','casino-guinee','casino-benin','casino-togo','casino-niger','casino-tchad','casino-centrafrique','casino-gabon','casino-congo-brazzaville','casino-rwanda','casino-burundi','casino-madagascar','casino-djibouti','casino-mauritanie','casino-comores'];
foreach ($countryList as $c) {
    $sitemap .= '<url><loc>https://www.lesgetsinfo.com/casino/' . $c . '/</loc><lastmod>' . $date . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>' . "\n";
}
foreach ($allPages as $page) {
    $prio = str_contains($page, '-') ? '0.7' : '0.8';
    $sitemap .= '<url><loc>https://www.lesgetsinfo.com' . $page . '</loc><lastmod>' . $date . '</lastmod><changefreq>weekly</changefreq><priority>' . $prio . '</priority></url>' . "\n";
}
$sitemap .= '</urlset>';
file_put_contents($BASE . '/sitemap.xml', $sitemap);
$totalUrls = 22 + count($allPages);
echo "  ✅ sitemap.xml updated (" . $totalUrls . " URLs)\n\n";

echo "=== DONE ===\n";
echo "✅ " . count($BONUS_TYPES) . " general bonus pages\n";
echo "✅ " . ($pageCount) . " country bonus pages\n";
echo "✅ Bonus listing /bonus/\n";
echo "✅ Sitemap updated (" . $totalUrls . " URLs total)\n";
echo "⚠️  Run: rm gen_bonus_matrix.php\n";
