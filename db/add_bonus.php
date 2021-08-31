<?php
    $cin =trim( $_POST["cin"]);
    $montant =trim( $_POST["montant"]);
    $raison = trim($_POST["raison"]);

    include "db_conn.php";

    $sql = "INSERT INTO `bonus`(`raison`, `somme`, `Personne`) VALUES ('$raison',$montant,'$cin')";  
    $result = mysqli_query($conn, $sql);
    if ($result === true) {
        header("Location: ../index.php");
        exit();
    }else{
        header("Location: ../login.php");
        exit();
    }   

?>