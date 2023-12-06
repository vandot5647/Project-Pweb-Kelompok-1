<?php  
include 'connect/koneksi.php';

session_start();
if (!isset($_SESSION['id'])) {
   header('location:masuk.php'); 
}
	
	// Membuat Variabel untuk Menampung 
	$judul_produk = $_POST['judul_produk'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$jumlah = $_POST['jumlah'];
	$foto = $_FILES['foto']['name'];

	// Cek Gambar
	if ($foto != "") {
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$x = explode('.',$foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_foto_baru = $angka_acak.'-'.$foto;
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'image_data/produk/'.$nama_foto_baru);

			// Jalankan Query INSERT
			$sql = "INSERT INTO produk(judul_produk, deskripsi, harga, kategori, jumlah, foto) VALUES ('$judul_produk','$deskripsi','$harga','$kategori','$jumlah','$nama_foto_baru')";
			$hasil = mysqli_query($con, $sql);
			if (!$hasil) {
				die ("Proses Input Produk Gagal Berfungsi: ".mysqli_errno($con).
					" - ".mysqli_error($con));
			} else {
				echo 
				"
				<script>
				alert('Produk Berhasil Ditambahkan.');window.location='dashboard.php';
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
		$sql = "INSERT INTO produk(judul_produk, deskripsi, harga, jumlah, kategori, foto) VALUES ('$judul_produk','$deskripsi','$harga','$jumlah','$kategori', null";
			$hasil = mysqli_query($con, $sql);
			// Periksa Apakah Ada Error
			if (!$hasil) {
				die("Produk Gagal ditambahkan ".mysqli_errno($con).
				" - ".mysqli_error($con));
			} else {
				echo 
				"
				<script>
				alert('Produk Berhasil Ditambah!');window.location='dashboard.php';
				</script>
				";
			}
	}
?>