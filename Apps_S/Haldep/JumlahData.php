<?php  
    
    require "../Dashboard/Function/koneksi.php";
    require "../Login/fungsiLogin.php";

    if(!isset($_SESSION["loginn"])){
        header("Location: ../Login/Login.php");
        exit;
    }
    $id_autor = $_SESSION["id_user"];
    $query2 = "select * from aset where id_autor = '$id_autor' ";
    $res = mysqli_query($conn, $query2);

    $get_data = mysqli_query($conn, "select * from aset where id_autor = '$id_autor'");
    $count_data = mysqli_num_rows($get_data);

    $get_data_sampah = mysqli_query($conn, "select * from sampah where id_autor = '$id_autor'");
    $count_data_sampah = mysqli_num_rows($get_data_sampah);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="tes">
        <h1><h4>Total data: <?php echo $count_data?></h4></h1>
    </div>


</body>
</html>