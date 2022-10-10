<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=e-project', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']); //permet de sécurisé est que l'utilisateur obligé d'avoir un nbr en id
   $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?'); 
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
    //permet d'obtenir les informations de la base de donné)
?>

<!DOCTYPE html>
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
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
          <link rel="stylesheet" href="style.css" />
   </head>
  <body>

    
              <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
              <br /><br />
              Pseudo = <?php echo $userinfo['pseudo']; ?>
             
              <?php
              if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'] AND $_SESSION['id']!=1) {
              ?>
               <br />
              Mail = <?php echo $userinfo['email']; ?>
              <br />
              

              <a href="editionprofil.php">Editer mon profil</a>
              <a href="deconexion.php">Se déconnecter</a>
         <?php
         }
       }
         ?>
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



