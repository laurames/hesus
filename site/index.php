<!--
	Copyright 2009 Jeremie Tisseau
	"Sliding Login Panel with jQuery 1.3.2" is distributed under the GNU General Public License version 3:
	http://www.gnu.org/licenses/gpl-3.0.html
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  	<title>Metropolia Multi-touch application</title>
  	<meta name="description" content="multi-touch application" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- Needed for multitouch screen-->
	<meta name=”viewport” content=”width=device-width, initial-scale=1.0, user-scalable=no”>	

	<!-- stylesheets -->
  	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="css/lunchmenus.css" type="text/css" media="screen" />
	
  	<!-- PNG FIX for IE6 -->
  	<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
	<!--[if lte IE 6]>
		<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
	<![endif]-->
	 
    <!-- jQuery - the core -->
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>

	<script src="http://code.jquery.com/jquery-1.9.0.js" type="text/javascript"></script>

	<!--multit touch plugin hammer.js -->
	<script type="text/javascript" src="js/hammer.js"></script>
	<script type="text/javascript" src="js/jquery.hammer.js"></script>

	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>
	<!-- Canvas -->
	<script src="js/canvas.js" type="text/javascript"></script>
	<!-- Lunch menus -->
	<script src="js/functions_lunchmenus.js" type="text/javascript"></script>

</head>

<body onload="draw()" onresize="draw()">
<!-- Panel -->
<div id="sidePanel">
        <div id="panelContent">
                <!-- Lunch menus -->
                <?php
					/*
					Menus only for vanha maantie 6 campus
					catering from Palmia
					@author Someone
					@edited Karol
					*/
					$palmia = new Ravintola('vanhamaantie');
					$palmia->parsiRuokalista();

					/* Print each menu */
					$palmia->ruokalista = array_reverse($palmia->ruokalista);
					echo '<ul class="accordion" id="accordion">';
					$i=0;
					foreach ($palmia->ruokalista as $dayMenus)
					{
						$i++;
						switch ($i) {
						    case 1:
						        $day = "Friday";
						        break;
						    case 2:
						        $day = "Thursday";
						        break;
						    case 3:
						        $day = "Wednesday";
						        break;
						    case 4:
						    	$day = "Tuesday";
						    	break;
					    	case 5:
					    		$day = "Monday";
					    		break;
						}
						//each list is for each day of the week
						echo '<li class="bg'. $i. '">';
							//Use cases-switch to print day
							echo '<div class="heading">'. $day .'</div>';

							echo '<div class="bgDescription"></div>';

								echo '<div class="description">' ;
								//Use cases switch to print day
								echo '<h2>'. $day .'</h2>';

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
							//$this->toimipiste is always = vanhamaantie
							$ravintola_id = '108';

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
				</div>
                <!-- endlunchmenus -->
        </div>
        <div id="panelHandle">
			<ul>
				<li id="toggle">
					<p id="open" class="open">Open</p>
					<p id="close" style="display: none;" class="close">Close</p>
				</li>
			</ul>
		</div>        
</div> <!--panel -->

    <div id="container">
		<div id="content">
			<canvas id="canvas" class="cf">

			</canvas>
		</div><!-- / content -->		
	</div><!-- / container -->
</body>
</html>
