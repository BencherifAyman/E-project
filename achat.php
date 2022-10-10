<?php
session_start();
$connect = new mysqli("localhost","root","","e-project");
   
?>
<?php
include("inc_connexion.php");
$maConnexion=connexion();

  $id_produit=$_SESSION['id_produit'];
  $jeu="select * FROM jeu where id_produit=$id_produit";
  $resultat=mysql_query($jeu);
$id_user=$_SESSION['userid'];

?>

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
     <h1>Ajout au panier confirmer !</h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
   
             
       <?php

      if(isset($_SESSION['id']) AND $_SESSION['userid'] == $_SESSION['id'])
               {
                  $id_produit=$_SESSION['id_produit'];
                  
                  $req="SELECT * FROM panier, produit WHERE produit.id_produit=panier.id_produit AND id_user=$id_user";
                  $resultat=mysql_query($jeu); 

                          echo "<center>votre article à bien été ajouter ! </center> ";?>
                          <a href='index.php?id=<?php echo $_SESSION['id'];?>'><button>retour à l'acceuil</button></a>";
                          <?php
                      
                      
}       

 ?>       
         

  

       

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

  </footer>
  <!-- Fin du pied de page -->
</body>
</html>