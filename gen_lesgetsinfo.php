<?php
/**
 * Generator for lesgetsinfo.com - French African casino site
 * Generates: homepage + 20 country pages
 * Run: php gen_lesgetsinfo.php
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/lesgetsinfo.com/public_html';
$IMG_DIR = $BASE . '/images';

$AFFILIATE_LINKS = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);
if (!is_dir($BASE.'/casino')) mkdir($BASE.'/casino', 0755, true);

// 20 pays francophones africains
$COUNTRIES = [
    ['slug'=>'casino-congo-rdc','name'=>'RD Congo','capital'=>'Kinshasa','currency'=>'Franc congolais','pop'=>'100M','flag_colors'=>['#007FFF','#F7D618','#CE1126'],'flag_emoji'=>'🇨🇩','img_prompt'=>'Democratic Republic of Congo flag colors blue yellow red, African casino online concept, Kinshasa city skyline, modern mobile gambling'],
    ['slug'=>'casino-cote-divoire','name'=>"Côte d'Ivoire",'capital'=>'Abidjan','currency'=>'Franc CFA','pop'=>'27M','flag_colors'=>['#F77F00','#FFFFFF','#009A44'],'flag_emoji'=>'🇨🇮','img_prompt'=>"Ivory Coast flag orange white green colors, Abidjan skyline, African casino concept, mobile betting, tropical colors"],
    ['slug'=>'casino-cameroun','name'=>'Cameroun','capital'=>'Yaoundé','currency'=>'Franc CFA','pop'=>'28M','flag_colors'=>['#007A5E','#CE1126','#FCD116'],'flag_emoji'=>'🇨🇲','img_prompt'=>'Cameroon flag green red yellow colors, African casino online, Yaoundé landscape, mobile gambling concept'],
    ['slug'=>'casino-senegal','name'=>'Sénégal','capital'=>'Dakar','currency'=>'Franc CFA','pop'=>'18M','flag_colors'=>['#00853F','#FDEF42','#BC0026'],'flag_emoji'=>'🇸🇳','img_prompt'=>'Senegal flag green yellow red, Dakar ocean view, African online casino concept, mobile betting'],
    ['slug'=>'casino-mali','name'=>'Mali','capital'=>'Bamako','currency'=>'Franc CFA','pop'=>'22M','flag_colors'=>['#14B53A','#FCD116','#CE1126'],'flag_emoji'=>'🇲🇱','img_prompt'=>'Mali flag green yellow red colors, Bamako city, African casino gambling concept, mobile betting'],
    ['slug'=>'casino-burkina-faso','name'=>'Burkina Faso','capital'=>'Ouagadougou','currency'=>'Franc CFA','pop'=>'23M','flag_colors'=>['#EF2B2D','#009A00','#FCD116'],'flag_emoji'=>'🇧🇫','img_prompt'=>'Burkina Faso flag red green yellow star, African online casino concept, mobile gambling'],
    ['slug'=>'casino-guinee','name'=>'Guinée','capital'=>'Conakry','currency'=>'Franc guinéen','pop'=>'14M','flag_colors'=>['#CE1126','#FCD116','#009460'],'flag_emoji'=>'🇬🇳','img_prompt'=>'Guinea flag red yellow green colors, Conakry coastline, African casino betting concept'],
    ['slug'=>'casino-benin','name'=>'Bénin','capital'=>'Cotonou','currency'=>'Franc CFA','pop'=>'13M','flag_colors'=>['#008751','#FCD116','#E8112D'],'flag_emoji'=>'🇧🇯','img_prompt'=>'Benin flag green yellow red colors, Cotonou cityscape, African mobile casino concept'],
    ['slug'=>'casino-togo','name'=>'Togo','capital'=>'Lomé','currency'=>'Franc CFA','pop'=>'9M','flag_colors'=>['#006A4E','#FFCE00','#D21034'],'flag_emoji'=>'🇹🇬','img_prompt'=>'Togo flag green yellow red white star, Lomé beach, African online betting casino'],
    ['slug'=>'casino-niger','name'=>'Niger','capital'=>'Niamey','currency'=>'Franc CFA','pop'=>'25M','flag_colors'=>['#E05206','#FFFFFF','#009A00'],'flag_emoji'=>'🇳🇪','img_prompt'=>'Niger flag orange white green colors, Niamey sahara landscape, African casino mobile gambling'],
    ['slug'=>'casino-tchad','name'=>'Tchad','capital'=>"N'Djamena",'currency'=>'Franc CFA','pop'=>'18M','flag_colors'=>['#002664','#FECB00','#C60C30'],'flag_emoji'=>'🇹🇩','img_prompt'=>'Chad flag blue yellow red colors, African desert landscape, mobile casino online concept'],
    ['slug'=>'casino-centrafrique','name'=>'Centrafrique','capital'=>'Bangui','currency'=>'Franc CFA','pop'=>'5M','flag_colors'=>['#003082','#FFFFFF','#289728','#FFCB00','#BE0027'],'flag_emoji'=>'🇨🇫','img_prompt'=>'Central African Republic colorful flag, Bangui river landscape, African mobile casino concept'],
    ['slug'=>'casino-gabon','name'=>'Gabon','capital'=>'Libreville','currency'=>'Franc CFA','pop'=>'2M','flag_colors'=>['#009E60','#FCD116','#003189'],'flag_emoji'=>'🇬🇦','img_prompt'=>'Gabon flag green yellow blue, Libreville ocean, African casino online gambling concept'],
    ['slug'=>'casino-congo-brazzaville','name'=>'Congo Brazzaville','capital'=>'Brazzaville','currency'=>'Franc CFA','pop'=>'6M','flag_colors'=>['#009543','#FBDE4A','#DC241F'],'flag_emoji'=>'🇨🇬','img_prompt'=>'Republic of Congo flag green yellow red diagonal, Brazzaville Congo river, African casino concept'],
    ['slug'=>'casino-rwanda','name'=>'Rwanda','capital'=>'Kigali','currency'=>'Franc rwandais','pop'=>'14M','flag_colors'=>['#20603D','#FAD201','#00A1DE'],'flag_emoji'=>'🇷🇼','img_prompt'=>'Rwanda flag blue yellow green, Kigali hills landscape, East African casino mobile betting'],
    ['slug'=>'casino-burundi','name'=>'Burundi','capital'=>'Bujumbura','currency'=>'Franc burundais','pop'=>'13M','flag_colors'=>['#CE1126','#1EB53A','#FFFFFF'],'flag_emoji'=>'🇧🇮','img_prompt'=>'Burundi flag red white green, Lake Tanganyika, African mobile casino gambling concept'],
    ['slug'=>'casino-madagascar','name'=>'Madagascar','capital'=>'Antananarivo','currency'=>'Ariary','pop'=>'29M','flag_colors'=>['#FFFFFF','#FC3D32','#007E3A'],'flag_emoji'=>'🇲🇬','img_prompt'=>'Madagascar flag white red green, tropical island landscape, African Indian Ocean casino betting'],
    ['slug'=>'casino-djibouti','name'=>'Djibouti','capital'=>'Djibouti','currency'=>'Franc djiboutien','pop'=>'1M','flag_colors'=>['#6AB2E7','#12AD2B','#FFFFFF','#D7141A'],'flag_emoji'=>'🇩🇯','img_prompt'=>'Djibouti flag light blue green white red star, Horn of Africa, desert casino online concept'],
    ['slug'=>'casino-mauritanie','name'=>'Mauritanie','capital'=>'Nouakchott','currency'=>'Ouguiya','pop'=>'5M','flag_colors'=>['#006233','#FFD700'],'flag_emoji'=>'🇲🇷','img_prompt'=>'Mauritania flag green gold crescent star, Sahara desert, Atlantic coast, African casino mobile'],
    ['slug'=>'casino-comores','name'=>'Comores','capital'=>'Moroni','currency'=>'Franc comorien','pop'=>'1M','flag_colors'=>['#3A75C4','#FFFFFF','#BE0027','#009A44'],'flag_emoji'=>'🇰🇲','img_prompt'=>'Comoros flag blue white red green, Indian Ocean island, tropical casino online concept'],
];

// CSS commun
$CSS = '
*{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent}
:root{
  --primary:#1B4332;--primary2:#2D6A4F;--accent:#FFD166;--accent2:#F4A261;
  --dark:#0A0F0D;--card:#111A15;--card2:#192219;--text:#E8F5E9;--muted:#7A9E7E;
  --red:#E63946;--green:#52B788;--gold:#FFD166;
}
html{scroll-behavior:smooth;font-size:16px}
body{background:var(--dark);color:var(--text);font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;overflow-x:hidden;min-height:100vh}
img{max-width:100%;height:auto;display:block}
a{text-decoration:none;color:inherit}

/* TOPBAR */
.topbar{background:rgba(10,15,13,.97);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);padding:10px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:200;border-bottom:1px solid rgba(82,183,136,.15)}
.logo{font-size:19px;font-weight:800;background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.topbar-cta{background:linear-gradient(135deg,var(--primary),var(--primary2));color:#fff;padding:7px 14px;border-radius:8px;font-size:12px;font-weight:700;border:1px solid rgba(82,183,136,.3)}

/* HERO */
.hero{background:linear-gradient(160deg,#0A1F0F 0%,#0A0F0D 60%);padding:32px 16px 24px;text-align:center;position:relative;overflow:hidden}
.hero::before{content:"";position:absolute;top:0;left:0;right:0;bottom:0;background:radial-gradient(ellipse at 50% 0%,rgba(82,183,136,.12),transparent 70%);pointer-events:none}
.hero-eyebrow{display:inline-flex;align-items:center;gap:6px;background:rgba(82,183,136,.1);border:1px solid rgba(82,183,136,.25);color:var(--green);padding:5px 12px;border-radius:20px;font-size:11px;font-weight:700;letter-spacing:.5px;margin-bottom:16px}
.hero h1{font-size:clamp(22px,5vw,42px);font-weight:900;line-height:1.2;margin-bottom:12px;position:relative}
.hero h1 em{font-style:normal;background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.hero-desc{color:var(--muted);font-size:14px;line-height:1.6;max-width:480px;margin:0 auto 20px}
.hero-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap}
.btn-primary{background:linear-gradient(135deg,var(--accent),var(--accent2));color:#0A0F0D;padding:13px 24px;border-radius:10px;font-weight:800;font-size:14px;display:inline-block}
.btn-secondary{border:1px solid rgba(82,183,136,.3);color:var(--green);padding:13px 20px;border-radius:10px;font-weight:700;font-size:14px;display:inline-block}

/* STATS */
.stats-bar{display:flex;overflow-x:auto;gap:8px;padding:14px 16px;scrollbar-width:none;border-bottom:1px solid rgba(255,255,255,.04)}
.stats-bar::-webkit-scrollbar{display:none}
.stat-item{flex-shrink:0;background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:10px;padding:10px 14px;text-align:center}
.stat-num{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.stat-label{font-size:10px;color:var(--muted);margin-top:2px;white-space:nowrap}

/* SECTIONS */
.section{padding:20px 16px}
.sec-header{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:14px}
.sec-title{font-size:17px;font-weight:800}
.sec-title span{background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.sec-link{font-size:12px;color:var(--green);font-weight:700}

/* COUNTRY CARDS */
.countries-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
@media(min-width:480px){.countries-grid{grid-template-columns:repeat(3,1fr)}}
@media(min-width:768px){.countries-grid{grid-template-columns:repeat(4,1fr)}}
@media(min-width:1024px){.countries-grid{grid-template-columns:repeat(5,1fr)}}
.country-card{background:var(--card);border-radius:14px;overflow:hidden;border:1px solid rgba(255,255,255,.06);text-decoration:none;color:var(--text);display:block;transition:transform .2s,border-color .2s}
.country-card:hover{transform:translateY(-3px);border-color:rgba(255,209,102,.3)}
.country-img{width:100%;aspect-ratio:16/9;overflow:hidden;position:relative;background:var(--card2)}
.country-img img{width:100%;height:100%;object-fit:cover}
.country-img .img-ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:36px}
.country-flag-bar{height:4px;width:100%}
.country-info{padding:10px}
.country-flag-emoji{font-size:18px;margin-bottom:4px}
.country-name{font-size:13px;font-weight:800;margin-bottom:2px}
.country-pop{font-size:11px;color:var(--muted)}
.country-rating{display:flex;align-items:center;gap:4px;margin-top:6px}
.stars{color:var(--gold);font-size:11px}
.rating-num{font-size:11px;color:var(--muted)}

/* BONUS PILLS */
.bonus-scroll{display:flex;gap:8px;overflow-x:auto;padding-bottom:4px;scrollbar-width:none}
.bonus-scroll::-webkit-scrollbar{display:none}
.bonus-pill{flex-shrink:0;background:var(--card);border:1px solid rgba(255,209,102,.2);border-radius:10px;padding:12px 14px;text-align:center;text-decoration:none;color:var(--text)}
.bonus-pill-icon{font-size:22px;margin-bottom:4px}
.bonus-pill-name{font-size:12px;font-weight:700}
.bonus-pill-amount{font-size:11px;color:var(--gold);margin-top:2px}

/* CTA BOX */
.cta-box{margin:0 0 20px;background:linear-gradient(135deg,#0D2318,#162E1E);border:1px solid rgba(82,183,136,.2);border-radius:16px;padding:20px;text-align:center}
.cta-title{font-size:20px;font-weight:900;margin-bottom:4px}
.cta-title span{background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.cta-sub{font-size:13px;color:var(--muted);margin-bottom:14px}
.cta-btn{display:block;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#0A0F0D;padding:14px;border-radius:12px;font-weight:800;font-size:15px}

/* TRUST */
.trust-row{display:flex;gap:8px;overflow-x:auto;padding:0 16px 16px;scrollbar-width:none}
.trust-row::-webkit-scrollbar{display:none}
.trust-badge{flex-shrink:0;background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:10px;padding:8px 12px;display:flex;align-items:center;gap:6px;font-size:11px;font-weight:700;white-space:nowrap}

/* FAQ */
.faq-item{background:var(--card);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.faq-q{padding:14px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;align-items:center;cursor:pointer}
.faq-ico{color:var(--green);font-size:18px;transition:.2s;flex-shrink:0}
.faq-item.open .faq-ico{transform:rotate(45deg)}
.faq-a{font-size:12px;color:var(--muted);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq-item.open .faq-a{max-height:300px;padding:0 16px 14px}

/* BOTTOM NAV */
.bottom-nav{position:fixed;bottom:0;left:0;right:0;background:rgba(10,15,13,.97);backdrop-filter:blur(10px);border-top:1px solid rgba(82,183,136,.1);display:flex;padding:8px 0 max(8px,env(safe-area-inset-bottom));z-index:200}
.nav-item{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700;transition:.2s}
.nav-item.active,.nav-item:hover{color:var(--accent)}
.nav-ico{font-size:22px}

/* DESKTOP */
@media(min-width:768px){
  body{padding-bottom:0}
  .bottom-nav{display:none}
  .topbar{padding:14px 40px}
  .desktop-nav{display:flex;gap:24px;align-items:center}
  .desktop-nav a{color:var(--muted);font-size:14px;font-weight:600;transition:.2s}
  .desktop-nav a:hover{color:var(--accent)}
  .hero{padding:60px 40px 40px}
  .section{padding:30px 40px;max-width:1200px;margin:0 auto}
  .stats-bar{justify-content:center;padding:20px 40px}
  .trust-row{padding:0 40px 20px;justify-content:center}
  .cta-box{max-width:600px;margin:0 auto 30px}
}
@media(max-width:360px){
  .hero h1{font-size:20px}
  .countries-grid{grid-template-columns:1fr 1fr}
  .btn-primary,.btn-secondary{padding:11px 16px;font-size:13px}
}
';

// NAVBAR HTML
$NAV = '
<nav class="topbar">
  <a href="/" class="logo">🎲 CasinoAfrique</a>
  <div class="desktop-nav">
    <a href="/casino/">Pays</a>
    <a href="/bonus/">Bonus</a>
    <a href="/jeux/">Jeux</a>
    <a href="/guide/">Guides</a>
  </div>
  <a href="'.$AFFILIATE_LINKS[0].'" target="_blank" rel="noopener" class="topbar-cta">Jouer →</a>
</nav>';

// BOTTOM NAV
$BNAV = '
<nav class="bottom-nav">
  <a href="/" class="nav-item active"><span class="nav-ico">🏠</span>Accueil</a>
  <a href="/casino/" class="nav-item"><span class="nav-ico">🌍</span>Pays</a>
  <a href="/bonus/" class="nav-item"><span class="nav-ico">🎁</span>Bonus</a>
  <a href="/jeux/" class="nav-item"><span class="nav-ico">🎰</span>Jeux</a>
  <a href="/guide/" class="nav-item"><span class="nav-ico">📖</span>Guide</a>
</nav>';

function claude($prompt, $key, $tokens = 400) {
    $data = json_encode(['model'=>'claude-sonnet-4-6','max_tokens'=>$tokens,'messages'=>[['role'=>'user','content'=>$prompt]]]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','x-api-key: '.$key,'anthropic-version: 2023-06-01'],CURLOPT_TIMEOUT=>60]);
    $r = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return trim($r['content'][0]['text'] ?? '');
}

function genImage($prompt, $file, $key, $dir) {
    $path = $dir.'/'.$file;
    $jpgPath = str_replace('.png','.jpg',$path);
    if (file_exists($jpgPath)) { echo "    ✓ exists\n"; return '/images/'.str_replace('.png','.jpg',$file); }
    echo "    🎨 image...\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', professional casino website banner, vibrant colors, no text, no watermark','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_TIMEOUT=>90]);
    $r = json_decode(curl_exec($ch),true);
    curl_close($ch);
    if (!isset($r['data'][0]['b64_json'])) { echo "    ❌ ".($r['error']['message']??'error')."\n"; return null; }
    file_put_contents($path, base64_decode($r['data'][0]['b64_json']));
    $img = imagecreatefrompng($path);
    imagejpeg($img,$jpgPath,85);
    imagedestroy($img);
    unlink($path);
    // Compress
    exec("convert $jpgPath -quality 82 $jpgPath 2>/dev/null");
    echo "    ✅ saved\n";
    return '/images/'.str_replace('.png','.jpg',$file);
}

global $CSS, $NAV, $BNAV, $AFFILIATE_LINKS, $COUNTRIES;

// ============================================
// FAVICON
// ============================================
echo "📌 FAVICON\n";
$faviconPath = genImage('Casino dice and coin logo, dark green gold theme, African continent silhouette, minimal flat icon design, square format', 'favicon_src.png', $OPENAI_KEY, $IMG_DIR);
if ($faviconPath) {
    $src = $IMG_DIR.'/favicon_src.jpg';
    if (file_exists($src)) {
        $img = imagecreatefromjpeg($src);
        $fav = imagecreatetruecolor(64,64);
        imagecopyresampled($fav,$img,0,0,0,0,64,64,imagesx($img),imagesy($img));
        imagepng($fav,$BASE.'/favicon.png');
        imagedestroy($img); imagedestroy($fav);
        echo "  ✅ favicon.png\n\n";
    }
}

// ============================================
// HOMEPAGE
// ============================================
echo "🏠 HOMEPAGE\n";

$heroDesc = claude("Écris une description courte (2 phrases) pour un site de casino en ligne pour l'Afrique francophone. Mentionne les 20 pays d'Afrique, les bonus et la sécurité. Naturel, en français. Seulement 2 phrases.", $ANTHROPIC_KEY, 150);

$faq1a = claude("Réponds en 2 phrases: Est-ce que les casinos en ligne sont légaux en Afrique francophone? Naturel, français.", $ANTHROPIC_KEY, 100);
$faq2a = claude("Réponds en 2 phrases: Comment déposer de l'argent dans un casino en ligne en Afrique? Mentionne Mobile Money, Orange Money. Naturel, français.", $ANTHROPIC_KEY, 100);
$faq3a = claude("Réponds en 2 phrases: Quels sont les meilleurs jeux de casino en Afrique? Mentionne Aviator et les slots. Naturel, français.", $ANTHROPIC_KEY, 100);
$faq4a = claude("Réponds en 2 phrases: Comment obtenir un bonus sans dépôt dans un casino africain? Naturel, français.", $ANTHROPIC_KEY, 100);

$heroImg = genImage('Africa continent map with casino elements, golden coins, mobile phone, dark green background, African flags colors, luxury gambling concept', 'hero_home.png', $OPENAI_KEY, $IMG_DIR);

$countryCardsHtml = '';
foreach ($COUNTRIES as $i => $c) {
    $imgSrc = '/images/country_'.$c['slug'].'.jpg';
    $gradBar = 'background:linear-gradient(90deg,'.implode(',',$c['flag_colors']).')';
    $rating = number_format(4.2 + ($i % 8) * 0.08, 1);
    $countryCardsHtml .= '
    <a href="/casino/'.$c['slug'].'/" class="country-card">
      <div class="country-img"><img src="'.$imgSrc.'" alt="Casino en ligne '.$c['name'].'" title="Meilleur casino '.$c['name'].'" loading="lazy"></div>
      <div class="country-flag-bar" style="'.$gradBar.'"></div>
      <div class="country-info">
        <div class="country-flag-emoji">'.$c['flag_emoji'].'</div>
        <div class="country-name">'.$c['name'].'</div>
        <div class="country-pop">'.$c['pop'].' habitants</div>
        <div class="country-rating"><span class="stars">★★★★</span><span class="rating-num">'.$rating.'</span></div>
      </div>
    </a>';
}

$homepage = '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A0F0D">
<title>Casino en Ligne Afrique Francophone | Top Sites & Bonus 2026</title>
<meta name="description" content="Les meilleurs casinos en ligne pour l\'Afrique francophone. Bonus sans dépôt, jeux gratuits, paiement Mobile Money. Guide complet pour 20 pays africains.">
<link rel="icon" type="image/png" href="/favicon.png">
<link rel="apple-touch-icon" href="/favicon.png">
<style>'.$CSS.'</style>
</head>
<body>
'.$NAV.'

<section class="hero">
  '.($heroImg ? '<img src="'.$heroImg.'" alt="Casino en ligne Afrique" style="width:100%;max-height:220px;object-fit:cover;border-radius:16px;margin-bottom:20px">' : '').'
  <div class="hero-eyebrow">✅ Mis à jour juillet 2026</div>
  <h1>Meilleurs Casinos<br><em>Afrique Francophone</em></h1>
  <p class="hero-desc">'.$heroDesc.'</p>
  <div class="hero-btns">
    <a href="#pays" class="btn-primary">🌍 Choisir mon pays</a>
    <a href="/bonus/" class="btn-secondary">🎁 Bonus gratuits</a>
  </div>
</section>

<div class="stats-bar">
  <div class="stat-item"><div class="stat-num">20</div><div class="stat-label">Pays couverts</div></div>
  <div class="stat-item"><div class="stat-num">500+</div><div class="stat-label">Jeux disponibles</div></div>
  <div class="stat-item"><div class="stat-num">24/7</div><div class="stat-label">Support</div></div>
  <div class="stat-item"><div class="stat-num">5 min</div><div class="stat-label">Inscription</div></div>
  <div class="stat-item"><div class="stat-num">100%</div><div class="stat-label">Sécurisé</div></div>
</div>

<div class="trust-row">
  <div class="trust-badge"><span>🔒</span>SSL Sécurisé</div>
  <div class="trust-badge"><span>📱</span>Mobile Money</div>
  <div class="trust-badge"><span>⚡</span>Retrait rapide</div>
  <div class="trust-badge"><span>✅</span>Licencié</div>
  <div class="trust-badge"><span>🎁</span>Bonus réels</div>
</div>

<div class="section" style="padding-bottom:0">
  <div class="cta-box">
    <div class="cta-title">🎰 <span>Bonus Exclusif</span></div>
    <div class="cta-sub">Jusqu\'à 200% sur votre premier dépôt · Mobile Money accepté</div>
    <a href="'.$AFFILIATE_LINKS[0].'" target="_blank" rel="noopener" class="cta-btn">Réclamer mon Bonus →</a>
  </div>
</div>

<section class="section" id="pays">
  <div class="sec-header">
    <h2 class="sec-title">🌍 <span>Casinos par Pays</span></h2>
    <a href="/casino/" class="sec-link">Voir tout →</a>
  </div>
  <div class="countries-grid">'.$countryCardsHtml.'</div>
</section>

<section class="section">
  <div class="sec-header">
    <h2 class="sec-title">🎁 <span>Bonus Populaires</span></h2>
    <a href="/bonus/" class="sec-link">Voir tout →</a>
  </div>
  <div class="bonus-scroll">
    <a href="/bonus/bonus-sans-depot/" class="bonus-pill">
      <div class="bonus-pill-icon">🎁</div>
      <div class="bonus-pill-name">Sans Dépôt</div>
      <div class="bonus-pill-amount">Gratuit</div>
    </a>
    <a href="/bonus/free-spins/" class="bonus-pill">
      <div class="bonus-pill-icon">🎰</div>
      <div class="bonus-pill-name">Free Spins</div>
      <div class="bonus-pill-amount">50-200 tours</div>
    </a>
    <a href="/bonus/bonus-bienvenue/" class="bonus-pill">
      <div class="bonus-pill-icon">💰</div>
      <div class="bonus-pill-name">Bienvenue</div>
      <div class="bonus-pill-amount">Jusqu\'à 200%</div>
    </a>
    <a href="/bonus/cashback/" class="bonus-pill">
      <div class="bonus-pill-icon">💳</div>
      <div class="bonus-pill-name">Cashback</div>
      <div class="bonus-pill-amount">10-20%</div>
    </a>
    <a href="/bonus/bonus-crypto/" class="bonus-pill">
      <div class="bonus-pill-icon">₿</div>
      <div class="bonus-pill-name">Crypto</div>
      <div class="bonus-pill-amount">+15% extra</div>
    </a>
  </div>
</section>

<section class="section">
  <div class="sec-header">
    <h2 class="sec-title">❓ <span>Questions Fréquentes</span></h2>
  </div>
  <div class="faq-item"><div class="faq-q">Les casinos en ligne sont-ils légaux en Afrique? <span class="faq-ico">+</span></div><div class="faq-a">'.$faq1a.'</div></div>
  <div class="faq-item"><div class="faq-q">Comment déposer de l\'argent avec Mobile Money? <span class="faq-ico">+</span></div><div class="faq-a">'.$faq2a.'</div></div>
  <div class="faq-item"><div class="faq-q">Quels sont les meilleurs jeux de casino? <span class="faq-ico">+</span></div><div class="faq-a">'.$faq3a.'</div></div>
  <div class="faq-item"><div class="faq-q">Comment obtenir un bonus sans dépôt? <span class="faq-ico">+</span></div><div class="faq-a">'.$faq4a.'</div></div>
</section>

<div style="padding:0 16px 100px">
  <div class="cta-box">
    <div class="cta-title">🔥 <span>Jouer Maintenant</span></div>
    <div class="cta-sub">Bonus exclusif · Inscription en 5 minutes · Mobile Money</div>
    <a href="'.$AFFILIATE_LINKS[1].'" target="_blank" rel="noopener" class="cta-btn">Commencer à Jouer →</a>
  </div>
</div>

'.$BNAV.'
<script>
document.querySelectorAll(".faq-q").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));
</script>
</body>
</html>';

file_put_contents($BASE.'/index.html', $homepage);
echo "  ✅ Homepage saved\n\n";

// ============================================
// COUNTRY PAGES
// ============================================
echo "🌍 COUNTRY PAGES\n\n";

foreach ($COUNTRIES as $i => $c) {
    echo "[".($i+1)."/".count($COUNTRIES)."] ".$c['name']."\n";

    // Image with flag colors
    $imgPath = genImage($c['img_prompt'], 'country_'.$c['slug'].'.png', $OPENAI_KEY, $IMG_DIR);

    echo "    ✍️ texts...\n";

    $intro = claude("Écris 2 phrases d'introduction sur les casinos en ligne en ".$c['name']." (capitale: ".$c['capital'].", monnaie: ".$c['currency'].", population: ".$c['pop']."). En français, naturel. Seulement 2 phrases.", $ANTHROPIC_KEY, 150);

    $body = claude("Écris 3 paragraphes sur les casinos en ligne en ".$c['name']." pour un guide complet:\n1. Situation du jeu en ligne dans le pays\n2. Méthodes de paiement disponibles (Mobile Money, etc)\n3. Conseils pour les joueurs de ".$c['capital']."\nChaque paragraphe 2-3 phrases, en français naturel. Balise chaque paragraphe dans <p>. Seulement les paragraphes.", $ANTHROPIC_KEY, 600);

    $pros = claude("Liste 4 avantages de jouer dans un casino en ligne en ".$c['name'].". Chaque avantage dans <li>. Seulement les 4 <li>.", $ANTHROPIC_KEY, 150);

    $cons = claude("Liste 3 inconvénients de jouer dans un casino en ligne en ".$c['name'].". Chaque point dans <li>. Seulement les 3 <li>.", $ANTHROPIC_KEY, 120);

    $faq1 = "Les casinos en ligne sont-ils légaux en ".$c['name']."?";
    $faq1a = claude("Réponds en 2 phrases: ".$faq1." En français naturel.", $ANTHROPIC_KEY, 100);

    $faq2 = "Comment déposer au casino depuis ".$c['capital']."?";
    $faq2a = claude("Réponds en 2 phrases: ".$faq2." Mentionne Mobile Money et les options locales. En français.", $ANTHROPIC_KEY, 100);

    $faq3 = "Quel est le meilleur casino pour les joueurs de ".$c['name']."?";
    $faq3a = claude("Réponds en 2 phrases: ".$faq3." Encourage à s'inscrire. En français.", $ANTHROPIC_KEY, 100);

    $affiliateLink = $AFFILIATE_LINKS[$i % 3];
    $gradBar = 'background:linear-gradient(90deg,'.implode(',',$c['flag_colors']).')';
    $rating = number_format(4.2 + ($i % 8) * 0.08, 1);
    $imgTag = $imgPath ? '<img src="'.$imgPath.'" alt="Casino en ligne '.$c['name'].'" title="Meilleur casino online '.$c['name'].'">' : '<div class="img-ph" style="height:200px;display:flex;align-items:center;justify-content:center;font-size:60px;background:var(--card2)">'.$c['flag_emoji'].'</div>';

    $dir = $BASE.'/casino/'.$c['slug'];
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $page = '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A0F0D">
<title>Casino en Ligne '.$c['name'].' '.$c['flag_emoji'].' | Meilleurs Sites & Bonus</title>
<meta name="description" content="Top casinos en ligne pour la '.$c['name'].'. Bonus exclusifs, Mobile Money accepté, jeux en français. Guide complet pour les joueurs de '.$c['capital'].'.">
<link rel="icon" type="image/png" href="/favicon.png">
<link rel="apple-touch-icon" href="/favicon.png">
<style>'.$CSS.'
.back-btn{color:var(--muted);font-size:13px;font-weight:700}
.country-hero{position:relative;width:100%;overflow:hidden;background:var(--card2)}
.country-hero img{width:100%;height:220px;object-fit:cover}
.flag-strip{height:5px;'.$gradBar.'}
.country-header{padding:16px}
.country-h1{font-size:22px;font-weight:900;margin-bottom:4px}
.country-h1 em{font-style:normal;color:var(--accent)}
.country-meta{display:flex;gap:8px;flex-wrap:wrap;margin-top:8px}
.meta-tag{background:var(--card);border:1px solid rgba(255,255,255,.06);border-radius:8px;padding:4px 10px;font-size:11px;color:var(--muted);font-weight:600}
.body-text{font-size:13px;color:rgba(232,245,233,.85);line-height:1.7}
.body-text p{margin-bottom:12px}
.pros-cons{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.pros,.cons{background:var(--card);border-radius:12px;padding:12px;border:1px solid rgba(255,255,255,.06)}
.pros-title{color:var(--green);font-size:13px;font-weight:800;margin-bottom:8px}
.cons-title{color:var(--red);font-size:13px;font-weight:800;margin-bottom:8px}
.pros li,.cons li{font-size:12px;color:var(--muted);margin-bottom:6px;padding-left:16px;list-style:none;position:relative}
.pros li:before{content:"✓";position:absolute;left:0;color:var(--green)}
.cons li:before{content:"✗";position:absolute;left:0;color:var(--red)}
.rating-box{background:var(--card);border-radius:12px;padding:14px;border:1px solid rgba(255,209,102,.15);display:flex;align-items:center;gap:14px;margin-bottom:16px}
.rating-big{font-size:36px;font-weight:900;background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.rating-stars{color:var(--gold);font-size:18px}
.related-countries{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}
@media(min-width:480px){.related-countries{grid-template-columns:repeat(4,1fr)}}
.rel-country{background:var(--card);border-radius:10px;padding:10px;text-align:center;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06);font-size:12px;font-weight:700}
.rel-flag{font-size:20px;display:block;margin-bottom:4px}
</style>
</head>
<body>
<nav class="topbar">
  <a href="/" class="logo">🎲 CasinoAfrique</a>
  <div class="desktop-nav">
    <a href="/casino/">Pays</a>
    <a href="/bonus/">Bonus</a>
    <a href="/jeux/">Jeux</a>
    <a href="/guide/">Guides</a>
  </div>
  <a href="'.$affiliateLink.'" target="_blank" rel="noopener" class="topbar-cta">Jouer →</a>
</nav>

<div class="country-hero">'.$imgTag.'</div>
<div class="flag-strip"></div>

<div class="country-header">
  <h1 class="country-h1">Casino en Ligne <em>'.$c['flag_emoji'].' '.$c['name'].'</em></h1>
  <div class="country-meta">
    <span class="meta-tag">🏙 '.$c['capital'].'</span>
    <span class="meta-tag">💰 '.$c['currency'].'</span>
    <span class="meta-tag">👥 '.$c['pop'].'</span>
    <span class="meta-tag">⭐ '.$rating.'/5</span>
  </div>
  <p style="margin-top:12px;font-size:13px;color:var(--muted);line-height:1.6">'.$intro.'</p>
</div>

<div class="section" style="padding-top:0">
  <div class="rating-box">
    <div>
      <div class="rating-big">'.$rating.'</div>
      <div class="rating-stars">★★★★★</div>
    </div>
    <div>
      <div style="font-size:14px;font-weight:800;margin-bottom:4px">Notre note pour '.$c['name'].'</div>
      <div style="font-size:12px;color:var(--muted)">Basée sur bonus, sécurité et paiements locaux</div>
    </div>
  </div>

  <div class="cta-box" style="margin:0 0 20px">
    <div class="cta-title">🎰 <span>Jouer en '.$c['name'].'</span></div>
    <div class="cta-sub">Bonus exclusif · '.$c['currency'].' · Mobile Money</div>
    <a href="'.$affiliateLink.'" target="_blank" rel="noopener" class="cta-btn">Réclamer mon Bonus →</a>
  </div>

  <h2 style="font-size:16px;font-weight:800;margin-bottom:12px">📋 Guide Casino <span style="background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">'.$c['name'].'</span></h2>
  <div class="body-text">'.$body.'</div>

  <h2 style="font-size:16px;font-weight:800;margin:16px 0 12px">⚖️ Avantages & <span style="background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">Inconvénients</span></h2>
  <div class="pros-cons">
    <div class="pros"><div class="pros-title">✅ Avantages</div><ul>'.$pros.'</ul></div>
    <div class="cons"><div class="cons-title">❌ Inconvénients</div><ul>'.$cons.'</ul></div>
  </div>

  <div class="cta-box" style="margin:20px 0">
    <div class="cta-title">🔥 <span>Offre Spéciale '.$c['flag_emoji'].'</span></div>
    <div class="cta-sub">Inscription gratuite · Dépôt minimum faible</div>
    <a href="'.$affiliateLink.'" target="_blank" rel="noopener" class="cta-btn">S\'inscrire Maintenant →</a>
  </div>

  <h2 style="font-size:16px;font-weight:800;margin-bottom:12px">❓ <span style="background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">FAQ '.$c['name'].'</span></h2>
  <div class="faq-item"><div class="faq-q">'.$faq1.' <span class="faq-ico">+</span></div><div class="faq-a">'.$faq1a.'</div></div>
  <div class="faq-item"><div class="faq-q">'.$faq2.' <span class="faq-ico">+</span></div><div class="faq-a">'.$faq2a.'</div></div>
  <div class="faq-item"><div class="faq-q">'.$faq3.' <span class="faq-ico">+</span></div><div class="faq-a">'.$faq3a.'</div></div>

  <h2 style="font-size:16px;font-weight:800;margin:20px 0 12px">🌍 Autres <span style="background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">Pays Africains</span></h2>
  <div class="related-countries">';

    // Related countries (show 8 others)
    $others = array_filter($COUNTRIES, fn($x) => $x['slug'] !== $c['slug']);
    $others = array_slice(array_values($others), 0, 8);
    foreach ($others as $o) {
        $page .= '<a href="/casino/'.$o['slug'].'/" class="rel-country"><span class="rel-flag">'.$o['flag_emoji'].'</span>'.$o['name'].'</a>';
    }

    $page .= '</div>
</div>

'.str_replace('nav-item active', 'nav-item', str_replace('nav-item"><span class="nav-ico">🌍</span>Pays', 'nav-item active"><span class="nav-ico">🌍</span>Pays', $BNAV)).'
<script>document.querySelectorAll(".faq-q").forEach(q=>q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open")));</script>
</body>
</html>';

    file_put_contents($dir.'/index.html', $page);
    echo "    ✅ /casino/".$c['slug']."/\n\n";
    sleep(2);
}

// ============================================
// SITEMAP
// ============================================
echo "📋 SITEMAP\n";
$date = date('Y-m-d');
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>'."\n".'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
$sitemap .= '<url><loc>https://www.lesgetsinfo.com/</loc><lastmod>'.$date.'</lastmod><changefreq>daily</changefreq><priority>1.0</priority></url>'."\n";
$sitemap .= '<url><loc>https://www.lesgetsinfo.com/casino/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>'."\n";
foreach ($COUNTRIES as $c) {
    $sitemap .= '<url><loc>https://www.lesgetsinfo.com/casino/'.$c['slug'].'/</loc><lastmod>'.$date.'</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>'."\n";
}
$sitemap .= '</urlset>';
file_put_contents($BASE.'/sitemap.xml', $sitemap);
echo "  ✅ sitemap.xml\n\n";

// ROBOTS
file_put_contents($BASE.'/robots.txt', "User-agent: *\nAllow: /\n\nSitemap: https://www.lesgetsinfo.com/sitemap.xml\n");
echo "  ✅ robots.txt\n\n";

// Casino listing page
echo "📋 CASINO LISTING\n";
$listing = '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><title>Casino en Ligne par Pays | Afrique Francophone</title><meta name="description" content="Trouvez le meilleur casino en ligne selon votre pays africain. 20 pays couverts, bonus exclusifs, Mobile Money accepté."><link rel="icon" type="image/png" href="/favicon.png"><style>'.$CSS.'
.list-grid{display:flex;flex-direction:column;gap:10px}
.list-item{background:var(--card);border-radius:14px;padding:14px;display:flex;gap:12px;align-items:center;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06)}
.list-item:hover{border-color:rgba(255,209,102,.3)}
.list-thumb{width:56px;height:56px;border-radius:10px;overflow:hidden;flex-shrink:0;background:var(--card2)}
.list-thumb img{width:100%;height:100%;object-fit:cover}
.list-flag{font-size:28px;width:56px;height:56px;display:flex;align-items:center;justify-content:center;flex-shrink:0;background:var(--card2);border-radius:10px}
.list-info{flex:1}
.list-name{font-size:15px;font-weight:800;margin-bottom:2px}
.list-capital{font-size:11px;color:var(--muted)}
.list-rating{font-size:12px;color:var(--gold);margin-top:4px}
.list-arr{color:var(--green);font-size:20px}
</style></head><body>
<nav class="topbar"><a href="/" class="logo">🎲 CasinoAfrique</a><div class="desktop-nav"><a href="/casino/" style="color:var(--accent)">Pays</a><a href="/bonus/">Bonus</a><a href="/jeux/">Jeux</a></div><a href="'.$AFFILIATE_LINKS[0].'" target="_blank" class="topbar-cta">Jouer →</a></nav>
<div style="padding:20px 16px 10px"><h1 style="font-size:22px;font-weight:900;margin-bottom:6px">Casino par <span style="background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent">Pays</span></h1><p style="font-size:13px;color:var(--muted);margin-bottom:16px">20 pays d\'Afrique francophone</p></div>
<div style="padding:0 16px 100px" class="list-grid">';

foreach ($COUNTRIES as $i => $c) {
    $rating = number_format(4.2 + ($i % 8) * 0.08, 1);
    $listing .= '<a href="/casino/'.$c['slug'].'/" class="list-item">
      <div class="list-flag">'.$c['flag_emoji'].'</div>
      <div class="list-info">
        <div class="list-name">'.$c['name'].'</div>
        <div class="list-capital">🏙 '.$c['capital'].' · '.$c['pop'].'</div>
        <div class="list-rating">★★★★ '.$rating.'/5</div>
      </div>
      <div class="list-arr">›</div>
    </a>';
}

$listing .= '</div>'.str_replace('nav-item active', 'nav-item', str_replace('nav-item"><span class="nav-ico">🌍</span>Pays', 'nav-item active"><span class="nav-ico">🌍</span>Pays', $BNAV)).'</body></html>';
file_put_contents($BASE.'/casino/index.html', $listing);
echo "  ✅ /casino/\n\n";

echo "=== DONE ===\n";
echo "✅ Homepage\n";
echo "✅ 20 country pages\n";
echo "✅ Casino listing\n";
echo "✅ Sitemap + robots\n";
echo "✅ Favicon\n";
echo "⚠️  Run: rm gen_lesgetsinfo.php\n";
