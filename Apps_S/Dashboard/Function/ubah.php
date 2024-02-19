<?php 

require "koneksi.php";

if(isset($_POST["btnubah"])){

    $ubah = mysqli_query($conn, "update aset set nama = '$_POST[namaa]' where id = '$_POST[idubah]'");

    if($ubah){
        echo "
            <script>
                alert('berhasil');
                document.location = '../../Haldep/Dashboard.php';    
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Gagal');
                document.location = '../../Haldep/Dashboard.php'';    
            </script>
        ";
    }
}


?>