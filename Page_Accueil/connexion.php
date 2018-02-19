<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
   </head>
   <body>
     
      <?php include("G:\Megaport\Mahjong_perso\Mahjong\connexion2.php") ?>
      <div align="center">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <table>
            <tr>
                  <td align="right">
                     <label for="pseudo">Nom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre nom" id="name" name="name"/>
                  </td>
               </tr>
            <tr>
                  <td align="right">
                     <label for="pseudo">Prénom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre prénom" id="firstname" name="firstname" />
                  </td>
               </tr>
            <tr>
                  <td align="right">
                     <label for="pseudo">Nom dutilisateur :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre nom dutilisateur" id="username" name="username"  />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo"  />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail"  />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"  />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je minscris" />
                  </td>
               </tr>
            </table>
         </form>
        
      </div>
   </body>
</html>

