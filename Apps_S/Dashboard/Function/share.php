<?php 

require "koneksi.php";

$id = $_POST["idubah"];
$nama = $_POST["namaa"];
$jenis_aset = $_POST["jnaset"];
$id_autor = $_POST["id_autor_share"];
$from = $_POST["fromuser"];
$to = $_POST['touser'];
$Thumbnail3 = $_POST['thumbnaill'];
$pesan = $_POST['pesann'];


if(isset($_POST["btnshare"])){
    global $conn;
    global $id, $nama, $jenis_aset, $id_autor, $from, $to, $Thumbnail3;

    $query = mysqli_query($conn, "select * from share where to_user = '$to'");
    $cek = mysqli_num_rows($query);

    $query2 = mysqli_query($conn, "select username from user where username = '$to'");
    $cekNamaUser = mysqli_num_rows($query2);

   
    if($cek = 1){

        if($cekNamaUser == 0){
            echo "
            <script>
                alert('user tidak ada');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";

        } elseif($cekNamaUser == 1){
            mysqli_query($conn, "insert into share values('','$id', '$nama', '$jenis_aset', '$id_autor', '$from', '$to', '$Thumbnail3', '$pesan')");
            echo "
            <script>
                alert('Berhasil Di Share');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";
        }

        

    } else{
        echo "
        <script>
            alert('Gagal Di Share Karena Batas share Hanya 2 kali');
            document.location = '../../Haldep/Dashboard.php';    
        </script>
    ";
    }
}


?>