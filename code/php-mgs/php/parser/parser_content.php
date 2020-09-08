<title>Parser content</title>

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

	$limit    = 5;
	$id_block = '#dle-content';
	$pattern  = '/<p>  На этой странице по кнопке ниже вы можете([^=]*(?:=(?!end)[^=]*)*)/';
	$pattern2 = '/<!--dle_list-->([^=]*(?:=(?!end)[^=]*)*)/';
	$pattern3 = '/<div id="osob" class="osobennosti">([^=]*(?:=(?!end)[^=]*)*)/';

	$links = R::getAll('SELECT * FROM `parserlinks`');

	print('<table>');
	print('<thead><tr><th>nm</th><th>name</th><th>image</th><th>info</th><th>require</th><th>features</th><th>text</th></tr><thead>');
	print('<tbody>');

	$i = 0;

	foreach ($links as $link) {
		$i++;
		$info     = "";
		$require  = "";
		$features = "";

		$html = file_get_html($link['link_url']);
		$data = $html->find($id_block, 0);

		$info_list = $data->find('.full-info', 0);

		if ($info_list != NULL) {
			foreach ($info_list->find('li') as $info_item) {
				$info = $info.'<li>'.$info_item->plaintext.'</li>';
			}
		};
		
		$text = $data->find('div.full', 0);
		
		$text = preg_replace($pattern, "", $text);
		$text = preg_replace('/<div class="full">/', "", $text);
		$text = preg_replace('/<\/div>/', "", $text);
		// $text = preg_replace($pattern2, "", $text);
		$text = preg_replace($pattern3, "", $text);

		$require_list = $data->find('#sist', 0);

		if ($require_list != NULL) {
			foreach ($require_list->find('li') as $require_item) {
				$require = $require.'<li>'.$require_item->plaintext.'</li>';
			}
		};

		$features_list = $data->find('#osob', 0);

		if ($features_list != NULL) {
			foreach ($features_list->find('li') as $features_item) {
				$features = $features.'<li>'.$features_item->plaintext.'</li>';
			}
		};

		$parserdata = R::dispense('parserdata');
			$parserdata->name           = $link['name'];
			$parserdata->image_url      = $link['image_url'];
			$parserdata->info           = $info;
			$parserdata->system_require = $require;
			$parserdata->features       = $features;
			$parserdata->text           = $text;
		R::store($parserdata);

		print('<tr><td>'.$i.'</td><td>'.$link['name'].'</td><td>'.$link['image_url'].'</td><td>'.$info.'</td><td>'.$require.'</td><td>'.$features.'</td><td>'.$text.'</td></tr>');

	}

	print('</tbody></table>');
?>