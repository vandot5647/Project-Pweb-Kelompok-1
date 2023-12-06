<?php  
include 'connect/koneksi.php';

session_start();
if (!isset($_SESSION['id'])) {
   header('location:masuk.php'); 
}
	
	// Membuat Variabel untuk Menampung 
	$id = $_POST['id'];
	$judul_produk = $_POST['judul_produk'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$jumlah = $_POST['jumlah'];
	$foto = $_FILES['foto']['name'];

	// Cek Dulu Jika Ingin Merubah Foto
	if ($foto != "") {
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$x = explode('.',$foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_foto_baru = $angka_acak.'-'.$foto;
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'image_data/produk/'.$nama_foto_baru);

			$sql = "UPDATE produk SET judul_produk = '$judul_produk', deskripsi = '$deskripsi', harga = '$harga', kategori='$kategori', jumlah='$jumlah', foto = '$nama_foto_baru'";
			$sql .= "WHERE id = '$id'";
			$hasil = mysqli_query($con, $sql);
			if (!$hasil) {
				die ("Proses Edit Data Gagal Berfungsi: ".mysqli_errno($con).
					" - ".mysqli_error($con));
			} else {
				echo 
				"
				<script>
				alert('Produk Berhasil Diubah.');window.location='dashboard.php';
				</script>
				";
			}
		} else {
			// Kegagalan Pada File Ekstensi
			echo 
			"
			<script>
			alert('Ekstensi Pada Gambar tidak Sesuai!');window.location='dashboard.php';
			</script>
			";
		}
	} else {
		// Fungi Update Berdasarkan ID
		$sql = "UPDATE produk SET judul_produk = '$judul_produk', deskripsi = '$deskripsi', harga='$harga', kategori='$kategori', jumlah='$jumlah'";
		$sql .= "WHERE id = '$id'";
		$hasil = mysqli_query($con, $sql);
		// Periksa Apakah Ada Error
		if (!$hasil) {
			die ("Query Gagal Berfungsi: ".mysqli_errno($con).
				" - ".mysqli_error($con));	
		} else {
			echo 
			"
			<script>
			alert('Produk Berhasil Diubah!');window.location='dashboard.php';
			</script>
			";
		}
	}
	

?>