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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../airbus.js"></script>
    <title>AIRBUS</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script>  
    var interval = 60;
    </script>
  </head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">AIRBUS</a>
      
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../index.php">Se deconnecter</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="../masterpage.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
             

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Mes entreprises</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="../entreprises_details/airbus.php">
                  <span data-feather="activity"></span>
                  Airbus
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../entreprises_details/biomerieux.php">
                  <span data-feather="activity"></span>
                  Biomerieux
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../entreprises_details/loreal.php">
                  <span data-feather="activity"></span>
                  L'Oreal
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../entreprises_details/sopra.php">
                  <span data-feather="activity"></span>
                  Sopra Steria
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../entreprises_details/danone.php">
                  <span data-feather="activity"></span>
                  Danone
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../entreprises_details/korian.php">
                  <span data-feather="activity"></span>
                  Korian
                </a>
              </li>
            </ul>
          </div>
        </nav>
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard Airbus (AIR)</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Cours</button>
                <button class="btn btn-sm btn-outline-secondary">Bollingers</button>
              </div>

            </div>
          </div>
        
            <h4>Conseil:</h4>
            <h4 class="conseil" id="conseil-airbus">En train d'analyser..</h4>
         <div id="chartContainer" style="height: 300px; width: 100%;"></div>   
          <h2>Nouvelles de l'entreprise</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Note</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="time1"></td>
                  <td id="title1"></td>
                  <td id="des1"></td>
                  <td id="note1">
                      <form action="../newsNote.php">
 <input type="text" name="airbusNote1" value=""><br>
<input type="submit" value="Valider">
</form></td>
                </tr>
                <tr>
                  <td id="time2"></td>
                  <td id="title2"></td>
                  <td id="des2"></td>
                  <td id="note2">                      <form action="../newsNote.php">
 <input type="text" name="airbusNote2" value=""><br>
<input type="submit" value="Valider">
</form></td>
                </tr>
                <tr>
                  <td id="time3"></td>
                  <td id="title3"></td>
                  <td id="des3"></td>
                  <td id="note3">                      <form action="../newsNote.php">
 <input type="text" name="airbusNote3" value=""><br>
<input type="submit" value="Valider">
</form></td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
   
  
    <!-- Graphs -->
    <script type="text/javascript" scr="../airbus.js"></script>
    <script>
    var dataPoints =[];
var chart = new CanvasJS.Chart("chartContainer", {
animationEnabled: true,
exportEnabled: true,
responsive:true,
zoomEnabled: true,
title: {
    text: "Cours - Airbus"
},
toolTip: {
		shared: true
	},
axisY: {
    title: "Price",
    includeZero: false
},
data: [{
    type: "line",
    name:"cours",
    color: "#DD7E86",
    yValueFormatString: "€##0.00",
    dataPoints: dataPoints
}]
});

//$.getJSON("https://www.quandl.com/api/v3/datasets/EURONEXT/BN.json?api_key=Zvxsyh15Zw6CniyvnpoL&start_date=2017-12-20&order=desc", addData);
    </script>
  </body>
</html>

