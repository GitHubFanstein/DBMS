<?php 

    require "../Login/fungsiLogin.php";
    require "../Dashboard/Function/koneksi.php";
    require "tambah.php";

       
    if(!isset($_SESSION["loginn"])){
        header("Location: ../Login/Login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tes-style.css">
</head>
<body>
    
<!-- validasi tipe menggunakan javascript -->
<form action="" method="post">
<div class="section_masukan_data">
    <h3>Masukan PDF file</h3>
    <label for="nama-file"> File Yang dipilih:  </label>
    <input type="file"  name="nama-file" id="nama-file" onchange="validasi_ekstension()" >
    <input type="hidden" name="id_autor" id="" value="<?php echo $_SESSION['idUser']; ?>">
    <button type="submit" class="btn_submit_masukan_data" name="insert"> Submit</button>
  </div>
</form>


    <script src="validasi_ekstension().js"></script>
</body>
</html>