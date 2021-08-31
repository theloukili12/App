 <table class="table table-striped table-success">
 <caption>
    <?php     
        $sql1 = "SELECT count(*) as 'nbr'
        FROM conges
        WHERE date_fin > CURDATE()";
        $result1 = mysqli_query($conn, $sql1);
        if ( $result1) {
            $row1 = mysqli_fetch_assoc($result1);
            echo $row1['nbr']; 

        }
        ?>
     </caption>
      
    <thead>                                                             
        <tr>
            <th class="scop">NOM PERSONNE</th>
            <th class="scop">TYPE CONGE</th>
            <th class="scop">DATE DE DEBUT</th>
            <th class="scop">DATE DE FIN</th>
            <th class="scop">Nbr des jours</th>

        </tr>
    </thead>
    <?php 
    include "db/db_conn.php";
    $cin = $_SESSION['cin'];
    $sql = "SELECT  p.Nom_personne ,t.type_conge, c.date_debut ,c.date_fin,DateDiff(date_fin,date_debut) as 'date'
    FROM personne p , conges c, type_conge t
    WHERE p.Cin_personne = c.Personne and c.type_conge = t.Id_type_conge and p.Cin_personne Like '$cin' and c.status is NOT NULL";



    $result = mysqli_query($conn, $sql);
    if($result){
     if (mysqli_num_rows($result) >= 1)   {

    while( $row = mysqli_fetch_assoc($result)){?>
        <tbody>
                <td> <?php echo strtoupper($row['Nom_personne']); ?></td>
                <td><?php echo $row['type_conge'];?></td>
                <td><?php echo strtoupper($row['date_debut']) ;?></td>   
                <td><?php echo strtoupper($row['date_fin']) ;?></td>   
                <td><?php echo strtoupper($row['date']) ;?></td>       
                <?php } } else{?>
                <td colspan="5" style="text-align: center;">Il n'y a pas de congé en ce moment </td>
                    <?php } } ?>    
    </tbody>
</table>