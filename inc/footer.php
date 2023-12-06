<?php  ?>
<footer class="bg-light p-5 mt-5">
			<div class="container">
				<div class="row mt-2">
					<!-- OUR PROFILE -->
					<div class="col-md-6 text-md-start text-center pt-2 pb-2">
						<a href="#" class="text-decoration-none">
							<img src="img/logo.png" style="width: 40px">
						</a>
						<span class="ps-1">Copyright @<?php echo date('Y') ?> | Oleh Kelompok <a href="kelompok.php" class="text-dark fw-bold">PWEB LABTI</a> <i class="fa-solid fa-users"></i></span>
					</div>

					<div class="col-md-6 text-md-end text-center pt-2 pb-2">
						<a href="#" class="text-decoration-none">
							<img src="img/socialmedia/facebook.png" class="ms-2" style="width: 30px">
						</a>
						<a href="#" class="text-decoration-none">
							<img src="img/socialmedia/instagram.png" class="ms-2" style="width: 30px">
						</a>
						<a href="#" class="text-decoration-none">
							<img src="img/socialmedia/linkedin.png" class="ms-2" style="width: 30px">
						</a>
						<a href="#" class="text-decoration-none">
							<img src="img/socialmedia/twitter.png" class="ms-2" style="width: 30px">
						</a>
					</div>
				</div>
			</div>
		</footer>

<!-- Widget WA -->
<script type="text/javascript">
	// Widget WA
        var url = "https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?21403";
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = url;

        var options = {
            enabled: true,
            chatButtonSetting: {
                backgroundColor: "#212529",
                ctaText: "Hallo Vappers",
                borderRadius: "25",
                marginLeft: "0",
                marginRight: "20",
                marginBottom: "20",
                ctaIconWATI: true,
                position: "right",
            },
            brandSetting: {
                brandName: "King Vapestore",
                brandSubTitle: "Only Vappers",
                brandImg: "img/logo.png",
                welcomeText: "Hi! Penikmat Vape\nApa ada yang Bisa kami Bantu?",
                messageText: "Hello, %0A Saya Ingin Bertanya??",
                backgroundColor: "#212529",
                ctaText: "Kirm Pesan",
                borderRadius: "25",
                autoShow: false,
                phoneNumber: "+6281911920984",
            },
        };
        s.onload = function () {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
</script>