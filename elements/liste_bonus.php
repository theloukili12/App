<table class="table table-striped table-success">
      
    <thead>                                                             
        <tr>
            <th class="scop">Date du Bonus</th>
            <th class="scop">La Somme</th>
            <th class="scop">Raison</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    include "db/db_conn.php";
    $cin = $_SESSION['cin'];
    $sql = "SELECT bonus.* 
    FROM bonus WHERE Personne LIKE '$cin'";

    $sql1 = "select IFNULL(SUM(bonus.somme),0) as 'summ'
    FROM bonus WHERE Personne LIKE '$cin'";

    $result = mysqli_query($conn, $sql1);
    $result1 = mysqli_query($conn, $sql);

    if($result1 && $result){
    $row = mysqli_fetch_assoc($result);
    while( $row1 = mysqli_fetch_assoc($result1)){?>
        <tbody>  
            <td><?php echo $row1['date']; ?> DH</td>
            <td><?php echo $row1['somme'];?> DH</td>
            <td><?php echo $row1['raison'];?> DH</td>
        </tbody>
        <?php } } ?>
    <tfoot>
        <td colspan="3"style="text-align: center;">Tous les bonus depuis l'embauchement : <?php echo $row  ['summ'];?></td>
    </tfoot>


</table>