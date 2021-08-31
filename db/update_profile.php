<?php 
    include "db_conn.php";
    
    $cin =trim( $_POST['cin']);
    $nom = trim( $_POST['nom']);
    $pre = trim( $_POST['pre']);
    $date = trim( $_POST['datenais']);
    $sql = "UPDATE personne  SET Nom_personne ='$nom', Prenom_personne = '$pre' , Datenaissance='$date' WHERE Cin_personne LIKE '$cin' ";       
    $result = mysqli_query($conn, $sql);
    if ($result === true) {

        header("Location: ../index.php");
        exit();
    }else{
        header("Location: ../login.php");
        exit();
    }

    

?>