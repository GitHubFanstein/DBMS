<?php 
require "koneksi.php";
require "../../Login/teslaert.php";

$id = $_GET["id"];

function hapus($id){
    global $conn;
    mysqli_query($conn, "delete from sampah where id = '$id'");

    return mysqli_affected_rows($conn);
};

if(hapus($id) > 0 ){
    
    echo "
            <script>
                alert('Berhasil Dihapus');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";
} else{
    header('Location: ../../Haldep/Dashboard.php');
    function_alert("Aset gagal dihapus");
};

?>