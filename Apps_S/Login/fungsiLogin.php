<?php 
session_start();
require "../Dashboard/Function/koneksi.php";

function cekLogin(){
    global $conn;
    if(isset($_POST["login"])){
        $username = $_POST["userku"];
        $password = $_POST["passku"];

        $result = mysqli_query($conn, "select * from user where username = '$username' ");
    
        if( mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_assoc($result);

           if($password == $row["password"]){
            $_SESSION['usernamelogin'] = $username;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION["loginn"] = true;
            header("Location: ../Haldep/Dashboard.php");
         
           } elseif($password != $row["password"]){
            // Function cal
            function_alert("Password salah"); 
           
           }
        }

    }
}

?>