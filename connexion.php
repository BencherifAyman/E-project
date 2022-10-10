<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=e-project', 'root', '');

 $_SESSION['id']=1;
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) 
   {
      $requser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id']; //recupère les infos dans la base de donné pour pouvoir vérifier que l'id/ pseudo/mail existe
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: index.php?id=".$_SESSION['id']); // si sa existe lorsqu'il se connecte il serra dirigé vers son profil
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
         
         
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}


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
     <h1>Veuillez vous connectez !</h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">

  <form method="POST" action="">
      <table  >
             <tr>
                <td align="right"> 
                    <h2><label class="link"> Mail: </label></h2> 
                </td>
                <td>
                    <input type="email" name="mailconnect" placeholder="entrez votre mail" />
                </td>
            </tr>
            <tr>
                <td align="right"> 
                    <h2><label class="link"> Mot de passe:</label></h2>
                </td>
                <td>
                    <input type="password" name="mdpconnect" placeholder="Mot de passe" />
                  </td>
            </tr>
        </table>  
        
            <center > <input type="submit" name="formconnexion" value="Se connecter !" /></center>
       
            </form> 
        <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
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