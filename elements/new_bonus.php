<div class="wrapper">
    <div class="alert alert-info" role="alert">
        Tous les champs sont obligatoirs !! 
    </div>
    <div class="form">
        <form  action="db/add_bonus.php" method="POST">
            <div class="inputfield">
                <label>EMPLOYE</label>
                <select class="form-control"name="cin" required >
                    <option disabled selected >-- Choisir Employee --</option>
                    <?php
                        include "db/db_conn.php";

                        $sql = "SELECT * from personne";
                        $result = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_array($result))
                        {
                            echo "<option value='". $data['Cin_personne'] ."'>" .$data['Nom_personne']." ".$data['Prenom_personne'] ."</option>";  // displaying data in option menu
                        }	
                    ?>  
                </select>
            </div> 
            <div class="inputfield">
                <label>Montant</label>
                <input class="form-control" type="text" name="montant" required>
            </div>     
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Raison</label>
                <textarea class="form-control" name="raison"  required rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text" name="add" type="submit">Enregitrer</span>
            </button>
        </form>
    </div>
</div>	