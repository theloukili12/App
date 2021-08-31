<?php 
    $cin = $_SESSION['cin'];
    $sql = "CALL `profile_emp`('$cin');";
    $result = mysqli_query($conn, $sql);
    if ( mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
     }
?>
<div class="wrapper">
            <div class="form">
                <form  action="db/update_profile.php" method="POST">


                        <div class="inputfield">
                        <label>CIN</label>
                        <input type="text" class="input" name="cin" value="<?php echo $cin; ?> " >
                    </div>  
                    <div class="inputfield">
                        <label>NOM</label>
                        <input type="text" class="input" name="nom" value="<?php echo $row["Nom_personne"]; ?> " required>
                    </div>  
                    <div class="inputfield">
                        <label>PRENOM</label>
                        <input type="text" class="input" name="pre" value="<?php echo $row["Prenom_personne"]; ?> " required>
                    </div>  
                    <div class="inputfield">
                        <label>DATE DE NAISSANCE</label>
                        <input type="text" class="input" name="datenais" value="<?php echo  date('Y-m-d', strtotime($row["Datenaissance"])); ?> " required >
                    </div>  
                    <div class="inputfield">
                        <label>DATE D'EMBAUCHE</label>
                        <input type="text" class="input" name="pre" value="<?php echo $row["Dateembauche"]; ?> " disabled>
                    </div>
                    <div class="inputfield">
                        <label>E-MAIL</label>
                        <input type="text" class="input" name="pre" value="<?php echo $row["email"]; ?> " disabled>
                    </div>  
                    <div class="inputfield">
                        <label>SERVICE</label>
                        <input type="text" class="input" name="pre" value="<?php echo $row["Nom_service"]; ?> " disabled>
                    </div>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text" name="update" type="submit">Enregitrer</span>
                    </button>
                </form>
            </div>
        </div>	
