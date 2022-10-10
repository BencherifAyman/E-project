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
      <p class='link'><a href="profil.php?id=<?php echo $_SESSION['id'];?>">profil</a></p>
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
  <?php
  	
  	echo $_SESSION['id'];
  	 if($_SESSION['id']>1)
  	{


  		?>
  		
  <!-- Header -->
   <header>
     <h1>Voici votre panier <?php if($_SESSION['id']>1){ echo $_SESSION['pseudo'];}else{echo "Visiteur";}?>  </h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">

<?php
include("inc_connexion.php");
$maConnexion=connexion();

  $id_produit=$_SESSION['id_produit'];
  $req="select * FROM jeu where id_produit=$id_produit";
  $resultat=mysql_query($req);
$id_user=$_SESSION['userid'];
?>
<table border='1'>

<tr>
			    <th>Nom du produit</th>
			    <th>Description</th>
			    <th>produit</th>
			    <th>Prix pour un seul produit</th>
			    <th>Quantité voulu</th>
			    <th>Prix</th>
			  </tr>

<?php

//echo $_SESSION['userid'];21
//echo$_SESSION['id']; 1 
 if(isset($_SESSION['id']) AND $_SESSION['userid'] == $_SESSION['id'])
               {

	$req="SELECT * FROM panier, jeu WHERE jeu.id_produit=panier.id_produit AND id_user=$id_user AND  panier.id_produit BETWEEN '1' AND '3'";
	$resultat=mysql_query($req);
	$calculPrixJeu=0;
	$prixTotalJeu=0;
	
		while($jeu=mysql_fetch_array($resultat))
	{
		$jeu['Prix_Unitaire'];
		$jeu['Quantite'];
		$calculPrixJeu=$jeu['Prix_Unitaire']*$jeu['Quantite'];
		$prixTotalJeu=$prixTotalJeu+$calculPrixJeu;
		
		echo "<tr align='center'>";	
			echo '<td>'.$jeu["Nom_Produit"]."</td> " ;
			echo '<td>'.$jeu["description"]."</td> " ;
			echo" <td> <img src=image/".$jeu["image"]." width='280px' height='218px'> </td>" ;
			echo "<td>"; echo $jeu["Prix_Unitaire"]."$ </td>" ;
			echo '<td>'.$jeu["Quantite"]."</td> " ;
			echo '<td>'.$calculPrixJeu."</td> " ;
		}
			?>

			<?php
if(isset($_SESSION['id']) AND $_SESSION['userid'] == $_SESSION['id'])
               {

	$req="SELECT * FROM panier,console WHERE console.id_produit=panier.id_produit AND id_user=$id_user AND  panier.id_produit BETWEEN '4' AND '6'";
	$resultat=mysql_query($req);
	$calculPrixConsole=0;
	$prixTotalConsole=0;
	
	
		while($console=mysql_fetch_array($resultat))
	{
		$console['Prix_Unitaire'];
		$console['Quantite'];
		$calculPrixConsole=$console['Prix_Unitaire']*$console['Quantite'];
		$prixTotalConsole=$prixTotalConsole+$calculPrixConsole;
			echo "<tr align='center'>";
			echo '<td>'.$console["Nom_Produit"]."</td> " ;
			echo '<td>'.$console["description"]."</td> " ;
			echo" <td> <img src=image/".$console["image"]." width='280px' height='218px'> </td>" ;
			echo "<td>"; echo $console["Prix_Unitaire"]."$ </td>" ;
			echo '<td>'.$console["Quantite"]."</td> " ;
			echo '<td>'.$calculPrixConsole."</td> " ;
			


}



			 ?>
			 <?php
if(isset($_SESSION['id']) AND $_SESSION['userid'] == $_SESSION['id'])
               {

	$req="SELECT * FROM panier,accessoire WHERE accessoire.id_produit=panier.id_produit AND id_user=$id_user AND  panier.id_produit BETWEEN '7' AND '9'";
	$resultat=mysql_query($req);
	
	$prixTotalAccessoire=0;
	$prixtotal=0;
		while($accessoire=mysql_fetch_array($resultat))
	{
		$accessoire['Prix_Unitaire'];
		$accessoire['Quantite'];
		$calculPrixAccessoire=$accessoire['Prix_Unitaire']*$accessoire['Quantite'];
		$prixTotalAccessoire=$prixTotalAccessoire+$calculPrixAccessoire;
	$accessoire['id_produit'];
		echo "<tr align='center'>";	
			echo '<td>'.$accessoire["Nom_Produit"]."</td> " ;
			echo '<td>'.$accessoire["description"]."</td> " ;
			echo" <td> <img src=image/".$accessoire["image"]." width='280px' height='218px'> </td>" ;
			echo "<td>"; echo $accessoire["Prix_Unitaire"]."$ </td>" ;
			echo '<td>'.$accessoire["Quantite"]."</td> " ;
			echo '<td>'.$calculPrixAccessoire."</td> " ;
			$prixTotal=$prixTotalJeu+$prixTotalConsole+$prixTotalAccessoire;

}
}


			 ?>
			<?php
			if($prixTotal>$calculPrixJeu AND $prixTotal>$calculPrixConsole AND $prixTotal>$calculPrixAccessoire)
			{
				echo"</tr>
			 <tr align='center'>
			 	  <td>prix Total :</td> 
				  <td colspan='6'>".$prixTotal."</td>";
		
		echo "</tr>";
			}
		
			
	       
                  }
                 
                }
              else{
          echo" <h2>Vous ne possedez pas de panier en tant que visiteur </h2><a href='connexion.php'>veuillez vous connectez !</a>";
      }



	
?>
</table>
<?php  }
			 else {
			 		echo "<h1>Vous n'avez pas de compte afin d'accéder à votre panier, veuillez vous connectez ou vous en créer un</h1>";
			 }

?>

</section>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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