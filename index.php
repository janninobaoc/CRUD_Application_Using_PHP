<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>PN Students Management System</title>
  <style>
    .container {
      left: 0;
      top: 0;
      width: 100%;
      height: 80vh;
      animation: animate 16s ease-in-out infinite;
      background-size: cover;
      background-repeat: no-repeat;
      opacity: 0.8;

    }

    .outer {
      position: absolute;
      left: 0;
      right: 0;
      top: 100px;
      width: 100%;
      height: 80vh;
      background: rgba(0, 0, 0, 0.2);
    }

    .details {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    @keyframes animate {

      0%,
      100% {
        background-image: url("admin/images/pnp.selection.jpg")
      }
      75% {
        background-image: url("admin/images/PNP_graduation-ceremony_2-1.jpg");
      }
      25% {
        background-image: url("admin/images/PNP_Training_USC.jpg")
      }

      50% {
        background-image: url("admin/images/PNP_Training_Lego.jpg")
      }
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-secondary">
<nav class="navbar navbar-expand-sm bg-light navbar-dark">
   <a class="navbar-brand" href="#">
    <img src="admin/images/logo.png" alt="Logo" style="width:200px;">
  </a>
  <div class="navbar-collapse collapse justify-content-end">
  <a style="padding-right:15px; font-size:large; font-weight:bold;" class="active" href="/pn_student/index.php">Home</a>
  <button style="margin: 15px; border-radius:10px; font-weight:bold;" class="btn btn-info navbar-btn "> <a type="button" href="admin/login.php" style="color:white;" >Login</a></button>
  <button style="margin: 15px; border-radius:10px; font-weight:bold;" class="btn btn-info navbar-btn"><a type="button" href="admin/register.php" style="color:white;">Register</a></button>
  </div>
</nav>
  <div class="container">
    <div class="outer">
      <div class="details">
        <h1 class="text-center" style=" color:white;">Welcome to PNP Student Management System!</h1><br><br>
        <p style="color: white; font-weight:bolder;">We enable young underprivileged people to build their employability through education in the digital industry.</p>
        <button class="btn btn-info navbar-btn"><a style="color:black" href="https://www.passerellesnumeriques.org/en/">Visit PN Website</a></button>
      </div>
    </div>
  </div>
  <footer>
        <p class="text-center">Copyright (C) - 2022 | Developed By <a href="https://www.passerellesnumeriques.org/en/">Passerellesnumeriques.org </a> </p>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>