<?php

function days( $time ) {
	$now = strtotime ( 'today' );
	return ($time - $now)/60/60/24;
}

$content = array(
	'days' => 0,
	'titletext' => '',
	'background_image_path' => 'brasil.jpg',
	'meta_description' => 'Immer wieder werde ich gefragt, wieviele Tage es noch sind bis zu WM. Hier ist die Antwort.',
	'fb_image_src' => 'http://wottzefack.de/wm/brasil_share.jpg',
	'image_background_class' => 'is-overlay',
	'main_pre_text' => '',
	'main_text' => '',
	'main_post_text' => '',
	'foto_credit' => '',
	'ga_code' => "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-51081104-1', 'wottzefack.de');
		ga('send', 'pageview');'",
);

$start_date = strtotime ( '12 June 2014' );
$final_date = strtotime ( '13 July 2014' );
$em_date = strtotime ( '10 June 2016' );

// before or at the start?
$content['days'] = days( $start_date );
if ( $content['days'] > 0 ) {
	// before
	$content['foto_credit'] = '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Bestimmte Rechte vorbehalten</a> von <a href="https://www.flickr.com/photos/marfis75/">marfis75</a>';
	$content['main_post_text'] = 'bis zur WM in Brasilien.';
	if( $content['days'] == 1) {
		$content['titletext'] = 'Es ist nur noch 1 Tag bis zur WM';
		$content['main_pre_text'] = 'Übrigens…, es ist nur noch';
		$content['main_text'] = '1 Tag';
		$content['foto_credit'] = '<a href="https://creativecommons.org/licenses/by-sa/2.0/">Bestimmte Rechte vorbehalten</a> von <a href="https://www.flickr.com/photos/marfis75/">marfis75</a>';
	} else {
		$content['titletext'] = 'Es sind nur noch ' . $content['days'] . ' Tage bis zur WM';
		$content['main_pre_text'] = 'Übrigens…, es sind nur noch';
		$content['main_text'] = $content['days'].' Tage';
	}
} else {
	//running, redefine end
	$content['days'] = days( $final_date );
	if( $content['days'] >= 0 ) {
		$content['background_image_path'] = 'arena.jpg';
		$content['foto_credit'] = '<a href="https://creativecommons.org/licenses/by/3.0/br/deed.en">Bestimmte Rechte vorbehalten</a> von <a href="http://www.copa2014.gov.br/pt-br/dinamic/galeria_imagem/15037">Erica Ramalho/Portal da Copa/Março de 2013</a>';
		$content['main_post_text'] = 'bis zum Endspiel.';
		if( $content['days'] == 31 ) {
			// starts today
			$content['titletext'] = 'Heute beginnt die WM in Brasilien';
			$content['main_pre_text'] = 'Hurra, heute beginnt die WM. Nun sind es nur noch';
			$content['main_text'] = $content['days'] . 'Tage';
		} elseif ( $content['days'] == 0 ) {
			$content['titletext'] = 'Heute Finale bei der WM in Brasilien';
			$content['main_pre_text'] = 'OK, es ist geschafft, heute ist das';
			$content['main_text'] = 'Finale !!!';
			$content['main_post_text'] = 'Hoffen wir das Beste.';
		} elseif ( $content['days'] == 1 ) {
			$content['titletext'] = 'Noch ' . $content['days'] . ' Tag WM in Brasilien';
			$content['main_pre_text'] = 'OK, die WM läuft. Nun ist es noch';
			$content['main_text'] = $content['days'] . 'Tag';
		} else {
			$content['titletext'] = 'Noch ' . $content['days'] . ' Tage WM in Brasilien';
			$content['main_pre_text'] = 'OK, die WM läuft. Nun sind es noch';
			$content['main_text'] = $content['days'] . 'Tage';
		}
	} else {
		// off, new date Eurocup
		$content['days'] = days( $em_date );
		$content['background_image_path'] = 'stade.jpg';
		$content['foto_credit'] = '<a href="https://creativecommons.org/licenses/by/2.0/">Bestimmte Rechte vorbehalten</a> von <a href="https://www.flickr.com/photos/krabiman/">Krabiman</a>';
		$content['titletext'] = 'Noch ' . $content['days'] . ' Tage bis zur EM in Frankreich';
		$content['main_pre_text'] = 'OK, das war\'s. Jetzt sind ist es wieder';
		$content['main_text'] = $content['days'] . 'Tage';
		$content['main_post_text'] = 'bis zur Europameisterschaft in Frankreich.';
		$content['image_background_class'] = "";
	}
}


?><!DOCTYPE html>
<html lang="de-De">
<head>
	<title><?=$content['titletext'];?></title>
	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
	<link href='http://fonts.googleapis.com/css?family=Cinzel:400,900' rel='stylesheet' type='text/css'>
	<style type="text/css">
		body {
			background: #4E654B url("<?=$content['background_image_path'];?>") center center fixed;
		}
	</style>
	<link href='styles.css' rel='stylesheet' type='text/css'>
	<meta name="robots" content="noodp,noydir"/>
	<meta name="description" content="<?=$content['meta_description'];?>"/>
	<meta property="og:locale" content="de_DE" />
	<meta property="og:site_name" content="WTF - Wottzefack">
	<meta property="og:type" content="article">
	<meta property="og:url" content="http://wottzefack.de/wm/">
	<link rel="image_src" href="<?=$content['fb_image_src'];?>">
	<meta property="og:title" content="<?=$content['titletext'];?>">
	<meta property="og:description" content="<?=$content['meta_description'];?>">
	<meta property="og:image" content="<?=$content['fb_image_src'];?>">
	<meta property="twitter:card" content="summary">
	<meta property="twitter:title" content="<?=$content['titletext'];?>">
	<meta property="twitter:description" content="<?=$content['meta_description'];?>">
	<meta property="twitter:image" content="<?=$content['fb_image_src'];?>">
	<meta name="twitter:site" content="@nicobruenjes"/>
	<meta name="twitter:domain" content="Nico Bruenjes"/>
	<meta name="twitter:creator" content="@nicobruenjes"/>
</head>

<body>
	<div class="<?=$content['image_background_class'];?>">
		<div class="content">
			<div class="content__text is--centered">
				<p><?=$content['main_pre_text'];?></p>
				<p class="content__text--highlight"><?=$content['main_text'];?></p>
				<p><?=$content['main_post_text'];?></p>
			</div>
		</div>
		<div class="copyright">
			<p class="copyright__text">Foto: <?=$content['foto_credit'];?>.</p>
		</div>
	</div>
	<script>
		<?=$content['ga_code'];?>
	</script>
</body>
</html>