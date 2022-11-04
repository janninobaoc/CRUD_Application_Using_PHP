<?php require_once 'db_con.php';
session_start();
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/solid.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>
  <script src="../js/fontawesome.min.js"></script>
  <script src="../js/script.js"></script>
  <title>Admin Dashboard</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-secondary">
  <nav class="navbar navbar-expand-lg navbar-dark bg-light text-black">
   <a class="nav-link active" href="/pn_student/index.php" ><img width="300px" height="85px" src="../admin/images/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
      <?php $showuser = $_SESSION['user_login'];
      $haha = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username`='$showuser';");
      $showrow = mysqli_fetch_array($haha); ?>
      <ul class="nav navbar-nav ">
        <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile" style="color:blue;font-weight:600;"><i class="fa fa-user"></i> Welcome <?php echo $showrow['name']; ?>!</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?page=add-student" style="color:blue;font-weight:600;"><i class="fa fa-user-plus"></i> Add Student</a></li>
        <li class="nav-item "><a class="nav-link active " href="index.php?page=user-profile" style="color:blue;font-weight:600;"><i class="fa fa-user"></i> Profile</a></li>
        <li class="nav-item "><a class="nav-link active" href="logout.php" style="color:blue;font-weight:600;"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-3" style="height:22.5%; margin-left:-10%;">
        <div class="list-group p-3 my-3 bg-dark text-white">
          <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
          <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
          <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
          <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>
          <a href="index.php?page=user-profile" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> User Profile</a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="content">
          <?php
          if (isset($_GET['page'])) {
            $page = $_GET['page'] . '.php';
          } else {
            $page = 'dashboard.php';
          }

          if (file_exists($page)) {
            require_once $page;
          } else {
            require_once '404.php';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix "></div>
  <br>
  <footer class="mt-auto">
		<p class="text-center">Copyright (C) - 2022 | Developed By <a href="https://www.passerellesnumeriques.org/en/">Passerellesnumeriques.org </a> </p>
	</footer>
  <script type="text/javascript">
    jQuery('.toast').toast('show');
  </script>
</body>

</html>