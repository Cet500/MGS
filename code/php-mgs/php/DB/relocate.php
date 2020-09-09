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
	
/*
	require '../db.php';

	$a = 0;
	$b = 0;
	$array = [];

	$games = R::getAll('SELECT * FROM `parserdata`');

	foreach ( $games as $game ) {
		$a++;
		$b = 0;
		$array[$a] = [];

		$str = $game['system_require'];
		$str = substr($str, 4, -5);
		$array_strs = explode("</li><li>", $str);

		foreach ($array_strs as $array_str) {
			$b++;
			$array[$a][0]  = $game['id'];
			$array[$a][$b] = multi_explode(array(":", ": ", ":  ", ":	", "	"), $array_str);	
		}

	}

	print('<table style="width: 1000px;">');

	foreach ($array as $arr) {
		for ($i = 1; $i < count($arr); $i++) { 
			print('<tr><td>'.$arr[0].'</td><td>'.$arr[$i][0].'</td><td>'.$arr[$i][1].'</td></tr>');

			$sysreqdata = R::dispense('parsersysreq');
				$sysreqdata->id_game        = $arr[0];
				$sysreqdata->sys_part       = $arr[$i][0];
				$sysreqdata->sys_require    = $arr[$i][1];
			R::store($sysreqdata);
		}
	}

	// print('</table>');

	// print_r(array_unique($paramets));

	// $paramets = [];
	// $i = 0;

	// foreach ($array as $arr) {
	// 	foreach ($arr as $a) {
	// 		$i++;
	// 		$paramets[$i] = $a[0];
	// 	}
	// }

	// print_r(array_unique($paramets));


	function multi_explode ($delimiters,$string) {
		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return  $launch;
	}