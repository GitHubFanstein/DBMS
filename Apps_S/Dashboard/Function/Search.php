<?php 
require "koneksi.php";

if(!isset($_SESSION["loginn"])){
  header("Location: ../../Login/Login.php");
  exit;
}

$id_autor = $_SESSION["id_user"];

function cari(){
  global $id_autor;
  
      $getkey= $_POST['keyword'];
      if($getkey){
          $query = "select * from aset where nama like '%$getkey%' limit 5";
          return panggildata($query);
      } else{
          $query22 = "select * from aset where id_autor = '$id_autor' limit 20";
          return panggildata($query22);
      }
     
      }

  
?>

