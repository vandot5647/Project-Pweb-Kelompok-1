<?php  
    session_start();  
    include 'connect/koneksi.php';
    // Kondisi Session Sudah Login
    if (isset($_SESSION['id'])) {
        header('location:dashboard.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ecommerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <!-- Stylsheet -->
    <link rel="stylesheet" type="text/css" href="assets/css/styleAuth.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>

</head>

	<!-- CONTENT -->
	<main class="form-signin w-100 m-auto">

		<!-- Peringatan Jika Terjadi Error -->
            <?php if(isset($_SESSION['error'])) { ?>
				<div class="alert alert-warning" role="alert">
				<?php echo $_SESSION['error']; ?>
				</div>
			<?php } ?>


	  <form method="post" action="proses_daftar.php">
	    <div class="text-center">
		    <img class="mb-4" src="img/logo.png" alt="" width="60" height="60">
		    <h1 class="h3 mb-3 fw-normal">King <strong>VAPESTORE</strong></h1>
		</div> 

	    <div class="form-floating">
	      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
	      <label for="floatingInput">Username</label>
	    </div>
	    <div class="form-floating">
	      <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="Email">
	      <label for="floatingInput">Email</label>
	    </div>
	    <div class="form-floating">
	      <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
	      <label for="floatingPassword">Password</label>
	    </div>
	    <div class="form-floating">
	      <input type="password" name="password_konfirmasi" class="form-control" id="floatingPassword" placeholder="Confirm Password">
	      <label for="floatingPassword">Confirm Password</label>
	    </div>
	    <div class="my-4">
	    	Sudah Punya Akun? <a href="masuk.php">Masuk</a>
	    </div>

	    <button class="btn btn-success w-100 py-2" type="submit">Daftar</button>
	    <p class="mt-5 mb-3 text-body-secondary">&copy; <?php echo date('Y'); ?></p>
	  </form>
	</main>

    <!-- Javascript -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>