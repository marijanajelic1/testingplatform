<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";
mysqli_set_charset($conn, 'utf8');

$query = "SELECT p.id, p.tekst AS ptekst, p.tacanodg, GROUP_CONCAT(n.tekst SEPARATOR '|') as opcije
FROM pitanje p
INNER JOIN netacniodgovori n ON p.id = n.pitanje_id
WHERE p.banovano=false
GROUP BY p.id
ORDER BY RAND()
LIMIT 10
";

$result = $conn->query($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
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
  <link href="studentstyle.css" rel="stylesheet">
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
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../logout.php" class="get-started-btn">Log out</a>

    </div>
  </header><!-- End Header -->
  <br><br><br><br>
  <div class="container">
    <h1>TEST</h1>
    <form  class="firstform" method="post" action="submitquestions.php">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<hr><p>{$row['ptekst']}</p>";
        $nizId[] = $row['id'];
        $options = explode('|', $row['opcije']);
        $options[] = $row['tacanodg'];
        shuffle($options);
        foreach ($options as $option) {
          echo "<label><input type=\"radio\" name=\"question{$row['id']}\" value=\"$option\">$option</label>";
        }
      }
      $sqlquery2 = "INSERT INTO `testingpitanja`(`pitanje1`, `pitanje2`, `pitanje3`, `pitanje4`, `pitanje5`, `pitanje6`, `pitanje7`, `pitanje8`, `pitanje9`, `pitanje10`) VALUES ('$nizId[0]','$nizId[1]','$nizId[2]','$nizId[3]','$nizId[4]','$nizId[5]','$nizId[6]','$nizId[7]','$nizId[8]','$nizId[9]')";
      $result = $conn->query($sqlquery2);
      ?>
      <input type="submit" value="Pošalji">
    </form>
  </div>
</body>
</html>
