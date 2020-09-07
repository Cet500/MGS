<title>Parser links</title>

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
	require '../libs/simple_html_dom.php';

	$limit = 5;

	$links = R::getAll('SELECT `id`, `image_url` FROM `parserlinks` LIMIT ?', $limit);

	print('<table>');
	print('<thead><tr><th>nm</th><th>image_url</th><th>image_name</th></tr><thead>');
	print('<tbody>');

	foreach ($links as $link) {
		$img = $link['image_url']
		$ext = substr($img, -4)

		copy($img, '../../../../media/img/'.$id.$ext)

		print('<tr><td>'.$id.'</td><td>'.$img.'</td><td>'.$id.$ext.'</td></tr>')
	}

	print('</tbody></table>')
?>