<?php 	 
session_start();
include 'connect/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>King Vape Store - News</title>
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

	<!-- Kategori -->
	<div class="container mt-5">

		<div class="row text-center p-3 d-flex">
			<div class="judul-kategori text-center" style="padding: 5px 10px;">
				<h3>NEWS</h3>
			</div>

			<?php

			// URL RSS Feed Google News
			$rssFeedUrl = 'https://news.google.com/rss?hl=en-ID&gl=ID&ceid=ID:id&q=toko%vape';

			// Mendapatkan isi XML dari RSS feed
			$rssData = simplexml_load_file($rssFeedUrl);

			// Memeriksa apakah RSS feed berhasil dimuat
			if ($rssData) {
			    // Iterasi melalui setiap item di feed
			    foreach ($rssData->channel->item as $item) {
			        // Menampilkan judul dan tautan setiap item
			        echo '<div class="col-sm-4 mb-3 mb-sm-0 mt-3">';
			        	echo '<div class="card h-100">';
			        		echo '<div class="card-body">';
						        echo '<h5 class="card-title">' . $item->title . '</h5>';
						        echo ' <a href="'.$item->link.'" target="_blank" class="btn btn-dark">Baca Selengkapnya</a>';
						    echo '</div>';
						echo '</div>';
					echo '</div>';
			    }
			} else {
			    // Menampilkan pesan jika terjadi kesalahan
			    echo 'Gagal memuat RSS feed.';
			}

			?>

		</div>

	</div>

	<!-- FOOTER -->
	<?php include 'inc/footer.php' ?>
		
	<!-- Javascript -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>