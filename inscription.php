<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-project</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
</head>
<body>
  <!-- Barre de navigation -->
  <nav>
   <h1><a href="index.php?id=<?php echo $_SESSION['id'];?>">E-Project</a></h1>
    <div class="onglets">     
      <p class='link'><a href='profil.php?id=<?php echo $_SESSION['id'];?>'>profil</a></p>
      <p class="link"><a href="new.php?id=<?php echo $_SESSION['id'];?>">Nouveautés</a></p>
      <p class="link"><a href="consoles.php?id=<?php echo $_SESSION['id'];?>">Consoles</a></p>
      <p class="link"><a href="jeu.php?id=<?php echo $_SESSION['id'];?>">Jeux</a></p>
      <p class="link"><a href="accessoires.php?id=<?php echo $_SESSION['id'];?>">Accessoires</a></p>

      <p class="link"><a href="inscription.php?id=<?php echo $_SESSION['id'];?>">inscription</a></p> 
      <p class="link"><a href="connexion.php">connexion</a></p>
      <p class="link"><a href="Contact.php?id=<?php echo $_SESSION['id'];?>">Contact</a></p>
     <p class="link"><a href="deconexion.php">deconexion</a></p>
      <form>
      
      <p><a href="panier.php?id=<?php echo $_SESSION['id'];?>"></p><i class="fas fa-shopping-cart"></i></a></p>
    </div>
  </nav>
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
   <header>
     <h1>Vous pouvez maintenant vous connectez !</h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
   <form method="POST" action="inscription_traitement.php">
            <table>

             <tr>
                  <td align="right"> 
                     <h2><label class="link">Pseudo :</label></h2>
                  </td>
                  <td>
                    <input type="text" placeholder="Votre Pseudo" name="pseudo" />
                  </td>
               </tr>
               <tr>
                  <td align="right"> 
                     <h2><label class="link">Mail :</label></h2>
                  </td>
                  <td>
                    <input type="email" placeholder="Votre mail" name="email" />
                  </td>
               </tr>
              
               <tr>
                  <td align="right">
                     <h2><label class="link">Mot de passe :</label></h2>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" name="password" />
                  </td>
               </tr>
              <tr><td><h2><label class="link"> Sexe:</label> </h2></td>
                   <td><select name="sexe" id="Sexe">
                      <option value="Homme">Homme</option>
                      <option value="Femme">Femme</option>
                      
                  </select>
                  </td>
               </tr>
                <tr>
                  <td align="right">
                    <h2> <label class="link">Prénom :</label></h2>
                  </td>
                  <td>
                    <input type="text" placeholder="Prénom" name="prenom" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                    <h2> <label class="link">Nom :</label></h2>
                  </td>
                  <td>
                    <input type="text" placeholder="Nom" name="nom" />
                  </td>
               </tr>
                <tr>
                  <td align="right">
                    <h2> <label class="link">Date de naissance :</label></h2>
                  </td>
                  <td>
                    <input type="date"  placeholder="Anniversaire" name="anniversaire" />
                  </td>
               </tr>
            </table>
            <div class="bouton_inscription"><center><button> <h1>s'inscrire</h1></button></center></div>
         </form>
        

    

  </section>
  <!-- Fin de la section principale -->
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- Pied de page -->
  <footer>
    <p>&copy; Contactez-nous au 07 68 10 24 22</p>
    <div class="social-media">
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
      <p><i class="fab fa-instagram"></i></p>
      <p><i class="fab fa-linkedin-in"></i></p>
    </div>
    
  </footer>
  <!-- Fin du pied de page -->
</body>
</html>