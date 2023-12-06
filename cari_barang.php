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
	// Ambil input pencarian dari formulir
	$cari_barang = $_GET['cari_barang'];

	// Lindungi dari serangan SQL Injection
	$cari_barang = mysqli_real_escape_string($con, $cari_barang);
	?>
		<!-- PRODUK -->
		<div class="container mt-5">
			<div class="judul-kategori text-center" style="padding: 5px 10px;">
				<h3>PRODUK <?php echo $cari_barang; ?></h3>
			</div>
			<div class="row">

				<?php  
				// sql
				$sql = "SELECT * FROM produk WHERE judul_produk LIKE '%$cari_barang%'";
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
					    <p class="card-text d-inline p-2">Rp. <?= number_format($data['harga'],0,',','.'); ?></p>
					    <a href="#" class="btn btn-dark d-block mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>"> Lihat Produk</a>
					  </div>
					</div>
				</div>
				<?php $no++; } ?>

			</div>
			<div class="d-grid gap-2 col-6 mx-auto mt-5">
				<a class="btn btn-dark" href="produk.php">Lihat Produk Lainnya</a>
			</div>

		</div>

		<!-- FOOTER -->
		<?php include 'inc/footer.php' ?>


	<!-- Tampil Poduk dalam Bentuk Modal -->
	<?php  
	$sql = "SELECT * FROM produk WHERE judul_produk LIKE '%$cari_barang%'";
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
	        			<p>Jumlah : <?= $data['jumlah']; ?></p>
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
	<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
	
</body>
</html>