
    <button type="button" class="btn btn-primary" > <a href="historique_conge.php"style="color: white;">  Tous les employes</a></button>
    <button type="button" class="btn btn-primary"><a href="historique_ing.php"style="color: white;">Ingenieurs</a></button>
    <button type="button" class="btn btn-primary"><a href="historique_tech.php"style="color: white;">Techniciens </a></button>

<br> <br>

<table class="table table-striped table-success">
 
<caption style="text-align: center;"><strong>Le nombre de congés pris cette année :</strong>
    <?php     
        $sql1 = "SELECT count(*) as 'nbr'
        FROM conges
        WHERE YEAR( date_fin) = YEAR( CURDATE())";
        $result1 = mysqli_query($conn, $sql1);
        if ( $result1) {
            $row1 = mysqli_fetch_assoc($result1);
            echo $row1['nbr'];
        }
        ?>
     </caption>
    <thead>                                                             
        <tr>
            <th class="scop">NOM COMPLET</th>
            <th class="scop">Dateembauche</th>
            <th class="scop">DATE DE DEBUT</th>
            <th class="scop">DATE DE FIN</th>
            <th class="scop">NBR DES JOURS RESTANTS</th>
            <th class="scop">TYPE DE CONGE</th>
        </tr>
    </thead>
    <?php 
    $sql = "CALL historique_tech;";
    $result = mysqli_query($conn, $sql);
    if($result){

    while( $row = mysqli_fetch_assoc($result)){?>
        <tbody>
                <td> <?php echo strtoupper($row['nom']); ?></td>
                <td><?php echo $row['Dateembauche'];?></td>
                <td><?php echo strtoupper($row['date_debut']) ;?></td>   
                <td><?php echo strtoupper($row['date_fin']) ;?></td>   
                <td><?php echo strtoupper($row['nbrj_conge']) ;?></td>       
                <td><?php echo strtoupper($row['type_conge']) ;?></td>       
                <?php } } else{?>
                <td colspan="4" style="text-align: center;">Il n'y a pas de congé en ce moment </td>
                    <?php } ?>    
    </tbody>
</table>