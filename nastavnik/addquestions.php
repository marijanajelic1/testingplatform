<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

$teacherId = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vastekstpitanja = $conn->real_escape_string($_POST['vastekstpitanja']);
	$vasaopcija1 = $conn->real_escape_string($_POST['vasaopcija1']);
    $vasaopcija2 = $conn->real_escape_string($_POST['vasaopcija2']);
    $vasaopcija3 = $conn->real_escape_string($_POST['vasaopcija3']);
    $vastacanodgovor = $conn->real_escape_string($_POST['vastacanodgovor']);

    $sqlinsert1 = "INSERT INTO `pitanje`(`tekst`, `tacanodg`, `nastavnik_id`) VALUES ('$vastekstpitanja','$vastacanodgovor','$teacherId');";
    $resultinsert1 = $conn->query($sqlinsert1);

    $sqlinsert2 = "SELECT id FROM pitanje WHERE tekst = '$vastekstpitanja';";
    $resultinsert2 = $conn->query($sqlinsert2);
    while ($row = mysqli_fetch_assoc($resultinsert2)) {
        $questionId = $row['id'];
    }

    $sqlinsert3 = "INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('$vasaopcija1','$questionId')";
    $resultinsert3 = $conn->query($sqlinsert3);
    $sqlinsert4 = "INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('$vasaopcija2','$questionId')";
    $resultinsert4 = $conn->query($sqlinsert4);
    $sqlinsert5 = "INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('$vasaopcija3','$questionId')";
    $resultinsert5 = $conn->query($sqlinsert5);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <html lang="sr-Latn">
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
          <li><a href="homepage.php">Vaš profil</a></li>
          <li><a href="viewquestions.php">Sva pitanja</a></li>
          <li><a href="editquestions.php">Uredi pitanja</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../logout.php" class="get-started-btn">Log out</a>

    </div>
  </header><!-- End Header -->
  <br><br><br><br>
<h1 class="p">DODAJTE NOVO PITANJE NA PLATFORMU</h1>

<form class="firstform" method="post" action="#">

<label>Pitanje: <input type='text' name="vastekstpitanja"></label></p>

<label>Ponuđen odgovor1: <input type='text' name="vasaopcija1"></label><br>
<label>Ponuđen odgovor2: <input type='text' name="vasaopcija2"></label><br>
<label>Ponuđen odgovor3: <input type='text' name="vasaopcija3"></label><br>

<label>Tačan odgovor: </label><input type='text' name="vastacanodgovor">

<input type="submit" value="Pošalji">
</form>

</body>
</html>