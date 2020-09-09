<title>Relocate data</title>

<meta charset="utf-8">

<style>
	body{
		padding: 0px;
		margin: 0px;
		font-family: Consolas;
	}
</style>

<?php
	/*

	require '../db.php';

	$i = 0;

	$games = R::getAll('SELECT * FROM `parserdata`');

	foreach ( $games as $game ) {
		$i++;
		$array = [];

		$str = $game['features'];

		$str = substr($str, 4, -5);

		$array = explode("</li><li>", $str);

		print('<br>============================ '.$game['id'].' ============================<br><br>');

		foreach ($array as $feature) {

			if ($array[0] != "") {
				$data = R::dispense('gamefeatures');
					$data->id_game = $game['id'];
					$data->feature = $feature;
				R::store($data);	
			}
			
			print($feature.'<br>');
		};

	}
	
	*/
