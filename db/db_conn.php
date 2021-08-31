  
<?php 
    $sname = "localhost";
    $pass = "";
    $uname = "root";
    $db_name="db_tyssere";

    $conn = mysqli_connect($sname,$uname,$pass,$db_name);

    if(!$conn){
        echo "Connection failed !";
    }


?>