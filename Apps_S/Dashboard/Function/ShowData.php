<?php 
require "koneksi.php";

function panggildata($query){
    global $conn;
    $result =  mysqli_query($conn, $query);
    $rows = [];
    while($user = mysqli_fetch_assoc($result)){
      $rows[] = $user; 
    }
    return $rows;
}

// $data_data = panggildata("select * from aset ");


?>