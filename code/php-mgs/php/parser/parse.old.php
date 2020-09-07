<?php

/*
	require 'php/db.php';
	$arts = R::getAll('SELECT articlestemp.name, articlestemp.id FROM `articlestemp`');

	$links = R::getAll('SELECT * FROM `links`');

	echo "<table>";

	echo "<tr><th>uuid</th><th>lev</th><th>art-name</th><th>art-ID</th><th>link-name</th><th>link-ID</th></tr>";

	$uuid = 0;

	foreach ($links as $link) {
		$link['name'] = preg_replace('/\s*\(.*?\)/', '', $link['name']);
		$link['name'] = preg_replace('/\s*\[.*?\]/', '', $link['name']);
		$link['name'] = strstr($link['name'], '|', true);
		$link['name'] = strstr($link['name'], 'PC', true);
		if ($link['name']{strlen($link['name'])-1} == ' ') {
   			$link['name'] = substr($link['name'],0,-1);
		}

		$shortest = -1;
		
		echo "<tr>";

		foreach ($arts as $word) {
		
		    $lev = levenshtein($link['name'], $word['name']);
		
		    if ($lev == 0) {
		
		        $closest = $word['name'];
		        $closestid  = $word['id'];
		        $shortest = 0;
		
		        break;
		    }
		
		    if ($lev <= $shortest || $shortest < 0) {
		        $closest  = $word['name'];
		        $closestid  = $word['id'];
		        $shortest = $lev;
		    }
		}
		
		if ($shortest == 0) {
			$uuid++;

			echo '<td>'.$uuid.'</td>';
			echo '<td>'.$shortest.'</td>';
			echo '<td>'.$closest.'</td>';
			echo '<td>'.$closestid.'</td>';
			echo '<td>'.$link['name'].'</td>';
			echo '<td>'.$link['id'].'</td>';
		}

		echo "</tr>";
	};

	echo "</table>";

	require 'php/db.php';
	$id = R::getAll('SELECT id, idnew FROM `articlestemp` ORDER BY `id` ASC');

	echo('<pre>');
	print_r($id);
	echo('</pre>');




	require 'php/libs/simple_html_dom.php';
	require 'php/db.php';

	echo "<table>";
	echo "<tr><th>ID</th><th>распарсено</th></tr>";

	$links = R::getAll('SELECT * FROM `links`');

	for ($id = 3985; $id < 4001; $id++) {

		$art = file_get_html($links[$id]['link']);
		$key = $art->find('#dle-content', 0);

		$main = $key->children(0)->children(2)->children(1)->plaintext;

		$main_str = preg_split('~\R{2,}~', $main, 0);
		$main_string = [];
		
		for ($i = 0; $i < count($main_str); $i++) {
			$main_string[$i] = preg_split("~\n~", $main_str[$i], 0);
		}

		echo '<tr><td>'.$id.'</td>';

		echo '<td>';

			$games = R::dispense('articlestemp');

			for ($a = 0; $a < count($main_string); $a++) {
				foreach ($main_string[$a] as &$e) {
    				$e = preg_replace('/\\r\\n?|\\n/', '', $e);  
				}
				unset($e);

				if ($main != "") {

					for ($b = 0; $b < count($main_string[$a]); $b++) {

						switch (livStr(substr($main_string[$a][$b], 0, strpos($main_string[$a][$b], ":")))) {
							
							
							case 'Название':
								switch ($id) {
									case '3594':
										$name = 'The Ball: Оружие мертвых';
										echo 'Название = '.$name.'<br><br>';
										$games->name = $name;
										break;
									
									default:
										$name = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
										echo 'Название = '.$name.'<br><br>';
										$games->name = $name;
										break;
								}
								
								break;
	
							case 'Год выпуска':
								$date = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Год выпуска = '.$date.'<br><br>';
								$games->date = $date;
								break;
	
							case 'Дата выхода':
								$date = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Год выпуска = '.$date.'<br><br>';
								$games->date = $date;
								break;
	
							case 'Жанр':
								$idtags = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Жанр = '.$idtags.'<br><br>';
								$games->idtags = $idtags;
								break;
	
							case 'Разработчик':
								$creator = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Разработчик = '.$creator.'<br><br>';
								$games->creator = $creator;
								break;
	
							case 'Издатель':
								$publisher = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Издатель = '.$publisher.'<br><br>';
								$games->publisher = $publisher;
								break;
	
							case 'Платформа':
								$idplatform = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);

								switch (livGame($idplatform)) {
									case 'PC':
										echo 'Платформа = PC | 1<br><br>';
										$idplatform = 1;
										break;
									
									case 'РС':
										echo 'Платформа = PC | 1<br><br>';
										$idplatform = 1;
										break;

									case 'PS4':
										echo 'Платформа = PS4 | 2<br><br>';
										$idplatform = 2;
										break;

									case 'XBOX':
										echo 'Платформа = XBOX | 3<br><br>';
										$idplatform = 3;
										break;

									default:
										echo 'Тип издания = PC | 1<br><br>';
										$idplatform = 1;
										break;
								}

								$games->idplatform = $idplatform;
								break;
	
							case 'Тип издания':
								$idtype = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);

								switch (livType($idtype)) {
									case 'Лицензия':
										echo 'Тип издания = Лицензия | 1<br><br>';
										$idtype = 1;
										break;
									
									case 'RePack':
										echo 'Тип издания = RePack | 2<br><br>';
										$idtype = 2;
										break;

									case 'Пиратка':
										echo 'Тип издания = Пиратка | 3<br><br>';
										$idtype = 3;
										break;

									default:
										echo 'Тип издания = Пиратка | 3<br><br>';
										$idtype = 3;
										break;
										
									}

								$games->idtype = $idtype;
								break;

							case 'Язык интерфейса':
								switch ($id) {
									case '3986':
										$idlangui = 'Русский, Английский, Французский, Итальянский, Немецкий, Японский';
										echo 'Язык интерфейса = '.$idlangui.'<br><br>';
										$games->idlangui = $idlangui;
										break;
									
									default:
										$idlangui = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
										echo 'Язык интерфейса = '.$idlangui.'<br><br>';
										$games->idlangui = $idlangui;
										break;
								}

								break;
	
							case 'Язык озвучки':
								$idlangvoice = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Язык озвучки = '.$idlangvoice.'<br><br>';
								$games->idlangvoice = $idlangvoice;
								break;
	
							case 'Таблетка':
								$tablet = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								
								if (livTablet($tablet) == 'Отсутствует') {
									echo 'Таблетка = Отсутствует | 1<br><br>';
									$tablet = 1;
								}
								else {
									echo 'Таблетка = Вшита | 2<br><br>';
									$tablet = 2;
								}
								
								$games->tablet = $tablet;
								break;
	
							case 'Описание':
								switch ($id) {
									default:
										$description = "Одна очнулась в странном месте. Кто-то поместил ее в камеру, предназначенную для особо буйных пациентов психиатрической лечебницы. Главная героиня абсолютно ничего не может о себе вспомнить. Прошлое стало для испуганной девочки загадкой, разгадать которую она пока не имеет возможности. Эдна четко понимает лишь то, что по ошибке попала в это ужасное место. Героиня считает себя полностью здоровой. А ее игрушка в виде кролика постоянно подтверждает эти слова.";

										echo "Описание = ".$description."<br><br>";
								
										$games->description = $description;
										break;
								}
								
								break;

							case 'Особенности игры':
								switch ($id) {
									case '3890':
										$features = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);

										echo 'Особенности игры = '.$features.'<br><br>';
									
										$games->features = $features;
										break;
									
									default:
										$features = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
									
										for ($c = 1; $c < count($main_string[$a]); $c++) { 
											
												$features = $features.'<br>'.$main_string[$a][$c];
										}
	
										echo 'Особенности игры = '.$features.'<br><br>';
									
										$games->features = $features;
										break;
								}

								break;

							case 'История':
								$history = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'История = '.$history.'<br><br>';
								$games->history = $history;
								break;

							case 'Операционная система':
								$os = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Операционная система = '.$os.'<br><br>';
								$games->os = $os;
								break;

							case 'ОС':
								$os = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'ОС = '.$os.'<br><br>';
								$games->os = $os;
								break;

							case 'Процессор':
								$cpu = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Процессор = '.$cpu.'<br><br>';
								$games->cpu = $cpu;
								break;

							case 'Оперативная память':
								$ram = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Оперативная память = '.$ram.'<br><br>';
								$games->ram = $ram;
								break;

							case 'Оперативной памяти':
								$ram = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Оперативной памяти = '.$ram.'<br><br>';
								$games->ram = $ram;
								break;

							case 'Видеокарта':
								$videocard = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Видеокарта = '.$videocard.'<br><br>';
								$games->videocard = $videocard;
								break;

							case 'DirectX':
								$directx = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'DirectX = '.$directx.'<br><br>';
								$games->directx = $directx;
								break;

							case 'Звуковое устройство':
								switch ($id) {
									case '3153':
										$soundsys = 'Звуковая карта совместимая с DirectX 9';
										echo 'Звуковое устройство = '.$soundsys.'<br><br>';
										$games->soundsys = $soundsys;
										break;
									
									default:
										$soundsys = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
										echo 'Звуковое устройство = '.$soundsys.'<br><br>';
										$games->soundsys = $soundsys;
										break;
								}
								
								break;

							case 'Место на жестком диске':
								$hdd = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								echo 'Место на жестком диске = '.$hdd.'<br><br>';
								$games->hdd = $hdd;
								break;

							case 'Установка':
								$install = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								
								for ($c = 1; $c < count($main_string[$a]); $c++) { 
									$install = $install.'<br>'.$main_string[$a][$c];
								}

								echo 'Установка = '.$install.'<br><br>';
								
								$games->install = $install;
								break;

							case 'Установка (Для обладателей лицензии)':
								$installlicence = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								
								for ($c = 1; $c < count($main_string[$a]); $c++) { 
									$installlicence = $installlicence.'<br>'.$main_string[$a][$c];
								}

								echo 'Установка (Для обладателей лицензии) = '.$installlicence.'<br><br>';
								
								$games->installlicence = $installlicence;
								break;

							case 'Установка (Обычная)':
								$installpirate = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								
								for ($c = 1; $c < count($main_string[$a]); $c++) { 
									$installpirate = $installpirate.'<br>'.$main_string[$a][$c];
								}

								echo 'Установка (Обычная) = '.$installpirate.'<br><br>';
								
								$games->installpirate = $installpirate;
								break;

							case 'Особенности репака':
								switch ($id) {
									case '3514':
										$featuresrepak = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);

										echo 'Особенности репака = '.$featuresrepak.'<br><br>';
								
										$games->featuresrepak = $featuresrepak;
										break;
									
									default:
										$featuresrepak = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								
										for ($c = 1; $c < count($main_string[$a]); $c++) { 
											$featuresrepak = $featuresrepak.'<br>'.$main_string[$a][$c];
										}

										echo 'Особенности репака = '.$featuresrepak.'<br><br>';
								
										$games->featuresrepak = $featuresrepak;
										break;
								}
								
								break;

							case 'Дополнения':
								switch ($id) {
									case '1534':
										$dlc = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);

										echo 'Дополнения = '.$dlc.'<br><br>';
								
										$games->dlc = $dlc;
										break;
									
									default:
										$dlc = substr($main_string[$a][$b], strpos($main_string[$a][$b], ":")+2);
								
										for ($c = 1; $c < count($main_string[$a]); $c++) { 
											$dlc = $dlc.$main_string[$a][$c];
										}

										echo 'Дополнения = '.$dlc.'<br><br>';
										
										$games->dlc = $dlc;
										break;
								}

								break;
						}
					}

				}
			}

			R::store($games, true);

			$description = "";
			$features = "";

			$art->clear();

		echo '</td></tr>';


}


	function livTablet($input){
		$words  = array('Отсутствует');
		
		$shortest = -1;
		
		foreach ($words as $word) {
		
		    $lev = levenshtein($input, $word);
		
		    if ($lev == 0) {
		
		        $closest = $word;
		        $shortest = 0;
		
		        break;
		    }
		
		    if ($lev <= $shortest || $shortest < 0) {
		        $closest  = $word;
		        $shortest = $lev;
		    }
		}
		
		if ($shortest <= 3) {
		    return $closest;
		}
	}

	function livType($input){
		$words  = array('Лицензия', 'RePack', 'Пиратка');
		
		$shortest = -1;
		
		foreach ($words as $word) {
		
		    $lev = levenshtein($input, $word);
		
		    if ($lev == 0) {
		
		        $closest = $word;
		        $shortest = 0;
		
		        break;
		    }
		
		    if ($lev <= $shortest || $shortest < 0) {
		        $closest  = $word;
		        $shortest = $lev;
		    }
		}
		
		if ($shortest <= 3) {
		    return $closest;
		}
	}

	function livGame($input){
		$words  = array('PC', 'РС', 'PS4', 'XBOX');
		
		$shortest = -1;
		
		foreach ($words as $word) {
		
		    $lev = levenshtein($input, $word);
		
		    if ($lev == 0) {
		
		        $closest = $word;
		        $shortest = 0;
		
		        break;
		    }
		
		    if ($lev <= $shortest || $shortest < 0) {
		        $closest  = $word;
		        $shortest = $lev;
		    }
		}
		
		if ($shortest <= 3) {
		    return $closest;
		}
	}

	function livStr($input){
		$words  = array('Название', 'Год выпуска', 'Дата выхода', 'Жанр', 'Разработчик', 'Издатель', 'Платформа', 'Тип издания', 'Язык интерфейса', 'Язык озвучки', 'Таблетка', 'Описание', 'Особенности игры', 'История', 'Системные требования', 'Операционная система', 'ОС', 'Процессор', 'Оперативная память', 'Оперативной памяти', 'Видеокарта', 'DirectX', 'Звуковое устройство', 'Место на жестком диске', 'Инструкция по установке', 'Установка', 'Установка (Для обладателей лицензии)', 'Установка (Обычная)', 'Особенности репака', 'Дополнения');
		
		// кратчайшее расстояние пока еще не найдено
		$shortest = -1;
		
		// проходим по словам для нахождения самого близкого варианта
		foreach ($words as $word) {
		
		    // вычисляем расстояние между входным словом и текущим
		    $lev = levenshtein($input, $word);
		
		    // проверяем полное совпадение
		    if ($lev == 0) {
		
		        // это ближайшее слово (точное совпадение)
		        $closest = $word;
		        $shortest = 0;
		
		        // выходим из цикла - мы нашли точное совпадение
		        break;
		    }
		
		    // если это расстояние меньше следующего наименьшего расстояния
		    // ИЛИ если следующее самое короткое слово еще не было найдено
		    if ($lev <= $shortest || $shortest < 0) {
		        // устанивливаем ближайшее совпадение и кратчайшее расстояние
		        $closest  = $word;
		        $shortest = $lev;
		    }
		}
		
		if ($shortest <= 3) {
		    return $closest;
		}
	}




	require 'php/db.php';

	echo "<table>";
	echo "<tr><th>ID</th><th>название игры</th></tr>";

	$links = R::getAll('SELECT * FROM links');

	$i = 0;
	foreach ($links as $link) {
		$i++;

		echo '<tr><td>'.$i.'</td><td>'.$link['name'].'</td></tr>';
	}

	echo "</table>";



	require 'php/libs/simple_html_dom.php';
	require 'php/db.php';

	echo "<table>";
	echo "<tr><th>ссылка</th><th>лого</th><th>имя</th></tr>";

	for ($i = 1; $i < 242; $i++) {
		echo '<tr><td class="h" colspan="3">страница '.$i.' из 241</td></tr>';

		$art = file_get_html('https://gig-games.net/page/'.$i.'/');
		$key = $art->find('#dle-content', 0);

		foreach ($key->find('.shortstoryImg') as $k) {
			$link = $k->children(0)->getAttribute('href');
			$logo = $k->children(0)->children(0)->getAttribute('src');
			$name =	$k->children(0)->children(0)->getAttribute('title');

			echo '<tr><td>'.$link.'</td>';
			echo '<td>'.$logo.'</td>';
			echo '<td>'.$name.'</td></tr>';

			$links = R::dispense('links');
				$links->link = $link;
				$links->logo = $logo;
				$links->name = $name;
			R::store($links);

		}
	}

	echo "</table>";
*/