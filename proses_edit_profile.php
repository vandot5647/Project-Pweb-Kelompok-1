<?php    
session_start();
include 'connect/koneksi.php';
if (!isset($_SESSION['id'])) {
   header('location:masuk.php'); 
}


	$id = $_SESSION['id'];
    $data_user = mysqli_query($con, "SELECT * FROM user WHERE id = '$id'");
    $data_fetch = mysqli_fetch_array($data_user);
    $username = $data_fetch['username'];

	// Membuat Variabel untuk Menampung 
	$id = $_POST['id'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$foto = $_FILES['foto']['name'];

	// Cek Dulu Jika Ingin Merubah Foto

	if ($foto != "") {
		$ekstensi_diperbolehkan = array('png','jpg');
		$x = explode('.',$foto);
		$angka_acak = rand(1,999);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$nama_foto_baru = $username.'-'.$angka_acak.'-'.$foto;
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'image_data/user_profile/'.$nama_foto_baru);

			$sql = "UPDATE user SET phone = '$phone', alamat = '$alamat', foto = '$nama_foto_baru'";

			$sql .= "WHERE id = '$id'";

			$hasil = mysqli_query($con, $sql);

			if (!$hasil) {

				die ("Proses Ubah Profile Gagal Berfungsi: ".mysqli_errno($con).

					" - ".mysqli_error($con));

			} else {

				echo 

				"

				<script>

				alert('Profile Berhasil Diubah!');window.location='dashboard.php';

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

		$sql = "UPDATE user SET phone = '$phone', alamat = '$alamat'";

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

			alert('Profile Berhasil Diubah!');window.location='dashboard.php';

			</script>

			";

		}

	}



?>