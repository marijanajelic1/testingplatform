<?php

require_once "connection.php";
require_once "validation.php";

    $validated = true;
    $name = $surname = $username = $password = $adress = "";
    $nameErr = $surnameErr = $usernameErr = $passwordErr = $adressErr = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $adress = $_POST['adress'];  
        $mail = $_POST['mail'];

		if(textValidation($name)){
            $validated = false;
            $nameErr = textValidation($name);
        }
        else {
            $name = trim($name);
            $name = preg_replace('/\s\s+/', ' ', $name);
        }

		if(textValidation($surname)){
            $validated = false;
            $surnameErr = textValidation($surname);
        }
        else {
            $surname = trim($surname); 
            $surname = preg_replace('/\s\s+/', ' ', $surname); 
        }
		if(usernameValidation($username, $conn)){
            $validated = false;
            $usernameErr = usernameValidation($username, $conn);
        }
        if(adressValidation($adress)) {
            $validated = false;
            $adressErr = textValidation($adress);
        } else {
            $adress = trim($adress);
            echo $adress;
        }
		if(passwordValidation($password)){
            $validated = false;
            $passwordErr = passwordValidation($password);
        } else {
			$password = md5($password);
		}

		if($validated) {
            echo "Proso";
			$q = "INSERT INTO `korisnik`(`username`, `password`, `tip_id`) VALUES ('$username','$password', '3');";

		if($conn->query($q)) {
			echo "<p class='success'>Successfully added user in table korisnik</p>";
			$q = "SELECT `id` 
				FROM `korisnik` 
				WHERE `username` LIKE '$username'";

			$result = $conn->query($q);
			$red = $result->fetch_assoc();
			$id = $red['id'];

			$q = "INSERT INTO `profil`(`ime`, `prezime`, `email`, `adresa`, `korisnik_id`)
					VALUES ('$name', '$surname', '$mail', '$adress', '$id')";

			if($conn->query($q)) {
				echo "<p class='success'>Successfully added profile in table profiles</p>";
				header('Location: login.php');
			}
		} else {
            echo "Greska";
        }
	}
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="student/studentstyle.css" rel="stylesheet">
   <!-- Favicons -->
   <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">INFORMATIČAR</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.html">Početna</a></li>
          <li><a href="login.php">Log in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="courses.html" class="get-started-btn">Započnite učenje/Sign up</a>

    </div>
  </header><!-- End Header -->
<div>
	<br>
	<br>
	<br>
	<br>
	<form action="#" method="POST" class="firstform">
		<span class="text-center">Sign up</span><br><br>
	<div>
		<input type="text" name="name">
		<span class="error"><?php echo $nameErr; ?></span>
		<label>Ime</label>		
	</div>
    <div>
		<input type="text" name="surname">
		<span class="error"><?php echo $surnameErr; ?></span>
		<label>Prezime</label>		
	</div>
	<div>
		<input type="text" name="username">
		<span class="error"><?php echo $usernameErr; ?></span>
		<label>Username</label>		
	</div>
	<div>		
		<input type="mail" name="mail">
		<label>Email</label>
	</div>
    <div>		
		<input type="text" name="adress">
		<label>Adresa</label>
	</div>
    <div>
		<input type="password" name="password">
		<span class="error"><?php echo $passwordErr; ?></span>
		<label>Šifra</label>		
	</div>
		<input type="submit" class="btn1" value="Pošalji">
</form>	
</div>
</body>

</html>