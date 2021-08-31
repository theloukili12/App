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
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-text mx-3">Tyssere+Partner</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home page</span></a>
</li>


<hr class="sidebar-divider">

<div class="sidebar-heading">
    Normal
</div>
<?php if ($row["nbrj_conge"]  > 0){?>
<li class="nav-item">
    <a class="nav-link" href="demande_conge.php ">
        <i class="fas fa-plus"></i>
        <span>Nouveau congé</span></a>
</li>
<?php }?>
<li class="nav-item">
    <a class="nav-link" href="fiche_vacances.php">
    <i class="fas fa-sun"></i>
    <span>Vacances</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="fiche_salaire.php">
    <i class="fas fa-coins"></i>
    <span>Bulletin de salaire</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="note_de_maladie.php">
    <i class="fas fa-notes-medical"></i>
    <span>Note de Maladie</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="liste_bonus.php">
    <i class="fas fa-gift"></i>
    <span>Liste du Bonus</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">
<?php if ($_SESSION["service"]  == 1){?>

<li class="nav-item ">
    <a class="nav-link" href="Historique_conge.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Historiques Congés</span></a>
</li>
<li class="nav-item ">
    <a class="nav-link" href="liste_notes_maladie.php">
        <i class="fas fa-notes-medical"></i>
        <span>Listes des Notes de maladie</span></a>
</li>
<li class="nav-item ">
    <a class="nav-link" href="new_emp.php">
        <i class="fas fa-plus"></i> 
        <span>Nouveau Employee</span></a>
</li>
<li class="nav-item ">
    <a class="nav-link" href="bonus.php">
        <i class="fas fa-plus"></i> 
        <span>Bonus</span></a>
</li>
<?php }?>


<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>