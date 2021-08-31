<table class="table table-striped table-success ">
    <thead>                                                             
        <tr>
            <th class="scop">Date Début</th>
            <th class="scop">Date Fin</th>
            <th class="scop">Nbr des jours</th>
            <th class="scop">Status</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    include "db/db_conn.php";
    $cin = $_SESSION['cin'];
    $sql = "Select c.id_conge,date_fin,c.status,c.date_debut,DATEDIFF(c.date_fin,c.date_debut) as 'tag' 
    FROM type_conge t , conges c 
    where c.type_conge = t.Id_type_conge and t.type_conge LIKE 'malade' and c.Personne LIKE '$cin' and status is NOT NULL";
    $result = mysqli_query($conn, $sql);
    if($result){
     if (mysqli_num_rows($result) >= 1)   {

    while( $row = mysqli_fetch_assoc($result)){?>
        <tbody>
                <td><?php echo strtoupper($row['date_debut']) ;?></td>   
                <td><?php echo strtoupper($row['date_fin']) ;?></td>   
                <td><?php echo strtoupper($row['tag']) ;?></td>      
                <td>
                <?php  
                    if ($row['status'] == 1){
                        echo "justifié";
                    }else{
                        echo "Non jusitifié";
                    }
                
                
                ?>
                </td>        
                <?php } } else{?>
                <td colspan="5" style="text-align: center;">Il n'y a pas des notes de maladie en ce moment </td>
                    <?php } } ?>     
    </tbody>
</table>