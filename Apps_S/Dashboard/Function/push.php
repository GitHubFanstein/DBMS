<?php 
require "koneksi.php";
require "../../Login/teslaert.php";

$id = $_GET["id"];
$nama = $_GET["nama"];
$jenis_aset = $_GET["jenisAset"];
$string_aset2 = str_replace(" ", "", $jenis_aset);
$id_autor = $_GET["idAutor"];
$Thumbnail = $_GET["thumbnail"];
$string_thumbnail3 = str_replace(" ", "", $Thumbnail);

function push($id){
    global $conn;
    global $nama, $string_aset2, $id_autor, $string_thumbnail3;
    $insert = mysqli_query($conn, "insert into aset values(' ', '$nama', '$string_aset2', '$id_autor', '$string_thumbnail3', '')");
    if($insert){
         mysqli_query($conn, "delete from share where id ='$id'");
    }
    return mysqli_affected_rows($conn);
};

if(push($id) > 0 ){
    
    echo "
            <script>
                alert('Berhasil Di Push');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";

    
} else{
    echo "
            <script>
                alert('Gagal Di Push');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";
};

?>
    