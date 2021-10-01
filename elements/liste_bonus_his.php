<h4>La list des bonus des mois precedents :</h4>
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
    $sql = "SELECT DATE_FORMAT(bonus.date , '%d %M %Y') as 'date',bonus.somme,bonus.raison
    FROM bonus WHERE Personne LIKE '$cin' and  month(now())- Month(bonus.date)  > 0";

    $sql1 = "select IFNULL(SUM(bonus.somme),0) as 'summ'
    FROM bonus WHERE Personne LIKE '$cin' and  month(now())- Month(bonus.date)  > 0 ";

    $result = mysqli_query($conn, $sql1);
    $result1 = mysqli_query($conn, $sql);

    if($result1 && $result){
    $row = mysqli_fetch_assoc($result);
    while( $row1 = mysqli_fetch_assoc($result1)){?>
        <tbody>  
            <td><?php echo $row1['date']; ?> </td>
            <td><?php echo $row1['somme'];?> DH</td>
            <td><?php echo $row1['raison'];?></td>
        </tbody>
        <?php } } ?>
    <tfoot>
        <td colspan="3"style="text-align: center;">Tous les bonus depuis l'embauchement : <?php echo $row  ['summ'];?></td>
    </tfoot>


</table>