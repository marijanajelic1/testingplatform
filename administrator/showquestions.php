<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

mysqli_set_charset($conn, 'utf8');

$query = "SELECT p.id, p.tekst AS ptekst, p.tacanodg, p.banovano, GROUP_CONCAT(n.tekst SEPARATOR '|') as opcije
FROM pitanje p
INNER JOIN netacniodgovori n ON p.id = n.pitanje_id
GROUP BY p.id
";

$result = $conn->query($query);

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
          <li><a href="profileview.php">Vaš profil</a></li>
          <li><a href="addquestions.php">Dodaj pitanje</a></li>
          <li><a href="editquestions.php">Uredi pitanja</a></li>
          <li><a href="../logout.php">Log out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../logout.php" class="get-started-btn">Log out</a>

    </div>
  </header><!-- End Header -->
  <div class="container">
  <h1 class="p">SVA PITANJA SA PLATFORME</h1>

  <form class="firstform" action="banquestions.php">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    // Display the question text
    echo "<hr> <p> Pitanje id: {$row['id']}</p>";
    echo "<p>{$row['ptekst']}</p>";
    
    // Display all of the possible answers
    $options = explode('|', $row['opcije']);
    foreach ($options as $option) {
        echo "<p class='pitanje'>- $option<p><br>"; 
    }
    $_SESSION['pid'] = $row['id'];
   // $_SESSION['pid'.$row['id']] = $row['id'];
   // $_SESSION['pbanovano'.$row['id']] = $row['pbanovano'];
    $_SESSION['pbanovano'] = $row['banovano'];
    echo "<b>" . $row['tacanodg'] . "</b><br>";
    echo "<input type='submit' value='Banuj'>";
  }
    ?>
 </form>
 </div>
  </body>
</html>