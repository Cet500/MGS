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
		<link href="css/article.css" rel="stylesheet">
		<script src="js/libs/jquery-3.4.1.min.js"></script>
		<script src="js/switchThemes.js"></script>
		<?php
			require 'php/db.php';

			$id = $_GET['id'];

			if ($id == "") {
				$id = 1;
			}

			$game = R::getRow('SELECT * FROM `articlestemp` WHERE idnew = ?', [$id]);
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
			<div class="logo_game">
				<?php
					echo '<img src="images/'.$id.'.jpg" width="250" alt="Пример" align="left">'
				?>
			</div>

			<div class="tth">
				<?php
					if ($game['name'] != "") {
						echo '<p>Название: '.$game['name'].'</p>';
					};
					if ($game['date'] != "") {
						echo '<p>Дата выпуска: '.$game['date'].'</p>';
					};
					if ($game['idtags'] != "") {
						echo '<p>Жанры: '.$game['idtags'].'</p>';
					};
					if ($game['creator'] != "") {
						echo '<p>Разработчик: '.$game['creator'].'</p>';
					};
					if ($game['publisher'] != "") {
						echo '<p>Издатель: '.$game['publisher'].'</p>';
					};
					if ($game['idplatform'] != "") {
						echo '<p>Платформа: ';
							switch ($game['idplatform']) {
								case '1':
									echo "PC";
									break;
								
								case '2':
									echo "PS";
									break;
	
								case '3':
									echo "XBOX";
									break;
							};
						echo '</p>';
					};
					if ($game['idtype'] != "") {
						echo '<p>Тип: ';
							switch ($game['idtype']) {
								case '1':
									echo "лиценция";
									break;
								
								case '2':
									echo "RePack";
									break;

								case '3':
									echo "пиратка";
									break;
							};
						echo '</p>';
					};
					if ($game['idlanggui'] != "") {
						echo '<p>Язык интерфейса: '.$game['idlanggui'].'</p>';
					};
					if ($game['idlangvoice'] != "") {
						echo '<p>Язык озвучки: '.$game['idlangvoice'].'</p>';
					};
					if ($game['idtype'] != "") {
						echo '<p>Таблетка: ';
							switch ($game['idtype']) {
								case '1':
									echo "нет";
									break;
								
								case '2':
									echo "встроена";
									break;
							};
						echo '</p>';
					};
				?>
			</div>

			<div class="main_text">
				<?php
					if ($game['description'] != "") {
						echo '<h3>Описание</h3>';
						echo '<p>'.$game['description'].'</p>';
					};
					if ($game['features'] != "") {
						echo '<h3>Особенности</h3>';
						echo '<p>'.$game['features'].'</p>';
					};	
					if ($game['history'] != "") {
						echo '<h3>История</h3>';
						echo '<p>'.$game['history'].'</p>';
					};
					
					echo '<h3>Системные требования</h3>';
					echo '<p>Операционная система: '.$game['os'].'</p>';
					echo '<p>Центральный процессор: '.$game['cpu'].'</p>';
					echo '<p>Оперативная память: '.$game['ram'].'</p>';
					echo '<p>Видеокарта: '.$game['videocard'].'</p>';
					echo '<p>DirectX: '.$game['directx'].'</p>';
					echo '<p>Звуковая система: '.$game['soundsys'].'</p>';
					echo '<p>Место на диске: '.$game['soundsys'].'</p>';
						
					if ($game['install'] != "") {
						echo '<h3>Установка</h3>';
						echo '<p>'.$game['install'].'</p>';
					};
					if ($game['installlicence'] != "") {
						echo '<h3>Установка (лицензия)</h3>';
						echo '<p>'.$game['installlicence'].'</p>';
					};	
					if ($game['installpirate'] != "") {
						echo '<h3>Установка (пиратка)</h3>';
						echo '<p>'.$game['installpirate'].'</p>';
					
					};	
					if ($game['featuresrepak'] != "") {
						echo '<h3>Особенности репака</h3>';
						echo '<p>'.$game['featuresrepak'].'</p>';
					};
					if ($game['dlc'] != "") {
						echo '<h3>Встроенные DLC</h3>';
						echo '<p>'.$game['dlc'].'</p>';
					};
				?>
			</div>

			<div class="trailers">
				
			</div>
		 </main>
		
		<footer>
			<p>SergoIndustries</p>
			<p>2019</p>
		</footer>
	</body>
</html>