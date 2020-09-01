<!--Создал - Кузнецов Артём, ИС-21-31-->
<!--Доработал - Корляков Сергей, ИС-21-31-->

<!DOCTYPE html>

<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>
			Википедия по играм
		</title>
		<link href="css/global.css" rel="stylesheet">
		<script src="js/libs/jquery-3.4.1.min.js"></script>
		<script src="js/switchThemes.js"></script>
		<?php
			require 'php/db.php';

			$num_list = $_GET['num_list'];

			if ($num_list == "") {
				$num_list = 1;
			}
		?>
	</head>

	<body>	
		<header>
			<a href="index.php?num_list=1" class="logo">GameWiki by BushCherry</a>
			<div class="Blokdliknopok">
				<a href="#" class="obl" onclick="setLightTheme()">Light</a>
				<a href="#" class="obl" onclick="setDarkTheme()">Dark</a>
			</div>
		</header>
		
		<aside>
			<nav>
				<h3>Меню</h3>
				<ul>
					<li><a href="">Аркада</a></li>
					<li><a href="">Action</a></li>
					<li><a href="">Шутеры</a></li>
					<li><a href="">Приключения</a></li>
					<li><a href="">Стратегии</a></li>
					<li><a href="">RPG</a></li>
					<li><a href="">Гонки</a></li>
					<li><a href="">Квесты</a></li>
					<li><a href="">Симуляторы</a></li>
					<li><a href="">Спортивные игры</a></li>
					<li><a href="">Хоррор игры</a></li>
				</ul>
			</nav>
		</aside>

		<main>
			<div class="main_flex">
			<?php
				$ids = (($num_list * 50) + 1);

				$links = R::getAll('SELECT * FROM links WHERE id between ? and ? LIMIT 50', [$ids-50, $ids]);

				$i = $ids - 50;
				foreach ($links as $link) {
					print('<div class="game_preview">'.
								'<a href="article.php?id='.$i.'">'.
								'<img src="images/'.$link['id'].'.jpg" width="150" alt="'.$link['name'].'"></a>'.
								'<p>'.$link['name'].'</p>'.
							'</div>');
					$i++;
				};
			?>
			</div>
			<div class="num_list">
				<?php
					$count = R::count('articlestemp');
					$min = 1;
					$max = ceil($count / 50);

					printf('<a href="index.php?num_list='.$min.'">первая </a>');

					if ( $num_list > 2 ) {
						printf('<a href="index.php?num_list='.($num_list-2).'"> '.($num_list-2).' </a>');
					}
					if ( $num_list > 1 ) {
						printf('<a href="index.php?num_list='.($num_list-1).'"> '.($num_list-1).' </a>');	
					}

					printf('<a href="index.php?num_list='.$num_list.'"> '.$num_list.' </a>');

					if ( $num_list < $max ) {
						printf('<a href="index.php?num_list='.($num_list+1).'"> '.($num_list+1).' </a>');
					}
					if ( $num_list < ($max - 1) ) {
						printf('<a href="index.php?num_list='.($num_list+2).'"> '.($num_list+2).' </a>');
					}

					printf('<a href="index.php?num_list='.$max.'"> последняя</a>');
				?>
			</div>
		</main>

		<footer>
			<p>SergoIndustries</p>
			<p>2019</p>
		</footer>
	</body>
</html>