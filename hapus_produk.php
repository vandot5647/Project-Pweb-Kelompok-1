<?php  
include 'connect/koneksi.php';

session_start();
if (!isset($_SESSION['id'])) {
   header('location:masuk.php'); 
}

$id = $_GET["id"];
	
	// Jalankan Query Delete
	$sql = "DELETE FROM produk WHERE id = '$id'";
	$hasil = mysqli_query($con, $sql);

	// Periksa Query
	if (!$hasil) {
		die("Gagal Menghapus Data : ".mysqli_errno($con).
			" - ".mysqli_error("con"));
	} else {
		echo 
		"
		<script>
		alert('Data Berhasil Dihapus!');window.location='dashboard.php';
		</script>
		";
	}
?>