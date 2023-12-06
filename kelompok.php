<?php  
session_start();
include 'connect/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Stylsheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/styleHome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<style type="text/css">
		.fa-brands, .fa-instagram{
			background-color: transparent;
			padding: 10px;
			border: 1px solid #000;
			border-radius: 50%;
			font-size: 20px;
			transition: all 0.2s ease-in;
		}
		.fa-brands:hover{
			background-color: #000;
			color: #fff;
		}
	</style>

</head>
<body style="background-color: #EAEAEA;">

	<!-- NAVBAR -->
	<?php include 'inc/header.php'; ?>

	<!-- CONTENT -->
	<div class="container mt-5">
		<div class="judul-kategori text-center" style="padding: 5px 10px;">
			<h3>Anggota Kelompok</h3>
		</div>
		<div class="row">
				<?php  
                $sql = "SELECT * FROM mahasiswa";
				$tampilkelompok = mysqli_query($con, $sql);
				$no = 1;
                while($data = mysqli_fetch_assoc($tampilkelompok)) {
              	?>
				<!-- Item User -->
				<div class="col-lg-3 col-md-3 col-sm-4 col-6 mt-4">
					<div class="card text-center h-100">
					  <div class="card-body">
					    <h5 class="card-title"><?= $data['nama']; ?></h5>
					    <p class="card-text"><?= $data['npm']; ?></p>
					    <p class="card-text"><?= $data['kelas']; ?></p>
					    <div class="d-block mt-2">
					    	<a href="<?= $data['instagram']; ?>" target="_Blank" class="text-decoration-none text-dark"><i class="fa-brands fa-instagram"></i></a>
					    </div>
					  </div>
					</div>
				</div>
				<?php $no++; } ?>
		</div>
	</div>

	<!-- FOOTER -->
	<?php include 'inc/footer.php'; ?>

	<!-- Javascript -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>