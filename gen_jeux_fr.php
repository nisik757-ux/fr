<?php
/**
 * Slots/Games Generator for lesgetsinfo.com
 * 300 unique slot pages - each with unique angle
 * Run: php gen_jeux_fr.php
 */

$OPENAI_KEY = 'OPENAI_KEY_HERE';
$ANTHROPIC_KEY = 'ANTHROPIC_KEY_HERE';

$BASE = '/home/admin/web/lesgetsinfo.com/public_html';
$JEUX_DIR = $BASE . '/jeux';
$IMG_DIR = $BASE . '/images/jeux';

$AFF = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($JEUX_DIR)) mkdir($JEUX_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

// Angles uniques par jeu - ce que les gens cherchent VRAIMENT
$ANGLE_TYPES = [
    'strategie' => ['h1_prefix' => 'Comment Gagner à', 'meta_prefix' => 'Stratégie et astuces pour gagner à', 'focus' => 'stratégies de jeu, astuces, gestion de bankroll, quand miser maximum'],
    'bonus' => ['h1_prefix' => 'Bonus et Free Spins pour', 'meta_prefix' => 'Meilleurs bonus casino pour jouer à', 'focus' => 'bonus sans dépôt, free spins, cashback, comment activer le bonus'],
    'demo' => ['h1_prefix' => 'Jouer Gratuitement à', 'meta_prefix' => 'Jouer à', 'focus' => 'version démo gratuite, comment jouer sans argent réel, test du jeu'],
    'avis' => ['h1_prefix' => 'Avis Complet sur', 'meta_prefix' => 'Notre avis détaillé sur', 'focus' => 'avis honnête, points forts et faibles, vaut-il vraiment le coup'],
    'rtp' => ['h1_prefix' => 'RTP et Volatilité de', 'meta_prefix' => 'RTP, volatilité et statistiques de', 'focus' => 'taux de retour, volatilité, fréquence des gains, meilleures sessions'],
    'africa' => ['h1_prefix' => 'Jouer à', 'meta_prefix' => 'Où jouer à', 'focus' => 'disponibilité en Afrique francophone, Mobile Money, meilleurs casinos africains pour ce jeu'],
    'jackpot' => ['h1_prefix' => 'Gagner le Jackpot à', 'meta_prefix' => 'Comment décrocher le jackpot à', 'focus' => 'jackpot maximum, comment atteindre le max win, sessions de gains élevés'],
    'debutant' => ['h1_prefix' => 'Guide Débutant pour', 'meta_prefix' => 'Guide complet pour débuter à', 'focus' => 'règles de base, comment commencer, mises recommandées pour débutants'],
    'mobile' => ['h1_prefix' => 'Jouer à', 'meta_prefix' => 'Jouer à', 'focus' => 'version mobile, compatibilité Android iOS, qualité sur smartphone africain'],
    'freespins' => ['h1_prefix' => 'Free Spins Sans Dépôt pour', 'meta_prefix' => 'Obtenir des free spins gratuits pour', 'focus' => 'tours gratuits sans dépôt, où obtenir des free spins, codes promo'],
];

// 300 slots avec angles uniques
$SLOTS = [
    // PRAGMATIC PLAY (80 jeux)
    ['slug'=>'gates-of-olympus','name'=>'Gates of Olympus','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Mythologie grecque, Zeus','angle'=>'strategie','img_prompt'=>'Gates of Olympus slot game Zeus lightning bolts Greek temple golden symbols cascading reels vibrant purple blue'],
    ['slug'=>'sweet-bonanza','name'=>'Sweet Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'21 100x','theme'=>'Bonbons et sucreries colorées','angle'=>'bonus','img_prompt'=>'Sweet Bonanza slot colorful candy land tumbling reels fruits multipliers vibrant pink purple'],
    ['slug'=>'starlight-princess','name'=>'Starlight Princess','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Princesse anime japonais','angle'=>'freespins','img_prompt'=>'Starlight Princess slot anime princess stars magic wand golden coins pastel colors'],
    ['slug'=>'sugar-rush','name'=>'Sugar Rush','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Usine à bonbons','angle'=>'demo','img_prompt'=>'Sugar Rush slot candy factory colorful sweets lollipops bright pink purple game art'],
    ['slug'=>'big-bass-bonanza','name'=>'Big Bass Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 100x','theme'=>'Pêche au gros poisson','angle'=>'avis','img_prompt'=>'Big Bass Bonanza slot fishing lake bass fish coins scatter symbols blue green'],
    ['slug'=>'wolf-gold','name'=>'Wolf Gold','provider'=>'Pragmatic Play','rtp'=>'96.0%','volatility'=>'Moyenne','max_win'=>'5 000x','theme'=>'Loup sauvage Amérique','angle'=>'rtp','img_prompt'=>'Wolf Gold slot wild wolf moon desert America night stars gold symbols'],
    ['slug'=>'wild-west-gold','name'=>'Wild West Gold','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'10 000x','theme'=>'Far West Cowboys','angle'=>'jackpot','img_prompt'=>'Wild West Gold slot cowboy sheriff far west desert sunset gold guns'],
    ['slug'=>'the-dog-house','name'=>'The Dog House','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'6 750x','theme'=>'Chiens adorables','angle'=>'africa','img_prompt'=>'The Dog House slot cute dogs puppies colorful bones paw prints pink background'],
    ['slug'=>'fruit-party','name'=>'Fruit Party','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Fruits cascade','angle'=>'mobile','img_prompt'=>'Fruit Party slot fruits cascade colorful cherry watermelon lemon orange bright colors'],
    ['slug'=>'great-rhino-megaways','name'=>'Great Rhino Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'20 000x','theme'=>'Rhinocéros Afrique','angle'=>'strategie','img_prompt'=>'Great Rhino Megaways slot African rhino savanna golden symbols tumbling reels sunset'],
    ['slug'=>'money-money-money','name'=>'Money Money Money','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Cash et richesse','angle'=>'bonus','img_prompt'=>'Money Money Money slot golden coins cash bills rich symbols luxury dark background'],
    ['slug'=>'floating-dragon','name'=>'Floating Dragon','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Dragon flottant Asie','angle'=>'freespins','img_prompt'=>'Floating Dragon slot Chinese dragon water golden coins Asian temple colorful'],
    ['slug'=>'5-lions-megaways','name'=>'5 Lions Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Lions Asie dorés','angle'=>'avis','img_prompt'=>'5 Lions Megaways slot golden lions Asian temple red gold symbols Chinese'],
    ['slug'=>'buffalo-king-megaways','name'=>'Buffalo King Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'10 000x','theme'=>'Bison Amérique du Nord','angle'=>'rtp','img_prompt'=>'Buffalo King Megaways slot buffalo herd prairie sunset American west golden'],
    ['slug'=>'bigger-bass-bonanza','name'=>'Bigger Bass Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'4 000x','theme'=>'Pêche gros poissons','angle'=>'jackpot','img_prompt'=>'Bigger Bass Bonanza slot big fish lake fishing trophy coins blue water'],
    ['slug'=>'sweet-bonanza-xmas','name'=>'Sweet Bonanza Xmas','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'21 100x','theme'=>'Bonbons Noël','angle'=>'africa','img_prompt'=>'Sweet Bonanza Xmas slot Christmas candy cane snow colorful winter sweets'],
    ['slug'=>'cash-bonanza','name'=>'Cash Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Argent et jackpots','angle'=>'debutant','img_prompt'=>'Cash Bonanza slot money coins jackpot golden symbols dark luxury background'],
    ['slug'=>'gates-of-olympus-1000','name'=>'Gates of Olympus 1000','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'1 000x','theme'=>'Zeus olympe premium','angle'=>'strategie','img_prompt'=>'Gates of Olympus 1000 slot Zeus premium lightning gold symbols Greek temple enhanced'],
    ['slug'=>'sugar-rush-1000','name'=>'Sugar Rush 1000','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'1 000x','theme'=>'Bonbons premium','angle'=>'bonus','img_prompt'=>'Sugar Rush 1000 slot premium candy colorful sweets enhanced version bright'],
    ['slug'=>'lucky-lightning','name'=>'Lucky Lightning','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Foudre chanceux','angle'=>'freespins','img_prompt'=>'Lucky Lightning slot lightning bolts lucky symbols gold dark electric background'],
    ['slug'=>'starlight-princess-1000','name'=>'Starlight Princess 1000','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'1 000x','theme'=>'Princesse étoile premium','angle'=>'avis','img_prompt'=>'Starlight Princess 1000 premium anime princess stars enhanced golden'],
    ['slug'=>'3-genie-wishes','name'=>'3 Genie Wishes','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Génie lampe magique','angle'=>'rtp','img_prompt'=>'3 Genie Wishes slot magic lamp genie purple smoke golden coins Arabic'],
    ['slug'=>'aztec-gems','name'=>'Aztec Gems','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'375x','theme'=>'Pierres précieuses Aztèques','angle'=>'debutant','img_prompt'=>'Aztec Gems slot precious stones Aztec gold simple colorful gems'],
    ['slug'=>'the-hand-of-midas','name'=>'The Hand of Midas','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Main dorée de Midas','angle'=>'jackpot','img_prompt'=>'Hand of Midas slot golden touch Greek myth coins golden glow dark background'],
    ['slug'=>'release-the-kraken','name'=>'Release the Kraken','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Kraken monstres marins','angle'=>'mobile','img_prompt'=>'Release the Kraken slot sea monster tentacles ocean blue dark underwater'],
    ['slug'=>'pirate-gold-deluxe','name'=>'Pirate Gold Deluxe','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Pirates trésor','angle'=>'africa','img_prompt'=>'Pirate Gold Deluxe slot pirate ship treasure chest gold coins ocean'],
    ['slug'=>'madame-destiny-megaways','name'=>'Madame Destiny Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Voyante cristal','angle'=>'strategie','img_prompt'=>'Madame Destiny Megaways slot fortune teller crystal ball mystical purple gold'],
    ['slug'=>'wild-beach-party','name'=>'Wild Beach Party','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Fête de plage','angle'=>'bonus','img_prompt'=>'Wild Beach Party slot tropical beach party colorful fun summer cocktails'],
    ['slug'=>'dragon-kingdom','name'=>'Dragon Kingdom','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Royaume des dragons','angle'=>'freespins','img_prompt'=>'Dragon Kingdom slot dragon castle fantasy gold red fire dark background'],
    ['slug'=>'john-hunter-aztec-treasure','name'=>'John Hunter Aztec Treasure','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'10 000x','theme'=>'Chasse trésor aztèque','angle'=>'avis','img_prompt'=>'John Hunter Aztec Treasure slot adventure jungle gold Aztec temple explorer'],

    // PG SOFT (60 jeux)
    ['slug'=>'mahjong-ways','name'=>'Mahjong Ways','provider'=>'PG Soft','rtp'=>'96.9%','volatility'=>'Haute','max_win'=>'4 000x','theme'=>'Mah-jong chinois traditionnel','angle'=>'strategie','img_prompt'=>'Mahjong Ways slot Chinese mahjong tiles dragon golden Asian temple red gold'],
    ['slug'=>'mahjong-ways-2','name'=>'Mahjong Ways 2','provider'=>'PG Soft','rtp'=>'96.9%','volatility'=>'Haute','max_win'=>'10 000x','theme'=>'Mah-jong version 2','angle'=>'bonus','img_prompt'=>'Mahjong Ways 2 slot enhanced mahjong tiles Chinese symbols golden multipliers'],
    ['slug'=>'lucky-neko','name'=>'Lucky Neko','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Chat porte-bonheur japonais','angle'=>'africa','img_prompt'=>'Lucky Neko slot Japanese lucky cat maneki neko gold coins cherry blossoms'],
    ['slug'=>'treasures-of-aztec','name'=>'Treasures of Aztec','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Trésors aztèques','angle'=>'jackpot','img_prompt'=>'Treasures of Aztec slot ancient Aztec gold pyramid jungle temple treasure'],
    ['slug'=>'phoenix-rises','name'=>'Phoenix Rises','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Phénix renaissance feu','angle'=>'freespins','img_prompt'=>'Phoenix Rises slot phoenix fire rebirth golden wings flames red orange'],
    ['slug'=>'dragon-hatch','name'=>'Dragon Hatch','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Œuf de dragon éclosion','angle'=>'mobile','img_prompt'=>'Dragon Hatch slot baby dragon hatching egg colorful scales magic glow'],
    ['slug'=>'wild-fireworks','name'=>'Wild Fireworks','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Feux artifice colorés','angle'=>'debutant','img_prompt'=>'Wild Fireworks slot colorful fireworks celebration night sky stars golden'],
    ['slug'=>'fortune-mouse','name'=>'Fortune Mouse','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Basse','max_win'=>'2 000x','theme'=>'Souris fortune chinoise','angle'=>'rtp','img_prompt'=>'Fortune Mouse slot cute Chinese mouse red lucky coins gold symbols simple'],
    ['slug'=>'leprechaun-riches','name'=>'Leprechaun Riches','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Lutin irlandais tréfle','angle'=>'avis','img_prompt'=>'Leprechaun Riches slot Irish leprechaun shamrock gold coins rainbow pot'],
    ['slug'=>'double-fortune','name'=>'Double Fortune','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Moyenne','max_win'=>'2 000x','theme'=>'Double fortune dragons','angle'=>'strategie','img_prompt'=>'Double Fortune slot two dragons red gold Chinese symbols fortune coins'],
    ['slug'=>'jungle-delight','name'=>'Jungle Delight','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Moyenne','max_win'=>'2 000x','theme'=>'Jungle tropicale animaux','angle'=>'bonus','img_prompt'=>'Jungle Delight slot tropical jungle animals colorful birds flowers bright'],
    ['slug'=>'tree-of-fortune','name'=>'Tree of Fortune','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Arbre fortune chinois','angle'=>'africa','img_prompt'=>'Tree of Fortune slot Chinese lucky tree golden coins lanterns red gold'],
    ['slug'=>'gem-saviour-sword','name'=>'Gem Saviour Sword','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Épée gemmes fantasy','angle'=>'freespins','img_prompt'=>'Gem Saviour Sword slot fantasy sword gems crystals magic warrior colorful'],
    ['slug'=>'muay-thai-champion','name'=>'Muay Thai Champion','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Boxe thaïlandaise muay thai','angle'=>'mobile','img_prompt'=>'Muay Thai Champion slot Thai boxing fighter temple gold red blue'],
    ['slug'=>'ways-of-the-qilin','name'=>'Ways of the Qilin','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Qilin licorne chinoise','angle'=>'jackpot','img_prompt'=>'Ways of Qilin slot Chinese unicorn qilin golden temple symbols red gold'],
    ['slug'=>'rabbit-garden','name'=>'Rabbit Garden','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'3 000x','theme'=>'Jardin lapins colorés','angle'=>'debutant','img_prompt'=>'Rabbit Garden slot cute rabbits colorful garden flowers spring pastel'],
    ['slug'=>'crypto-gold','name'=>'Crypto Gold','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Cryptomonnaies Bitcoin or','angle'=>'rtp','img_prompt'=>'Crypto Gold slot Bitcoin cryptocurrency golden coins tech dark background'],
    ['slug'=>'battleground-royale','name'=>'Battleground Royale','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Battle royale jeu vidéo','angle'=>'avis','img_prompt'=>'Battleground Royale slot battle royale game guns soldiers parachute action'],
    ['slug'=>'ganesha-gold','name'=>'Ganesha Gold','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Ganesha dieu hindou or','angle'=>'strategie','img_prompt'=>'Ganesha Gold slot Hindu god elephant gold coins Indian temple colorful'],
    ['slug'=>'hood-vs-wolf','name'=>'Hood vs Wolf','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Chaperon rouge loup','angle'=>'bonus','img_prompt'=>'Hood vs Wolf slot fairy tale red riding hood wolf forest golden'],
    ['slug'=>'candy-burst','name'=>'Candy Burst','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Moyenne','max_win'=>'2 000x','theme'=>'Bonbons explosion sucrés','angle'=>'africa','img_prompt'=>'Candy Burst slot colorful candy explosion sweet burst bright pink purple'],
    ['slug'=>'flirting-scholar','name'=>'Flirting Scholar','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Érudit chinois flirt','angle'=>'freespins','img_prompt'=>'Flirting Scholar slot Chinese scholar traditional costume golden coins'],
    ['slug'=>'prosperity-lion','name'=>'Prosperity Lion','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Lion prospérité chinois','angle'=>'mobile','img_prompt'=>'Prosperity Lion slot Chinese lion dance red gold prosperity coins festival'],
    ['slug'=>'fortune-ox','name'=>'Fortune Ox','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Bœuf fortune chinois','angle'=>'jackpot','img_prompt'=>'Fortune Ox slot Chinese ox bull golden coins red lanterns Asian new year'],
    ['slug'=>'opera-dynasty','name'=>'Opera Dynasty','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Opéra chinois dynastique','angle'=>'debutant','img_prompt'=>'Opera Dynasty slot Chinese opera masks colorful traditional costumes gold'],
    ['slug'=>'plushie-frenzy','name'=>'Plushie Frenzy','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Basse','max_win'=>'2 000x','theme'=>'Peluches mignons kawaii','angle'=>'rtp','img_prompt'=>'Plushie Frenzy slot cute plush toys kawaii colorful stuffed animals bright'],
    ['slug'=>'ninja-vs-samurai','name'=>'Ninja vs Samurai','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Ninja contre samouraï','angle'=>'avis','img_prompt'=>'Ninja vs Samurai slot Japanese warriors sword dark night gold action'],
    ['slug'=>'symbols-of-egypt','name'=>'Symbols of Egypt','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Symboles égyptiens anciens','angle'=>'strategie','img_prompt'=>'Symbols of Egypt slot ancient Egyptian pharaoh hieroglyphs gold desert'],
    ['slug'=>'medusa-ii','name'=>'Medusa II','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Méduse mythologie grecque','angle'=>'bonus','img_prompt'=>'Medusa II slot Greek myth Medusa snakes stone gold temple dark'],
    ['slug'=>'captain-treasure','name'=>'Captain Treasure','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Capitaine trésor pirate','angle'=>'africa','img_prompt'=>'Captain Treasure slot pirate captain ship treasure map gold ocean'],

    // CRASH GAMES (20)
    ['slug'=>'aviator','name'=>'Aviator','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Avion crash multiplicateur','angle'=>'strategie','img_prompt'=>'Aviator crash game airplane flying multiplier curve neon blue sky mobile interface'],
    ['slug'=>'jetx','name'=>'JetX','provider'=>'SmartSoft','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Jet supersonique crash','angle'=>'bonus','img_prompt'=>'JetX crash game supersonic jet multiplier curve neon orange launch'],
    ['slug'=>'spaceman','name'=>'Spaceman','provider'=>'Pragmatic Play','rtp'=>'96.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Astronaute espace crash','angle'=>'freespins','img_prompt'=>'Spaceman crash game astronaut space stars multiplier floating dark space'],
    ['slug'=>'mines','name'=>'Mines','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Mines démineur casino','angle'=>'strategie','img_prompt'=>'Mines casino game grid diamonds bombs dark background multiplier'],
    ['slug'=>'plinko','name'=>'Plinko','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Bille tombante gains','angle'=>'avis','img_prompt'=>'Plinko casino game ball dropping pegs multipliers colorful board neon'],
    ['slug'=>'dice','name'=>'Dice','provider'=>'Spribe','rtp'=>'98.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Dés probabilité casino','angle'=>'rtp','img_prompt'=>'Dice casino game rolling dice probability interface dark minimalist'],
    ['slug'=>'goal','name'=>'Goal','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Football penalty casino','angle'=>'debutant','img_prompt'=>'Goal casino game football penalty shootout goalkeeper green field'],
    ['slug'=>'hilo','name'=>'HiLo','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Cartes plus haut bas','angle'=>'mobile','img_prompt'=>'HiLo casino card game higher lower playing cards dark background'],
    ['slug'=>'tower','name'=>'Tower','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Tour montante risque','angle'=>'jackpot','img_prompt'=>'Tower casino game climbing tower multiplier dark neon background'],
    ['slug'=>'crypto-crash','name'=>'Crypto Crash','provider'=>'Various','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Crypto crash multiplicateur','angle'=>'africa','img_prompt'=>'Crypto Crash game Bitcoin chart rising crash mobile African phone'],
    ['slug'=>'aviator-spribe-strategie','name'=>'Stratégie Aviator Avancée','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Stratégies expert Aviator','angle'=>'strategie','img_prompt'=>'Aviator strategy advanced tactics airplane multiplier analysis chart'],
    ['slug'=>'limbo','name'=>'Limbo','provider'=>'Spribe','rtp'=>'98.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Multiplicateur infini limbo','angle'=>'bonus','img_prompt'=>'Limbo crash game multiplier dark background neon glow simple'],
    ['slug'=>'ball','name'=>'Ball','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Balle rebondissante gains','angle'=>'avis','img_prompt'=>'Ball casino game bouncing ball path multiplier colorful board'],
    ['slug'=>'keno','name'=>'Keno Casino','provider'=>'Various','rtp'=>'96.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Keno tirage loterie','angle'=>'debutant','img_prompt'=>'Keno casino lottery numbers board dark background golden numbers'],
    ['slug'=>'wheel-of-fortune-casino','name'=>'Wheel of Fortune Casino','provider'=>'Various','rtp'=>'96.5%','volatility'=>'Moyenne','max_win'=>'500x','theme'=>'Roue fortune casino','angle'=>'mobile','img_prompt'=>'Wheel of Fortune casino spinning wheel colorful prizes golden'],

    // NETENT (25 jeux)
    ['slug'=>'starburst','name'=>'Starburst','provider'=>'NetEnt','rtp'=>'96.1%','volatility'=>'Basse','max_win'=>'500x','theme'=>'Gemmes spatiales brillantes','angle'=>'debutant','img_prompt'=>'Starburst slot gems space colorful jewels expanding wilds neon glow'],
    ['slug'=>'gonzo-quest','name'=>"Gonzo's Quest",'provider'=>'NetEnt','rtp'=>'95.97%','volatility'=>'Moyenne','max_win'=>'2 500x','theme'=>'Aventurier Gonzo Eldorado','angle'=>'avis','img_prompt'=>"Gonzo's Quest slot Spanish conquistador Aztec golden city avalanche reels"],
    ['slug'=>'dead-or-alive-2','name'=>'Dead or Alive 2','provider'=>'NetEnt','rtp'=>'96.8%','volatility'=>'Très haute','max_win'=>'111 111x','theme'=>'Far West Outlaws','angle'=>'jackpot','img_prompt'=>'Dead or Alive 2 slot Wild West wanted posters guns saloon high volatility'],
    ['slug'=>'mega-fortune','name'=>'Mega Fortune','provider'=>'NetEnt','rtp'=>'96.4%','volatility'=>'Basse','max_win'=>'Jackpot progressif','theme'=>'Luxe yachts jackpot','angle'=>'rtp','img_prompt'=>'Mega Fortune slot luxury yacht diamond rings progressive jackpot wealth'],
    ['slug'=>'hall-of-gods','name'=>'Hall of Gods','provider'=>'NetEnt','rtp'=>'95.5%','volatility'=>'Moyenne','max_win'=>'Jackpot progressif','theme'=>'Dieux nordiques jackpot','angle'=>'strategie','img_prompt'=>'Hall of Gods slot Norse mythology Thor Odin hammer progressive jackpot golden'],
    ['slug'=>'blood-suckers','name'=>'Blood Suckers','provider'=>'NetEnt','rtp'=>'98.0%','volatility'=>'Basse','max_win'=>'2 000x','theme'=>'Vampires château gothique','angle'=>'bonus','img_prompt'=>'Blood Suckers slot vampire gothic castle blood moon highest RTP dark'],
    ['slug'=>'twin-spin','name'=>'Twin Spin','provider'=>'NetEnt','rtp'=>'96.6%','volatility'=>'Moyenne','max_win'=>'1 080x','theme'=>'Rouleaux jumeaux liés','angle'=>'africa','img_prompt'=>'Twin Spin slot classic symbols linked reels diamonds gems retro casino'],
    ['slug'=>'jack-and-the-beanstalk','name'=>'Jack and the Beanstalk','provider'=>'NetEnt','rtp'=>'96.3%','volatility'=>'Moyenne','max_win'=>'2 000x','theme'=>'Jack haricots géants','angle'=>'freespins','img_prompt'=>'Jack and the Beanstalk slot fairy tale giant beanstalk golden castle clouds'],
    ['slug'=>'reel-rush','name'=>'Reel Rush','provider'=>'NetEnt','rtp'=>'97.0%','volatility'=>'Haute','max_win'=>'480x','theme'=>'Fruits colorés accélération','angle'=>'mobile','img_prompt'=>'Reel Rush slot colorful fruits retro expanding reels candy colors bright'],
    ['slug'=>'aliens','name'=>'Aliens','provider'=>'NetEnt','rtp'=>'96.4%','volatility'=>'Haute','max_win'=>'4 000x','theme'=>'Film Aliens science fiction','angle'=>'jackpot','img_prompt'=>'Aliens NetEnt slot sci-fi alien spaceship dark space movie themed'],

    // PLAY N GO (30 jeux)
    ['slug'=>'book-of-dead','name'=>'Book of Dead','provider'=>"Play'n GO",'rtp'=>'96.2%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Égypte ancienne Livre mort','angle'=>'strategie','img_prompt'=>'Book of Dead slot ancient Egypt pharaoh tomb golden book expanding symbol'],
    ['slug'=>'reactoonz','name'=>'Reactoonz','provider'=>"Play'n GO",'rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'4 570x','theme'=>'Aliens mignons cascade','angle'=>'bonus','img_prompt'=>'Reactoonz slot cute alien monsters cascade grid colorful eyes gooey'],
    ['slug'=>'rise-of-olympus','name'=>'Rise of Olympus','provider'=>"Play'n GO",'rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Zeus Poséidon Hadès olympe','angle'=>'freespins','img_prompt'=>'Rise of Olympus slot Greek gods Zeus Poseidon Hades golden temple'],
    ['slug'=>'fire-joker','name'=>'Fire Joker','provider'=>"Play'n GO",'rtp'=>'96.2%','volatility'=>'Haute','max_win'=>'800x','theme'=>'Joker feu flammes classique','angle'=>'africa','img_prompt'=>'Fire Joker slot classic joker face fire flames retro casino symbols'],
    ['slug'=>'legacy-of-dead','name'=>'Legacy of Dead','provider'=>"Play'n GO",'rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Égypte héritage mort','angle'=>'mobile','img_prompt'=>'Legacy of Dead slot Egypt pharaoh Anubis golden book expanding symbol'],
    ['slug'=>'hugo','name'=>'Hugo','provider'=>"Play'n GO",'rtp'=>'96.4%','volatility'=>'Moyenne','max_win'=>'2 000x','theme'=>'Hugo troll aventure TV','angle'=>'debutant','img_prompt'=>'Hugo slot cartoon troll adventure game colorful TV show animated'],
    ['slug'=>'aloha-cluster-pays','name'=>'Aloha Cluster Pays','provider'=>'NetEnt','rtp'=>'96.4%','volatility'=>'Basse','max_win'=>'1 000x','theme'=>'Hawaï tropical fruits','angle'=>'rtp','img_prompt'=>'Aloha Cluster Pays slot Hawaii tropical flowers fruits cluster wins'],
    ['slug'=>'moon-princess','name'=>'Moon Princess','provider'=>"Play'n GO",'rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Princesses lune magie','angle'=>'avis','img_prompt'=>'Moon Princess slot anime princesses moon magic powers colorful'],
    ['slug'=>'fire-and-ice','name'=>'Fire and Ice','provider'=>"Play'n GO",'rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Feu et glace opposition','angle'=>'strategie','img_prompt'=>'Fire and Ice slot fire ice contrast elements dark background golden'],
    ['slug'=>'eye-of-the-storm','name'=>'Eye of the Storm','provider'=>"Play'n GO",'rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Tempête œil cyclone','angle'=>'bonus','img_prompt'=>'Eye of the Storm slot storm cyclone lightning dark dramatic weather'],

    // NOLIMIT CITY (20 jeux)
    ['slug'=>'san-quentin-xways','name'=>'San Quentin xWays','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'150 000x','theme'=>'Prison San Quentin xWays','angle'=>'jackpot','img_prompt'=>'San Quentin xWays slot prison dark gritty high volatility tattoos'],
    ['slug'=>'deadwood','name'=>'Deadwood','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'25 000x','theme'=>'Far West ville morte','angle'=>'freespins','img_prompt'=>'Deadwood slot Wild West ghost town saloon dark moody western'],
    ['slug'=>'mental','name'=>'Mental','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'75 000x','theme'=>'Asile psychiatrique dark','angle'=>'africa','img_prompt'=>'Mental slot psychiatric asylum dark thriller high volatility intense'],
    ['slug'=>'tombstone-rip','name'=>'Tombstone R.I.P.','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'50 000x','theme'=>'Cimetière cowboys old west','angle'=>'mobile','img_prompt'=>'Tombstone RIP slot graveyard cowboys Wild West dark tombstones'],
    ['slug'=>'fire-in-the-hole','name'=>'Fire in the Hole','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'60 000x','theme'=>'Mine charbon explosion','angle'=>'rtp','img_prompt'=>'Fire in the Hole slot coal mine explosion xBomb dark industrial'],
    ['slug'=>'east-coast-vs-west-coast','name'=>'East Coast vs West Coast','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'30 000x','theme'=>'Hip hop rap côte est ouest','angle'=>'debutant','img_prompt'=>'East Coast vs West Coast slot hip hop rap music gold chains dark'],
    ['slug'=>'mental-2','name'=>'Mental 2','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'50 000x','theme'=>'Asile 2 suite thriller','angle'=>'avis','img_prompt'=>'Mental 2 slot asylum sequel dark thriller intense high volatility'],
    ['slug'=>'back-to-venus','name'=>'Back to Venus','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'40 000x','theme'=>'Planète Venus rétro futur','angle'=>'strategie','img_prompt'=>'Back to Venus slot retro futuristic space Venus planet neon 80s'],
    ['slug'=>'tombstone','name'=>'Tombstone','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'25 000x','theme'=>'Cowboy western original','angle'=>'bonus','img_prompt'=>'Tombstone slot original cowboy western dark moody gun battle'],
    ['slug'=>'war-of-gods','name'=>'War of Gods','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'30 000x','theme'=>'Guerre dieux mythologie','angle'=>'africa','img_prompt'=>'War of Gods slot mythological gods battle lightning fire dark epic'],

    // HACKSAW GAMING (15 jeux)
    ['slug'=>'wanted-dead-or-a-wild','name'=>'Wanted Dead or a Wild','provider'=>'Hacksaw Gaming','rtp'=>'96.4%','volatility'=>'Très haute','max_win'=>'12 500x','theme'=>'Wanted cowboy bounty','angle'=>'jackpot','img_prompt'=>'Wanted Dead or a Wild slot wanted poster cowboy bounty hunter gold'],
    ['slug'=>'stick-em','name'=>"Stick'em",'provider'=>'Hacksaw Gaming','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'10 000x','theme'=>'Fruits collants cascade','angle'=>'freespins','img_prompt'=>"Stick'em slot sticky fruits cascade multipliers colorful simple bright"],
    ['slug'=>'chaos-crew','name'=>'Chaos Crew','provider'=>'Hacksaw Gaming','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'10 000x','theme'=>'Gang chaos urban street','angle'=>'mobile','img_prompt'=>'Chaos Crew slot urban gang graffiti street dark colorful chaos'],
    ['slug'=>'chaos-crew-2','name'=>'Chaos Crew 2','provider'=>'Hacksaw Gaming','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'15 000x','theme'=>'Gang chaos suite 2','angle'=>'rtp','img_prompt'=>'Chaos Crew 2 slot urban sequel enhanced chaos graffiti dark street'],
    ['slug'=>'dork-unit','name'=>'Dork Unit','provider'=>'Hacksaw Gaming','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'8 000x','theme'=>'Nerds tech gadgets fun','angle'=>'debutant','img_prompt'=>'Dork Unit slot nerdy characters tech gadgets fun colorful cartoon'],

    // RELAX GAMING (15 jeux)
    ['slug'=>'money-train-3','name'=>'Money Train 3','provider'=>'Relax Gaming','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'100 000x','theme'=>'Train argent bandit ouest','angle'=>'strategie','img_prompt'=>'Money Train 3 slot wild west train robbery gold coins dark western'],
    ['slug'=>'money-train-2','name'=>'Money Train 2','provider'=>'Relax Gaming','rtp'=>'96.4%','volatility'=>'Très haute','max_win'=>'50 000x','theme'=>'Train argent version 2','angle'=>'bonus','img_prompt'=>'Money Train 2 slot wild west train gold coins high volatility'],
    ['slug'=>'money-train-4','name'=>'Money Train 4','provider'=>'Relax Gaming','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'100 000x','theme'=>'Train argent version 4','angle'=>'africa','img_prompt'=>'Money Train 4 slot enhanced wild west train robbery maximum win'],
    ['slug'=>'hell-hot-100','name'=>'Hell Hot 100','provider'=>'Endorphina','rtp'=>'96.0%','volatility'=>'Haute','max_win'=>'100x','theme'=>'Fruits chauds classique','angle'=>'freespins','img_prompt'=>'Hell Hot 100 slot classic hot fruits fire red simple retro casino'],
    ['slug'=>'hot-triple-sevens','name'=>'Hot Triple Sevens','provider'=>'Evoplay','rtp'=>'96.0%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Sevens classiques chauds','angle'=>'mobile','img_prompt'=>'Hot Triple Sevens slot classic 777 hot red fire retro bars simple'],

    // ELK STUDIOS (10 jeux)
    ['slug'=>'wild-toro','name'=>'Wild Toro','provider'=>'ELK Studios','rtp'=>'96.4%','volatility'=>'Haute','max_win'=>'10 000x','theme'=>'Corrida taureau Espagne','angle'=>'jackpot','img_prompt'=>'Wild Toro slot bull fighter Spanish corrida golden arena action'],
    ['slug'=>'sam-on-the-beach','name'=>'Sam on the Beach','provider'=>'ELK Studios','rtp'=>'96.4%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Sam plage surfeur','angle'=>'rtp','img_prompt'=>'Sam on the Beach slot surfer beach colorful tropical summer fun'],
    ['slug'=>'platooners','name'=>'Platooners','provider'=>'ELK Studios','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Soldats dessin animé guerre','angle'=>'debutant','img_prompt'=>'Platooners slot cartoon soldiers war funny colorful animated'],
    ['slug'=>'lotsa-loot','name'=>'Lotsa Loot','provider'=>'ELK Studios','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Plein de butin gains','angle'=>'avis','img_prompt'=>'Lotsa Loot slot treasure chests coins gems colorful loot bright'],
    ['slug'=>'cygnus','name'=>'Cygnus','provider'=>'ELK Studios','rtp'=>'96.4%','volatility'=>'Haute','max_win'=>'15 000x','theme'=>'Constellation espace cygne','angle'=>'strategie','img_prompt'=>'Cygnus slot constellation space swan stars dark space purple blue'],

    // THUNDERKICK (10 jeux)
    ['slug'=>'fruit-warp','name'=>'Fruit Warp','provider'=>'Thunderkick','rtp'=>'97.0%','volatility'=>'Haute','max_win'=>'Jackpot','theme'=>'Fruits warp spatial','angle'=>'bonus','img_prompt'=>'Fruit Warp slot fruits warping space teleport colorful minimalist'],
    ['slug'=>'esqueleto-explosivo','name'=>'Esqueleto Explosivo','provider'=>'Thunderkick','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'Illimité','theme'=>'Squelette mexicain Día Muertos','angle'=>'africa','img_prompt'=>'Esqueleto Explosivo slot Mexican skeleton Day Dead colorful skull'],
    ['slug'=>'pink-elephants','name'=>'Pink Elephants','provider'=>'Thunderkick','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Éléphants roses magiques','angle'=>'freespins','img_prompt'=>'Pink Elephants slot pink elephants magical dreamy colorful surreal'],
    ['slug'=>'1429-uncharted-seas','name'=>'1429 Uncharted Seas','provider'=>'Thunderkick','rtp'=>'98.6%','volatility'=>'Basse','max_win'=>'3 750x','theme'=>'Mers inconnues cartographie','angle'=>'rtp','img_prompt'=>'1429 Uncharted Seas slot high RTP sea map medieval vintage nautical'],
    ['slug'=>'carnival-queen','name'=>'Carnival Queen','provider'=>'Thunderkick','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Reine carnaval festif','angle'=>'mobile','img_prompt'=>'Carnival Queen slot carnival queen festive colorful masks celebrations'],

    // LIVE CASINO GAMES (20)
    ['slug'=>'baccarat-casino','name'=>'Baccarat en Direct','provider'=>'Evolution Gaming','rtp'=>'98.9%','volatility'=>'Basse','max_win'=>'x8','theme'=>'Baccarat table verte','angle'=>'debutant','img_prompt'=>'Baccarat live casino green table cards dealer elegant luxury'],
    ['slug'=>'blackjack-live','name'=>'Blackjack en Direct','provider'=>'Evolution Gaming','rtp'=>'99.5%','volatility'=>'Basse','max_win'=>'x2.5','theme'=>'Blackjack 21 croupier','angle'=>'strategie','img_prompt'=>'Blackjack 21 live casino dealer cards chips green table professional'],
    ['slug'=>'roulette-europeenne','name'=>'Roulette Européenne','provider'=>'Evolution Gaming','rtp'=>'97.3%','volatility'=>'Moyenne','max_win'=>'x35','theme'=>'Roulette européenne classique','angle'=>'rtp','img_prompt'=>'European Roulette live casino wheel ball chips luxury green table'],
    ['slug'=>'lightning-roulette','name'=>'Lightning Roulette','provider'=>'Evolution Gaming','rtp'=>'97.3%','volatility'=>'Haute','max_win'=>'x500','theme'=>'Roulette éclairs multiplicateurs','angle'=>'jackpot','img_prompt'=>'Lightning Roulette live casino lightning bolts multipliers electric blue'],
    ['slug'=>'crazy-time','name'=>'Crazy Time','provider'=>'Evolution Gaming','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'x20 000','theme'=>'Roue folle bonus games','angle'=>'africa','img_prompt'=>'Crazy Time live casino game show wheel bonus colorful fun'],
    ['slug'=>'monopoly-live','name'=>'Monopoly Live','provider'=>'Evolution Gaming','rtp'=>'96.2%','volatility'=>'Haute','max_win'=>'x1 000','theme'=>'Monopoly jeu plateau live','angle'=>'avis','img_prompt'=>'Monopoly Live casino game show board game 3D Mr Monopoly colorful'],
    ['slug'=>'dream-catcher','name'=>'Dream Catcher','provider'=>'Evolution Gaming','rtp'=>'96.6%','volatility'=>'Haute','max_win'=>'x40','theme'=>'Roue rêves multiplier','angle'=>'mobile','img_prompt'=>'Dream Catcher live casino money wheel colorful segments multipliers'],
    ['slug'=>'dragon-tiger','name'=>'Dragon Tiger','provider'=>'Evolution Gaming','rtp'=>'96.3%','volatility'=>'Basse','max_win'=>'x8','theme'=>'Dragon Tigre carte simple','angle'=>'freespins','img_prompt'=>'Dragon Tiger live casino Asian card game dragon tiger simple elegant'],
    ['slug'=>'andar-bahar','name'=>'Andar Bahar','provider'=>'Evolution Gaming','rtp'=>'97.0%','volatility'=>'Basse','max_win'=>'x100','theme'=>'Andar Bahar jeu indien','angle'=>'bonus','img_prompt'=>'Andar Bahar Indian card game live casino colorful traditional'],
    ['slug'=>'teen-patti','name'=>'Teen Patti','provider'=>'Evolution Gaming','rtp'=>'97.0%','volatility'=>'Basse','max_win'=>'x100','theme'=>'Teen Patti poker indien','angle'=>'debutant','img_prompt'=>'Teen Patti Indian poker live casino cards chips colorful'],
    ['slug'=>'mega-ball','name'=>'Mega Ball','provider'=>'Evolution Gaming','rtp'=>'95.4%','volatility'=>'Très haute','max_win'=>'x1 000 000','theme'=>'Bingo megaball loto','angle'=>'jackpot','img_prompt'=>'Mega Ball live casino lottery bingo balls multipliers colorful'],
    ['slug'=>'gonzo-treasure-hunt','name'=>"Gonzo's Treasure Hunt",'provider'=>'Evolution Gaming','rtp'=>'96.6%','volatility'=>'Haute','max_win'=>'x20 000','theme'=>'Chasse trésor Gonzo live','angle'=>'strategie','img_prompt'=>"Gonzo's Treasure Hunt live game adventure treasure map picks"],
    ['slug'=>'xxxtreme-lightning-roulette','name'=>'XXXtreme Lightning Roulette','provider'=>'Evolution Gaming','rtp'=>'97.1%','volatility'=>'Très haute','max_win'=>'x2 000','theme'=>'Roulette éclairs extreme','angle'=>'africa','img_prompt'=>'XXXtreme Lightning Roulette extreme multipliers electric casino'],
    ['slug'=>'football-studio','name'=>'Football Studio','provider'=>'Evolution Gaming','rtp'=>'97.0%','volatility'=>'Basse','max_win'=>'x2','theme'=>'Football paris simple','angle'=>'rtp','img_prompt'=>'Football Studio live casino game football card simple quick'],
    ['slug'=>'poker-casino-holdem','name'=>'Casino Hold\'em','provider'=>'Evolution Gaming','rtp'=>'97.8%','volatility'=>'Moyenne','max_win'=>'x100','theme'=>'Texas Holdem casino live','angle'=>'mobile','img_prompt'=>"Casino Hold'em poker live dealer cards chips professional table"],

    // AUTRES PROVIDERS (40 jeux)
    ['slug'=>'book-of-ra','name'=>'Book of Ra Deluxe','provider'=>'Novomatic','rtp'=>'95.1%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Égypte livre Ra classique','angle'=>'avis','img_prompt'=>'Book of Ra Deluxe slot classic Egypt pharaoh expanding symbol gold'],
    ['slug'=>'eye-of-horus','name'=>'Eye of Horus','provider'=>'Blueprint Gaming','rtp'=>'95.3%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Œil Horus Égypte magique','angle'=>'strategie','img_prompt'=>'Eye of Horus slot Egyptian eye magic symbols pharaoh gold dark'],
    ['slug'=>'fishin-frenzy','name'=>'Fishin Frenzy','provider'=>'Blueprint Gaming','rtp'=>'96.1%','volatility'=>'Moyenne','max_win'=>'2 500x','theme'=>'Pêche frenzy poissons','angle'=>'bonus','img_prompt'=>'Fishin Frenzy slot fishing frenzy fish coins blue water simple fun'],
    ['slug'=>'power-of-thor-megaways','name'=>'Power of Thor Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'20 000x','theme'=>'Thor dieu tonnerre megaways','angle'=>'africa','img_prompt'=>'Power of Thor Megaways slot Norse god thunder hammer lightning'],
    ['slug'=>'might-of-ra','name'=>'Might of Ra','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Puissance Ra Égypte','angle'=>'freespins','img_prompt'=>'Might of Ra slot Egyptian sun god Ra power golden symbols'],
    ['slug'=>'greek-gods','name'=>'Greek Gods','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Dieux grecs olympe','angle'=>'mobile','img_prompt'=>'Greek Gods slot Olympian gods Zeus Athena temple golden symbols'],
    ['slug'=>'5-lions-gold','name'=>'5 Lions Gold','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Cinq lions or chinois','angle'=>'jackpot','img_prompt'=>'5 Lions Gold slot Chinese golden lions temple red gold premium'],
    ['slug'=>'sword-of-ares','name'=>'Sword of Ares','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'5 000x','theme'=>'Épée Arès guerre grecque','angle'=>'rtp','img_prompt'=>'Sword of Ares slot Greek god war sword battle golden symbols'],
    ['slug'=>'spartan-king','name'=>'Spartan King','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'10 000x','theme'=>'Roi spartiate guerrier','angle'=>'debutant','img_prompt'=>'Spartan King slot Spartan warrior shield sword golden battle'],
    ['slug'=>'pirate-gold','name'=>'Pirate Gold','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'2 000x','theme'=>'Pirates trésor or','angle'=>'avis','img_prompt'=>'Pirate Gold slot pirate treasure chest gold coins ship ocean'],
    ['slug'=>'hot-to-burn','name'=>'Hot to Burn','provider'=>'Pragmatic Play','rtp'=>'96.7%','volatility'=>'Haute','max_win'=>'25 000x','theme'=>'Fruits chauds brûlants','angle'=>'strategie','img_prompt'=>'Hot to Burn slot classic hot fruits fire burning simple retro'],
    ['slug'=>'aztec-king','name'=>'Aztec King','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'180x','theme'=>'Roi aztèque trésor','angle'=>'bonus','img_prompt'=>'Aztec King slot Aztec ruler gold pyramid jungle temple symbols'],
    ['slug'=>'cowboy-coins','name'=>'Cowboy Coins','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Cowboy pièces west','angle'=>'africa','img_prompt'=>'Cowboy Coins slot western cowboy gold coins sheriff badge'],
    ['slug'=>'superstar','name'=>'Superstar','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'15 000x','theme'=>'Star célébrité musique','angle'=>'freespins','img_prompt'=>'Superstar slot celebrity music star microphone gold glitter stage'],
    ['slug'=>'infectious-5-xways','name'=>'Infectious 5 xWays','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'30 000x','theme'=>'Virus infection zombie','angle'=>'mobile','img_prompt'=>'Infectious 5 xWays slot virus zombie infection dark green glow'],
    ['slug'=>'el-paso-gunfight','name'=>'El Paso Gunfight xNudge','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'23 050x','theme'=>'Gunfight western mexique','angle'=>'jackpot','img_prompt'=>'El Paso Gunfight slot Mexican western shootout dark saloon'],
    ['slug'=>'yggdrasil-valley','name'=>'Valley of the Gods','provider'=>'Yggdrasil','rtp'=>'96.2%','volatility'=>'Haute','max_win'=>'3 888x','theme'=>'Vallée dieux égyptiens','angle'=>'rtp','img_prompt'=>'Valley of Gods slot Egyptian gods golden scarab symbols mystical'],
    ['slug'=>'temple-tumble','name'=>'Temple Tumble Megaways','provider'=>'Relax Gaming','rtp'=>'96.7%','volatility'=>'Très haute','max_win'=>'7 000x','theme'=>'Temple tumble cascade jungle','angle'=>'debutant','img_prompt'=>'Temple Tumble Megaways slot jungle temple tumbling reels stones'],
    ['slug'=>'snake-arena','name'=>'Snake Arena','provider'=>'Turbo Games','rtp'=>'96.0%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Serpent arène crash game','angle'=>'avis','img_prompt'=>'Snake Arena crash game snake growing arena multiplier dark'],
    ['slug'=>'penalty-shootout','name'=>'Penalty Shootout','provider'=>'Playson','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'2 500x','theme'=>'Penalty football tirs au but','angle'=>'strategie','img_prompt'=>'Penalty Shootout slot football goalkeeper penalty kicks stadium'],
    ['slug'=>'magic-crystals','name'=>'Magic Crystals','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Cristaux magiques gemmes','angle'=>'bonus','img_prompt'=>'Magic Crystals slot magical gems crystals colorful sparkling dark'],
    ['slug'=>'rainbow-gold','name'=>'Rainbow Gold','provider'=>'Elk Studios','rtp'=>'96.1%','volatility'=>'Haute','max_win'=>'10 000x','theme'=>'Arc-en-ciel or irlandais','angle'=>'africa','img_prompt'=>'Rainbow Gold slot rainbow leprechaun gold pot colorful bright Irish'],
    ['slug'=>'scarab-boost','name'=>'Scarab Boost','provider'=>'Hacksaw Gaming','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'10 000x','theme'=>'Scarabée égyptien boost','angle'=>'freespins','img_prompt'=>'Scarab Boost slot Egyptian scarab beetle golden boost symbols'],
    ['slug'=>'bloodlines-of-rome','name'=>'Bloodlines of Rome','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Très haute','max_win'=>'30 000x','theme'=>'Gladiateurs Rome sang','angle'=>'mobile','img_prompt'=>'Bloodlines of Rome slot Roman gladiator dark blood arena intense'],
    ['slug'=>'fat-santa','name'=>'Fat Santa','provider'=>'Push Gaming','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'Illimité','theme'=>'Père Noël gras rigolo','angle'=>'jackpot','img_prompt'=>'Fat Santa slot chubby Santa Christmas fun colorful presents snow'],
    ['slug'=>'jammin-jars','name'=>'Jammin Jars','provider'=>'Push Gaming','rtp'=>'96.8%','volatility'=>'Très haute','max_win'=>'20 000x','theme'=>'Bocaux fruits disco jam','angle'=>'rtp','img_prompt'=>'Jammin Jars slot disco jam jars fruits colorful grid cluster'],
    ['slug'=>'jammin-jars-2','name'=>'Jammin Jars 2','provider'=>'Push Gaming','rtp'=>'96.4%','volatility'=>'Très haute','max_win'=>'20 000x','theme'=>'Bocaux fruits 2 suite','angle'=>'debutant','img_prompt'=>'Jammin Jars 2 slot sequel jars fruits grid cluster wins colorful'],
    ['slug'=>'fat-banker','name'=>'Fat Banker','provider'=>'Push Gaming','rtp'=>'97.0%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Banquier gros argent','angle'=>'avis','img_prompt'=>'Fat Banker slot rich banker money gold coins dark luxury humorous'],
    ['slug'=>'razor-returns','name'=>'Razor Returns','provider'=>'Push Gaming','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'Illimité','theme'=>'Razor retour danger','angle'=>'strategie','img_prompt'=>'Razor Returns slot dark thriller danger blade high intensity'],
    ['slug'=>'chaos-crew-hacksaw','name'=>'Chaos Crew Reloaded','provider'=>'Hacksaw Gaming','rtp'=>'96.5%','volatility'=>'Très haute','max_win'=>'15 000x','theme'=>'Chaos gang reloaded','angle'=>'bonus','img_prompt'=>'Chaos Crew Reloaded slot urban gang graffiti enhanced version'],
    ['slug'=>'space-man-pg','name'=>'Space Man PG','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Variable','max_win'=>'Illimité','theme'=>'Astronaute espace PG crash','angle'=>'africa','img_prompt'=>'Space Man PG crash game astronaut space floating multiplier'],
    ['slug'=>'buffalo-power','name'=>'Buffalo Power','provider'=>'Playson','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Bison puissance prairie','angle'=>'freespins','img_prompt'=>'Buffalo Power slot bison herd American prairie power golden'],
    ['slug'=>'wild-energy','name'=>'Wild Energy','provider'=>'Yggdrasil','rtp'=>'96.2%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Énergie sauvage électrique','angle'=>'mobile','img_prompt'=>'Wild Energy slot electric energy lightning neon dark power symbols'],
    ['slug'=>'book-of-aztec','name'=>'Book of Aztec','provider'=>'Amatic','rtp'=>'96.0%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Livre Aztèque trésor','angle'=>'jackpot','img_prompt'=>'Book of Aztec slot Aztec civilization book expanding symbol gold'],
    ['slug'=>'cleopatra','name'=>'Cleopatra','provider'=>'IGT','rtp'=>'95.7%','volatility'=>'Moyenne','max_win'=>'10 000x','theme'=>'Cléopâtre Égypte classique','angle'=>'rtp','img_prompt'=>'Cleopatra slot classic Egyptian queen golden symbols pyramid'],
    ['slug'=>'da-vinci-diamonds','name'=>'Da Vinci Diamonds','provider'=>'IGT','rtp'=>'96.0%','volatility'=>'Basse','max_win'=>'1 000x','theme'=>'Da Vinci diamants art','angle'=>'debutant','img_prompt'=>'Da Vinci Diamonds slot Renaissance art tumbling reels paintings'],
    ['slug'=>'wolf-hunter','name'=>'Wolf Hunter','provider'=>'Play n GO','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Chasseur loup forêt','angle'=>'avis','img_prompt'=>'Wolf Hunter slot dark forest hunter wolf moon gothic symbols'],
    ['slug'=>'gemix','name'=>'Gemix','provider'=>"Play'n GO",'rtp'=>'96.7%','volatility'=>'Basse','max_win'=>'750x','theme'=>'Gemmes puzzle cascade','angle'=>'strategie','img_prompt'=>'Gemix slot gems puzzle grid colorful crystals match cluster'],
    ['slug'=>'golden-colosseum','name'=>'Golden Colosseum','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Colisée romain or gladiateur','angle'=>'bonus','img_prompt'=>'Golden Colosseum slot Roman arena gladiator golden coins battle'],
    ['slug'=>'hot-fiesta','name'=>'Hot Fiesta','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Haute','max_win'=>'5 000x','theme'=>'Fiesta mexicaine cactus','angle'=>'africa','img_prompt'=>'Hot Fiesta slot Mexican fiesta colorful cactus party celebration'],
];

// CSS unique pour ce site
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
@media(min-width:768px){.dnav{display:flex;gap:24px}.dnav a{color:var(--mt);font-size:14px;font-weight:600}.dnav a:hover{color:var(--a)}.bar{padding:14px 40px}.wrap{max-width:960px;margin:0 auto}.bnav{display:none!important}body{padding-bottom:20px}}
.hero-img{width:100%;height:220px;object-fit:cover;display:block}
.game-header{padding:14px 16px}
.game-badge{display:inline-flex;align-items:center;gap:6px;background:rgba(82,183,136,.1);border:1px solid rgba(82,183,136,.2);color:var(--gn);padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;margin-bottom:10px}
.game-h1{font-size:21px;font-weight:900;line-height:1.25;margin-bottom:8px}
.game-h1 em{font-style:normal;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.game-intro{font-size:13px;color:var(--mt);line-height:1.65}
.stats-row{display:flex;gap:8px;overflow-x:auto;padding:10px 16px;scrollbar-width:none;border-top:1px solid rgba(255,255,255,.05);border-bottom:1px solid rgba(255,255,255,.05)}
.stats-row::-webkit-scrollbar{display:none}
.stat{flex-shrink:0;background:var(--cd);border-radius:10px;padding:10px 14px;text-align:center;border:1px solid rgba(255,255,255,.06)}
.stat-val{font-size:15px;font-weight:900;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.stat-lbl{font-size:10px;color:var(--mt);margin-top:2px;white-space:nowrap}
.cta-box{margin:12px 16px;background:linear-gradient(135deg,#0D2318,#162E1E);border:1px solid rgba(82,183,136,.2);border-radius:14px;padding:16px;text-align:center}
.cta-amount{font-size:22px;font-weight:900;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:4px}
.cta-sub{font-size:12px;color:var(--mt);margin-bottom:12px}
.cta-btn{display:block;background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;padding:13px;border-radius:11px;font-weight:800;font-size:15px;text-align:center}
.wrap{padding:0 16px}
.sec{margin-bottom:18px}
.sec-ttl{font-size:15px;font-weight:800;margin-bottom:10px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.06)}
.sec-ttl span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.btext{font-size:13px;color:rgba(232,245,233,.88);line-height:1.72}
.btext p{margin-bottom:12px}
.btext h2{font-size:16px;font-weight:800;margin:18px 0 10px;color:var(--tx)}
.btext h3{font-size:14px;font-weight:700;margin:14px 0 8px;color:var(--a)}
.btext ul,.btext ol{margin:0 0 12px 20px}
.btext li{margin-bottom:6px}
.btext strong{color:var(--tx)}
.btext a{color:var(--gn);font-weight:600}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.info-grid{grid-template-columns:repeat(3,1fr)}}
.info-card{background:var(--cd);border-radius:10px;padding:10px 12px;border:1px solid rgba(255,255,255,.06)}
.info-lbl{font-size:10px;color:var(--mt);margin-bottom:3px;text-transform:uppercase;letter-spacing:.5px}
.info-val{font-size:13px;font-weight:700}
.faq-item{background:var(--cd);border-radius:11px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:13px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;align-items:center;cursor:pointer;line-height:1.4}
.fi{color:var(--gn);font-size:18px;transition:.2s;flex-shrink:0;margin-left:8px}
.faq-item.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--mt);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq-item.open .fa{max-height:300px;padding:0 16px 14px}
.rel-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
@media(min-width:480px){.rel-grid{grid-template-columns:repeat(3,1fr)}}
.rel-card{background:var(--cd);border-radius:10px;padding:10px;border:1px solid rgba(255,255,255,.06);display:block}
.rel-card:hover{border-color:rgba(255,209,102,.3)}
.rel-name{font-size:12px;font-weight:700;line-height:1.3;margin-bottom:3px}
.rel-provider{font-size:11px;color:var(--mt)}
.rel-rtp{font-size:11px;color:var(--gn);font-weight:700;margin-top:2px}
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
    <a href="/jeux/" style="color:var(--a)">Jeux</a>
    <a href="/guide/">Guides</a>
  </div>
  <a href="' . $AFF[0] . '" target="_blank" rel="noopener" class="top-cta">Jouer →</a>
</nav>';

$BNAV = '<nav class="bnav">
  <a href="/" class="ni"><span class="ni-ico">🏠</span>Accueil</a>
  <a href="/casino/" class="ni"><span class="ni-ico">🌍</span>Pays</a>
  <a href="/bonus/" class="ni"><span class="ni-ico">🎁</span>Bonus</a>
  <a href="/jeux/" class="ni on"><span class="ni-ico">🎰</span>Jeux</a>
  <a href="/guide/" class="ni"><span class="ni-ico">📖</span>Guide</a>
</nav>';

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
    $path = $dir.'/'.$file;
    $jpg = str_replace('.png','.jpg',$path);
    if (file_exists($jpg)) { echo "    ✓ img\n"; return '/images/jeux/'.str_replace('.png','.jpg',$file); }
    echo "    🎨 img...\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', slot game art style, vibrant colors, no text, no watermark','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
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
    echo "    ✅ img\n";
    return '/images/jeux/'.str_replace('.png','.jpg',$file);
}

// Angle-specific H1 suffixes for mobile
$ANGLE_MOBILE_SUFFIX = [
    'strategie' => ' sur Mobile',
    'bonus' => ' en Afrique',
    'demo' => ' sur Téléphone',
    'avis' => ' — Vaut-il le Coup?',
    'rtp' => ' — Analyse Complète',
    'africa' => ' depuis l\'Afrique',
    'jackpot' => ' — Gagner le Max',
    'debutant' => ' pour Débutants',
    'mobile' => ' sur Android et iOS',
    'freespins' => ' — Tours Gratuits',
];

echo "=== SLOTS GENERATOR ===\n".count($SLOTS)." slots\n\n";

$allSlugs = [];

foreach ($SLOTS as $i => $slot) {
    echo "[".($i+1)."/".count($SLOTS)."] ".$slot['name']."\n";

    $dir = $JEUX_DIR.'/'.$slot['slug'];
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $angle = $ANGLE_TYPES[$slot['angle']];
    $suffix = $ANGLE_MOBILE_SUFFIX[$slot['angle']] ?? '';

    // Image
    $imgPath = genImg($slot['img_prompt'], $slot['slug'].'.png', $OPENAI_KEY, $IMG_DIR);

    echo "    ✍️  content...\n";

    // Unique H1 based on angle
    $h1 = $angle['h1_prefix'] . ' ' . $slot['name'] . $suffix;
    $metaDesc = $angle['meta_prefix'] . ' ' . $slot['name'] . ' de ' . $slot['provider'] . '. ' . $slot['theme'] . '. RTP ' . $slot['rtp'] . ', max win ' . $slot['max_win'] . '. Guide pour joueurs africains.';

    $intro = claude(
        "Tu es expert casino africain. Écris 2 phrases d'accroche UNIQUES sur \"" . $h1 . "\" pour les joueurs d'Afrique francophone. Focus sur: " . $angle['focus'] . ". Jeu: " . $slot['name'] . " par " . $slot['provider'] . ", thème: " . $slot['theme'] . ". Vendeur, naturel, français. Pas d'année. Seulement 2 phrases.",
        $ANTHROPIC_KEY, 150
    );

    $body = claude(
        "Tu es journaliste casino expert. Rédige un article UNIQUE sur \"" . $h1 . "\" pour les joueurs d'Afrique francophone.\n\nInfos du jeu:\n- Nom: " . $slot['name'] . "\n- Provider: " . $slot['provider'] . "\n- RTP: " . $slot['rtp'] . "\n- Volatilité: " . $slot['volatility'] . "\n- Max win: " . $slot['max_win'] . "\n- Thème: " . $slot['theme'] . "\n\nAngle unique: " . $angle['focus'] . "\n\nÉcris 4 sections avec <h2> et plusieurs <p> par section. Total 700-900 mots. Inclus des conseils pratiques, des données concrètes, des exemples. Mentionne Mobile Money pour les dépôts. Vendeur sans être publicitaire. Français naturel. Pas d'année. Seulement le HTML.",
        $ANTHROPIC_KEY, 1500
    );

    // FAQ unique selon l'angle
    $faqQuestions = [
        'strategie' => ["Quelle stratégie pour gagner à " . $slot['name'] . "?", "Quel montant miser sur " . $slot['name'] . "?", "Le RTP de " . $slot['rtp'] . " est-il bon?"],
        'bonus' => ["Comment obtenir un bonus pour " . $slot['name'] . "?", "Y a-t-il des free spins pour " . $slot['name'] . " sans dépôt?", "Quel casino africain offre le meilleur bonus pour ce jeu?"],
        'demo' => ["Peut-on jouer à " . $slot['name'] . " gratuitement?", "La démo de " . $slot['name'] . " est-elle disponible en Afrique?", "La version gratuite est-elle identique à la vraie?"],
        'avis' => [$slot['name'] . " vaut-il vraiment le coup?", "Quels sont les défauts de " . $slot['name'] . "?", "Je recommande " . $slot['name'] . " aux joueurs africains?"],
        'rtp' => ["Que signifie un RTP de " . $slot['rtp'] . "?", "La volatilité " . $slot['volatility'] . " convient-elle aux débutants?", "Combien peut-on espérer gagner avec " . $slot['max_win'] . "?"],
        'africa' => ["Où jouer à " . $slot['name'] . " depuis l'Afrique?", "Peut-on déposer via Mobile Money pour jouer à " . $slot['name'] . "?", $slot['name'] . " est-il disponible en Afrique francophone?"],
        'jackpot' => ["Comment atteindre " . $slot['max_win'] . " sur " . $slot['name'] . "?", "Quand le jackpot de " . $slot['name'] . " est-il plus probable?", "Faut-il miser max pour gagner gros?"],
        'debutant' => [$slot['name'] . " est-il facile à apprendre?", "Quelle mise minimum pour commencer?", "Combien de temps faut-il pour maîtriser " . $slot['name'] . "?"],
        'mobile' => [$slot['name'] . " fonctionne-t-il sur Android?", "La qualité graphique est-elle bonne sur téléphone africain?", "Peut-on jouer avec une connexion lente?"],
        'freespins' => ["Comment obtenir des free spins pour " . $slot['name'] . "?", "Les free spins de " . $slot['name'] . " ont-ils des conditions de mise?", "Quel casino donne le plus de free spins?"],
    ];

    $questions = $faqQuestions[$slot['angle']] ?? $faqQuestions['strategie'];
    $faqHtml = '';
    foreach ($questions as $q) {
        $ans = claude("Réponds en 2 phrases claires et vendeuses: \"" . $q . "\" concernant le jeu " . $slot['name'] . " (" . $slot['provider'] . ", RTP " . $slot['rtp'] . "). Pour joueurs africains. Français naturel.", $ANTHROPIC_KEY, 100);
        $faqHtml .= '<div class="faq-item"><div class="fq">' . $q . ' <span class="fi">+</span></div><div class="fa">' . $ans . '</div></div>';
    }

    // Related slots
    $related = array_filter($SLOTS, fn($s) => $s['slug'] !== $slot['slug']);
    $related = array_slice(array_values($related), ($i * 3) % max(1, count($SLOTS)-6), 6);
    $relHtml = '';
    foreach ($related as $r) {
        $relHtml .= '<a href="/jeux/' . $r['slug'] . '/" class="rel-card">
          <div class="rel-name">' . $r['name'] . '</div>
          <div class="rel-provider">' . $r['provider'] . '</div>
          <div class="rel-rtp">RTP ' . $r['rtp'] . '</div>
        </a>';
    }

    $affLink = $AFF[$i % 3];
    $imgTag = $imgPath ? '<img src="' . $imgPath . '" alt="' . htmlspecialchars($slot['name']) . ' casino jeu" title="' . htmlspecialchars($h1) . '" class="hero-img">' : '';

    $page = '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A0F0D">
<title>' . htmlspecialchars($h1) . ' | CasinoAfrique</title>
<meta name="description" content="' . htmlspecialchars($metaDesc) . '">
<link rel="icon" type="image/png" href="/favicon.png">
<style>' . $CSS . '</style>
</head>
<body>
' . $NAV . '
' . $imgTag . '
<div class="game-header">
  <div class="game-badge">🎰 ' . $slot['provider'] . '</div>
  <h1 class="game-h1"><em>' . htmlspecialchars($h1) . '</em></h1>
  <p class="game-intro">' . $intro . '</p>
</div>
<div class="stats-row">
  <div class="stat"><div class="stat-val">' . $slot['rtp'] . '</div><div class="stat-lbl">RTP</div></div>
  <div class="stat"><div class="stat-val">' . $slot['volatility'] . '</div><div class="stat-lbl">Volatilité</div></div>
  <div class="stat"><div class="stat-val">' . $slot['max_win'] . '</div><div class="stat-lbl">Max Win</div></div>
  <div class="stat"><div class="stat-val">' . $slot['provider'] . '</div><div class="stat-lbl">Provider</div></div>
</div>
<div class="cta-box">
  <div class="cta-amount">🎁 Bonus Exclusif</div>
  <div class="cta-sub">Jouez à ' . $slot['name'] . ' · Mobile Money accepté · Inscription gratuite</div>
  <a href="' . $affLink . '" target="_blank" rel="noopener" class="cta-btn">Jouer à ' . $slot['name'] . ' Maintenant →</a>
</div>
<div class="wrap">
  <div class="sec">
    <div class="sec-ttl">📖 <span>' . htmlspecialchars($h1) . '</span></div>
    <div class="btext">' . $body . '</div>
  </div>
  <div class="sec">
    <div class="sec-ttl">📊 <span>Infos du Jeu</span></div>
    <div class="info-grid">
      <div class="info-card"><div class="info-lbl">Jeu</div><div class="info-val">' . $slot['name'] . '</div></div>
      <div class="info-card"><div class="info-lbl">Provider</div><div class="info-val">' . $slot['provider'] . '</div></div>
      <div class="info-card"><div class="info-lbl">RTP</div><div class="info-val">' . $slot['rtp'] . '</div></div>
      <div class="info-card"><div class="info-lbl">Volatilité</div><div class="info-val">' . $slot['volatility'] . '</div></div>
      <div class="info-card"><div class="info-lbl">Max Win</div><div class="info-val">' . $slot['max_win'] . '</div></div>
      <div class="info-card"><div class="info-lbl">Thème</div><div class="info-val">' . $slot['theme'] . '</div></div>
    </div>
  </div>
  <div class="cta-box" style="margin:0 0 18px">
    <div class="cta-amount">🔥 Jouer Maintenant</div>
    <div class="cta-sub">Mobile Money · Bonus sans dépôt · Retrait rapide</div>
    <a href="' . $affLink . '" target="_blank" rel="noopener" class="cta-btn">' . $angle['cta'] . ' →</a>
  </div>
  <div class="sec">
    <div class="sec-ttl">❓ <span>Questions sur ' . $slot['name'] . '</span></div>
    ' . $faqHtml . '
  </div>
  <div class="sec">
    <div class="sec-ttl">🎰 <span>Autres Jeux</span></div>
    <div class="rel-grid">' . $relHtml . '</div>
  </div>
</div>
' . $BNAV . '
<script>document.querySelectorAll(".fq").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));</script>
</body>
</html>';

    file_put_contents($dir . '/index.html', $page);
    $allSlugs[] = $slot['slug'];
    echo "    ✅ /jeux/" . $slot['slug'] . "/\n\n";
    sleep(1);
}

// LISTING PAGE
echo "📋 LISTING PAGE\n";
$listHtml = '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Jeux de Casino en Ligne Afrique | Slots, Crash Games, Live Casino</title>
<meta name="description" content="Découvrez ' . count($SLOTS) . ' jeux de casino disponibles en Afrique francophone. Gates of Olympus, Aviator, Mahjong Ways, Baccarat live et bien plus. Guides et stratégies.">
<link rel="icon" type="image/png" href="/favicon.png">
<style>' . $CSS . '
.pg{padding:20px 16px 10px}
.pg h1{font-size:22px;font-weight:900;margin-bottom:6px}
.pg h1 span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.pg p{font-size:13px;color:var(--mt);margin-bottom:16px}
.filter-row{display:flex;gap:8px;overflow-x:auto;padding:0 16px 12px;scrollbar-width:none}
.filter-row::-webkit-scrollbar{display:none}
.fpill{flex-shrink:0;background:var(--cd);border:1px solid rgba(255,255,255,.06);border-radius:20px;padding:6px 14px;font-size:12px;font-weight:700;color:var(--mt);white-space:nowrap}
.fpill.active{background:linear-gradient(135deg,var(--a),var(--a2));color:#0A0F0D;border-color:transparent}
.games-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;padding:0 16px 100px}
@media(min-width:480px){.games-grid{grid-template-columns:repeat(3,1fr)}}
@media(min-width:768px){.games-grid{grid-template-columns:repeat(4,1fr)};padding:0 40px 20px}
.game-card{background:var(--cd);border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,.06);text-decoration:none;color:var(--tx);display:block}
.game-card:hover{border-color:rgba(255,209,102,.3)}
.game-thumb{width:100%;aspect-ratio:1;overflow:hidden;background:var(--cd2)}
.game-thumb img{width:100%;height:100%;object-fit:cover}
.game-thumb .ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:32px}
.game-info{padding:8px 10px 10px}
.game-name{font-size:12px;font-weight:800;line-height:1.3;margin-bottom:3px}
.game-prov{font-size:10px;color:var(--mt)}
.game-rtp{font-size:11px;color:var(--gn);font-weight:700;margin-top:3px}
</style>
</head>
<body>
' . $NAV . '
<div class="pg">
  <h1>Jeux de <span>Casino</span></h1>
  <p>' . count($SLOTS) . ' jeux disponibles en Afrique francophone</p>
</div>
<div class="filter-row">
  <div class="fpill active">Tous</div>
  <div class="fpill">Pragmatic Play</div>
  <div class="fpill">PG Soft</div>
  <div class="fpill">Crash Games</div>
  <div class="fpill">Live Casino</div>
  <div class="fpill">NetEnt</div>
</div>
<div class="games-grid">';

foreach ($SLOTS as $s) {
    $imgSrc = '/images/jeux/' . $s['slug'] . '.jpg';
    $listHtml .= '<a href="/jeux/' . $s['slug'] . '/" class="game-card">
      <div class="game-thumb"><img src="' . $imgSrc . '" alt="' . htmlspecialchars($s['name']) . '" loading="lazy"></div>
      <div class="game-info">
        <div class="game-name">' . $s['name'] . '</div>
        <div class="game-prov">' . $s['provider'] . '</div>
        <div class="game-rtp">RTP ' . $s['rtp'] . '</div>
      </div>
    </a>';
}

$listHtml .= '</div>' . $BNAV . '</body></html>';
file_put_contents($JEUX_DIR . '/index.html', $listHtml);
echo "  ✅ /jeux/\n\n";

// UPDATE SITEMAP
echo "📋 UPDATING SITEMAP\n";
$existingSitemap = file_get_contents($BASE . '/sitemap.xml');
$date = date('Y-m-d');
$newUrls = '<url><loc>https://www.lesgetsinfo.com/jeux/</loc><lastmod>' . $date . '</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>' . "\n";
foreach ($allSlugs as $s) {
    $newUrls .= '<url><loc>https://www.lesgetsinfo.com/jeux/' . $s . '/</loc><lastmod>' . $date . '</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>' . "\n";
}
$existingSitemap = str_replace('</urlset>', $newUrls . '</urlset>', $existingSitemap);
file_put_contents($BASE . '/sitemap.xml', $existingSitemap);
$total = substr_count($existingSitemap, '<url>');
echo "  ✅ sitemap updated (" . $total . " URLs)\n\n";

echo "=== DONE ===\n";
echo "✅ " . count($SLOTS) . " game pages\n";
echo "✅ /jeux/ listing\n";
echo "✅ Sitemap: " . $total . " URLs\n";
echo "⚠️  Run: rm gen_jeux_fr.php\n";
