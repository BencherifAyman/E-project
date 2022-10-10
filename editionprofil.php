<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=e-project', 'root', '');
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email']) {
      $newemail = htmlspecialchars($_POST['newemail']);
      $insertemail = $bdd->prepare("UPDATE user SET email = ? WHERE id = ?");
      $insertemail->execute(array($newemail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE user SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }

   if(isset($_POST['newpseudo']) AND $_POST['newpseudo']== $user['pseudo'])
   {
       header('Location: profil.php?id='.$_SESSION['id']);

   }
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
     <h1>Les nouveautées du moment !</h1>
     
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
                     <h2>Edition de mon profil</h2>
                        
                           <form method="POST" action="" enctype="multipart/form-data">
                           <label>Pseudo :</label>
                           <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
                           <label>email :</label>
                           <input type="text" name="newemail" placeholder="email" value="<?php echo $user['email']; ?>" /><br /><br />
                           <label>Mot de passe :</label>
                           <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                           <label>Confirmation - mot de passe :</label>
                           <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
                           <input type="submit" value="Mettre à jour mon profil !" />
                           <input type="submit" value="Retour au profil !" />
                     </form>
            <?php if(isset($msg))
             {
            echo'<font color="red">' .$msg."</font>"; //permet de mettre une phrase pour l'erreur qui serra séléctionner en fonction du code audessus
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

 
<?php   
}
else {
   header("Location: index.php");
}
?>