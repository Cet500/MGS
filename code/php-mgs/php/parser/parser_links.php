<meta charset="utf-8">

<style>
	body{
		padding: 0px;
		margin: 0px;
	}
	table{
		border-collapse: collapse;
		font-family: Consolas;
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
	require '../libs/simple_html_dom.php';

	$url = 'https://moreigr.com/';
	$pages = '166';
	$id_block = '#dle-content';

	print('<table>');
	print('<thead><tr><th>page</th><th>id</th><th>name</th><th>link</th><th>image</th></tr><thead>');
	print('<tbody>');

	$i = 0;

	for ($page = 1; $page < $pages + 1; $page++) {
		$html = file_get_html($url.'page/'.$page);
		$data = $html->find($id_block, 0);

		foreach ($data->find('div.short-story a') as $link) {
			$i++;

			$link_url  = $link->href;
			$name 	   = $link->find('img', 0)->alt;
			$image_url = $link->find('img', 0)->src;

			$links = R::dispense('parserlinks');
				$links->name 	  = $name;
				$links->link_url  = $link_url;
				$links->image_url = $image_url;
			R::store($links);

			print('<tr><td>'.$page.'</td><td>'.$i.'</td><td>'.$name.'</td><td>'.$link_url.'</td><td>'.$image_url.'</td></tr>');
		};
	};

	print('</tbody></table>'); 
?>