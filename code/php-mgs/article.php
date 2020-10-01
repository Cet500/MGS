<?php
	require './php/db.php';

	$id = $_GET['id'];

	$game = R::getRow('SELECT * FROM `games` WHERE id = ?', [ $id ]);
?>

<!DOCTYPE html>

<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>MGS</title>
		<link rel="stylesheet" type="text/css" href="css/global-lib-buttons.css">
		<link rel="stylesheet" type="text/css" href="css/global-lib-forms.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/page-article.css">
	</head>
		
	<body class="global__body article__body">
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
					<li class="global__nav-list-item">
						<a href="test">FPS</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">RPG</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">RTS</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Аркады</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Выживание</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Гонки</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Для девочек</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Драки</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Зомби</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Квесты</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Логические</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Музыкальные</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">На двоих</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Приключение</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Симуляторы</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Спортивные</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Стелс</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Стратегии</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Танцы</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Ужасы</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Шутеры</a>
					</li>
					<li class="global__nav-list-item">
						<a href="test">Экшен</a>
					</li>
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

		<main class="global__main article__main">
			<section class="global__main-section-header article__main-header">
				<h2><?php print($game['name']) ?></h2>
			</section>

			<section class="article__main-artcover-game">
				<?php
					print('<img src="'.$game['image_url'].'" width="250" alt="Пример" align="left">');
				?>
			</section>

			<section class="article__main-info-game">
				<p>
					<b>Название:</b> 
					<?php print($game['name']) ?>
				</p>
				<p>
					<b>Год выхода:</b> 
					<?php print($game['year_relize']) ?>
				</p>
				<p>
					<b>Жанр:</b> 
				</p>
				<p>
					<b>Разработчик:</b> 
					<?php print($game['company_creator']) ?>
				</p>
				<p>
					<b>Издательство:</b> 
					<?php print($game['company_publisher']) ?>
				</p>
				<p>
					<b>Язык интерфейса:</b> 
				</p>
				<p>
					<b>Язык озвучки:</b> 
				</p>
				<p>
					<b>Таблетка:</b> 
					<?php print($game['tablet']) ?>
				</p>
			</section>

			<section class="article__main-text">
				<?php print($game['description']) ?>
			</section>

			<section class="article__main-comments-write">
				<form class="article__main-form" action="">
					<input class="input input-form" placeholder="имя...">

					<textarea class="input input-form" placeholder="комментарий..." rows="4"></textarea>

					<input class="btn btn-mc btn-rounded btn-primary" type="submit"></input>
				</form>
			</section>
		 </main>
		
		 <footer class="global__footer">
			<p>SergoIndustries</p>
			<p>2019-2020</p>
		</footer>
	</body>

</html>