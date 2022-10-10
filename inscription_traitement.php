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
     <h1><a href="index.php">E-Project</a></h1>
    <div class="onglets">
	  <p class='link'><a href='profil.php?id=<?php echo $_SESSION['id'];?>'>profil</a></p>
      <p class="link"><a href="new.php">Nouveautés</a></p>
      <p class="link"><a href="consoles.php">Consoles</a></p>
      <p class="link"><a href="jeu.php">Jeux</a></p>
      <p class="link"><a href="accessoires.php">Accessoires</a></p>

      <p class="link"><a href="inscription.html">inscription</a></p> 
      <p class="link"><a href="connexion.php">connexion</a></p>
      <p class="link"><a href="Contact.php">Contact</a></p>
      <form>
        <input type="search" placeholder="Rechercher">
      </form>
      
      <p><a href="panier.php"></p><i class="fas fa-shopping-cart"></i></a></p>
    </div>
  </nav>
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
   <header>
     <h1>Inscrivez vous maintenant !</h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
   <?php


$conn = new mysqli('localhost','root','','e-project');

      
$email=$_POST["email"];
$pseudo=$_POST["pseudo"];
$password=sha1($_POST["password"]);
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$anniversaire=$_POST["anniversaire"];
$sexe=$_POST["sexe"];   
//if(isset($_POST['email'])==true OR isset($_POST['pseudo'])==true  OR isset($_POST['password'])==true OR isset($_POST['nom'])==true OR isset($_POST['prenom'])==true 
//OR isset($_POST['anniversaire'])==true OR isset($_POST['sexe'])==true)
//{

$inscription = "INSERT INTO user (pseudo,email,password,sexe,prenom,nom,anniversaire) VALUES ('$pseudo','$email','$password','$sexe','$prenom','$nom','$anniversaire')";

if ($conn->query($inscription)== TRUE)
{
    echo "<center>Votre compte à bien été ajouter ! </center> ";
    
}

//}
//else
//{
//    echo "Vous n'êtes pas encore inscrit";
//}

 ?> 
  

       

    <!-- Fin de la video de presentation -->
  </section>
  <!-- Fin de la section principale -->
  
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