
<?php 
    require "koneksi.php";

    if(isset($_POST['registrasi'])){
        

        function register($data_regis){
            global $conn;
            $username_regis = $data_regis['username_regis'];
            $password_regis = $data_regis['user_password_regis'];
            $password_confrim = $data_regis["user_password_confirm"];

            
           $result =  mysqli_query($conn, "select username from user where username = '$username_regis'");

           if(mysqli_fetch_assoc($result)){
               echo "
               <script>
                   alert('Username ini Sudah Terdaftar');
                   document.location = '../../Login/Login.php';    
               </script>
           ";
           return false;
           }

            if($password_regis != $password_confrim ){
                echo "
                <script>
                    alert('Konfirmasi Password Tidak Sesuai');
                    document.location = '../../Login/Login.php';    
                </script>
            ";
            }

            mysqli_query($conn, "insert into user values('', '$username_regis', '$password_regis', '$password_confrim')");
            return mysqli_affected_rows($conn);


        }

        if( register($_POST) > 0) {
            echo "
            <script>
                alert('User Berhasil Ditambahkan');
                document.location = '../../Login/Login.php';     
            </script>
        ";
        }else{
            echo mysqli_error($conn);
        }
    }

?>