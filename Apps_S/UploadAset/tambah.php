<?php 

require "../Dashboard/Function/koneksi.php";
require "../Login/teslaert.php";
require "../Dashboard/Function/extension_file.php";

function tambah($data){
    global $conn;
    $id_autor = $_REQUEST['id_autor'];
    $thumbnail = $data["gmbrthumbnail"];
    $filesize = $_FILES['nama-file']['size'];
    $filename = $_FILES['nama-file']['name'];
    $fileext = explode('.', $filename);
    $realfileext = strtolower(end($fileext));

    $result_nama = mysqli_query($conn, "select nama from aset where nama = '$filename' and id_autor = '$id_autor'");
    

    if(mysqli_fetch_assoc($result_nama)){
        echo "
        <script>
            alert('Aset ini Sudah Ada');
            document.location = 'Dashboard.php';    
        </script>
    ";
    return false;
    } 
        
    
    mysqli_query($conn, "insert into aset values ('', '$filename','$realfileext','$id_autor', '$thumbnail', '$filesize')");
    return mysqli_affected_rows($conn);

}



if(isset($_POST["insert"])){
    if(tambah($_POST) > 0){
       
    $file = $_FILES['nama-file'];

        move_uploaded_file($file['tmp_name'], "asets/" . $file["name"]);
        header("Location: Dashboard.php");
        function_alert("data berhasil ditambahkan");
    }else{
        function_alert("data GAGAL DITAMBAHKAN!!!!!");
    }
    
}

?>
