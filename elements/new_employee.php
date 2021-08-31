<div class="wrapper">
    <div class="alert alert-info" role="alert">
        Tous les champs sont obligatoirs !! 
    </div>
    <div class="form">
        <form  action="db/add_emp.php" method="POST">
            <div class="inputfield">
                <label>CIN</label>
                <input type="text" class="input" name="cin" >
            </div>  
            <div class="inputfield">
                <label>NOM</label>
                <input type="text" class="input" name="nom"  required>
            </div>  
            <div class="inputfield">
                <label>PRENOM</label>
                <input type="text" class="input" name="pre" required>
            </div>  
            <div class="inputfield">
                <label>DATE DE NAISSANCE</label>
                <input type="date" class="input" name="datenais"  required >
            </div>  
            <div class="inputfield">
                <label>E-MAIL</label>
                <input type="text" class="input" name="mail"  required>
            </div>  
            <div class="inputfield">
                <label>Gender</label>
                <select name="gender" class="form-control" >
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="inputfield">
                <label>Service</label>
                <select name="service" class="form-control" >
                    <option value="1">Administration</option>
                    <option value="4">Ingenieur</option>
                    <option value="3">Technicien</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text" name="add" type="submit">Enregitrer</span>
            </button>
        </form>
    </div>
</div>	