<?php 
    require "koneksi.php";

    if(isset($_POST['btndel_checkbox'])){

       $id = $_POST['deleteId'];

       $extractid = implode(',', $id);


       $result = mysqli_query($conn, "delete from share where id_share in($extractid)");

       if($result){
        echo "
        <script>
            alert('Aset Share Berhasil dihapus');
           document.location = 'Dashboard.php';
        </script>
        ";
       } else {
            echo " 
        <script>
            alert('Aset Share Gagal dihapus');
            document.location = 'Dashboard.php';    
        </script>
            ";
            
       }
    }   

?>