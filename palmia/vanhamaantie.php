<!DOCTYPE html>
<?php header('Content-type: text/html; charset=utf-8'); ?>
<html>
<head>
	<title>Lunch Menus</title>
	<script src="http://code.jquery.com/jquery-1.9.0.js" type="text/javascript"></script>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
	<script>
	$(document).ready(function() {
		
	});
	</script>
	<style type="text/css" >
	/* CSS */
		*{
            margin:0;
            padding:0;
        }
		
		#menus {
			width: 100%
		}
		/* each list is for each day of the week */
		.list {
			width: 19%;
			float: left;
		}
		#days {
			width: 100%;
		}
		#days h3 {
			width: 19%;
			float: left;
		}
		.clear {
			clear:both;
		}

	</style>

	<script type="text/javascript">
            $(function() {
                $('#accordion > li').hover(
                    function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'480px'},500);
                        $('.heading',$this).stop(true,true).fadeOut();
                        $('.bgDescription',$this).stop(true,true).slideDown(500);
                        $('.description',$this).stop(true,true).fadeIn();
                    },
                    function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'115px'},1000);
                        $('.heading',$this).stop(true,true).fadeIn();
                        $('.description',$this).stop(true,true).fadeOut(500);
                        $('.bgDescription',$this).stop(true,true).slideUp(700);
                    }
                );
            });
        </script>
</head>
<body>
<?php
/*
@author Someone
@edited Karol
*/
$palmia = new Ravintola('vanhamaantie');
$palmia->parsiRuokalista();
?>
<!--
<ul class="accordion" id="accordion">
                <li class="bg0">
                	<div class="heading">Friday / Perjantai</div>
                	<div class="bgDescription"></div>
                	<div class="description">
                		<h2>Friday / Perjantai</h2>
                		<p>
                		Uunimakkaraa m g, juustokastiketta l, keitettyjä perunoita m g / ovenbaked sausage m g, cheese sauce l, boiled potatoes m g
						Broilerikormaa vl g, tummaa riisiä m g / chicken korma vl g, dark rice m g
						Pintopapu-kasvisgratiinia l g / gratinated pinto beans and vegetables l g
						Kasvisborssikeittoa m g / vegetable borch soup m g
						Lämminsavulohisalaattia m g / smoked salmon salad m g
						Leipä lounas / bread lunch
						Kauden hedelmä / fruit
                		</p>
                	</div>
                </li>

                <li class="bg1">
                    <div class="heading">Thursday / Torstai</div>
                    <div class="bgDescription"></div>
                    <div class="description">
                        <h2>Thursday / Torstai</h2>
                        <p>Uunimakkaraa M G, juustokastiketta L, keitettyjä perunoita M G / Ovenbaked sausage M G, cheese sauce L, boiled potatoes M G L /
							Broilerikormaa VL G, tummaa riisiä M G / Chicken korma VL G, dark rice M G G M N /
							Pintopapu-kasvisgratiinia L G / Gratinated pinto beans and vegetables L G G L N S /
							Kasvisborssikeittoa M G / Vegetable borch soup M G G M N S /
							Lämminsavulohisalaattia M G / Smoked salmon salad M G G M N S /
							Leipä lounas / bread lunch /
							Kauden hedelmä / Fruit /</p>
                        <a href="#">more &rarr;</a>
                    </div>
                </li>

                <li class="bg2">
                    <div class="heading">Wednesday / Keskiviikko</div>
                    <div class="bgDescription"></div>
                    <div class="description">
                        <h2>Wednesday / Keskiviikko</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                            quae ab illo inventore veritatis et quasi architecto beatae vitae
                            dicta sunt explicabo. </p>
                        <a href="#">more &rarr;</a>
                    </div>

                </li>
                <li class="bg3">
                    <div class="heading">Tuesday / Tiistai</div>
                    <div class="bgDescription"></div>
                    <div class="description">
                        <h2>Tuesday / Tiistai</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur.</p>
                        <a href="#">more &rarr;</a>
                    </div>

                </li>
                <li class="bg4 bleft">
                    <div class="heading">Monday / Maanantai</div>
                    <div class="bgDescription"></div>
                    <div class="description">
                        <h2>Monday / Maanantai</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                            quae ab illo inventore veritatis et quasi architecto beatae vitae
                            dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                            sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                            dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <a href="#">more &rarr;</a>
                    </div>

                </li>
            </ul>
-->
<?
/* Print each menu */
$palmia->ruokalista = array_reverse($palmia->ruokalista);
echo '<ul class="accordion" id="accordion">';
$i=0;
foreach ($palmia->ruokalista as $dayMenus)
{
	$i++;
	//each list is for each day of the week
	echo '<li class="bg'. $i. '">';
	echo '<div class="heading">';
		//Use cases switch
		switch ($i) {
		    case 1:
		        echo "Friday";
		        break;
		    case 2:
		        echo "Thursday";
		        break;
		    case 3:
		        echo "Wednesday";
		        break;
		    case 4:
		    	echo "Tuesday";
		    	break;
	    	case 5:
	    		echo "Monday";
	    		break;
		}
		echo '</div>';
		echo '<div class="bgDescription"></div>';

				echo '<div class="description">' ;
				echo '<h2>';
				switch ($i) {
				    case 1:
				        echo "Friday";
				        break;
				    case 2:
				        echo "Thursday";
				        break;
				    case 3:
				        echo "Wednesday";
				        break;
				    case 4:
				    	echo "Tuesday";
				    	break;
			    	case 5:
			    		echo "Monday";
			    		break;
				}
				echo '</h2>';
				for ($menu=0; $menu < count($dayMenus); $menu++) { 
					echo '<p>'. $dayMenus[$menu] . '</p>';
				}
				
				echo '</div>';
	echo '</li>';
}
echo '</ul>';
?>
</div>
<?
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
?>