<?php 	
session_start();
include 'connect/koneksi.php';
if (!isset($_SESSION['id'])) {
   header('location:masuk.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>King Vape Store - Only Vappers</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Stylsheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/styleHome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

</head>
<body style="background-color: #EAEAEA;">
	<?php  
		$role = $_SESSION['role'];
	    $id = $_SESSION['id'];
	    $data_user = mysqli_query($con, "SELECT * FROM user WHERE id = '$id'");
	    $data_fetch = mysqli_fetch_array($data_user);
	    $username = $data_fetch['username'];
	    $role = $data_fetch['role'];
	?>
	<!-- NAVBAR -->
	<?php include 'inc/header.php' ?>

	<!-- end page title -->
	<?php 
	if (isset($_GET['id'])) {

	$id = ($_GET["id"]);

	// Menampilkan Data Dari Database
	$sql = "SELECT * FROM produk WHERE id='$id'";
	$hasil = mysqli_query($con, $sql);
	if (!$hasil) {
		die("Query Error: ".mysqli_errno($con).
		" - ".mysqli_error($con));
	}
	
	// Mengambil Data Dari Database
	$data = mysqli_fetch_assoc($hasil);
		if (!count($data)) {
		echo 
		"
		<script>	
		alert('Data Tidak Ditemukan!');window.location='index.php';
		</script>
		";
		}
		} else {
		echo 

		"
		<script>
		alert('Data Tidak Valid!');window.location='index.php';
		</script>
		";
		}
                        
    ?>
	<div class="container mt-5 mb-5">
		<div class="card">
		  <div class="card-header">
		    Edit Produk
		  </div>
		  <div class="card-body">
		    <!-- Form Input -->
		   	<form action="proses_edit_produk.php" method="post" enctype="multipart/form-data">
		   		<input name="id" value="<?php echo $data['id'] ?>" hidden>
		   		<div class="row">
			   		<div class="mb-3">
					  <label for="nama" class="form-label">Nama Produk</label>
					  <input type="text" name="judul_produk" class="form-control" id="nama" placeholder="Masukkan Nama Produk" value="<?php echo $data['judul_produk'] ?>">
					</div>
					<div class="mb-3">
					  <label for="desk" class="form-label">Deskripsi</label>
					  <textarea class="form-control" name="deskripsi" id="desk" rows="3"><?php echo $data['deskripsi'] ?></textarea>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
						  <label for="harga" class="form-label">Harga</label>
						  <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga" value="<?php echo $data['harga'] ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
						  <label for="jml" class="form-label">Jumlah Produk</label>
						  <input type="number" name="jumlah" class="form-control" id="jml" placeholder="Masukkan Jumlah" value="<?php echo $data['jumlah'] ?>">
						</div>
					</div>
					<div class="mb-3">
						<select class="form-select" name="kategori" aria-label="Default select example">
						  <option selected><?php echo $data['kategori'] ?></option>
						  <option value="1">Atomizer</option>
						  <option value="2">Battery</option>
						  <option value="3">Liquid</option>
						  <option value="4">Mod Device</option>
						  <option value="5">Pod</option>
						</select>
					</div>
					<div class="mb-3">
					  <label for="foto" class="form-label">Foto Produk</label>
					  <img class="rounded-1 mb-3 d-block" style="width: 150px;" src="image_data/produk/<?php echo $data['foto'] ?>">
					  <input class="form-control" name="foto" type="file" id="foto">
					</div>
					<div class="mb-4">
						<button type="submit" class="btn btn-success"></i> Ubah Data</button>
					</div>
				</div>
		   	</form>
		  </div>
		</div>
	</div>

	

	<!-- MODAL LOGOUT -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	        Anda Yakin Ingin Keluar :(
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <a href="logout.php" class="btn btn-danger">Keluar</a>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Javascript -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>