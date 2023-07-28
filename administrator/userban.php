<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

$usernameError =  "";

if($_SERVER['REQUEST_METHOD'] == "POST") { 
	$username = $conn->real_escape_string($_POST['username']);
	
	$val = true;
        if(empty($username)) {
            $val = false;
            $usernameError = "Username cannot be left blank!";
        }

		if($val) {
            $sql = "SELECT * FROM korisnik WHERE username = '$username'";
            $result = $conn->query($sql);
            if($result->num_rows == 0) {
                $usernameError = "This user doesn't exist!";
            }
            else {
            //$row = $result->fetch_assoc();
            $sqlchange = "UPDATE `korisnik` SET `banovan`=1 WHERE username = '$username'";
            $resultchange = $conn->query($sqlchange);
            }
        }
    }


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Changing roles</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="../student/studentstyle.css" rel="stylesheet">
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
  <br><br><br><br>
<div class="box">
	<form action="#" method="POST" class="firstform">
		<span class="text-center">Unesite username korisnika kog zelite da banujete</span>
	<div>
		<input type="text" name="username">
		<span class='error'><?php echo $usernameError ?></span>
		<label>Username</label>		
	</div>
		<input type="submit" class="btn" value="Banuj korisnika">
</form>	
</div>
</body>

</html>