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
            <th class="scop">L'Annee</th>
            <th class="scop">Jours de congé</th>
        </tr>
    </thead>
    <?php 
    include "db/db_conn.php";
    $cin = $_SESSION['cin'];
    $sql = "SELECT p.nbrj_conge from personne p where p.Cin_personne Like '$cin'";



    $result = mysqli_query($conn, $sql);
    if($result){

    while( $row = mysqli_fetch_assoc($result)){?>
        <tbody>
                <td><?php echo date("Y"); ?></td>
                <td><?php echo $row['nbrj_conge'];?></td>
                <?php }} ?>    
    </tbody>
</table>