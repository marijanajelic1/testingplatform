<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";
$id = $_SESSION['id'];
$validated = true;
$usernameErr = $oldpassErr = $newpassErr = $test="";

if($_SERVER['REQUEST_METHOD'] == "POST") {  

    $username = $_POST['username'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

    if(passwordValidation($newpassword)){
        $validated = false;
        $newpassErr = passwordValidation($newpassword);
    } else {
        $newpassword = md5($newpassword);
    }

    $sql = "SELECT * FROM korisnik WHERE username = '$username'";
    $result = $conn->query($sql);
    if($result->num_rows == 0) {
        $usernameErr = "Incorrect username!";
    }
    else {
        $row = $result->fetch_assoc();
        $dbPass = $row['password'];
        if($dbPass != md5($oldpassword)) {
            $oldpassErr = "Incorrect password!";
        } else {
          if($validated) {
            $id = $row['id'];
            $sql = "UPDATE korisnik SET password='$newpassword' WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
            echo "Password updated successfully";
            } else {
            echo "Error updating password: ";
            }
          }
        }
}
}

$sql = "SELECT COUNT(id) AS brpitanja, SUM(brojodg) AS brodg FROM procenatuspesnosti WHERE student_id = $id";
$result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $brtest = $row['brpitanja'];
    if($brtest==0){
      $test = "Niste odradili nijedan test!";
    }else{
    $brtacno = $row['brodg'];
    $brtestuk = $brtest * 10;
    $rezultat=($brtacno/$brtestuk)*100;
    $test="Odradili ste ukupno $brtest testa. Vaša uspešnost na testovima je $rezultat%";
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
    <link rel="studentstyle.css" href="style.css"> <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
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
  <style>
    form.firstform {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
  }
  h1.p{
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 10px;
    
  }
  form.firstform  {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
  }
  
  form.firstform label{
    display: block;
    margin-bottom: 15px;
    font-size: 16px;
  }
  
  form.firstform input[type="radio"] {
    margin-right: 10px;
  }
  
  form.firstform input[type="submit"] {
    display: block;
    margin: 20px auto 0;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
  }
  
  form.firstform input[type="submit"]:hover {
    background-color: #0069d9;
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
          <li><a href="testing.php">TEST</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../logout.php" class="get-started-btn">Log out</a>

    </div>
  </header><!-- End Header -->  
    <br>
    <br>
    <br>
    <br>

    <h1 class="p">Vas profil</h1>
    <form  class="firstform" >
			<label for="username">Username:</label>
			<input type="text" id="username" name="username"><br><br>
			<span class="error"><?php echo $usernameErr; ?></span>

			<label for="old_password">Trenutna šifra:</label>
			<input type="password" id="oldpassword" name="oldpassword"><br><br>
			<span class="error"><?php echo $oldpassErr; ?></span>

			<label for="new_password">Nova šifra:</label>
			<input type="password" id="newpassword" name="newpassword"><br><br>
			<span class="error"><?php echo $newpassErr; ?></span>

			<input type="submit" value="Pošalji">
      <br><hr>
      <?php echo $test; ?>
		</form>
</body>
</html>
