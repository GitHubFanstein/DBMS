<?php 
require "koneksi.php";

$id = $_GET["id"];
$nama = $_GET["nama"];
$jenis_aset = $_GET["jenisAset"];
$string_aset3 = str_replace(" ", "", $jenis_aset);
$id_autor = $_GET["idAutor"];
$Thumbnail = $_GET["thumbnail"];
$string_thumbnail3 = str_replace(" ", "", $Thumbnail);
$size = $_GET['Size'];
function delete_tempo($id){
    global $conn;
    global $nama, $string_aset3, $id_autor, $string_thumbnail3, $size;
    $insert = mysqli_query($conn, "insert into sampah values('$id', '$nama', '$string_aset3', '$id_autor', '$string_thumbnail3', '$size')");
    if($insert){
         mysqli_query($conn, "delete from aset where id ='$id'");
    }
    return mysqli_affected_rows($conn);
};

if(delete_tempo($id) > 0 ){
    
    echo "
            <script>
                alert('Berhasil Dihapus');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";

    
} else{
    function_alert("Aset gagal Ditambah");
};

?>
    