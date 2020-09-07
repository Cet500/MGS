<?php

/*

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
*/