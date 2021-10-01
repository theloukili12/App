<?php
    $date_debut = $_POST["date_dabut"];
    $date_fin = $_POST["date_fin"];
    $type = $_POST["type"];
    $raison = $_POST["raison"];
    $cin = trim($_POST["cin"]);
    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
    
        $interval = date_diff($datetime1, $datetime2);
    
        return $interval->format($differenceFormat);
    
    }
    $date = dateDifference($date_fin,$date_debut);
    include "db_conn.php";

    $query = "SELECT nbrj_conge FROM personne Where Cin_personne = '$cin'";
    $result_query = mysqli_query($conn, $query);
    if ( $result_query) {
        $row1 = mysqli_fetch_assoc($result_query);
    }
    if ($row1["nbrj_conge"] - $date >= 0 )
    {
        if ($type == 1) {             
            $sql = "INSERT INTO `conges`(`date_debut`, `date_fin`, `Personne`, `type_conge`)  VALUES ('$date_debut','$date_fin','$cin',1)";  
            $result = mysqli_query($conn, $sql);
            if ($result === true) {
                $query = "UPDATE `personne` SET `nbrj_conge`=`nbrj_conge` - $date WHERE Cin_personne = '$cin'";
                $rslt =  mysqli_query($conn,$query);
                if ($rslt === true) 
                {
                    header("Location: ../index.php");
                    exit();
                }
    
            }else{
               echo $sql;
                exit();
            }
            }else{
                $sql = "INSERT INTO `conges`(`date_debut`, `date_fin`, `Personne`, `type_conge`,raison)  VALUES ('$date_debut','$date_fin','$cin',$type,'$raison')";  
                $result = mysqli_query($conn, $sql);
                if ($result === true) {
                    header("Location: ../index.php");
                    exit();    
                }else{
                    header("Location: ../login.php");
                    exit();
                }
            };
    }else{
        session_start();
        $_SESSION['message'] = "Impossible !! Vous avez depassé le nombre de congés disponible.";
        header("Location: ../demande_conge.php");
        exit();
    }
    

?>