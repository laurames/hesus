<!DOCTYPE html>
<html>
<head>
	<title>Lunch Menus</title>
	<script src="http://code.jquery.com/jquery-1.9.0.js" type="text/javascript"></script>
	<script>
	$(document).ready(function() {
		
	});
	</script>
</head>
<body>
<?php
/*
@author Someone
@edited Karol
*/
header('Content-type: text/html; charset=utf-8');
$palmia = new Ravintola('vanhamaantie');
$palmia->parsiRuokalista();

/* Print each menu */
foreach ($palmia->ruokalista as $list)
{
	echo '<div class="list">';
	foreach ($list as $menu)
	{
		echo '<p>' . $menu . '</p>';
	}
	echo '</div>';
	echo '<br/><br/>';
}

echo '<pre>';
//var_dump($palmia->ruokalista);
echo '<pre>';

class Ravintola {

	var $ruokalista = array(); // lista 0 => sunnuntai, 1 => maanantai...
	var $toimipiste = '';
	var $paivat = array(
		'sunnuntai',
		'maanantai',
		'tiistai',
		'keskiviikko',
		'torstai',
		'perjantai',
		'lauantai'
	);

	public function __construct($toimipiste) {
		include_once('lib/simple_html_dom.php');
		$this->toimipiste = $toimipiste;
	}

	public function parsiRuokalista() {
		switch ($this->toimipiste) {
			case('agricolankatu'):
				$ravintola_id = '106';
				break;
			case('albertinkatu'):
				$ravintola_id = '26';
				break;
			case('bulevardi'):
				$ravintola_id = '28';
				break;
			case('hameentie'):
				$ravintola_id = '104';
				break;
			case('konservatorio'):
				$ravintola_id = '801721';
				break;
			case('leiritie'):
				$ravintola_id = '105';
				break;
			case('onnentie'):
				$ravintola_id = '103';
				break;
			case('sofianlehto'):
				$ravintola_id = '198483';
				break;
			case('tukholmankatu'):
				$ravintola_id = '107';
				break;
			case('vanhamaantie'):
				$ravintola_id = '108';
				break;
		}

		$listalinkit = file_get_html('http://www.hel.fi/wps/portal/Palmia/Ruokalista');
		while ($this->palmia_virhesivu($listalinkit->plaintext)) {
			$listalinkit = file_get_html('http://www.hel.fi/wps/portal/Palmia/Ruokalista');
		}
		$bulevardilinkki = $listalinkit->find('form[id=restaurantlink_28]', 0);
		$link = 'http://www.hel.fi' . $bulevardilinkki->action;
		$request = array(
			'http' => array(
				'method' => 'POST',
				'header' => "Content-type: application/x-www-form-urlencoded\r\n",
				'content' => http_build_query(array(
					'id' => $ravintola_id,
					'submit' => 'Hae'
				)),
			)
		);

		$context = stream_context_create($request);

		$lista_sivu = file_get_html($link, false, $context);
		while ($this->palmia_virhesivu($lista_sivu->plaintext)) {
			$lista_sivu = file_get_html($link, false, $context);
		}
		$menu = $lista_sivu->find('table.menu_table', 0);
		foreach ($menu->children() as $child) {
			$string = trim(str_replace("\xA0", " ", html_entity_decode($child->plaintext)));
			if (!empty($string) && strtolower($string) != 'hinta') {
				$date_index = array_search(strtolower($string), $this->paivat);
				if ($date_index !== false) {
					$date = $date_index;
				} else if (!empty($date)) {
					$this->ruokalista[$date][] = $string;
				}
			}
		}
	}

	private function palmia_virhesivu($html_content) {
		if (strpos($html_content, 'tapahtunut virhe.') === false) {
			return false;
		} else {
			return true;
		}
	}

}
