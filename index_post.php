<?php session_start();

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    
    // Variables
	$_POST['mail'] = test_input($_POST['mail']);
	$_POST['password'] = test_input($_POST['password']);
    $_SESSION['form_erreur']=FALSE;
    $_SESSION['mail'] = "null";
    $_SESSION['pass_hash'] = "null";
    
    $host='localhost';
    $bdd='projet_it';
    $user='gr1003oLBE';
    $pass='axUebfjf';

    // Connexion BDD    
    try{
        $bdd = new PDO('mysql:host='.$host.'; dbname='.$bdd.'; charset=utf8', $user, $pass);
        //echo "<br>Connexion BDD OK<br>";
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    try{
        // Recupération des données de la BDD en fonction du mail
        $req = $bdd->prepare("SELECT * FROM compte WHERE email = :mail");
        $req->execute(array('mail' => $_POST['mail']));
        $res = $req->fetch();
        $_SESSION['mail'] = htmlspecialchars($res['email']);
        $_SESSION['pass_hash'] = htmlspecialchars($res['mdp']);
    }catch (PDOException $e) {
        // Si la connexion ne fonctionne pas
        print "Erreur !: " . $e->getMessage() . "<br/>";
        echo $e->getTraceAsString();
        die();
    }

    // Si les passwords concordent, redirection vers les pages prof/etudiant
    if (password_verify($_POST['password'], $_SESSION['pass_hash'])) {
            unset($_SESSION['form_erreur']);
            header('Location: masterpage.php');
            exit();
        
    } else {

        // Sinon redirection sur l'index et affichage message d'erreur
        session_unset();
        $_SESSION['form_erreur']=TRUE;
        header('Location: index.php');
    }
?>