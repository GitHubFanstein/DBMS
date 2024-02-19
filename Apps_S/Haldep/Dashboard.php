<?php  
    
    require "../Dashboard/Function/koneksi.php";
    require "../Login/fungsiLogin.php";
    require "../UploadAset/tambah.php";
    require "../Dashboard/Function/ShowData.php";
    require "../Dashboard/Function/ubah.php";
    require "../Dashboard/Function/delete_checkbox.php";
    // require "../Dashboard/Function/delete.php";

    if(!isset($_SESSION["loginn"])){
        header("Location: ../Login/Login.php");
        exit;
    }
    $id_autor = $_SESSION["id_user"];
    $query2 = "select * from aset where id_autor = '$id_autor' ";
    $res = mysqli_query($conn, $query2);

    $get_data = mysqli_query($conn, "select * from aset where id_autor = '$id_autor' ");
    $count_data = mysqli_num_rows($get_data);

    $get_data_sampah = mysqli_query($conn, "select * from sampah where id_autor = '$id_autor'");
    $count_data_sampah = mysqli_num_rows($get_data_sampah);

    $get_data_share = mysqli_query($conn, "select * from share where id_autor = '$id_autor'");
    $count_data_share = mysqli_num_rows($get_data_share);

    $get_data_jenisaset_word = mysqli_query($conn, "select jenis_aset from aset where id_autor = '$id_autor'and jenis_aset = 'docx'");
    $count_data_aset_word = mysqli_num_rows($get_data_jenisaset_word);

    $get_data_jenisaset_pdf = mysqli_query($conn, "select jenis_aset from aset where id_autor = '$id_autor'and jenis_aset = 'pdf'");
    $count_data_aset_pdf = mysqli_num_rows($get_data_jenisaset_pdf);
    
    $get_data_jenisaset_png = mysqli_query($conn, "select jenis_aset from aset where id_autor = '$id_autor'and jenis_aset = 'png'");
    $count_data_aset_png = mysqli_num_rows($get_data_jenisaset_png);

    $get_data_jenisaset_pptx = mysqli_query($conn, "select jenis_aset from aset where id_autor = '$id_autor'and jenis_aset = 'pptx'");
    $count_data_aset_pptx = mysqli_num_rows($get_data_jenisaset_pptx);


  

    $usernameLogin = $_SESSION["usernamelogin"];
    $query = "select * from user where username = '$usernameLogin'";
    $result = mysqli_query($conn, $query);


    $data_data = panggildata("select * from aset where id_autor = '$id_autor'");

?>

<?php 

    if(mysqli_num_rows($result) > 0){
        $data_user_login = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data_user_login['username'];
        $_SESSION['idUser'] = $data_user_login['id_user'];
    }

?>
<?php 

    $data_data2 = panggildata("select jenis_aset from aset where id_autor = '$id_autor' group by jenis_aset order by jenis_aset asc ");

    foreach($data_data2 as $baru){
        $jenis[] = $baru["jenis_aset"];
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Digital Asset Management System</title>
    <link rel="stylesheet" href="dash2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

     <!--Section: sidebar -->
     <div class="sidebar">
        <div style="width: 200px; margin-bottom: 30px; text-align: center; padding: 10px; color: white;" >
            <h3>DAMS</h3>
        </div>
        <a href="#frame-1" class="dashbtn active">Dashboard</a>
        <a href="#frame-2" class="btnupload">Upload Aset</a>
        <a href="#frame-3" class="btnmanagementaset">Management Aset</a>
        <a href="#frame-4" class="btnsampah">Sampah Aset</a>
        <a href="#frame-5" class="btnhistorishare">History Share</a>
        <a href="../Login/logout.php" onclick="return confirm('Mau Keluar?')">Keluar</a>
    </div>
    <!-- EndS Sidebar -->

    <!-- Section: Logo APK -->

    <!-- Section: Frame parent utama -->
   <div class="truemargin">

        <!-- Section: frame untuk halaman dashboard -->
        <div id="frame-1">

            <!-- Section: frame conten dashboard -->
            <div class="conten">
                <h2>Dashboard</h2>

                <!-- Section: label usernama -->
                <div class="frame_nama_user">
                    <label for="" class="nama_user"> Hai <?php echo $usernameLogin ?></label>
                </div>

                <div class="frame-total-aset">
                   <label for="" class="total">Total Aset: <?php echo $count_data?></label>
                </div>

                <div class="frame-total-aset">
                    <label for="" class="total">Total Sampah Aset: <?php echo $count_data_sampah?></label>
                </div>

                <div class="frame-total-aset">
                    <label for="" class="total">Total Share Aset: <?php echo $count_data_share?></label>
                </div>

                <!-- chart js -->
                <div class="chartset">
                    
                    <div  class="chart">
                        <canvas id="myChart" class="canvas"></canvas></canvas>
                    </div>

                    <div  class="chart">
                        <canvas id="myChart2" class="canvas"></canvas></canvas>
                    </div>

                    <div  class="chart">
                        <canvas id="myChart3" class="canvas"></canvas></canvas>
                    </div>
                    <div  class="chart">
                        <canvas id="myChart4" class="canvas"></canvas></canvas>
                    </div>
                    <div  class="chart">
                        <canvas id="myChart5" class="canvas"></canvas></canvas>
                    </div>
                </div>

                <!-- end -->

                <div class="card" >
                    <img src="../UploadAset/gambar/digitalaset.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">More Aset Items</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#moreaset">
                            More Aset
                        </button>   
                    </div>
                    <!-- Button trigger modal -->
                    

                    <!-- Modal -->
                    <div class="modal fade" id="moreaset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Card -->
                                <?php foreach($data_data as $data) { ?>
                                <div class="card" style="width: 18rem;">
                                    <img src="../UploadAset/gambar/<?php echo $data['thumbnail']?>" class="card-img-top" alt="...">
                                  
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $data["nama"] ?>
                                        </p>
                                       
                                    </div>

                                    <a href="<?php echo "asets/".$data['nama']?>">Lihat</a>
                                  
                                </div>
                                <?php } ?>
                                <!-- end Card -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
            
            <!-- Ends frame conten dashboard -->

        </div>
        <!-- EndS frame 1 untuk dashboaad  -->

        <div id="frame-2">

            <!-- Section: frame conten dashboard -->
            <div class="conten">
                <h2>Upload Aset</h2>

                <!-- Section: label usernama -->
                <div class="frame_nama_user">
                    <label for="" class="nama_user"> Hai <?php echo $usernameLogin ?></label>
                </div>
                <!-- validasi tipe menggunakan javascript -->

                <div class="wrap_upload_1">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="section_masukan_data">
                        <h3>Masukan Aset</h3>
                        <label for="nama-file"> File Yang dipilih:  </label>
                        <input type="file"  name="nama-file" id="nama-file2" required accept=".pdf, .docx, .png, .pptx, .jpg, .xlsx, .mpeg, .mp4, .zip, .rar, .mp3">
                        <br>
                        <br>
                        <input type="hidden" name="id_autor" id="" value="<?php echo $_SESSION['idUser']; ?>">
                        <input type="text" name="gmbrthumbnail" class="gmbrtum">
                        <br>
                        <br>
                        <button type="submit" class="btn_submit_masukan_data" name="insert"> Submit</button>
                    </div>
                    </form>
                </div>



            </div>

            <!-- Ends frame conten dashboard -->

         </div>

        <div id="frame-3">

            <div class="conten">
                <h2>Management Aset</h2>
                <!-- section usernama -->
                <div class="frame_nama_user">
                    <label for="" class="nama_user"> Hai <?php echo $usernameLogin ?></label>
                </div>

                <div class="aset-wrapper">
                    <table border="1" cellpadding = "10" class="table tbl table table-hover" id="emp-tabel">
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
                                    <th>Download</th>
                                    <th>Update</th>
                                    <th>Tempo</th>
                                    <th>Share</th>
                                </tr>
                        </thead>
                        
                    <tbody>
                            <?php $No = 1; ?>
                        <?php foreach($data_data as $data){ ?>
                            
                            <tr>
                                <td><?php echo $No; ?></td>
                                <td><?php echo $data["nama"] ?></td>
                                <td><?php echo $data["jenis_aset"] ?></td>
                                <td>
                                  <a href="<?php echo "asets/".$data['nama']?>" download class="btn_preview">Download</a>
                                </td>
                                <td>
                                <!-- Button trigger modal -->
                                <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $data['id']?>">Update</a>

                                    <form action="../Dashboard/Function/ubah.php" method="post">
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
                                    <a href="../Dashboard/Function/tempo_del.php?id=<?php echo $data["id"]?> & nama=<?php echo $data["nama"]?> & jenisAset= <?php echo $data["jenis_aset"]?> & idAutor= <?php echo $data["id_autor"]?> & thumbnail= <?php echo $data["thumbnail"]?> & Size= <?php echo $data['size']?>" onclick="return confirm('Mau dihapus?')" class="btn btn-danger">Hapus</a>
                                </td>
                                <td>
                                    <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sharemodal<?php echo $data['id']?>">Share</a>

                                    <form action="../Dashboard/Function/share.php" method="post">
                                    <!-- Modal -->
                                        <div class="modal fade" id="sharemodal<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" value="<?php echo $id_autor?>" name="idubah">
                                
                                                <input type="hidden" name="id_autor_share" value="<?php echo $data['id_autor']?>">
                                                
                                                <label >From:</label>
                                                <input type="text" name="fromuser" value="<?php echo $usernameLogin?>" class="form-control">
                                                <br>
                                                <label >To:</label>
                                                <input  type="text" name="touser"  autocomplete="off" class="form-control">
                                                <br>
                                                <label >Jenis Aset</label>
                                                <input type="text" name="jnaset" value="<?php echo $data['jenis_aset']?>" class="form-control">
                                                <br>
                                                <label >Nama Aset</label>
                                                <input type="text" name="namaa" value="<?php echo $data['nama'];?>" class="form-control" >
                                                <br>
                                                <label for="">Thumbnail</label>
                                                <input type="text" value="<?php echo $data["thumbnail"]?>" name="thumbnaill" class="form-control"> 
                                                <br>
                                                <label class="form-label">Pesan</label>
                                                <input type="text" class="form-control"  name="pesann" autocomplete="off">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                                <button type="submit" class="btn btn-primary " name="btnshare">Kirim</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>          
                                    </form>
                                </td>
                            </tr>
                        <?php $No++; ?>
                        <?php } ?>    
                    </tbody>
                    </table>
                </div>
            </div>
        

        </div>

        <div id="frame-4">

            <div class="conten">
                <h2>Sampah Aset</h2>
                <!-- section usernama -->
                <div class="frame_nama_user">
                    <label for="" class="nama_user"> Hai <?php echo $usernameLogin ?></label>
                </div>
                <div class="aset-wrapper">
                    <table border="1" cellpadding = "10" class="table table table-hover" id="emp-tabel2">
                        <thead>
                            <tr>
                                    <th>No</th>
                                    <th>
                                        <input type="text" name="" id="" class="search-input" placeholder="Nama Aset">
                                    </th>
                                    <th col-index = 3 >Jenis Aset
                                        <select class="tabel-filter2" onchange="filter_rows2();">
                                            <option value="all2"></option>
                                        </select>
                                    </th>
                                    <th>Size</th>
                                    <th>Restore</th>
                                    <th>Hapus</th>
                                </tr>
                        </thead>
                        
                    <tbody>
                            <?php $No = 1; ?>
                        <?php 
                        $data_data = panggildata("select * from sampah where id_autor = '$id_autor'");
                        foreach($data_data as $data)
                        { ?>
                            
                            <tr>
                                <td><?php echo $No; ?></td>
                                <td><?php echo $data["nama"] ?></td>
                                <td><?php echo $data["jenis_aset"] ?></td>
                                <td><?php echo $data['size']?></td>
                                <td>
                                    <a href="../Dashboard/Function/restore.php?id=<?php echo $data["id"]?> & nama=<?php echo $data["nama"]?> & jenisAset= <?php echo $data["jenis_aset"]?> & idAutor= <?php echo $data["id_autor"]?> & Thumbnail= <?php echo $data["thumbnail"]?> & Sizes= <?php echo $data['size']?>" onclick="return confirm('Restore Data?') " class="btn btn-warning"> Restore</a>
                                </td>   
                                <td>
                                    <a href="../Dashboard/Function/delete.php?id= <?php echo $data["id"]?>" onclick="return confirm('Aset Akan Dihapus Secara Permanen')" class="btn btn-danger">Hapus</a>
                                </td>
                        </tr>
                        <?php $No++; ?>
                        <?php } ?>
                            
                    </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="frame-5">

            <div class="conten">
                <h2>Histori Share Aset</h2>
                <!-- section usernama -->
                <div class="frame_nama_user">
                    <label for="" class="nama_user"> Hai <?php echo $usernameLogin ?></label>
                </div>
                <div class="aset-wrapper">
                <form action="" method="post">
                <table class="table table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Aset</th>
                            <th>From User</th>
                            <th>Preview</th>
                            <th>Info</th>
                            <th>
                              
                                <button type="submit" name="btndel_checkbox" onclick="return confirm('Mau dihapus?')" class="btn btn-danger">Delete</button>
                        
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                             $data_data3 = panggildata("select * from share where to_user = '$usernameLogin' ");
                             
                        ?>
                        <?php foreach($data_data3 as $datashare) { ?>
                        <tr>
                            <td><?php echo $datashare['nama'] ?></td>
                            <td><?php echo $datashare['jenis_aset'] ?></td>
                            <td><?php echo $datashare['from_user'] ?></td>
                            <td>
                                <a href="<?php echo "asets/".$datashare['nama']?>" class="btn_preview">Lihat</a>
                            <td>
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $datashare['id_share']?>">
                                Info
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $datashare['id_share']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">From</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $datashare['from_user']?>">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $datashare['pesan']; ?></textarea>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td style="text-align: center;"> 
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="deleteId[]"  value="<?php echo $datashare["id_share"]?>" > 
                                    </div>
                                </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                </form>
                </div>
                
            </div>
        </div>
   </div>
   <!-- EndS parent utama -->

   <div class="footer">
        <p>Copyright © 2023 DAMS.com. All Rights Reserved</p>
    </div>


   <script src="../UploadAset/tes_gmbr.js"></script>
   
    <script src="../UploadAset/validasi_ekstension().js"></script>
    <script src="../Dashboard/Function/filter_jenisaset_sampah.js"></script>
    <script src="../Dashboard/Function/filter_jenisaset.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../Dashboard/Function/search.js"></script>
    <script src="btnupload.js"></script>
    <script src="dashbtn.js"></script>
    <script src="managebtn.js"></script>
    <script src="sampahbtn.js"></script>
    <script src="btnhistorishare.js"></script>

    <script>
        getUniqueValuesFromColumn();
    </script>
    <script>
        getUniqueValuesFromColumn_sampah();
    </script>

    <script>
       
       const labels = [
        "pdf",
        "docx",
        "doc"
       ];
        const data = {
        labels: labels,
        datasets: [{
            label: 'Total Aset Dokumen',
            data: [
                <?php 
                 $chart_pdf = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'pdf'");
                 echo mysqli_num_rows($chart_pdf);  
                ?>, 
                <?php 
                 $chart_docx = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'docx'");
                 echo mysqli_num_rows($chart_docx);  
                ?>,
                <?php 
                 $chart_doc = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'doc'");
                 echo mysqli_num_rows($chart_doc);  
                ?>
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>

<script>
       
       const labels2 = [
        "pptx",
        "pptm",
        "ppt"
       ];
        const data2 = {
        labels: labels2,
        datasets: [{
            label: 'Total Aset Presentasi',
            data: [
                <?php 
                 $chart_pptx = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'pptx'");
                 echo mysqli_num_rows($chart_pptx);  
                ?>, 
                <?php 
                 $chart_pptm = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'pptm'");
                 echo mysqli_num_rows($chart_pptm);  
                ?>,
                 <?php 
                 $chart_ppt = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'ppt'");
                 echo mysqli_num_rows($chart_ppt);  
                ?>
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        var myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );

    </script>

<script>
       
       const labels3 = [
        "AVI",
        "mp4",
        "mpg",
        "mkv"
       ];
        const data3= {
        labels: labels3,
        datasets: [{
            label: 'Total Aset Video',
            data: [
                <?php 
                 $chart_avi = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'avi'");
                 echo mysqli_num_rows($chart_avi);  
                ?>, 
                <?php 
                 $chart_mp4 = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'mp4'");
                 echo mysqli_num_rows($chart_mp4);  
                ?>, 
                 <?php 
                 $chart_mpg = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'mpg'");
                 echo mysqli_num_rows($chart_mpg);  
                ?>, 
                 <?php 
                 $chart_mkv = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'mkv'");
                 echo mysqli_num_rows($chart_mkv);  
                ?>, 
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
        };

        const config3 = {
            type: 'bar',
            data: data3,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        var myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );

    </script>
    

    <script>
       
       const labels4 = [
        "jpg",
        "png",
        "gif",
        "psd"
       ];
        const data4= {
        labels: labels4,
        datasets: [{
            label: 'Total Aset Gambar',
            data: [
                <?php 
                 $chart_jpg = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'jpg'");
                 echo mysqli_num_rows($chart_jpg);  
                ?>, 
                <?php 
                 $chart_png = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'png'");
                 echo mysqli_num_rows($chart_png);  
                ?>, 
                 <?php 
                 $chart_gif = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'gif'");
                 echo mysqli_num_rows($chart_gif);  
                ?>, 
                 <?php 
                 $chart_psd = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'psd'");
                 echo mysqli_num_rows($chart_psd);  
                ?>, 
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
        };

        const config4 = {
            type: 'bar',
            data: data4,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        var myChart4 = new Chart(
            document.getElementById('myChart4'),
            config4
        );

    </script>

<script>
       
       const labels5 = [
        "Zip",
        "RAR"
       ];
        const data5= {
        labels: labels5,
        datasets: [{
            label: 'Total Aset Compress',
            data: [
                <?php 
                 $chart_zip = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'zip'");
                 echo mysqli_num_rows($chart_zip);  
                ?>, 
                <?php 
                 $chart_rar = mysqli_query($conn, "SELECT jenis_aset FROM `aset` INNER JOIN user WHERE user.id_user ='$id_autor' AND aset.id_autor = '$id_autor' and jenis_aset = 'rar'");
                 echo mysqli_num_rows($chart_rar);  
                ?>
                
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
        };

        const config5 = {
            type: 'bar',
            data: data5,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        var myChart5 = new Chart(
            document.getElementById('myChart5'),
            config5
        );

    </script>
    
</body>
</html>