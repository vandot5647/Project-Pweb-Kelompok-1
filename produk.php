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
	<div class="container">
		<!-- SLIDER -->
		<div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
		  </div>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="img/slider-1.jpg" class="d-block img-fluid" alt="Gambar 1">
		    </div>
		    <div class="carousel-item">
		      <img src="img/slider-2.jpg" class="d-block img-fluid" alt="Gambar 2">
		    </div>
		    <div class="carousel-item">
		      <img src="img/slider-3.jpg" class="d-block img-fluid" alt="Gambar 3">
		    </div>
		    <div class="carousel-item">
		      <img src="img/slider-4.jpg" class="d-block img-fluid" alt="Gambar 4">
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>
	</div>

	<!-- PRODUK -->
		<div class="container mt-5">
			<div class="judul-kategori text-center" style="padding: 5px 10px;">
				<h3>PRODUK TERBARU</h3>
			</div>
			<div class="row">

				<?php  
				$sql = "SELECT * FROM kategori_produk INNER JOIN produk ON produk.kategori = kategori_produk.id ORDER BY produk.id DESC";
				$tampil = mysqli_query($con, $sql);
	                      
				$no = 1;
				while($data = mysqli_fetch_assoc($tampil)) {

				?>
				<!-- Item Produk -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-4">
					<div class="card text-center border-0 h-100">
					  <img src="image_data/produk/<?= $data['foto']; ?>" class="img-fluid" style="width: 300px; height: 320px;" alt="...">
					  <div class="card-body">
					    <h5 class="card-title"><?= $data['judul_produk']; ?></h5>
					    <img src="image_data/kategori_produk/<?= $data['foto_kategori'] ?>" style="width: 50px;" class="d-inline p-2 border-end">
					    <p class="card-text d-inline p-2">Rp. <?= number_format($data['harga'],0,',','.'); ?></p>
					    <a href="#" class="btn btn-dark d-block mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>"> Lihat Produk</a>
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
	$sql = "SELECT * FROM produk ORDER BY id ASC";
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
	        			<br>
	        			<h5 class="display-6">Rp. <?= number_format($data['harga'],0,',','.'); ?></h5>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Beli</button>
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
