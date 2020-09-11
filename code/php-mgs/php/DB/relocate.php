<title>Relocate data</title>

<meta charset="utf-8">

<style>
	body{
		padding: 0px;
		margin: 0px;
		font-family: Consolas;
	}
	table{
		border-collapse: collapse;
		font-family: Consolas;
		font-size: 0.8em;
	}
	table th{
		background-color: #90ee90;
		border: 1px solid black;
		padding: 3px 7px;
	}
	table tr:nth-child(2n){
		background-color: rgba(0,0,0,0.2);
	}
	table td{
		border: 1px solid gray;
		padding: 3px 7px;
	}
</style>

<?php
	
	require '../db.php';

	$info = R::getAll('SELECT * FROM `parserinfo` WHERE `part` = "  Язык интерфейса"');

	// $array = [];
	$i = 0;

	// foreach ($info as $info_item) {
	// 	$temp = [];
	// 	// $array[$i] = $info_item["value"];

	// 	// print($info_item["id_game"]." | ".$info_item["value"]."<br>");

	// 	$temp = explode(', ', $info_item["value"]);

	// 	foreach ($temp as $temp_item) {
	// 		$i++;
	// 		$array[$i] = $temp_item;
	// 	}

	// 	// R::exec('UPDATE `games` SET `company_publisher` = ? WHERE `games`.`id` = ?;', [ $info_item["value"], $info_item["id_game"] ]);

	// }


	// $array = array_unique($array);

	$array = R::getAll('SELECT * FROM `langs`');

	foreach ($info as $info_item) {

		$temp = [];
		$temp = explode(', ', $info_item["value"]);

		foreach ($temp as $temp_item) {

			foreach ($array as $arr) {

				if ($temp_item == $arr['lang']) {

					print($info_item["id_game"]." | ".$info_item["value"]." | ".$arr['lang']." | ".$arr['id']."<br>");

					R::exec('INSERT INTO `game_text_lang` (`id`, `id_game`, `id_lang`) VALUES (NULL, ?, ?)', [ $info_item['id_game'], $arr['id'] ]);
				}

			}

		}

	}
	