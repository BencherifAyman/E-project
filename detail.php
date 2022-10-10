<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=e-project', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']); //permet de sécurisé est que l'utilisateur obligé d'avoir un nbr en id
   $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?'); 
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
    //permet d'obtenir les informations de la base de donné)
   $_SESSION['userid']=$userinfo['id'];
   $_SESSION['pseudo']=$userinfo['pseudo']
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
     <h1>C'est votre boutique, votre chez-vous.</h1>
     
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
<?php
include("inc_connexion.php");
$maConnexion=connexion();

  //requête pour la table jeu
	$id_produit=$_GET["id_produit"];
  if($id_produit>=1 AND $id_produit<=3)
  {
    $req="select * FROM jeu where id_produit=$id_produit";
  $resultat=mysql_query($req);
  $ligne=mysql_fetch_array($resultat);
  $_SESSION['id_produit']=$ligne["id_produit"];

  }
  else if($id_produit>3 AND $id_produit<=6)
  {
     $req="select * FROM console where id_produit=$id_produit";
  $resultat=mysql_query($req);
  $ligne=mysql_fetch_array($resultat);
  $_SESSION['id_produit']=$ligne["id_produit"];
  }
  else{
     $req="select * FROM accessoire where id_produit=$id_produit";
  $resultat=mysql_query($req);
  $ligne=mysql_fetch_array($resultat);
  $_SESSION['id_produit']=$ligne["id_produit"];
  }
	
?>
<center> <h2> <g> FICHE DETAILLEE <?php echo strtoupper($ligne["Nom_Produit"]);?> </g> </h2> </center>
<?php

echo "Decription : ".$ligne["description"]. " <img src=image/".$ligne["image"]." width='280px' height='218px' > </td> </br>" ;
echo "Prix :".$ligne["Prix_Unitaire"]."$";

 ?>
   <?php
              if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'] AND$_SESSION['id']!=1 )
               {
              	
              	
              	?>
   				<form method="POST" action="achattraitement.php">
           		 <table>

             	<tr><td>quantité: 
		             <td><select name="quantite" id="quantite">
						    <option value="1">1</option>
						    <option value="2">2</option>
						    <option value="3">3</option>
						    <option value="4">4</option>
						    <option value="5">5</option>
						    <option value="6">6</option>
						     <option value="7">7</option>
						    <option value="8">8</option>
						    <option value="9">9</option>
						    <option value="10">10</option>
						</select>
					</h2>
						<input type='submit'  value='Ajouter au panier !' />
					</td>
				</tr>

           </table>
			
		</form>
		<a href='index.php'>retourner à l'accueil </a>
              	<?php
               }
              else
              {
              	echo" <a href='connexion.php'>veuillez vous connectez pour acheter !</a>";
              }
     ?>
              
         <?php
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