<?php
session_start();
$connect = new mysqli("localhost","root","","e-project");
   
?>
<?php
include("inc_connexion.php");
$maConnexion=connexion();

  $id_produit=$_SESSION['id_produit'];
  $req="select * FROM jeu where id_produit=$id_produit";
  $resultat=mysql_query($req);
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
      
      < <p><a href="panier.php?id=<?php echo $_SESSION['id'];?>"></p><i class="fas fa-shopping-cart"></i></a></p>
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

      if(isset($_SESSION['id']) AND $_SESSION['userid'] == $_SESSION['id'])
               {
                  $id_produit=$_SESSION['id_produit'];
                  $quantite=$_POST["quantite"];  
                  
                  if($id_produit>=1 AND $id_produit<=3)
                    {
                      
                        $req="SELECT * FROM panier, jeu WHERE jeu.id_produit=panier.id_produit AND id_user=$id_user";
                        $resultat=mysql_query($req); 
                       
                    }
                  else if($id_produit>3 AND $id_produit<=6)
                    {
                       $req="SELECT * FROM panier, console WHERE console.id_produit=panier.id_produit AND id_user=$id_user";
                       $resultat=mysql_query($req); 
                       
                    }
                  else{
                      $req="SELECT * FROM panier, accessoire WHERE accessoire.id_produit=panier.id_produit AND id_user=$id_user";
                      $resultat=mysql_query($req); 
                    
                    }
                
                  $modification='false';
                  $nouvellequantite=0;
                  while($ligne=mysql_fetch_array($resultat))
                  {
                   if($id_produit==$ligne['id_produit']  AND $_SESSION['id']==$ligne['id_user'])
                   {
                   
                    $modification='true';
                    $nouvellequantite=$quantite+$ligne['Quantite'];
                   }
                 

                  }
                  
                  if($modification=='true')
                  {
                    $modifierpanier = "UPDATE panier set quantite=$nouvellequantite where id_produit=$id_produit AND id_user=$id_user";
                      if ($connect->query($modifierpanier)== TRUE)
                        {
                          header("Location: achat.php");
                          
                      
                        }
                      else
                        {
                          echo" <a href='connexion.php'>veuillez vous connectez !</a>";
                        }
                  }
                   if ($modification=='false')
                    { 
                      $ajoutpanier = "INSERT INTO panier (id_produit,id_user,Quantite) VALUES ('$id_produit','$id_user','$quantite')";
                      if ($connect->query($ajoutpanier)== TRUE)
                        {
                             header("Location: achat.php");
                      
                        }
                      else
                        {
                          echo" <a href='connexion.php'>veuillez vous connectez !</a>";
                        }
                     }
              

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