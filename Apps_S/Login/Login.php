<?php 
require "fungsiLogin.php";
require "../Dashboard/Function/koneksi.php";
require "teslaert.php";

if(isset($_SESSION["loginn"])){
    header("Location: ../Haldep/Dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<!-- Form login -->
    <?php cekLogin(); ?>
    
    <form action="" method="post" class="uhuy">
            <!-- Frame Login -->
        <div class="frame-login">
            <h2 class="h2-frame-login">Login</h2>
            
            <!-- Field Username -->
            <div class="field-username">
                <label>Username : </label> <br>
                <input type="text" class="isi-username-login" name="userku">
            </div>

            <!-- Field Paswword -->
            <div class="field-password">
                <label>Password : </label> <br>
                <input type="password" name="passku">
            </div>


            <button class="button-login-kuy" type="submit" name="login">Login</button>

            <!-- Button untuk register -->
            <h4>Belum punya akun? <button class="btn-register">Register</button></h4>
        </div>

    </form>

    


<!-- Form Register -->

    <form action="../Dashboard/Function/register.php" class="form-register" method="post">
        <!-- Frame Register -->
    <div class="frame-register">
        <h2 class="h2-frame-login">Register</h2>
        
        <!-- Field Username -->
        <div class="field-username">
            <label>Username : </label> <br>
            <input type="text" class="isi-username-regis" name="username_regis"> 
        </div>

        <!-- Field Paswword -->
        <div class="field-password">
            <label>Password : </label> <br>
            <input type="password" name="user_password_regis">
        </div>

        <!-- Field Confirm Paswword -->
        <div class="field-confirm-password">
            <label>Confirm Password : </label> <br>
            <input type="password" name="user_password_confirm">
        </div>

        <!-- Button Register -->
        <button class="button-regis-kuy" type="submit" name="registrasi">Registrasi</button>

        <!-- Button login untuk balik ke page/form login -->
        <h4>Sudah punya akun? <button class="btn-login">Login</button></h4>
    </div>
    </form>
    
    <script src="New_register.js"></script>
    <script src="New_login.js"></script>

</body> 
</html>