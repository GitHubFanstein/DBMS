<?php 
require "koneksi.php";

$id = $_GET["id"];
$nama = $_GET["nama"];
$jenis_aset = $_GET["jenisAset"];
$string_aset = str_replace(" ", "", $jenis_aset);
$id_autor = $_GET["idAutor"];
$thumbnail2 = $_GET["Thumbnail"];
$string_thumbnail2 = str_replace(" ", "", $thumbnail2);
$size = $_GET['Sizes'];

function restore($id){
    global $conn;
    global $nama, $string_aset, $id_autor, $string_thumbnail2, $size;
    $insert = mysqli_query($conn, "insert into aset values('$id', '$nama', '$string_aset', '$id_autor', '$string_thumbnail2', '$size')");
    if($insert){
         mysqli_query($conn, "delete from sampah where id ='$id'");
    }
    return mysqli_affected_rows($conn);
};

if(restore($id) > 0 ){
    
    // function_alert("Aset berhasil Ditambah");
    header('Location: ../../Haldep/Dashboard.php');

    
} else{
    function_alert("Aset gagal Ditambah");
};

?>
    