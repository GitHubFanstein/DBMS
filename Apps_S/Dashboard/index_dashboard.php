<?php 
    require "Function/koneksi.php";
    require "../Login/fungsiLogin.php";
    require "Function/ShowData.php";

    
    if(!isset($_SESSION["loginn"])){
        header("Location: ../Login/Login.php");
        exit;
    }

    $usernameLogin = $_SESSION["usernamelogin"];
    $query = "select * from user where username = '$usernameLogin'";
    $result = mysqli_query($conn, $query);

   
    $id_autor = $_SESSION["id_user"];
    $query2 = "select * from aset where id_autor = '$id_autor' ";
    $res = mysqli_query($conn, $query2);

    $data_data = panggildata("select * from aset where id_autor = '$id_autor'");
    
?>

<?php 

    if(mysqli_num_rows($result) > 0){
        $data_user_login = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data_user_login['username'];
        $_SESSION['idUser'] = $data_user_login['id_user'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body>
    
    <h1>Selamat Datang : <?php echo $_SESSION['username']; ?></h1>
    <h3>id User: <?php echo $_SESSION['idUser']; ?></h3>
    <h3>id Autor : <?php echo $id_autor; ?></h3>

    <div class="aset-wrapper">
    <table border="1" cellpadding = "10" class="table" id="emp-tabel">
         <thead>
            <tr>
                    <th>No</th>
                    <th>
                        <input type="text" name="" id="" class="search-input" placeholder="Nama Aset">
                    </th>
                    <th col-index = 3 >Jenis Aset
                        <select class="tabel-filter" >
                            <option value="all"></option>
                        </select>
                    </th>
                    <th>ID_author</th>
                    <th>Download</th>
                    <th>Update</th>
                    <th>Tempo</th>
                </tr>
         </thead>
        
       <tbody>
             <?php $No = 1; ?>
        <?php foreach($data_data as $data){ ?>
            
            <tr>
                <td><?php echo $No; ?></td>
                <td><?php echo $data["nama"] ?></td>
                <td><?php echo $data["jenis_aset"] ?></td>
                <td><?php echo $data["id_autor"] ?></td>
                <td>
                    <a href="" download="<?php echo $data["nama"]?>"> Download</a>
                </td>
                <td>
                   <!-- Button trigger modal -->
                   <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $data['id']?>">Update</a>

                    <form action="Function/ubah.php" method="post">
                 <!-- Modal -->
                        <div class="modal fade" id="editmodal<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="<?php echo $data['id']?>" name="idubah">
                                <input type="text" name="namaa" value="<?php echo $data['nama'];?>" >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                <button type="submit" class="btn btn-primary " name="btnubah">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>          
                    </form>
        
                </td>
                <td>
                    <a href="../Dashboard/Function/tempo_del.php?id=<?php echo $data["id"]?> & nama=<?php echo $data["nama"]?> & jenisAset= <?php echo $data["jenis_aset"]?> & idAutor= <?php echo $data["id_autor"]?> " onclick="return confirm('Mau dihapus?')">Hapus</a>
                </td>
            </tr>
        <?php $No++; ?>
        <?php } ?>    
       </tbody>
    </table>
    </div>

   
    <a href="../Login/logout.php">Keluar</a>
    <br>
    
    
    <script src="Function/filter_jenisaset.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Function/search.js"></script>

    <script>
        getUniqueValuesFromColumn();
    </script>
 
</body>
</html>