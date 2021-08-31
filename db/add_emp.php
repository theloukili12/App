<?php
    $cin =trim( $_POST["cin"]);
    $nom =trim( $_POST["nom"]);
    $prenom = trim($_POST["pre"]);
    $service = trim($_POST["service"]);
    $gender = trim($_POST["gender"]);
    $mail = trim($_POST["mail"]);
    $date_nais = trim($_POST["datenais"]);
    $cin = trim($_POST["cin"]);

    include "db_conn.php";

    $sql = "INSERT INTO `personne`(`Cin_personne`, `Nom_personne`, `Prenom_personne`, `Gender_personne`, `Datenaissance`, `Dateembauche`, `service`, `email`, `nbrj_conge`) 
    VALUES ('$cin','$nom','$prenom','$gender','$date_nais',NOW(),$service,'$mail',40)";  
    $result = mysqli_query($conn, $sql);
    if ($result === true) {
        header("Location: ../index.php");
        exit();
    }else{
        header("Location: ../login.php");
        exit();
    }   

?>