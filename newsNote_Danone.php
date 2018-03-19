<?php session_start(); 
    // fonction pour verifier les entrees 
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    
    $note1 = test_input($_POST['danoneNote1']);
    $note2 = test_input($_POST['danoneNote2']);
    $note3 = test_input($_POST['danoneNote3']);

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

    if(!isset($note1) || trim($note1) == ''){
        if(!isset($note2) || trim($note2) == ''){
            $note= $note3;
        }else{
            $note= $note2;
        }
    }else{
        $note= $note1;
    }
    $resultat = $bdd->prepare("INSERT INTO news(title,note,entreprise,date) VALUES ('title', :note, 'danone',CURRENT_TIMESTAMP)");
    $resultat->execute(array("note" => $note));
    header('Location: ../entreprises_details/danone.php');
  
?>