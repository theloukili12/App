<table class="table table-striped table-success">
    <thead>                                                             
        <tr>
            <th>La Date de début</th>
            <th>La Date de début</th>
            <th>Nombre des jours</th>
            <th>Options</th>
        </tr>
    </thead>
    <?php 
    include "db/db_conn.php";
    $cin = $_SESSION['cin'];
    $sql = "Select c.*,DATEDIFF(c.date_fin,c.date_debut) as 'tag' FROM type_conge t , conges c where c.type_conge = t.Id_type_conge and t.type_conge LIKE 'malade' and c.status is NULL";
    $result = mysqli_query($conn, $sql);
    if($result){
        if (mysqli_num_rows($result) >= 1)   {

    while( $row = mysqli_fetch_assoc($result)){?>
        <tbody>

            <td><?php echo $row['date_debut'];?></td>
            <td><?php echo $row['date_debut'];?></td>
            <td><?php echo $row['tag'];?><td>
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-primary" href="db/justifie_malade.php?id=<?php echo $row['id_conge']?>"><i class="fas fa-check-circle" ></i></a>
                <a type="button" class="btn btn-warning" href="db/justifie_malade.php?id=<?php echo $row['id_conge']?>&nbr=<?php echo $row['tag']?>"><i class="fas fa-trash"></i></a>
            </div>
            <?php }} else {?>
                <td colspan="5" style="text-align: center;">Il n'y a pas des notes de maladie (En traitement) en ce moment </td>
                    <?php } } ?>    
    </tbody>
</table>