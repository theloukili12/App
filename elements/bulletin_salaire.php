<table class="table table-striped table-success">
 <caption>
    <?php     
        $sql1 = "SELECT p.nbrj_conge from personne p";
        $result1 = mysqli_query($conn, $sql1);
        if ( $result1) {
            $row1 = mysqli_fetch_assoc($result1);
        }
        ?>
     </caption>
      
    <thead>                                                             
        <tr>
            <th class="scop">Mois</th>
            <th class="scop">Jours de congé</th>
            <th class="scop">Bonus</th>
            <th class="scop">Somme</th>
        </tr>
    </thead>
    <?php 
    include "db/db_conn.php";
    $cin = $_SESSION['cin'];
    $sql = "SELECT s.salaire  from Personne p , service s
    WHERE s.Id_service = p.service and p.Cin_personne Like '$cin'";
    $sql1 = "SELECT IFNULL(SUM(somme),0)  as 'bonus'  FROM bonus WHERE Personne LIKE '$cin'";


    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);

    if($result && $result1){
    $row = mysqli_fetch_assoc($result);
    $row1 = mysqli_fetch_assoc($result1);
    }?>  
    <tbody>
                <td><?php echo date(" M Y"); ?></td>
                <td><?php echo $row['salaire'];?></td>
                <td><?php echo $row1['bonus'];?></td>
                <td><?php echo $row1['bonus']+$row['salaire'];?></td>
    </tbody>
</table>