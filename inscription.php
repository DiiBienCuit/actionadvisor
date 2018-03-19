<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="page of inscription">
    <meta name="author" content="Di CUI">


    <title>Inscription</title>

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
      <form class="form-signin" style="padding-top: 90px;" method="post" action="inscription_post.php">
        <h2 class="form-signin-heading">S'insrire</h2>
          
         
          
         <!-- For every input, add a name in order to catch the value -->
          
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email" required>
          
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
          
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">S'enregistrer</button>
        <a class="btn btn-lg btn-secondary btn-block" href="index.php">Se connecter</a>
      </form>

    </div> <!-- /container -->
 <div id="footer" style="text-align:center;font-size: 12px;margin-top:40px;">&copy;Copyright x IF-Groupe1 x 2018<br/>
            <a href="https://github.com/DiiBienCuit/actionadvisor">Find us on GitLab</a>  
      </div> 
  </body>
</html>

