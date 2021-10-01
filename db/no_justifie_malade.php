<?php
    $id = $_GET["id"];    
    $cin_ = $_GET["cin"];
    $nbrj = $_GET["nbr"];
    $cin = trim($_SESSION["cin"]);
    include "db_conn.php";

    $query = "UPDATE `conges` SET `status`=0 WHERE `id_conge`=$id";
    $query1 = "UPDATE `personne` SET nbrj_conge = nbrj_conge - $nbrj  WHERE `cin_personne`='$cin_'";
    $rslt =  mysqli_query($conn,$query);
    $rslt1 =  mysqli_query($conn,$query1);

    if ($rslt === true && $rslt1 === true) 
    {
       echo $query1;
        exit();
    }else{
        echo $query1;
        exit();
    }
?>