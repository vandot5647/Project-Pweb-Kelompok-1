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
	    $email = $data_fetch['email'];
	    $role = $data_fetch['role'];
	    $phone = $data_fetch['phone'];
	    $alamat = $data_fetch['alamat'];
	    $foto = $data_fetch['foto'];
	    $created = $data_fetch['created_on'];
	?>
	<!-- NAVBAR -->
	<?php include 'inc/header.php' ?>


	<?php if ($role == 'User') { ?>
	<div class="container mt-5">
		<div class="card text-center shadow-none">
		  <div class="card-header">
		    My Profile
		  </div>
		  <div class="card-body">
		    <h5 class="card-title">Hallo Selamat Datang! <?php echo $username; ?></h5>
		    <p class="card-text">Apakah Anda Tertarik Dengan Produk Kami? <a href="produk.php">Produk</a></p>
		    <!-- Aksi -->
		    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile"><i class="fa-solid fa-user"></i> Edit Profile</a>
		    <a href="logout.php" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
		  </div>
		  <div class="card-footer text-body-secondary">
		  </div>
		</div>
	</div>
	<?php } else { ?>

	<div class="container mt-5">
		<div class="card text-center shadow-none">
		  <div class="card-header">
		    My Profile
		  </div>
		  <div class="card-body">
		    <h5 class="card-title">Dashboard <?php echo $username; ?></h5>
		    <p class="card-text">Anda Bisa Akses Produk</p>
		    <!-- Aksi -->
		    <a href="index.php" class="btn btn-outline-primary"><i class="fa-solid fa-globe"></i> Home</a>
		    <a href="logout.php" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a>
		  </div>
		</div>
	</div>

	<div class="container mt-5">
		<div class="judul-kategori text-center" style="padding: 5px 10px;">
			<h3>DATA PRODUK</h3>
		</div>
		<div class="d-grid gap-2 d-md-block">
			<a class="btn btn-success" href="tambah_produk.php">Tambah Produk</a>
		</div>

		<div class="table-responsive mt-3">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Gambar Produk</th>
			      <th scope="col">Nama Produk</th>
			      <th scope="col">Harga Produk</th>
			      <th scope="col">Jumlah Produk</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  
				$sql = "SELECT * FROM produk ORDER BY id ASC";
				$tampil = mysqli_query($con, $sql);
	                      
				$no = 1;
				while($data = mysqli_fetch_assoc($tampil)) {

				?>
			    <tr>
			      <th scope="row"><?= $no; ?></th>
			      <td><img src="image_data/produk/<?= $data['foto']; ?>" style="width: 100px;height: 100px"></td>
			      <td><?= $data['judul_produk']; ?></td>
			      <td>Rp. <?= number_format($data['harga'],0,',','.'); ?></td>
			      <td><?= $data['jumlah']; ?></td>
			      <!-- Aksi -->
			      <td>
			      	<a href="edit_produk.php?id=<?= $data['id']; ?>" class="btn btn-dark">Edit</a>
			      	<a href="hapus_produk.php?id=<?= $data['id']; ?>" onclick="return confirm('Data ini Dihapus Secara Permanen!!')" class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			   	<?php $no++; } ?>
			  </tbody>
			</table>
		</div>
	</div>

	<?php } ?>


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

	<!-- MODAL PROFILE -->
	<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">My Profile</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<div class="container-fluid">
	      		<div class="row">
	      			<div class="col-md-4">
	        			<img src="image_data/user_profile/<?php echo $foto; ?>" class="img-fluid">
	        		</div>
	        		<div class="col-md-8">

	        			<form method="post" action="proses_edit_profile.php" enctype="multipart/form-data">
	        				<input name="id" value="<?php echo $id; ?>" hidden>
		        			<div class="mb-3">
							  <label for="name" class="form-label">Username</label>
							  <input type="text" name="username" class="form-control" id="name" value="<?php echo $username; ?>" disabled>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div class="mb-3">
									  <label for="email" class="form-label">Email</label>
									  <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" disabled>
									</div>
								</div>
								<div class="col-md-3">
									<div class="mb-3">
									  <label for="role" class="form-label">Role</label>
									  <input type="text" name="role" class="form-control" id="role" value="<?php echo $role; ?>" disabled>
									</div>
								</div>
							</div>
							<div class="mb-3">
							  <label for="phone" class="form-label">No Hp</label>
							  <input type="number" name="phone" class="form-control" id="phone" value="<?php echo $phone; ?>" >
							</div>
							<div class="mb-3">
							  <label for="alamat" class="form-label">Alamat</label>
							  <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $alamat; ?>" >
							</div>
							<div class="mb-3">
							  <label for="foto" class="form-label">Foto Profile</label>
							  <input class="form-control" name="foto" type="file" id="foto">
							</div>
							<button type="submit" class="btn btn-primary">Update</button>
						</form>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        Tanggal dibuat <strong><?= date('d F Y', $created)?></strong>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Javascript -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>