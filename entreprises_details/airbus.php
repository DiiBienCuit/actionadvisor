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
    <title>AIRBUS</title>
    <script>
    function updateData(data){
        console.log(data.dataset_data.data[1][0]);
        console.log(data.dataset_data.data[1][4]);
    }
    $.getJSON("https://www.quandl.com/api/v3/datasets/EURONEXT/BN/data.json?api_key=Zvxsyh15Zw6CniyvnpoL&start_date=2018-02-01&end_date=2018-03-13&order=asc", updateData);
    
    </script>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">
  </head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">AIRBUS</a>
      
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../index.php">Sign out</a>
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
                <button class="btn btn-sm btn-outline-secondary">Bollinger</button>
                <button class="btn btn-sm btn-outline-secondary">Moyenne mobile</button>
                <button class="btn btn-sm btn-outline-secondary">RSI</button>
                <button class="btn btn-sm btn-outline-secondary">Momentums</button>
              </div>
              <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                <span data-feather="calendar"></span>
                Interval
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">7 jours</a></li>
                <li><a href="#">1 mois</a></li>
                <li><a href="#">3 mois</a></li>
                <li><a href="#">6 mois</a></li>
            </ul>  
            </div>
            </div>
          </div>
            
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

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
                  <td>1</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                
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
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 15555],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>

