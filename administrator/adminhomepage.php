<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../student/studentstyle.css" rel="stylesheet">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			
		}

		.container {
			max-width: 960px;
			margin: 0 auto;
			padding: 20px;
		}

		h1 {
			text-align: center;
			font-size: 24px;
			margin-top: 30px;
		}

		.button-container {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 30px;
		}

		.button-container button {
			display: block;
			width: 300px;
			padding: 10px;
			margin-bottom: 10px;
			border: none;
			border-radius: 4px;
			text-align: center;
			text-decoration: none;
			font-size: 16px;
			cursor: pointer;
		}

		.button-container button:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">INFORMATIČAR</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="adminhomepage.php">Vaš profil</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../logout.php" class="get-started-btn">Log out</a>

    </div>
  </header><!-- End Header -->
	<div class="container">
    <br><br><br>
		<h1>Dobrodošli nazad na platformu administratora</h1>
		<div  class="button-container">
			<button><a href="showusers.php">Prikažite sve korisnike platforme</a></button>
			<button><a href="sq.php">Prikažite sva pitanja na platformi</a></button>
			<button><a href="questionediting.php">Izmenite pitanja</a></button>
			<button><a href="userban.php">Banujte korisnika</a></button>
			<button><a href="userunban.php">Unbanujte korisnika</a></button>
			<button><a href="rolechange.php">Promenite rolu korisnika</a></button>
		</div>
	</div>
</body>
</html>
