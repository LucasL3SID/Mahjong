<?php

$dbHost = "telline.univ-tlse3.fr";
$dbHostPort = "1521";
$dbServiceName = "etupre";
$usr = "GLC2017A";
$pswd = "naves19";
$dbConnStr = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)
      (HOST = ".$dbHost.")(PORT = ".$dbHostPort."))
      (CONNECT_DATA = (SERVICE_NAME = ".$dbServiceName.")))";
if(!$dbConnStr = oci_connect($usr, $pswd, $dbConnStr)){
   $err = oci_error();
   trigger_error('Could not establish a connection: ' $err['message', E_USER_ERROR);   
}

if(isset($_POST['forminscription'])) {
   $name = htmlspecialchars($_POST['name']);
   $firstname = htmlspecialchars($_POST['firstname']);
   $username = htmlspecialchars($_POST['username']);
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']); 
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['name']) AND !empty($_POST['firstname']) AND !empty($_POST['username']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 50) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM PLAYER WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO PLAYER(id_player, name, firstname, username, pseudo, mail, password, administrator, level) VALUES(1, ?, ? ,? ,?, ?, ?, 0, 1)");
                     $insertmbr->execute(array($name, $firstname, $username, $pseudo, $mail, $mdp));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 50 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         } ?>


         
