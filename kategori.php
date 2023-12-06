<?php 	 
session_start();
include 'connect/koneksi.php';
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

	<!-- NAVBAR -->
	<?php include 'inc/header.php' ?>

	<!-- CONTENT -->
	<?php  
		$id = ($_GET["id"]);
		$sql = "SELECT * FROM kategori_produk WHERE id = '$id'";
           	$tampil = mysqli_query($con, $sql);

            $data = mysqli_fetch_assoc($tampil)
	?>
	<div class="container mt-5">
		<div class="judul-kategori text-center" style="padding: 5px 10px;">
			<img class="mb-2" src="image_data/kategori_produk/<?= $data['foto_kategori'] ?>" style="width: 70px;">
			<h3><?= $data['nama_kategori'] ?></h3>
		</div>

		<div class="row">
			<?php  
			$sql = "SELECT * FROM kategori_produk INNER JOIN produk ON produk.kategori = kategori_produk.id WHERE kategori_produk.id = '$id'";
            $tampil = mysqli_query($con, $sql);
			$no = 1;

            while($data = mysqli_fetch_assoc($tampil)) {
			?>
			<!-- Item Produk -->
			<div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-4">
				<div class="card text-center border-0">
					<img src="image_data/produk/<?= $data['foto']; ?>" class="img-fluid" style="width: 300px; height: 320px;" alt="...">
					  <div class="card-body">
					    <h5 class="card-title"><?= $data['judul_produk']; ?></h5>
					    <p class="card-text">Rp. <?= number_format($data['harga'],0,',','.'); ?></p>
					    <a href="#" class="btn btn-dark d-block" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>"> Lihat Produk</a>
					  </div>
				</div>
			</div>
			<?php $no++; } ?>
		</div>
	</div>

	
	
	<!-- FOOTER -->
	<?php include 'inc/footer.php' ?>


	<!-- Tampil Poduk dalam Bentuk Modal -->
	<?php  
	$sql = "SELECT * FROM kategori_produk INNER JOIN produk ON produk.kategori = kategori_produk.id WHERE kategori_produk.id = '$id'";
	$tampil = mysqli_query($con, $sql);

	while($data = mysqli_fetch_assoc($tampil)) {
	?>
	<!-- MODAL PRODUCT -->
	<div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><?= $data['judul_produk']; ?></h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<div class="container-fluid">
	      		<div class="row">
	      			<div class="col-md-6">
	        			<img src="image_data/produk/<?= $data['foto']; ?>" class="img-fluid">
	        		</div>
	        		<div class="col-md-6">
	        			<p><?= $data['deskripsi']; ?></p>
	        			<p>Kategori : <?= $data['nama_kategori']; ?> <img src="image_data/kategori_produk/<?= $data['foto_kategori'] ?>" style="width: 25px;"> </p>
	        			<br>
	        			<h5 class="display-6">Rp. <?= number_format($data['harga'],0,',','.'); ?></h5>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <a href="https://wa.me/+6281911920984? text=Apakah%20Produk%20<?= $data['judul_produk'];?>%20ini%20Masih%20Tersedia?%20" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Beli</a>
	      </div>
	    </div>
	  </div>
	</div>
	<?php } ?>

	<!-- Javascript -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>