<?php 

require "../Dashboard/Function/koneksi.php";

// Mendapatkan data file dari database berdasarkan ID (ganti dengan kolom ID dan nama tabel yang sesuai)
$file_id = $_GET['id'];
$sql = "SELECT * FROM aset WHERE id = $file_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file_data = $row['size'];
    $file_name = $row['nama'];
    $file_type = $row['jenis_aset'];

    // Set header untuk menentukan jenis file yang akan didownload
    header("Content-type: $file_type");
    header("Content-Disposition: attachment; filename=\"$file_name\"");

    // Mengirimkan data file sebagai respons HTTP
    echo $file_data;
} else {
    echo "File tidak ditemukan.";
}

$conn->close();
?>

?>