<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

$id = $_SESSION['id'];


$query = "SELECT p.id, p.tekst AS ptekst, p.tacanodg, GROUP_CONCAT(n.tekst SEPARATOR '|') as opcije
FROM pitanje p
INNER JOIN netacniodgovori n ON p.id = n.pitanje_id
WHERE p.nastavnik_id = '$id'
GROUP BY p.id
";

$result = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Loop through the submitted form data
    foreach ($_POST as $name => $value) {
        // Extract the question ID and field name from the input name
        if (preg_match('/^(questiontext|option|correctanswer)(\d+)$/', $name, $matches)) {
            $field = $matches[1];
            $id = $matches[2];
            
            // Update the appropriate field in the database based on the input name
            switch ($field) {
                case 'questiontext':
                    // Sanitize the input value
                    $value = mysqli_real_escape_string($conn, $value);
                    // Update the database
                    $updateQuery = "UPDATE pitanje SET tekst = '{$value}' WHERE id = '{$id}'";
                    mysqli_query($conn, $updateQuery);
                    break;
                    
                case 'option':
                    // Sanitize the input value
                    $value = mysqli_real_escape_string($conn, $value);
                    // Update the database
                    $updateQuery = "UPDATE netacniodgovori SET tekst = '{$value}' WHERE id = '{$id}'";
                    mysqli_query($conn, $updateQuery);
                    break;
                    
                case 'correctanswer':
                    // Sanitize the input value
                    $value = mysqli_real_escape_string($conn, $value);
                    // Update the database
                    $updateQuery = "UPDATE pitanje SET tacanodg = '{$value}' WHERE id = '{$id}'";
                    mysqli_query($conn, $updateQuery);
                    break;
            }
        }
    }
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
          <li><a href="addquestions.php">Dodaj pitanja</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../logout.php" class="get-started-btn">Log out</a>

    </div>
  </header><!-- End Header -->
  <h1 class="p">SVA PITANJA SA PLATFORME</h1>

  <form class="firstform" method="post" action="#">
  <?php
    while ($row = mysqli_fetch_assoc($result)) {
    // Display the question text
    echo "<label>Pitanje:<input type='text' name=\"questiontext{$row['id']}\" value='{$row['ptekst']}'></label></p>";

    // Display all of the possible answers as input fields
    $options = explode('|', $row['opcije']);
    foreach ($options as $option) {
        $queryoptionId = "SELECT id FROM netacniodgovori WHERE tekst = '$option'";
        $resultquery = $conn->query($queryoptionId);

        while ($row19 = mysqli_fetch_assoc($resultquery)) {
            $optionId = $row19['id'];
        }

        echo "<label>Opcija:<input type='text' name=\"option{$optionId}\" value='$option'></label><br>";

    }

    // Add a text input field for the correct answer
    echo "<label>Tacan odgovor:<input type='text' name=\"correctanswer{$row['id']}\" value='{$row['tacanodg']}'></label>";

    // Close the form for this question
    echo "<br><br>";
}
?>
<input type="submit" value="Pošalji">
  </form>

</body>
</html>