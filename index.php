<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>actionadvisor</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">
  </head>

  <body background="photo/background.jpg">
    
    <div class="container">
        <a><img style="height: 3em;
    float:right;" id="imgEsigelec" src="http://www.esigelec.fr/sites/default/files/esigelec_logo.png" alt="logo Esigelec">
        </a>
      <form class="form-signin" style="padding-top: 90px;" method="post" action="masterpage.php">
        <h2 class="form-signin-heading">Action Advisor Connexion</h2>
        
        <?php // Message d'erreur si mauvais identifiants, nettoyage des variables de session
         /* if(isset($_SESSION['form_erreur'])){
              echo '<div class="alert alert-danger" role="alert"> Mail ou mot de passe incorrect</div>';
              session_unset();
          }*/
        ?>

        <input type="email" id="mail" name="mail" class="form-control" onFocus="select()" placeholder="Username" required>
        <input type="password" id="password" name="password" class="form-control"  onFocus="select()" placeholder="Mot de passe" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button> <!-- Validation du form -->
        <a class="btn btn-lg btn-secondary btn-block" href="inscription.php">Inscription</a> <!-- Redirection page d'inscritpion -->
      </form>

    </div> <!-- /container -->
      
     <div id="footer" style="  text-align:center;font-size: 12px;margin-top:40px;">&copy;Copyright x IF-Groupe1 x 2018<br/>
            <a href="https://github.com/DiiBienCuit/actionadvisor">Find us on GitLab</a>  
      </div> 
  </body>
</html>

