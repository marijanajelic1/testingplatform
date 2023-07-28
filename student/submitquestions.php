<?php

session_start();

$currentUserId = $_SESSION['id'];

require_once "../connection.php";
require_once "../validation.php";

$query4 = "SELECT id FROM `testingpitanja` ORDER BY id DESC LIMIT 1;";
$res4 = $conn->query($query4);

$currentTestId = 0;

while ($row = mysqli_fetch_assoc($res4)) {
    $currentTestId= $row['id'];
}

$poeni = 0;
$ukupanBroj = 10;
$percent=0;
$poruka = "";

foreach ($_POST as $question => $answer) {
    
    $questionId = intval(str_replace('question', '', $question));

    $sql = "SELECT tacanodg FROM pitanje WHERE id = $questionId";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $correctAnswer = $row['tacanodg'];

    if($answer == $correctAnswer) {
        $poeni++;
    }


    $percent = ($poeni / $ukupanBroj) * 100;
}

$query9 = "INSERT INTO `procenatuspesnosti`(`student_id`, `brojodg`) VALUES ('$currentUserId','$poeni');";
$result9 = $conn->query($query9);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <html lang="sr-Latn">
  <link href="studentstyle.css" rel="stylesheet">
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

  <style>
    .red {
        color:red;
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
          <li><a href="profileview.php">Vaš profil</a></li>
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
  <h1 class="p">ODGOVORI NA TESTU</h1>
    <form  class="firstform" >
    <?php
    $query5 = "SELECT * FROM `testingpitanja` WHERE id = $currentTestId;";
    $result5 = $conn->query($query5);
    while ($row = mysqli_fetch_assoc($result5)) {
    foreach($row as $question) {
    // Display the question text
    $query7 = "SELECT tekst FROM pitanje WHERE id = $question";
    $result7 = $conn->query($query7);
    while ($row2 = mysqli_fetch_assoc($result7)) {
    echo "<hr><h5>{$row2['tekst']}</h5>";
    }
    $query6 = "SELECT tacanodg FROM pitanje WHERE id = $question;";
    $result6 = $conn->query($query6);
    while ($row1 = mysqli_fetch_assoc($result6)) {
        echo "<label>- {$row1['tacanodg']}<label><br>";
    }
    }
    }  

    echo "<br><hr><h3>Na testu imate ukupno: $percent poena </h3><hr>";
    ?>
    </form>
</body>
</html>


