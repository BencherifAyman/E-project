<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-project<</title>
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
     <h1>Bienvenue dans la section jeu</h1>
     
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
    <!-- Toutes les cartes -->
    
    <div class="cards">
      
      <div class="card">
        <a href="lego.html">
        <img src="image/starwars.jpg"></a>
        <div class="card-header">
          <h4 class="title">LEGO Star Wars</h4>
          <h4 class="price">37.79$</h4>
        </div>
        <div class="card-body">
          <p></p>
        </div>
      </div>
      
      <div class="card">
        <a href="sniperelite.html">
        <img src="image/sniperelite.jpg"></a>
        <div class="card-header">
         
         <h4 class="title">Sniper Elite 5</h4>
         <h4 class="price">37.49$</h4>
        
        </div>
        <div class="card-body">
          <p></p>
        </div>
      </div>
      
      <div class="card">
        <a href="spicewars.html">
        <img src="image/spicewars.jpg"></a>
        <div class="card-header">
          <h4 class="title">Dune: Spice Wars</h4>
          <h4 class="price">19.66$</h4>
        </div>
        <div class="card-body">
          <p></p>
        </div>
      </div>
      
     </div>
    <!-- Fin de toutes les cartes -->
 
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