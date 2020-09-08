<?php
	require './php/libs/external.php';
	require './php/db.php';

	$num_page  = CheckGetInt( $_GET['num_page'],  1,  1,  1000);
	$num_games = CheckGetInt( $_GET['num_games'], 36, 12, 240);
	$num_genre = CheckGetInt( $_GET['num_genre'], 0,  1,  22);

	$start_game = ( ( $num_page - 1 ) * $num_games );

	$genres_list = R::getAll('SELECT * FROM `genres`');

	if ($num_genre = 0) {
		// $games_info = R::getAll('') жанров пока нет
	}
	else{
		$games_data = R::getAll('SELECT * FROM `parserdata` LIMIT ?, ?', [ $start_game, $num_games ]);
	}

	$count_games = R::getCell('SELECT count("id") FROM `parserdata`'); 
	$last_page   = round( $count_games / $num_games );
?>

<!DOCTYPE html>

<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>MGS</title>
		<link rel="stylesheet" type="text/css" href="css/global-lib-buttons.css">
		<link rel="stylesheet" type="text/css" href="css/global-lib-forms.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/page-index.css">
	</head>

	<body class="global__body">
		<header class="global__header">
			<a href="index.html" class="global__header-logo">MGS</a>

			<div class="global__header-search">
				<input class="global__header-search-input" type="text" placeholder="найти игру...">
				<button class="global__header-search-btn btn btn-mc btn-dark-green">найти</button>

				<script src="js/search.js"></script>
			</div>
		</header>
		
		<aside class="global__aside">
			<nav class="global__aside-nav">
				<h3>Жанры игр</h3>

				<ul class="global__nav-list">
					<?php
						foreach ($genres_list as $genres_item) {
							print(<<<STR
								<li class="global__nav-list-item">
									<a href="index.php?num_genre={$genres_item['id']}&num_games={$num_games}">{$genres_item['genre']}</a>
								</li>
							STR);
						}
					?>
				</ul>
			</nav>
		</aside>

		<aside class="global__aside-right">
			<div class="global__top-games">
				<h3>
					Топ-5 игр
				</h3>

				<ul class="global__top-games-list">
					<li class="global__top-games-list-item">
						<a href="test">Minecraft</a>
					</li>
					<li class="global__top-games-list-item">
						<a href="test">Factorio</a>
					</li>
					<li class="global__top-games-list-item">
						<a href="test">The Wither 3</a>
					</li>
					<li class="global__top-games-list-item">
						<a href="test">Tera: the next</a>
					</li>
					<li class="global__top-games-list-item">
						<a href="test">Warzone 2100</a>
					</li>
				</ul>
			</div>
		</aside>

		<main class="global__main">
			<section class="global__main-section-header">
				<h2>Игры на сайте</h2>
			</section>

			<section class="global__main-section-games">
				<?php
					foreach ($games_data as $games_item) {
						print(<<<STR
							<div class="global__game-preview">
								<a href="article.php?id={$games_item['id']}">
									<img src="{$games_item['image_url']}" width="130" height="165" alt="{$games_item['name']}">
									<p>{$games_item['name']}</p>
								</a>
							</div>
						STR);
					}
				?>							
			</section>

			<section class="start-page__main-section-pages">
				<?php PrintPagesLinks($num_page, $last_page, $num_games, $num_genre); ?>
			</section>
		</main>

		<footer class="global__footer">
			<p>SergoIndustries</p>
			<p>2019-2020</p>
		</footer>
	</body>
</html>