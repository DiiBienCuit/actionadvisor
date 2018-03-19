<?php session_start(); 
    // fonction pour verifier les entrees 
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    $password = test_input($_POST['inputPassword']);
	$mail = test_input($_POST['inputEmail']);

    $host='localhost';
    $bdd='projet_it';
    $user='gr1003oLBE';
    $pass='axUebfjf';

    // Connexion BDD
    try{
        $bdd = new PDO('mysql:host='.$host.'; dbname='.$bdd.'; charset=utf8', $user, $pass);
        //echo "<br> Connexion BDD OK <br>";
        
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
 
  
    // si c'est un nouveau email on cree un compte

        try{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $resultat = $bdd->prepare("INSERT INTO compte(email,mdp) VALUES (:mail, :hashed_password)");
        $resultat->execute(array( "mail" => $mail, "hashed_password" => $hashed_password));
        }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        echo $e->getTraceAsString();
        die();
        }
        header('Location: inscription.php');
?>
