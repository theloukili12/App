<?php
    $id = $_GET["id"];
    $cin = trim($_SESSION["cin"]);
    include "db_conn.php";

    $query = "UPDATE `conges` SET `status`=1 WHERE `id_conge`=$id";

    $rslt =  mysqli_query($conn,$query);

    if ($rslt === true) 
    {
        header("Location: ../index.php");
        exit();
    }else{
        header("Location: ../login.php");
        exit();
    }
?>