<?php
include("inc_connexion.php");

$maConnexion=connexion();
$req="select * FROM jeu";
$resultat=mysql_query($req);
$req=mysql_fetch_array($resultat)
?>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=e-project', 'root', '');
 $_SESSION['id']=1;
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']); //permet de sécurisé est que l'utilisateur obligé d'avoir un nbr en id
   $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?'); 
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   $_SESSION['userid']=$userinfo['id'];
   $_SESSION['id']=$_SESSION['userid'];
    //permet d'obtenir les informations de la base de donné)
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wid_produitth=device-wid_produitth, initial-scale=1">
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
      <p class="link"><a href="connexion.php?id=<?php echo $_SESSION['id'];?>">connexion</a></p>
      <p class="link"><a href="Contact.php?id=<?php echo $_SESSION['id'];?>">Contact</a></p>
      <p class="link"><a href="deconexion.php">deconexion</a></p>

        <input type="search" placeholder="Rechercher">
      </form>
      
      
      <p><a href="panier.php"></p><i class="fas fa-shopping-cart"></i></a></p>
    </div>
  </nav>
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
   <header>
     <h1>C'est votre boutique, votre chez-vous.</h1>
     
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
    <!-- Toutes les cartes -->
    <table>
    <?php $req="select * FROM jeu";
  $resultat=mysql_query($req);
  while($req=mysql_fetch_array($resultat))
  {
    echo "<tr>";
    echo "<div class='cards'>";  
    echo " <div class='card'>";

      echo " <td>";
      echo "<img src=image/".$req["image"].">";
      echo "<div class='card-header'>";
        echo "  <h4 class='title'>".$req["Nom_Produit"]."</h4>";

        echo "  <h4 class='price'>";
        

        echo "<a href='detail.php?id_produit=".$req["id_produit"]."&&"."id=".$_SESSION['id']."'>ajouter au panier !</a> ".$req["Prix_Unitaire"]."$</h4></form>";
      echo "  </div>";
      echo " <div class='card-body'>";
        echo "  <p> ".$req['description']; "</p>";
      echo "  </div>";
    echo "  </div>";
      
    echo " </div>";
    echo "</td>";
    echo "</tr>";
      }
     ?>
</table>
    <!-- Fin de toutes les cartes -->

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