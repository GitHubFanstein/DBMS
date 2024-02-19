<?php 

require "koneksi.php";
// require "../Dashboard/index_dashboard.php";
if(!isset($_SESSION["loginn"])){
  header("Location: ../../Login/Login.php");
  exit;
}

$id_autor = $_SESSION["id_user"];

function getdataselected($query){
    global $id_autor;
    global $conn;
    $result =  mysqli_query($conn, $query);
    $rows = [];
    while($user = mysqli_fetch_assoc($result)){
      $rows[] = $user; 
    }
    return $rows;
}



?>