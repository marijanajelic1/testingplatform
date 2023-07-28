<?php

session_start();

require_once "../connection.php";
require_once "../validation.php";

$id = $_SESSION['id'];

$query = "SELECT k.id, k.username, k.banovan, p.ime, p.prezime, t.naziv
FROM korisnik k
INNER JOIN profil p ON p.korisnik_id = k.id
INNER JOIN tipkorisnika t ON k.tip_id = t.id
WHERE k.id <> '$id'
GROUP BY k.id
ORDER BY k.id
";

$result = $conn->query($query);
$usernameError =  "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <html lang="sr-Latn">
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
    /* Center table on page */
.firstform {
  display: flex;
  justify-content: center;
  align-items: center;
}
/* Table Styles */
table.styled-table {
    border-collapse: collapse;
    width: 80%;
    margin: auto;
    font-size: 0.9em;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

table.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

table.styled-table th,
table.styled-table td {
    padding: 12px 15px;
}

table.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

table.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

table.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

table.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}


</style>
</head>

<body>

<!-- ======= Header ======= -->
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
  <h1 class="p">SVI KORISNICI NA PLATFORMI</h1>
<div class="firstform">
<table class="styled-table">
<thead>
<tr>
<th>ID</th>
<th>Username</th>
<th>Ime</th>
<th>Prezime</th>
<th>Uloga</th>
<th>Banovan</th>
</tr>
</thead>
    <?php
    while ($row = mysqli_fetch_assoc($result)) { 
      $odgovor="";
      if($row['banovan']=='0'){
        $odgovor="Nije";
      }else{
        $odgovor="Jeste";
      }
    ?>
    <tbody>
    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['username'] ?></td>
    <td><?php echo $row['ime'] ?></td>
    <td><?php echo $row['prezime'] ?></td>
    <td><?php echo $row['naziv'] ?></td>
    <td><?php echo $odgovor ?></td>
    </tr>
    </tbody>

    <?php
    }
    ?>

</table>
</div>
</body>
</html>
