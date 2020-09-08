<title>Relocate data</title>

<meta charset="utf-8">

<style>
	body{
		padding: 0px;
		margin: 0px;
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

	$i = 0;

	$games = R::getAll('SELECT * FROM `parserdata`');

	print('<table>');
	print('<thead><tr><th>nm</th><th>name</th><th>description</th></tr><thead>');
	print('<tbody>');

	foreach ( $games as $game ) {
		$i++;

		$data = R::dispense('games');
			$data->name        = $game['name'];
			$data->description = $game['text'];
			$data->image_url   = $game['image_url'];
			$data->user_add    = 1;
		R::store($data);

		print('<tr><td>'.$i.'</td><td>'.$game['name'].'</td><td>'.$game['text'].'</td></tr>');
	}

	print('</tbody>');
