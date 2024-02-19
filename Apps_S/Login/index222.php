<?php
require "fungsiLogin.php";
require "../Dashboard/Function/koneksi.php";
// cek sudah login aataau belum
    if( !isset($_SESSION["loginn"])){
        header("Location: Login.php");
        exit;
    }

    $usernameLogin = $_SESSION["usernamelogin"];
    $query = "select * from user where username = '$usernameLogin'";
    $result = mysqli_query($conn, $query);

    
?>

<?php 

    if(mysqli_num_rows($result) > 0){
        $data_user_login = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $data_user_login["username"];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halo <?php echo $_SESSION["username"]; ?></h1>
    <a href="logout.php">Keluar</a>
</body>
</html>