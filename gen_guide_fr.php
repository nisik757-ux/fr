<?php
/**
 * Guide Pages Generator for lesgetsinfo.com
 * 380 pages: games × countries, bonuses × countries, beginners, payments, general
 */

$OPENAI_KEY = 'OPENAI_KEY_HERE';
$ANTHROPIC_KEY = 'ANTHROPIC_KEY_HERE';

$BASE = '/home/admin/web/lesgetsinfo.com/public_html';
$GUIDE_DIR = $BASE . '/guide';
$IMG_DIR = $BASE . '/images/guide';

$AFF = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($GUIDE_DIR)) mkdir($GUIDE_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

// 20 pays
$COUNTRIES = [
    'congo-rdc'         => ['name'=>'RD Congo','adj'=>'congolais','capital'=>'Kinshasa','currency'=>'CDF','flag'=>'🇨🇩','payment'=>'M-Pesa','color1'=>'#007FFF','color2'=>'#CE1126'],
    'cameroun'          => ['name'=>'Cameroun','adj'=>'camerounais','capital'=>'Yaoundé','currency'=>'XAF','flag'=>'🇨🇲','payment'=>'MTN Money','color1'=>'#007A5E','color2'=>'#CE1126'],
    'cote-divoire'      => ['name'=>"Côte d'Ivoire",'adj'=>'ivoirien','capital'=>'Abidjan','currency'=>'XOF','flag'=>'🇨🇮','payment'=>'Orange Money','color1'=>'#F77F00','color2'=>'#009A44'],
    'senegal'           => ['name'=>'Sénégal','adj'=>'sénégalais','capital'=>'Dakar','currency'=>'XOF','flag'=>'🇸🇳','payment'=>'Wave','color1'=>'#00853F','color2'=>'#FDEF42'],
    'mali'              => ['name'=>'Mali','adj'=>'malien','capital'=>'Bamako','currency'=>'XOF','flag'=>'🇲🇱','payment'=>'Orange Money','color1'=>'#14B53A','color2'=>'#CE1126'],
    'burkina-faso'      => ['name'=>'Burkina Faso','adj'=>'burkinabè','capital'=>'Ouagadougou','currency'=>'XOF','flag'=>'🇧🇫','payment'=>'Orange Money','color1'=>'#EF2B2D','color2'=>'#009A00'],
    'guinee'            => ['name'=>'Guinée','adj'=>'guinéen','capital'=>'Conakry','currency'=>'GNF','flag'=>'🇬🇳','payment'=>'Orange Money','color1'=>'#CE1126','color2'=>'#009460'],
    'niger'             => ['name'=>'Niger','adj'=>'nigérien','capital'=>'Niamey','currency'=>'XOF','flag'=>'🇳🇪','payment'=>'Airtel Money','color1'=>'#E05206','color2'=>'#009A00'],
    'togo'              => ['name'=>'Togo','adj'=>'togolais','capital'=>'Lomé','currency'=>'XOF','flag'=>'🇹🇬','payment'=>'T-Money','color1'=>'#006A4E','color2'=>'#D21034'],
    'benin'             => ['name'=>'Bénin','adj'=>'béninois','capital'=>'Cotonou','currency'=>'XOF','flag'=>'🇧🇯','payment'=>'MTN Money','color1'=>'#008751','color2'=>'#E8112D'],
    'gabon'             => ['name'=>'Gabon','adj'=>'gabonais','capital'=>'Libreville','currency'=>'XAF','flag'=>'🇬🇦','payment'=>'Airtel Money','color1'=>'#009E60','color2'=>'#003189'],
    'congo-brazzaville' => ['name'=>'Congo Brazzaville','adj'=>'congolais','capital'=>'Brazzaville','currency'=>'XAF','flag'=>'🇨🇬','payment'=>'Airtel Money','color1'=>'#009543','color2'=>'#DC241F'],
    'rwanda'            => ['name'=>'Rwanda','adj'=>'rwandais','capital'=>'Kigali','currency'=>'RWF','flag'=>'🇷🇼','payment'=>'MTN MoMo','color1'=>'#20603D','color2'=>'#00A1DE'],
    'madagascar'        => ['name'=>'Madagascar','adj'=>'malgache','capital'=>'Antananarivo','currency'=>'MGA','flag'=>'🇲🇬','payment'=>'MVola','color1'=>'#FC3D32','color2'=>'#007E3A'],
    'burundi'           => ['name'=>'Burundi','adj'=>'burundais','capital'=>'Bujumbura','currency'=>'BIF','flag'=>'🇧🇮','payment'=>'Lumicash','color1'=>'#CE1126','color2'=>'#1EB53A'],
    'tchad'             => ['name'=>'Tchad','adj'=>'tchadien','capital'=>"N'Djamena",'currency'=>'XAF','flag'=>'🇹🇩','payment'=>'Airtel Money','color1'=>'#002664','color2'=>'#C60C30'],
    'centrafrique'      => ['name'=>'Centrafrique','adj'=>'centrafricain','capital'=>'Bangui','currency'=>'XAF','flag'=>'🇨🇫','payment'=>'Orange Money','color1'=>'#003082','color2'=>'#BE0027'],
    'mauritanie'        => ['name'=>'Mauritanie','adj'=>'mauritanien','capital'=>'Nouakchott','currency'=>'MRU','flag'=>'🇲🇷','payment'=>'Bankily','color1'=>'#006233','color2'=>'#FFD700'],
    'djibouti'          => ['name'=>'Djibouti','adj'=>'djiboutien','capital'=>'Djibouti','currency'=>'DJF','flag'=>'🇩🇯','payment'=>'Waafi Money','color1'=>'#6AB2E7','color2'=>'#12AD2B'],
    'comores'           => ['name'=>'Comores','adj'=>'comorien','capital'=>'Moroni','currency'=>'KMF','flag'=>'🇰🇲','payment'=>'Huri Money','color1'=>'#3A75C4','color2'=>'#009A44'],
];

// JEUX avec angles uniques par jeu
$GAMES = [
    'aviator'           => ['name'=>'Aviator','provider'=>'Spribe','angle'=>'stratégies cashout, gestion du risque, quand encaisser, multiplicateurs réalistes'],
    'gates-olympus'     => ['name'=>'Gates of Olympus','provider'=>'Pragmatic Play','angle'=>'comment déclencher les free spins, multiplicateurs Zeus, mises optimales'],
    'baccarat'          => ['name'=>'Baccarat','provider'=>'Casino Live','angle'=>'règles complètes, Banquier vs Joueur, tableau des probabilités, stratégie martingale adaptée'],
    'blackjack'         => ['name'=>'Blackjack','provider'=>'Casino Live','angle'=>'stratégie de base, quand doubler, quand splitter, compter les cartes simplement'],
    'roulette'          => ['name'=>'Roulette','provider'=>'Casino Live','angle'=>'roulette européenne vs américaine, mises simples vs complexes, système Fibonacci'],
    'sweet-bonanza'     => ['name'=>'Sweet Bonanza','provider'=>'Pragmatic Play','angle'=>'fonctionnalité Ante Bet, buy feature, quand utiliser les multiplicateurs bonbons'],
    'mahjong-ways'      => ['name'=>'Mahjong Ways','provider'=>'PG Soft','angle'=>'comprendre les ways to win, symboles spéciaux, combinaisons gagnantes mahjong'],
    'dragon-tiger'      => ['name'=>'Dragon Tiger','provider'=>'Casino Live','angle'=>'jeu le plus simple du casino live, probabilités exactes, pourquoi éviter le Tie'],
    'plinko'            => ['name'=>'Plinko','provider'=>'Spribe','angle'=>'choisir son niveau de risque, colonnes optimales, stratégie low vs high risk'],
    'spaceman'          => ['name'=>'Spaceman','provider'=>'Pragmatic Play','angle'=>'différences avec Aviator, auto cashout, stratégie double mise'],
];

// BONUS GUIDES
$BONUS_GUIDES = [
    'obtenir-bonus'     => ['h1_tpl'=>'Comment Obtenir un Bonus Casino en {country} : Guide Complet','angle'=>'processus étape par étape pour obtenir son premier bonus casino depuis {country}, activer le bonus bienvenue, conditions de mise expliquées simplement'],
    'bonus-sans-depot'  => ['h1_tpl'=>'Bonus Sans Dépôt Casino {country} : Comment en Profiter Vraiment','angle'=>'trouver et activer les vrais bonus sans dépôt disponibles depuis {country}, différence bonus fictif vs réel, conditions réelles'],
    'free-spins-guide'  => ['h1_tpl'=>'Free Spins Casino {country} : Tout Comprendre pour ne Pas Perdre ses Tours','angle'=>'comment fonctionnent vraiment les free spins au {country}, wagering requirements expliqués, quand les free spins valent vraiment le coup'],
    'cashback-guide'    => ['h1_tpl'=>'Cashback Casino {country} : Récupérez une Partie de Vos Pertes','angle'=>'guide cashback pour joueurs {adj}s, comment calculer son cashback, quels casinos offrent le meilleur cashback depuis {country}'],
    'bonus-bienvenue'   => ['h1_tpl'=>'Bonus de Bienvenue Casino {country} : Maximiser son Premier Dépôt','angle'=>'choisir le meilleur bonus bienvenue depuis {country}, calculer la valeur réelle du bonus, éviter les pièges des conditions de mise'],
];

// PAYMENT GUIDES
$PAYMENT_GUIDES = [
    'deposer'  => ['h1_tpl'=>'Comment Déposer dans un Casino en Ligne depuis {country} : Guide Pratique','angle'=>'guide pratique complet pour faire son premier dépôt casino depuis {country} via {payment}, étapes concrètes, erreurs à éviter, conseils de sécurité'],
    'retirer'  => ['h1_tpl'=>'Comment Retirer ses Gains de Casino vers {payment} au {country}','angle'=>'processus de retrait complet depuis {country}, délais réels, que faire si le retrait est bloqué, optimiser la vitesse de retrait'],
];

// BEGINNER GUIDES
$BEGINNER_GUIDES = [
    'commencer'     => ['h1_tpl'=>'Comment Commencer à Jouer au Casino en Ligne depuis {country}','angle'=>'guide zéro stress pour absolus débutants {adj}s, choisir son casino, créer un compte, faire son premier dépôt via {payment}, jouer en toute sécurité'],
    'inscrire'      => ['h1_tpl'=>'S\'Inscrire dans un Casino en Ligne depuis {country} : Étapes Simples','angle'=>'inscription casino étape par étape pour joueurs {adj}s, documents requis, vérification compte, éviter les faux casinos'],
    'choisir-casino' => ['h1_tpl'=>'Comment Choisir son Casino en Ligne au {country} : Critères Essentiels','angle'=>'quels critères utiliser pour choisir un casino fiable depuis {country}, licences, méthodes de paiement locales, réputation, support français'],
];

// GENERAL GUIDES (60 pages)
$GENERAL_GUIDES = [
    ['slug'=>'gestion-bankroll-casino-afrique','h1'=>'Gestion de Bankroll Casino en Afrique : Ne Jamais Perdre Plus que Prévu','angle'=>'stratégie de gestion du budget casino pour joueurs africains avec des revenus variables, règle du 1-5%, comment jouer longtemps avec peu','img'=>'bankroll management casino Africa money budget strategy African player'],
    ['slug'=>'casino-responsable-afrique','h1'=>'Jeu Responsable Casino en Afrique : Jouer Sans Ruiner sa Vie','angle'=>'guide jeu responsable adapté au contexte africain, signes d\'addiction, comment fixer ses limites, ressources disponibles en Afrique francophone','img'=>'responsible gambling Africa balance life money casino awareness'],
    ['slug'=>'comment-gagner-casino-afrique','h1'=>'Comment Gagner au Casino en Ligne depuis l\'Afrique : La Vérité Sans Filtre','angle'=>'vérité honnête sur les probabilités casino, ce qui fonctionne vraiment vs mythes, stratégies légitimes pour maximiser ses chances depuis l\'Afrique','img'=>'winning casino Africa truth strategy honest probability African'],
    ['slug'=>'casino-en-ligne-vs-terrestre-afrique','h1'=>'Casino en Ligne vs Casino Terrestre en Afrique : Lequel Choisir?','angle'=>'comparaison objective casino en ligne vs casino physique pour les africains, avantages inconvénients, qui devrait choisir quoi selon son profil','img'=>'online vs land casino Africa comparison choice mobile versus'],
    ['slug'=>'rtp-volatilite-comprendre-afrique','h1'=>'RTP et Volatilité au Casino : Ce que Tout Joueur Africain Doit Savoir','angle'=>'explication simple du RTP et de la volatilité pour joueurs africains, quel RTP choisir selon son budget, volatilité haute vs basse pour différents profils','img'=>'RTP volatility casino Africa understand math probability African player'],
    ['slug'=>'casino-live-afrique-guide','h1'=>'Casino Live en Afrique : Jouer avec de Vrais Croupiers depuis son Téléphone','angle'=>'guide casino live pour africains, connexion internet requise, meilleurs jeux live pour l\'Afrique, comment interagir avec les croupiers, avantages vs slots','img'=>'live casino Africa real dealer mobile phone stream African player'],
    ['slug'=>'meilleur-casino-afrique-francophone','h1'=>'Comment Identifier le Meilleur Casino en Ligne pour l\'Afrique Francophone','angle'=>'critères objectifs pour choisir le meilleur casino depuis l\'Afrique francophone: licence, paiements locaux, support FR, bonus réels, rapidité retrait','img'=>'best casino Africa francophone selection criteria comparison'],
    ['slug'=>'escroqueries-casino-afrique','h1'=>'Arnaques Casino en Afrique : Comment les Reconnaître et les Éviter','angle'=>'les 10 arnaques casino les plus fréquentes ciblant les africains, comment reconnaître un faux casino, que faire si on a été arnaqué','img'=>'casino scam Africa warning red flags fraud recognition protection'],
    ['slug'=>'casino-mobile-afrique-guide','h1'=>'Casino Mobile en Afrique : Jouer sur Smartphone Android et iPhone','angle'=>'guide casino mobile optimisé pour la réalité africaine, téléphones d\'entrée de gamme, connexion 3G/4G, applications vs site mobile, jeux légers recommandés','img'=>'mobile casino Africa smartphone Android iPhone app African player'],
    ['slug'=>'strategie-bonus-casino-afrique','h1'=>'Stratégie Bonus Casino en Afrique : Comment Maximiser Chaque Offre','angle'=>'stratégie globale pour maximiser les bonus casino depuis l\'Afrique, ordre des bonus à prendre, wagering management, quand retirer vs rejouer','img'=>'bonus strategy casino Africa maximize offers smart player African'],
    ['slug'=>'casino-crypto-guide-afrique','h1'=>'Casino Crypto en Afrique : Guide Complet pour Commencer Sans Banque','angle'=>'guide complet casino crypto pour africains sans compte bancaire, acheter crypto avec mobile money, premier dépôt casino crypto, avantages vs mobile money','img'=>'crypto casino Africa guide Bitcoin USDT no bank account mobile'],
    ['slug'=>'wagering-requirements-afrique','h1'=>'Wagering Requirements Casino : Ce Piège que les Joueurs Africains Doivent Éviter','angle'=>'explication claire des wagering requirements pour joueurs africains, comment calculer si un bonus vaut le coup, les bonus x30 vs x50 avec exemples en XOF/CDF','img'=>'wagering requirements casino Africa trap explain clear African'],
    ['slug'=>'jackpot-progressif-afrique','h1'=>'Jackpots Progressifs au Casino depuis l\'Afrique : Peut-on Vraiment Gagner Gros?','angle'=>'vérité sur les jackpots progressifs pour joueurs africains, probabilités réelles, cas de vrais gagnants africains, comment y participer via mobile money','img'=>'progressive jackpot casino Africa big win dream realistic African'],
    ['slug'=>'tournois-casino-afrique','h1'=>'Tournois de Casino en Afrique : Compétitions qui Rapportent Vraiment','angle'=>'guide tournois casino pour joueurs africains, comment fonctionnent les leaderboards, stratégie pour bien se classer, prizes atteignables depuis l\'Afrique','img'=>'casino tournament Africa leaderboard competition prizes African'],
    ['slug'=>'vip-casino-afrique','h1'=>'Programme VIP Casino pour Joueurs Africains : Vaut-il Vraiment le Coup?','angle'=>'analyse honnête des programmes VIP casino pour joueurs africains, à partir de quand ça vaut le coup, avantages réels vs marketing, comment accéder au VIP','img'=>'VIP casino Africa program worth analysis honest African player'],
    ['slug'=>'kyc-verification-afrique','h1'=>'Vérification KYC Casino en Afrique : Passer ce Cap Sans Difficulté','angle'=>'guide KYC pour africains, documents acceptés, comment scanner ses pièces correctement, délais habituels, que faire si la vérification est refusée','img'=>'KYC verification casino Africa documents ID scan easy guide'],
    ['slug'=>'limites-casino-afrique','h1'=>'Fixer ses Limites au Casino en Afrique : Outils de Protection Disponibles','angle'=>'outils de limites disponibles dans les casinos pour les africains, limites dépôt, perte, session, comment les activer, importance pour joueurs mobiles africains','img'=>'casino limits Africa protection tools deposit loss session African'],
    ['slug'=>'premier-gain-casino-afrique','h1'=>'Mon Premier Gain au Casino en Ligne en Afrique : Que Faire Maintenant','angle'=>'guide pour ceux qui viennent de gagner pour la première fois au casino en Afrique, comment retirer, impôts sur les gains en Afrique, erreurs à éviter après un gain','img'=>'first casino win Africa celebrate withdraw smart move African'],
    ['slug'=>'casino-afrique-legaux','h1'=>'Casinos en Ligne Légaux en Afrique Francophone : Ce qu\'on Peut Vraiment Utiliser','angle'=>'panorama légal du casino en ligne dans les 20 pays d\'Afrique francophone, quels casinos sont légitimes, licences reconnues, protection du joueur africain','img'=>'legal casino Africa francophone law license protection legitimate'],
    ['slug'=>'statistiques-casino-afrique','h1'=>'Statistiques Casino en Afrique : Qui Joue, Quoi, et Comment','angle'=>'données sur le marché casino africain, pays les plus actifs, jeux préférés des africains (Aviator en tête), méthodes de paiement dominantes, tendances','img'=>'casino statistics Africa data market players games trends research'],
    // 40 autres guides généraux variés
    ['slug'=>'guide-baccarat-debutant-afrique','h1'=>'Baccarat pour Débutants en Afrique : Maîtriser le Jeu des Élites en 10 Minutes','angle'=>'baccarat expliqué simplement pour les africains qui n\'y ont jamais joué, règles de base, vocabulaire, premier jeu pas à pas, mises recommandées débutant','img'=>'baccarat beginner Africa easy learn cards table elite game African'],
    ['slug'=>'guide-blackjack-strategie-afrique','h1'=>'Stratégie Blackjack Casino en Afrique : La Méthode pour Réduire l\'Avantage Maison','angle'=>'stratégie de base blackjack adaptée pour joueurs africains, tableau de décision simplifié, quand doubler, splitter, assurance, avantage maison expliqué','img'=>'blackjack strategy Africa basic strategy card hit stand double African'],
    ['slug'=>'guide-roulette-afrique','h1'=>'Roulette Casino en Afrique : Tout Comprendre pour Jouer Intelligemment','angle'=>'guide roulette pour africains, roulette européenne vs américaine (toujours européenne en Afrique), systèmes de mise, probabilités, budget recommandé','img'=>'roulette casino Africa European wheel guide smart play African'],
    ['slug'=>'guide-aviator-debutant','h1'=>'Aviator Casino : Guide Débutant pour ne Pas Perdre son Premier Vol','angle'=>'guide Aviator pour ceux qui n\'ont jamais joué, comprendre le multiplicateur, quand cashout, erreurs classiques des débutants africains, montant recommandé','img'=>'Aviator game beginner guide airplane cashout timing first play African'],
    ['slug'=>'guide-slots-afrique','h1'=>'Machines à Sous Casino en Afrique : Comment Choisir et Quand Jouer','angle'=>'guide complet slots pour africains, choisir selon RTP et volatilité, différence entre slots simples et Megaways, quand les bonus features se déclenchent','img'=>'slot machines Africa choose RTP volatility guide African mobile play'],
    ['slug'=>'poker-casino-afrique','h1'=>'Poker Casino en Afrique : Video Poker et Casino Hold\'em pour Africains','angle'=>'poker casino (pas poker tournoi) expliqué pour africains, video poker vs casino holdem, stratégie de base, avantage maison, budget recommandé Afrique','img'=>'poker casino Africa video poker holdem cards chips African player'],
    ['slug'=>'sicbo-afrique-guide','h1'=>'Sic Bo Casino en Afrique : Le Jeu de Dés Asiatique Accessible à Tous','angle'=>'sic bo expliqué pour africains, mises simples vs combinées, probabilités des dés, pourquoi les africains aiment ce jeu, comment commencer sans risque','img'=>'Sic Bo dice game Africa Asian easy accessible guide African casino'],
    ['slug'=>'casino-afrique-nuit','h1'=>'Jouer au Casino la Nuit en Afrique : Avantages et Précautions','angle'=>'jouer au casino la nuit en Afrique, connexion souvent meilleure la nuit, mais risques de jeu tardif, comment maintenir sa lucidité, limite horaire recommandée','img'=>'night casino Africa smartphone dark mobile play evening African'],
    ['slug'=>'casino-afrique-weekend','h1'=>'Casino le Week-end en Afrique : Les Meilleurs Bonus du Samedi et Dimanche','angle'=>'les bonus casino du week-end spécialement pour africains, pourquoi les casinos font plus de promotions vendredi-dimanche, comment les trouver et les activer','img'=>'weekend casino Africa Saturday Sunday bonus promotion special offer'],
    ['slug'=>'casino-afrique-famille','h1'=>'Casino et Famille en Afrique : Comment Jouer Responsablement Sans Impacter ses Proches','angle'=>'sujet délicat mais important: jouer au casino en Afrique sans impacter sa famille, fixer un budget familial, cacher vs transparence, ressources de soutien','img'=>'casino family Africa balance responsibility budget protect loved ones'],
    ['slug'=>'gain-casino-afrique-impots','h1'=>'Impôts sur les Gains de Casino en Afrique : Ce que la Loi Dit Vraiment','angle'=>'panorama fiscal des gains casino dans les pays d\'Afrique francophone, quels pays taxent les gains, seuils de déclaration, comment les casinos gèrent les retraits importants','img'=>'casino taxes Africa winnings law fiscal country rules African'],
    ['slug'=>'casino-afrique-deconnexion','h1'=>'Que Faire si la Connexion Coupe Pendant une Partie Casino en Afrique','angle'=>'problème très africain: connexion internet instable. Que se passe-t-il si la connexion coupe pendant un spin Aviator ou une main de blackjack? Droits du joueur','img'=>'internet disconnect casino Africa unstable connection solution rights player'],
    ['slug'=>'casino-afrique-minimum-depot','h1'=>'Casino avec Dépôt Minimum de 500 XOF en Afrique : La Liste Vérifiée','angle'=>'casinos avec les plus petits dépôts minimum pour l\'Afrique, jouer avec 500 XOF, 1000 CDF, stratégie micro-dépôts pour découvrir un casino sans risque','img'=>'minimum deposit casino Africa small budget 500 XOF accessible list'],
    ['slug'=>'casino-afrique-anonymat','h1'=>'Jouer au Casino Anonymement depuis l\'Afrique : Options et Limites','angle'=>'anonymat casino pour africains, quelles méthodes offrent plus de discrétion (crypto vs mobile money), limites légales de l\'anonymat, casinos sans KYC strict','img'=>'anonymous casino Africa privacy crypto no KYC discreet mobile'],
    ['slug'=>'casino-afrique-double-compte','h1'=>'Avoir Deux Comptes Casino en Afrique : Pourquoi c\'est une Mauvaise Idée','angle'=>'explication pourquoi créer plusieurs comptes casino est interdit et dangereux, conséquences (compte fermé, gains annulés), alternatives légitimes pour avoir plus de bonus','img'=>'double account casino Africa warning banned dangerous alternative'],
    ['slug'=>'casino-afrique-retrait-rapide','h1'=>'Retrait Rapide Casino en Afrique : Quelle Méthode Reçoit l\'Argent le Plus Vite','angle'=>'classement vitesse de retrait casino pour l\'Afrique: USDT TRC20 (2 min) vs Wave (5 min) vs MTN (20 min) vs virement (3 jours). Données réelles testées','img'=>'fast withdrawal casino Africa speed ranking comparison Wave USDT'],
    ['slug'=>'casino-afrique-bonus-rechargement','h1'=>'Bonus de Rechargement Casino Afrique : Comment Avoir Plus à Chaque Dépôt','angle'=>'guide bonus rechargement pour joueurs africains fidèles, trouver les promotions hebdomadaires, loyalty bonus, comment les activer régulièrement depuis l\'Afrique','img'=>'reload bonus casino Africa weekly promotion loyal player African'],
    ['slug'=>'casino-afrique-multi-jeux','h1'=>'Jouer à Plusieurs Jeux de Casino en Afrique : Stratégie Multi-Tables','angle'=>'jouer à plusieurs jeux simultanément sur mobile depuis l\'Afrique, avantages et inconvénients, connexion requise, quels jeux combiner, éviter les erreurs coûteuses','img'=>'multi game casino Africa mobile strategy multiple tables slots live'],
    ['slug'=>'casino-afrique-freespins-sans-depot','h1'=>'Free Spins Sans Dépôt Casino Afrique : Jouer Gratuitement pour Gagner Vrai','angle'=>'guide complet free spins sans dépôt pour africains, où les trouver, conditions réelles pour retirer les gains, casinos qui offrent de vraies free spins aux africains','img'=>'free spins no deposit casino Africa real withdraw legit guide African'],
    ['slug'=>'casino-afrique-gagner-aviator','h1'=>'Gagner à Aviator depuis l\'Afrique : Stratégies qui Fonctionnent Vraiment','angle'=>'stratégies Aviator testées par des joueurs africains, la stratégie double mise (petit + grand), auto cashout à x1.5, gestion du stress lors des crashs précoces','img'=>'Aviator strategy Africa win tips double bet auto cashout African player'],
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
.hero{width:100%;height:220px;object-fit:cover;display:block}
.flag-bar{height:5px}
.hdr{padding:14px 16px}
.badge{display:inline-flex;align-items:center;gap:6px;background:rgba(82,183,136,.1);border:1px solid rgba(82,183,136,.2);color:var(--gn);padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;margin-bottom:10px}
.h1{font-size:20px;font-weight:900;line-height:1.28;margin-bottom:8px}
.h1 em{font-style:normal;background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.intro{font-size:13px;color:var(--mt);line-height:1.65}
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

$NAV = '<nav class="bar"><a href="/" class="logo">🎲 CasinoAfrique</a><div class="dnav"><a href="/casino/">Pays</a><a href="/bonus/">Bonus</a><a href="/jeux/">Jeux</a><a href="/guide/" style="color:var(--a)">Guides</a></div><a href="'.$AFF[0].'" target="_blank" rel="noopener" class="top-cta">Jouer →</a></nav>';
$BNAV = '<nav class="bnav"><a href="/" class="ni"><span class="ni-ico">🏠</span>Accueil</a><a href="/casino/" class="ni"><span class="ni-ico">🌍</span>Pays</a><a href="/bonus/" class="ni"><span class="ni-ico">🎁</span>Bonus</a><a href="/jeux/" class="ni"><span class="ni-ico">🎰</span>Jeux</a><a href="/guide/" class="ni on"><span class="ni-ico">📖</span>Guide</a></nav>';

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
    if (file_exists($jpg)) return '/images/guide/'.str_replace('.png','.jpg',$file);
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', vibrant professional casino guide illustration, no text, no watermark','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
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
    return '/images/guide/'.str_replace('.png','.jpg',$file);
}

function buildPage($h1, $meta, $intro, $body, $faqHtml, $relHtml, $affLink, $imgPath, $c1, $c2, $badge) {
    global $NAV, $BNAV, $CSS;
    $imgTag = $imgPath ? '<img src="'.$imgPath.'" alt="'.htmlspecialchars($h1).'" class="hero">' : '';
    $flagBar = '<div class="flag-bar" style="background:linear-gradient(90deg,'.$c1.','.$c2.')"></div>';
    return '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><meta name="theme-color" content="#0A0F0D"><title>'.htmlspecialchars($h1).' | CasinoAfrique</title><meta name="description" content="'.htmlspecialchars($meta).'"><link rel="icon" type="image/png" href="/favicon.png"><style>'.$CSS.'</style></head><body>'.$NAV.$imgTag.$flagBar.'<div class="hdr"><div class="badge">📖 '.$badge.'</div><h1 class="h1"><em>'.htmlspecialchars($h1).'</em></h1><p class="intro">'.$intro.'</p></div><div class="cta-box"><div class="cta-t">🎰 <span>Jouer Maintenant</span></div><div class="cta-s">Mobile Money & Crypto · Bonus exclusif · Inscription gratuite</div><a href="'.$affLink.'" target="_blank" rel="noopener" class="cta-btn">Appliquer ce Guide et Jouer →</a></div><div class="wrap"><div class="sec"><div class="sec-t">📖 <span>Guide Complet</span></div><div class="btext">'.$body.'</div></div><div class="cta-box" style="margin:0 0 18px"><div class="cta-t">🔥 <span>Prêt à Jouer?</span></div><div class="cta-s">Bonus de bienvenue · Mobile Money accepté</div><a href="'.$affLink.'" target="_blank" rel="noopener" class="cta-btn">S\'inscrire et Jouer →</a></div><div class="sec"><div class="sec-t">❓ <span>Questions Fréquentes</span></div>'.$faqHtml.'</div><div class="sec"><div class="sec-t">📖 <span>Autres Guides</span></div><div class="rel-grid">'.$relHtml.'</div></div></div>'.$BNAV.'<script>document.querySelectorAll(".fq").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));</script></body></html>';
}

$allSlugs = [];
$pageCount = 0;

echo "=== GUIDE GENERATOR 380 PAGES ===\n\n";

// ============================================
// 1. JEUX × PAYS (10 jeux × 20 pays = 200 pages... on fait 10 jeux × 10 pays = 100)
// ============================================
echo "🎮 GUIDES JEUX × PAYS\n\n";

$gameCountries = array_slice($COUNTRIES, 0, 10, true); // Top 10 pays

foreach ($GAMES as $gameSlug => $game) {
    foreach ($gameCountries as $countrySlug => $country) {
        $pageCount++;
        $slug = 'comment-jouer-'.$gameSlug.'-'.$countrySlug;
        $dir = $GUIDE_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $h1 = 'Comment Jouer à '.$game['name'].' au Casino en '.$country['name'].' — Guide '.$country['flag'];
        $meta = 'Guide complet '.$game['name'].' pour joueurs '.$country['adj'].'s. Règles, stratégies, bonus, dépôt via '.$country['payment'].'. Jouez à '.$game['name'].' depuis '.$country['capital'].'.';

        echo "[".$pageCount."] ".$h1."\n";

        // Image pour le premier pays de chaque jeu
        $imgPath = null;
        if (array_key_first($gameCountries) === $countrySlug) {
            $imgPrompt = $game['name'].' casino game guide Africa '.$country['name'].' '.$country['flag'].' mobile player winning';
            $imgPath = genImg($imgPrompt, $slug.'.png', $OPENAI_KEY, $IMG_DIR);
        }

        $intro = claude("2 phrases d'accroche vendeuses pour: \"".$h1."\"\nFocus: ".$game['angle']."\nContexte: joueur ".$country['adj']." à ".$country['capital'].", dépôt via ".$country['payment'].". SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);

        $body = claude(
            "Guide UNIQUE et vendeur: \"".$h1."\"\n\nAngle spécifique: ".$game['angle']."\n\nContexte local:\n- Pays: ".$country['name']." (".$country['adj']."s)\n- Capitale: ".$country['capital']."\n- Paiement: ".$country['payment']."\n- Devise: ".$country['currency']."\n- Jeu: ".$game['name']." par ".$game['provider']."\n\n4 sections <h2>:\n1. Règles et fonctionnement de ".$game['name']."\n2. Stratégies spécifiques (".$game['angle'].")\n3. Comment jouer à ".$game['name']." depuis ".$country['name']." (dépôt ".$country['payment'].", mobile)\n4. Maximiser ses gains avec ".$game['name']." au ".$country['name']."\n\n700-900 mots. Pratique, données concrètes. Pas d'année. Seulement HTML.",
            $ANTHROPIC_KEY, 1500
        );

        $faqQs = [
            $game['name']." est-il disponible depuis ".$country['name']."?",
            "Peut-on jouer à ".$game['name']." gratuitement au ".$country['name']."?",
            "Quel est le dépôt minimum pour jouer à ".$game['name']." avec ".$country['payment']."?"
        ];
        $faqHtml = '';
        foreach ($faqQs as $q) {
            $ans = claude("2 phrases: \"".$q."\". ".$game['name'].", ".$country['name'].", ".$country['payment'].". Naturel.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($GAMES as $rSlug => $rGame) {
            if ($rSlug === $gameSlug) continue;
            $relHtml .= '<a href="/guide/comment-jouer-'.$rSlug.'-'.$countrySlug.'/" class="rel-card">'.$rGame['name'].' en '.$country['name'].'<div class="rel-sub">Guide '.$rGame['provider'].'</div></a>';
            if (substr_count($relHtml,'rel-card') >= 4) break;
        }

        $affLink = $AFF[$pageCount % 3];
        $html = buildPage($h1,$meta,$intro,$body,$faqHtml,$relHtml,$affLink,$imgPath,$country['color1'],$country['color2'],$game['name'].' · '.$country['flag']);
        file_put_contents($dir.'/index.html', $html);
        $allSlugs[] = $slug;
        echo "  ✅\n";
        sleep(1);
    }
}

// ============================================
// 2. BONUS × PAYS (5 types × 20 pays = 100 pages)
// ============================================
echo "\n🎁 GUIDES BONUS × PAYS\n\n";

foreach ($BONUS_GUIDES as $bonusSlug => $bonus) {
    foreach ($COUNTRIES as $countrySlug => $country) {
        $pageCount++;
        $slug = $bonusSlug.'-'.$countrySlug;
        $dir = $GUIDE_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $h1 = str_replace(['{country}','{adj}'],[$country['name'],$country['adj']],$bonus['h1_tpl']);
        $angle = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$bonus['angle']);
        $meta = $h1.' — Guide pratique pour joueurs '.$country['adj'].'s à '.$country['capital'].'. Dépôt via '.$country['payment'].', bonus en '.$country['currency'].'.';

        echo "[".$pageCount."] ".$h1."\n";

        // Image pour premier pays de chaque bonus type
        $imgPath = null;
        if (array_key_first($COUNTRIES) === $countrySlug) {
            $imgPath = genImg('casino bonus guide Africa '.$country['name'].' gift coins mobile African player', $slug.'.png', $OPENAI_KEY, $IMG_DIR);
        }

        $intro = claude("2 phrases d'accroche pour: \"".$h1."\"\nAngle: ".$angle."\nFrançais naturel africain. SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);
        $body = claude("Guide UNIQUE: \"".$h1."\"\nAngle: ".$angle."\nContexte: ".$country['name'].", ".$country['payment'].", ".$country['currency'].", ".$country['capital'].".\n4 sections <h2>, 700-900 mots, pratique, exemples en ".$country['currency'].". Pas d'année. Seulement HTML.", $ANTHROPIC_KEY, 1500);

        $faqQs = [
            "Le bonus casino est-il disponible depuis ".$country['name']."?",
            "Peut-on retirer les gains du bonus en ".$country['currency']."?",
            "Comment activer le bonus après un dépôt via ".$country['payment']."?"
        ];
        $faqHtml = '';
        foreach ($faqQs as $q) {
            $ans = claude("2 phrases: \"".$q."\". ".$country['name'].", ".$country['payment'].", ".$country['currency'].". Naturel.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($BONUS_GUIDES as $rSlug => $rBonus) {
            if ($rSlug === $bonusSlug) continue;
            $rH1 = str_replace(['{country}','{adj}'],[$country['name'],$country['adj']],$rBonus['h1_tpl']);
            $relHtml .= '<a href="/guide/'.$rSlug.'-'.$countrySlug.'/" class="rel-card">'.htmlspecialchars($rH1).'<div class="rel-sub">Guide bonus '.$country['flag'].'</div></a>';
            if (substr_count($relHtml,'rel-card') >= 4) break;
        }

        $affLink = $AFF[$pageCount % 3];
        $html = buildPage($h1,$meta,$intro,$body,$faqHtml,$relHtml,$affLink,$imgPath,$country['color1'],$country['color2'],'Bonus · '.$country['flag']);
        file_put_contents($dir.'/index.html', $html);
        $allSlugs[] = $slug;
        echo "  ✅\n";
        sleep(1);
    }
}

// ============================================
// 3. PAIEMENT × PAYS (2 types × 20 pays = 40 pages)
// ============================================
echo "\n💳 GUIDES PAIEMENT × PAYS\n\n";

foreach ($PAYMENT_GUIDES as $paySlug => $pay) {
    foreach ($COUNTRIES as $countrySlug => $country) {
        $pageCount++;
        $slug = 'guide-'.$paySlug.'-casino-'.$countrySlug;
        $dir = $GUIDE_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $h1 = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$pay['h1_tpl']);
        $angle = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$pay['angle']);
        $meta = $h1.' — Étapes détaillées pour '.$country['adj'].'s. '.$country['payment'].', min en '.$country['currency'].'. Guide pas à pas depuis '.$country['capital'].'.';

        echo "[".$pageCount."] ".$h1."\n";

        $imgPath = null;
        if (array_key_first($COUNTRIES) === $countrySlug) {
            $imgPath = genImg('casino deposit withdraw guide Africa '.$country['name'].' '.$country['payment'].' mobile African', $slug.'.png', $OPENAI_KEY, $IMG_DIR);
        }

        $intro = claude("2 phrases vendeuses pour: \"".$h1."\"\nAngle: ".$angle."\nFrançais africain naturel. SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);
        $body = claude("Guide UNIQUE et pratique: \"".$h1."\"\nAngle: ".$angle."\nContexte précis: ".$country['name'].", ".$country['payment'].", devise ".$country['currency'].", capitale ".$country['capital'].".\n4 sections <h2>, 600-800 mots, étapes concrètes, données réelles. Pas d'année. Seulement HTML.", $ANTHROPIC_KEY, 1200);

        $faqQs = [
            "Combien de temps prend le ".($paySlug==='deposer'?'dépôt':'retrait')." casino via ".$country['payment']." au ".$country['name']."?",
            "Y a-t-il des frais pour ".($paySlug==='deposer'?'déposer':'retirer')." avec ".$country['payment']." au ".$country['name']."?",
            "Quel montant minimum pour ".($paySlug==='deposer'?'déposer':'retirer')." au casino depuis ".$country['name']."?"
        ];
        $faqHtml = '';
        foreach ($faqQs as $q) {
            $ans = claude("2 phrases: \"".$q."\". ".$country['payment'].", ".$country['name'].", ".$country['currency'].". Pratique.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($PAYMENT_GUIDES as $rSlug => $rPay) {
            if ($rSlug === $paySlug) continue;
            $rH1 = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$rPay['h1_tpl']);
            $relHtml .= '<a href="/guide/guide-'.$rSlug.'-casino-'.$countrySlug.'/" class="rel-card">'.htmlspecialchars($rH1).'<div class="rel-sub">Paiement '.$country['flag'].'</div></a>';
        }

        $affLink = $AFF[$pageCount % 3];
        $html = buildPage($h1,$meta,$intro,$body,$faqHtml,$relHtml,$affLink,$imgPath,$country['color1'],$country['color2'],$country['payment'].' · '.$country['flag']);
        file_put_contents($dir.'/index.html', $html);
        $allSlugs[] = $slug;
        echo "  ✅\n";
        sleep(1);
    }
}

// ============================================
// 4. DÉBUTANTS × PAYS (3 types × 20 pays = 60 pages)
// ============================================
echo "\n👶 GUIDES DÉBUTANTS × PAYS\n\n";

foreach ($BEGINNER_GUIDES as $begSlug => $beg) {
    foreach ($COUNTRIES as $countrySlug => $country) {
        $pageCount++;
        $slug = 'guide-'.$begSlug.'-'.$countrySlug;
        $dir = $GUIDE_DIR.'/'.$slug;
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $h1 = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$beg['h1_tpl']);
        $angle = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$beg['angle']);
        $meta = $h1.' — Guide pour débutants '.$country['adj'].'s. Étapes simples, casino sûr, dépôt via '.$country['payment'].'. Depuis '.$country['capital'].'.';

        echo "[".$pageCount."] ".$h1."\n";

        $imgPath = null;
        if (array_key_first($COUNTRIES) === $countrySlug) {
            $imgPath = genImg('beginner casino guide Africa '.$country['name'].' first time mobile player '.$country['flag'], $slug.'.png', $OPENAI_KEY, $IMG_DIR);
        }

        $intro = claude("2 phrases bienveillantes et encourageantes pour: \"".$h1."\"\nAngle: ".$angle."\nFrançais africain naturel. SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);
        $body = claude("Guide BIENVEILLANT et pratique: \"".$h1."\"\nAngle: ".$angle."\nContexte: ".$country['name'].", ".$country['payment'].", ".$country['currency'].", joueurs débutants.\n4 sections <h2>, 600-800 mots, ton rassurant, étapes simples. Pas d'année. Seulement HTML.", $ANTHROPIC_KEY, 1200);

        $faqQs = [
            "Faut-il beaucoup d'argent pour commencer au casino depuis ".$country['name']."?",
            "Est-ce que les casinos en ligne sont sûrs pour les joueurs de ".$country['name']."?",
            "Peut-on utiliser ".$country['payment']." pour son premier dépôt casino?"
        ];
        $faqHtml = '';
        foreach ($faqQs as $q) {
            $ans = claude("2 phrases rassurantes: \"".$q."\". ".$country['name'].", ".$country['payment'].". Bienveillant.", $ANTHROPIC_KEY, 100);
            $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
        }

        $relHtml = '';
        foreach ($BEGINNER_GUIDES as $rSlug => $rBeg) {
            if ($rSlug === $begSlug) continue;
            $rH1 = str_replace(['{country}','{adj}','{payment}'],[$country['name'],$country['adj'],$country['payment']],$rBeg['h1_tpl']);
            $relHtml .= '<a href="/guide/guide-'.$rSlug.'-'.$countrySlug.'/" class="rel-card">'.htmlspecialchars($rH1).'<div class="rel-sub">Débutant '.$country['flag'].'</div></a>';
        }

        $affLink = $AFF[$pageCount % 3];
        $html = buildPage($h1,$meta,$intro,$body,$faqHtml,$relHtml,$affLink,$imgPath,$country['color1'],$country['color2'],'Débutant · '.$country['flag']);
        file_put_contents($dir.'/index.html', $html);
        $allSlugs[] = $slug;
        echo "  ✅\n";
        sleep(1);
    }
}

// ============================================
// 5. GUIDES GÉNÉRAUX (60 pages)
// ============================================
echo "\n📚 GUIDES GÉNÉRAUX\n\n";

foreach ($GENERAL_GUIDES as $gp) {
    $pageCount++;
    $dir = $GUIDE_DIR.'/'.$gp['slug'];
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    echo "[".$pageCount."] ".$gp['h1']."\n";

    $imgPath = null;
    if (!empty($gp['img'])) {
        $imgPath = genImg($gp['img'], $gp['slug'].'.png', $OPENAI_KEY, $IMG_DIR);
    }

    $intro = claude("2 phrases d'accroche PERCUTANTES pour: \"".$gp['h1']."\"\nAngle: ".$gp['angle']."\nFrançais africain naturel. SEULEMENT 2 phrases.", $ANTHROPIC_KEY, 150);
    $body = claude("Article UNIQUE: \"".$gp['h1']."\"\nAngle: ".$gp['angle']."\n4 sections <h2>, 700-900 mots, pratique, exemples africains réels. Pas d'année. Seulement HTML.", $ANTHROPIC_KEY, 1500);

    $faqRaw = claude("3 questions FAQ pour: \"".$gp['h1']."\". Ce que les africains cherchent vraiment. Format: q1|||q2|||q3. SEULEMENT ça.", $ANTHROPIC_KEY, 150);
    $faqHtml = '';
    foreach (explode('|||', $faqRaw) as $q) {
        $q = trim($q);
        if (empty($q)) continue;
        $ans = claude("2 phrases: \"".$q."\". Contexte africain. Naturel et vendeur.", $ANTHROPIC_KEY, 100);
        $faqHtml .= '<div class="faq-item"><div class="fq">'.htmlspecialchars($q).' <span class="fi">+</span></div><div class="fa">'.$ans.'</div></div>';
    }

    $relHtml = '';
    foreach (array_slice($GENERAL_GUIDES, 0, 5) as $rp) {
        if ($rp['slug'] === $gp['slug']) continue;
        $relHtml .= '<a href="/guide/'.$rp['slug'].'/" class="rel-card">'.htmlspecialchars($rp['h1']).'<div class="rel-sub">Guide casino Afrique</div></a>';
        if (substr_count($relHtml,'rel-card') >= 4) break;
    }

    $affLink = $AFF[$pageCount % 3];
    $html = buildPage($gp['h1'],'Guide casino Afrique: '.$gp['h1'].'. Conseils pratiques pour joueurs africains francophones.',$intro,$body,$faqHtml,$relHtml,$affLink,$imgPath,'#1B4332','#FFD166','Guide Casino Afrique');
    file_put_contents($dir.'/index.html', $html);
    $allSlugs[] = $gp['slug'];
    echo "  ✅\n";
    sleep(1);
}

// LISTING
echo "\n📋 LISTING\n";
$listing = '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><title>Guides Casino Afrique | '.count($allSlugs).'+ Guides Pratiques</title><meta name="description" content="Tous les guides casino pour l\'Afrique francophone. Comment jouer, obtenir des bonus, déposer, retirer. '.count($allSlugs).'+ guides par pays et sujet."><link rel="icon" type="image/png" href="/favicon.png"><style>'.$CSS.'
.ph{padding:20px 16px 10px}.ph h1{font-size:22px;font-weight:900;margin-bottom:6px}.ph h1 span{background:linear-gradient(135deg,var(--a),var(--a2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}.ph p{font-size:13px;color:var(--mt)}
.list{padding:0 16px 100px;display:flex;flex-direction:column;gap:8px}
.it{background:var(--cd);border-radius:12px;padding:12px 14px;display:flex;align-items:center;gap:10px;text-decoration:none;color:var(--tx);border:1px solid rgba(255,255,255,.06)}
.it:hover{border-color:rgba(255,209,102,.3)}.it-h{flex:1;font-size:13px;font-weight:700;line-height:1.35}.it-arr{color:var(--gn);font-size:18px}
</style></head><body>'.$NAV.'<div class="ph"><h1>Guides <span>Casino Afrique</span></h1><p>'.count($allSlugs).'+ guides pratiques</p></div><div class="list">';

foreach ($allSlugs as $s) {
    $listing .= '<a href="/guide/'.$s.'/" class="it"><div class="it-h">'.htmlspecialchars(ucwords(str_replace('-',' ',$s))).'</div><div class="it-arr">›</div></a>';
}
$listing .= '</div>'.$BNAV.'</body></html>';
file_put_contents($GUIDE_DIR.'/index.html', $listing);
echo "✅ /guide/\n\n";

// SITEMAP
echo "📋 SITEMAP\n";
$existing = file_get_contents($BASE.'/sitemap.xml');
$date = date('Y-m-d');
$new = '<url><loc>https://www.lesgetsinfo.com/guide/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>'."\n";
foreach ($allSlugs as $s) {
    $new .= '<url><loc>https://www.lesgetsinfo.com/guide/'.$s.'/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>'."\n";
}
$existing = str_replace('</urlset>',$new.'</urlset>',$existing);
file_put_contents($BASE.'/sitemap.xml',$existing);
$total = substr_count($existing,'<url>');
echo "✅ ".$total." URLs total\n\n";

echo "=== DONE ===\n✅ ".$pageCount." pages\n✅ Sitemap: ".$total." URLs\n⚠️  rm gen_guide_fr.php\n";
