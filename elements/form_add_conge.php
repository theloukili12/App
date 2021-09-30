<?php 
    $cin = $_SESSION['cin'];
    $nc = $_SESSION['nc'];
    date_default_timezone_set('UTC');
    $sql = "select nbrj_conge from personne where cin_personne like '$cin'";
    $result = mysqli_query($conn, $sql);
    if ( mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    }
?>

<div class="wrapper">
    <?php  if($_SESSION['message']){?>
        <div class="alert alert-danger" role="alert">
            <?php  echo $_SESSION['message'];?>
        </div>    
    <?php     }?>
    <div class="alert alert-info" role="alert">
        vous devez demander le congé après 7 jours à partir d'aujourd'hui
    </div>
    <div class="alert alert-warning" role="alert">
        Vous n'avez que <?php echo $row["nbrj_conge"] ;?> jours pour les vacances
    </div>
    <div class="form">
        <form  action="db/add_conge.php" method="POST">

            <div class="form-check">
                <input onchange="vacance();"  class="form-check-input" type="radio" name="type" value="1" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Vacance 
                </label>
                </div>

            <div class="form-check">
                <input onchange="malade();" class="form-check-input" type="radio" name="type" value="2" id="flexRadioDefault2" c>
                <label class="form-check-label" for="flexRadioDefault2">
                    Malade
                </label>
            </div>

            <div class="inputfield">
                    <label>CIN</label>
                    <input type="text" class="input" name="cin" value=<?php echo $cin; ?> >
            </div>  

            <div class="inputfield">
                    <label>DATE DE DEBUT</label>
                    <input type="date" class="input" name="date_dabut"   required>
            </div>  

            <div class="inputfield">
                    <label>DATE DE FIN</label>
                    <input type="date" class="input" name="date_fin"  >
            </div> 
            <span class="a"></span> 

            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text" name="update" type="submit">Enregitrer</span>
            </button>
        </form>
    </div>
</div>	
<script type="text/javascript">
    function malade(){
        document.querySelector('.a').innerHTML =" <div class='form-group'><label for='exampleFormControlTextarea1'>Raison:</label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>";

    };
    function vacance(){
        document.querySelector('.a').innerHTML ="";
    }


</script>