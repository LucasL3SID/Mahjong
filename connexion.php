<?php
session_start();

include("db/connect.php");

if(isset($_POST['formconnexion'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = "SELECT id_joueur, pseudo, mail FROM JOUEUR WHERE pseudo = '$pseudoconnect' AND mot_de_passe = '$mdpconnect'";
      $requser2 = oci_parse($dbConn, $requser);
      if ( !oci_execute($requser2) ){
		echo 'Query failed: ' . $err['message'], E_USER_ERROR;
		$err = oci_error($requser2);
		trigger_error('Query failed: ' . $err['message'], E_USER_ERROR);
      };
      $userexist = oci_fetch_all($requser2, $out);
      echo $userexist;
      if($userexist == 1) {
         $_SESSION['id_joueur'] = oci_result($requser2, 1);
         $_SESSION['pseudo'] = oci_result($requser2, 2);
         $_SESSION['mail'] = oci_result($requser2, 3);
         header("Location: page_accueil.html?id=".$_SESSION['id_joueur']);
      } else {
         $erreur = "Mauvais pseudo ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="text" name="pseudoconnect" placeholder="Pseudo" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>
