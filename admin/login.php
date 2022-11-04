<?php require_once 'db_con.php';
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if (isset($_SESSION['user_login'])) {
	header('Location: index.php');
}
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$remember = $_POST['remember'];

	if ($remember == 1) {
		setcookie('username', $username, time() + 60 * 60 * 24 * 10, "/");
		setcookie('password', $password, time() + 60 * 60 * 24 * 10, "/");
	}
	$input_arr = array();

	if (empty($username)) {
		$input_arr['input_user_error'] = "Username Is Required!";
	}

	if (empty($password)) {
		$input_arr['input_pass_error'] = "Password Is Required!";
	}

	if (count($input_arr) == 0) {
		$query = "SELECT * FROM `users` WHERE `username` = '$username';";
		$result = mysqli_query($db_con, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == sha1(md5($password))) {
				if ($row['status'] == 'active') {
					$_SESSION['user_login'] = $username;
					header('Location: index.php');
				} else {
					$status_inactive = "Your Status is inactive, please contact with admin or support!";
				}
			} else {
				$worngpass = "This password Wrong!";
			}
		} else {
			$usernameerr = "Username Not Found!";
		}
	}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="../css/fontawesome.min.css">
	<title>PN Students Management System</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-secondary">
	<nav class="navbar navbar-expand-sm bg-light navbar-dark">
		<a class="navbar-brand" href="/pn_student/index.php">
			<img src="images/logo.png" alt="Logo" style="width:200px;">
		</a>
		<div class="navbar-collapse collapse justify-content-end">
			<a style="padding-right:15px; font-size:large; font-weight:bold;" class="active" href="/pn_student/index.php">Home</a>
			<button style="margin: 15px; border-radius:10px; font-weight:bold;" class="btn btn-info navbar-btn "> <a type="button" href="login.php" style="color:white;">Login</a></button>
			<button style="margin: 15px; border-radius:10px; font-weight:bold;" class="btn btn-info navbar-btn"><a type="button" href="register.php" style="color:white;">Register</a></button>
		</div>
	</nav>
	<div class="container bg-light" style="margin-top: 30px; margin-bottom: 30px; width:60%"><br>
		<h1 class="text-center">Login Users!</h1><br>
		<div class="d-flex justify-content-center">
			<?php if (isset($usernameerr)) { ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="4000"><?php echo $usernameerr; ?></div><?php }; ?>
			<?php if (isset($worngpass)) { ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="4000"><?php echo $worngpass; ?></div><?php }; ?>
			<?php if (isset($status_inactive)) { ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="4000"><?php echo $status_inactive; ?></div><?php }; ?>
		</div>
		<div class="row animate__animated animate__pulse">
			<div class="col-md-4 offset-md-4">
				<form method="POST" action="">
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="username"  placeholder="Username" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
							<?php echo isset($input_arr['input_user_error']) ? '<label class="error">' . $input_arr['input_user_error'] . '</label>' : ''; ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="password" name="password" class="form-control" id="input3" placeholder="Password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
							<input style="margin-left:5px;" class="form-check-input" type="checkbox" value="" id="sPassword3">
                            <label style="margin-left:25px;" class="form-check-label-" for="flexCheckDefault"> Show Password </label>
							<?php echo isset($input_arr['input_pass_error']) ? '<label class="error">' . $input_arr['input_pass_error'] . '</label>' : ''; ?>
						</div>

					</div>
					<div class="form-group row">
						<label class="form-check-label text-muted ">
							<div class="form-check">
								<input style="margin-left:25px;" type="checkbox" name="remember" value="1" class="form-check-input"?>
								<label style="margin-left:50px;" > keep me signed in </label>
							</div>
						</label>
					</div>
					<div class="text-center">
						<button type="submit" name="login" class="btn btn-dark">Login</button>
					</div>
					<br>
					<div class="text-center">
						<p>If you have don't have an account, You can <br> <a href="register.php" style="color: darkblue;"> Register Account!</a></p>
					</div>
			</div>
			</form>
		</div>
	</div>
	<footer class="mt-auto">
		<p class="text-center">Copyright (C) - 2022 | Developed By <a href="https://www.passerellesnumeriques.org/en/">Passerellesnumeriques.org </a> </p>
	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.5.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('.toast').toast('show');

		let checkbox = document.getElementById("sPassword3")
        checkbox.addEventListener("change" , (e) => {
            debugger
            var p = document.getElementById('input3');
            if (e.target.checked) {
                p.setAttribute('type', 'text');
            }
            else{
                p.setAttribute('type', 'password');
            }

        }) 
	</script>
</body>

</html>