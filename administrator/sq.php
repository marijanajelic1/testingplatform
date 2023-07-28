<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

mysqli_set_charset($conn, 'utf8');

$query = "SELECT p.id, p.tekst AS ptekst, p.tacanodg, GROUP_CONCAT(n.tekst SEPARATOR '|') as opcije
FROM pitanje p
INNER JOIN netacniodgovori n ON p.id = n.pitanje_id
GROUP BY p.id
";

$result = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($_POST as $name => $value) {
      if (preg_match('/^question(\d+)$/', $name, $matches)) {
          $question_id = $matches[1];

          $change1 = "SELECT `banovano` FROM `pitanje` WHERE id = '$question_id'";
          $resultch = $conn->query($change1);

          while ($rowresult = mysqli_fetch_assoc($resultch)) {
            $isBanned = $rowresult['banovano'];
          }

          if($isBanned == '0' || $isBanned == 'FALSE') {
          $sqlchange = "UPDATE `pitanje` SET `banovano`=1 WHERE id = '$question_id';";
          $resultchange = $conn->query($sqlchange);
          } else {
            $sqlchange2 = "UPDATE `pitanje` SET `banovano`=0 WHERE id = '$question_id';";
          $resultchange2 = $conn->query($sqlchange2);
          }
      }
}}


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
  <style>
    /* Reset default browser styles */
    body, form {
      margin: 0;
      padding: 0;
    }
    
    /* Container styles */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    
    /* Header styles */
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    
    /* Questions and answers styles */
    
    p {
      font-size: 18px;
      margin-bottom: 10px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
    }
    
    input[type="radio"] {
      margin-right: 5px;
    }
    
    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    .pitanje {
    font-weight: normal;
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
    <br><br><br><br>
  <h1>SVA PITANJA SA PLATFORME</h1>

  
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
     echo "<form class='firstform' method='POST' action='#'>";
    // Display the question text
    echo "<hr><br>Tekst: <input type='hidden' name=\"question{$row['id']}\">{$row['ptekst']}</p>";
    
    // Display all of the possible answers
    $options = explode('|', $row['opcije']);
    foreach ($options as $option) {
      echo "<p class='pitanje'>- $option<p><br>"; 
    }

    echo "Tačan odgovor: <b>" . $row['tacanodg'] . "</b><br>";

    echo " <input type='submit' value='Banuj/Unbanuj'>
    </form>";
    }
    ?>
</div>
</body>
</html>