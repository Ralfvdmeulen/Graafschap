<?php require_once 'header.php';?>
<?php require_once '../src/userFunctions.php'; ?>
    
    <?php
    
    $newUser = null;
    if(isset($_POST['verzenden'])){
        $newUser = registerUser($_POST['voorname'], $_POST['achternaam'], $_POST['email'], $_POST['wachtwoord']);
    }

    ?>
    <div class="page registreren">
        <div class="container">
            <h1>Registreren</h1>
           <?php if($newUser !== null){?>
            <p>nieuwe gebruiker succesvol toegevoegd! </p>
           <?php }else{?>
            <form  action="#" method="post">
<div class="inputRow">
<label>voornaam </label>
<input type="text" name="voorname">
</div>
<div class="inputRow">
<label>achternaam: </label>
<input type="text" name="achternaam">
</div>
<div class="inputRow">
<label>email </label>
<input type="email" name="email">
</div>
<div class="inputRow">
<label>wachtwoord </label>
<input type="password" name="wachtwoord">
</div>
<div class="inputRow">
<input type="submit" name="verzenden" value="verzenden">
</div>
</form>
<?php } ?>
        
        </div>
        <?php require_once 'footer.php';?>