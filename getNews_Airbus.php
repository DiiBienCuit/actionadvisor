<?php session_start(); 
    // fonction pour verifier les entrees 

    $_SESSION['airbusNewsNote'] = "null";
    $entreprise = 'airbus';

    $host='localhost';
    $bdd='projet_it';
    $user='gr1003oLBE';
    $pass='axUebfjf';

    try{
        $bdd = new PDO('mysql:host='.$host.'; dbname='.$bdd.'; charset=utf8', $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $resultat = $bdd->prepare("SELECT SUM(note) FROM news WHERE entreprise = :entreprise GROUP BY entreprise");
    $resultat->execute(array("entreprise" => $entreprise));
    $res = $req->fetch();
    $_SESSION['airbusNewsNote'] = htmlspecialchars($res[0]);
    echo $_SESSION['airbusNewsNote'];
    header('Location: ../entreprises_details/airbus.php');
  
?>
<script type="text/javascript" scr="../airbus.js">newsNote = '<?php echo $_SESSION['airbusNewsNote'] ;?>';</script>
