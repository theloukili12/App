  
<?php 
include "db_conn.php";
session_start(); 

if(isset( $_POST['email']) && isset( $_POST['cin'])){

        $email = $_POST['email'];
        $cin = $_POST['cin'];
        $sql = "SELECT * FROM personne WHERE (email LIKE '$email') AND (Cin_personne LIKE '$cin')";
		echo $sql;
        $result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {

            // Intisialiser le nombre de jours de congé à 30 chaque debut d'annee
            
            $sql1 = "UPDATE Personne SET Personne.nbrj_conge = 30 WHERE day(NOW()) = 1 and Month(NOW()) = 1";
            $result1 = mysqli_query($conn, $sql1);

			$row = mysqli_fetch_assoc($result);
            
            if(isset( $_POST['email']) && isset( $_POST['cin'])){
                if ($row['email'] == $email  || $row['cin_personne'] == $cin) {
                    $_SESSION['service'] = $row['service'];

                    $_SESSION['cin'] = $row['Cin_personne'];
                    $_SESSION['nc'] = $row['Nom_personne'] .' '. $row['Prenom_personne'];
                    //echo $_SESSION['nc'];
                    header("Location: ../index.php");
                    exit();
                }else{
                    header("Location: ../login.php#sign-in?error=Incorect User name or ");
                    exit();
                    }
            }
		}else{
			header("Location: ../login.php?error=Incorect User name or password ");
	        exit();
		
	    }
}