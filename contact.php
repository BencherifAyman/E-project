<?php
    session_start();?>
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
        <input type="search" placeholder="Rechercher">
      </form>
      
      <p><a href="panier.php?id=<?php echo $_SESSION['id'];?>"></p><i class="fas fa-shopping-cart"></i></a></p>
    </div>
  </nav>
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
   <header>
     <h1>Contactez nous dès maintenant !</h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
      <?php
    
   
     if($_SESSION['id']>1)
    {


      ?>
   <form method="POST" action="contacttraitement.php">
            <table>

               <tr>
                  <td align="right">
                     <h2><label for="mail" class="link">Mail :</label></h2>
                  </td>
               </tr>
                  <td>
                   <input type="email" name="email" placeholder="entrez votre mail"  /> 
                  </td> 
              
               <tr>
                  <td align="right"> 
                     <h2><label class="link">Text</label></h2>
                  </td>
               </tr>
                  <td>
                    <textarea name="commentaire"></textarea>
                  </td>
               

            </table>
              <div class="bouton_inscription"><center><button> <h1>Envoyez</h1></a></button></center></div>
         </form>
    
    <!-- Video de presentation -->
    <!--<div class="video">
     <iframe src="https://www.youtube.com/embed/2COSkxxOtXY" allowfullscreen></iframe>
    </div>-->
    <!-- Fin de la video de presentation -->
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
  <?php }
  else {echo "<h2><center>Veuillez vous connectez afin de nous contacter ! </h2></center>";}?>
  </footer>

  <!-- Fin du pied de page -->
</body>
</html>