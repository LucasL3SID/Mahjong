<!DOCTYPE html>

<html lang="fr" >

  <head>
    <title id="index">Niveau</title>
    <meta charset="utf-8">
  </head>
  <body>
  <script src="..\js\javascript.js"></script>

	<?php
		include("db/connect.php");
	
		$cpt = 1;
		for ($i=0; $i<=8; $i++) {
			for ($j=0; $j<=10; $j++) {
				$tabas[$i][$j] = '<button = '.$cpt.' onclick="test()"><img src="..\photo\Fruits\T_F_abricot.png" onclick="test()" height="40"/></button>';
				$cpt = $cpt + 1;
			}
		}
		for ($i=0; $i<=8; $i++) {
			for ($j=0; $j<=10; $j++) {
				echo $tabas[$i][$j];
			}
		}	

	?>	
	
	
  </body>
  </html>
  
  
