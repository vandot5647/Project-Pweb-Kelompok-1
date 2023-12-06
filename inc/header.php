<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	  <div class="container">
	    <a class="navbar-brand" href="index.php">
	      <img src="img/logo.png" alt="Ini Logo" width="35" height="35" class="me-2">
	      King <strong>VAPESTORE</strong>
	    </a>
	    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      	<form action="cari_barang.php" method="GET" class="d-flex ms-auto my-4 my-lg-0" role="search">
		      <input class="form-control me-2" type="text" name="cari_barang" placeholder="Cari Barang" aria-label="Search">
		      <button class="btn btn-dark" type="submit" value="Cari"><i class="fa-solid fa-magnifying-glass"></i></button>
		    </form>
	      	<?php 
				if(isset($_SESSION['id'])){ 
				$id = $_SESSION['id'];
				$data_user = mysqli_query($con, "SELECT * FROM user WHERE id = '$id'");
				$data_fetch = mysqli_fetch_array($data_user);
				$username = $data_fetch['username'];
			?>
	      	<!-- Menu User Sesudah Login -->
	      	<ul class="navbar-nav ms-auto">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="index.php"><i class="fa-solid fa-cart-shopping"></i> Checkout</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="news.php">News</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="produk.php">Produk</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link" href="dashboard.php"><i class="fa-solid fa-user"></i> <?php echo $username; ?></a>
		        </li>

		    </ul>
		    <?php } else { ?>
		    <!-- Menu Sebelum Login -->
	      	<ul class="navbar-nav ms-auto">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="news.php">News</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="produk.php">Produk</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="masuk.php"> Masuk</a>
		        </li>
	      	</ul>
	      	<?php } ?>
	    </div>
	  </div>
	</nav>