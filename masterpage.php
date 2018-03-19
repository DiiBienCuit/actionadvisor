<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <title>actionadvisor</title>
    <script>
    function updateData(data){
        console.log(data.dataset_data.data[1][0]);
        console.log(data.dataset_data.data[1][4]);
    }
    $.getJSON("https://www.quandl.com/api/v3/datasets/EURONEXT/BN/data.json?api_key=Zvxsyh15Zw6CniyvnpoL&start_date=2018-02-01&order=asc", updateData);
    
    </script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">
  </head>

  <body background="photo/background.jpg">
     
  <div>
  <h2>Mes entreprises</h2>
    <div style="padding:20px 70px 100px 70px;">
    <a class="btn btn-lg btn-secondary btn-block" href="../entreprises_details/airbus.php"><img height=40px weight=120px src="../photo/airbus.png" alt="Logo Airbus"></a>
    <a class="btn btn-lg btn-secondary btn-block" href="../entreprises_details/loreal.php"><img height=40px weight=120px src="../photo/loreal.png" alt="Logo Loreal"></a>
    <a class="btn btn-lg btn-secondary btn-block" href="../entreprises_details/biomerieux.php"><img height=40px weight=120px src="../photo/biomerieux.png" alt="Logo biomerieux"></a>
    <a class="btn btn-lg btn-secondary btn-block" href="../entreprises_details/danone.php"><img height=40px weight=120px src="../photo/danone.png" alt="Logo danone"></a>
    <a class="btn btn-lg btn-secondary btn-block" href="../entreprises_details/korian.php"><img height=40px weight=120px src="../photo/korian.png" alt="Logo korian"></a>
    <a class="btn btn-lg btn-secondary btn-block" href="../entreprises_details/sopra.php"><img height=40px weight=120px src="../photo/sopra.png" alt="Logo Sopra"></a>
  </div>
  </div>
  
    
    
  </body>
</html>

