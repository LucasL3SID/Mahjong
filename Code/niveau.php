<!DOCTYPE html>

<html lang="fr" >

  <head>
    <title id="index">Niveau</title>
    <meta charset="utf-8">
  </head>
  <body>
  <center>
	<?php 
		for ($i=0; $i<=8; $i++) {
			for ($j=0; $j<=12; $j++) {
				$tabas[$i][$j] = '<img src="..\photo\Fruits\T_F_abricot.png" height="40"/>';
			}
		}
		echo print_r($tabas[1][1]);
		echo print_r($tabas[1][2]);
	?>	
		

  </table>
  </center>
  
  </body>
  </html>
  
  
  