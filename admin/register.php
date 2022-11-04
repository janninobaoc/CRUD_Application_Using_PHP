<?php require_once 'db_con.php';
session_start();
if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];

	$photo = explode('.', $_FILES['photo']['name']);
	$photo = end($photo);
	$photo_name = $username . '.' . $photo;

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	$input_error = array();
	if (empty($name)) {
		$input_error['name'] = "The Name Field is Required";
	}
	if (empty($age)) {
		$input_error['age'] = "The Age Field is Required";
	}
	if (empty($email)) {
		$input_error['email'] = "The Email Field is Required";
	}
	if (empty($address)) {
		$input_error['address'] = "The Address Field is Required";
	}
	if (empty($username)) {
		$input_error['username'] = "The UserName Field is Required";
	}
	if (empty($password)) {
		$input_error['password'] = "The Password Field is Required";
	}
	if(!$uppercase || !$lowercase || !$specialChars) {
		$input_error['password']='Password should include at least one upper case letter,one lower case letter and one special character.';
	}
	if (empty($photo)) {
		$input_error['photo'] = "The Photo Field is Required";
	}
	if (!empty($password)) {
		if ($c_password !== $password) {
			$input_error['notmatch'] = "You Typed Wrong Password!";
		}
	}
	

	if (count($input_error) == 0) {
		$check_email = mysqli_query($db_con, "SELECT * FROM `users` WHERE `email`='$email';");
		if (mysqli_num_rows($check_email) == 0) {
			$check_username = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username`='$username';");
			if (mysqli_num_rows($check_username) == 0) {
				if (strlen($username) > 7) {
					if (strlen($password) > 7) {
						$password = sha1(md5($password));
						$query = "INSERT INTO `users`(`name`,`age`,`email`,`address`, `username`, `password`, `photo`, `status`) VALUES ('$name', '$age','$email','$address', '$username', '$password','$photo_name','inactive');";
						$result = mysqli_query($db_con, $query);
						if ($result) {
							move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
							header('Location: register.php?insert=sucess');
						} else {
							header('Location: register.php?insert=error');
						}
					} else {
						$passlan = "This password more than 8 charset";
					}
				} else {
					$usernamelan = 'This username more than 8 charset';
				}
			} else {
				$username_error = "This username already exists!";
			}
		} else {
			$email_error = "This email already exists";
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
	<div class="container bg-light" style="margin-top: 30px; margin-bottom: 30px; width:70%"><br>
		<h1 class="text-center">Register Users!</h1>
		<hr><br>
		<div class="d-flex justify-content-center">
			<?php
			if (isset($_GET['insert'])) {
				if ($_GET['insert'] == 'sucess') {
					echo '<div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-success fade hide" data-delay="3000">Your account is added! Contact for the admin for activation of your account</div>';
				}
			}; ?>
		</div>
		<div class="row animate__animated animate__pulse">
			<div class="col-md-8 offset-md-2">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?= isset($name) ? $name : '' ?>" name="name" placeholder="Name" id="inputName3">
							<?= isset($input_error['name']) ? '<label for="inputEmail3" class="error">' . $input_error['name'] . '</label>' : '';  ?>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?= isset($age) ? $age : '' ?>" name="age" placeholder="Age" id="inputAge3">
							<?= isset($input_error['age']) ? '<label for="inputAge3" class="error">' . $input_error['age'] . '</label>' : '';  ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<input type="email" class="form-control" value="<?= isset($email) ? $email : '' ?>" name="email" placeholder="Email" id="inputEmail3">
							<?= isset($input_error['email']) ? '<label class="error">' . $input_error['email'] . '</label>' : '';  ?>
							<?= isset($email_error) ? '<label class="error">' . $email_error . '</label>' : '';  ?>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?= isset($address) ? $address : '' ?>" name="address" placeholder="Address" id="inputAddress3">
							<?= isset($input_error['address']) ? '<label for="inputAddress3" class="error">' . $input_error['address'] . '</label>' : '';  ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<input type="text" name="username" value="<?= isset($username) ? $username : '' ?>" class="form-control" id="inputPassword3" placeholder="Username"><?= isset($input_error['username']) ? '<label class="error">' . $input_error['username'] . '</label>' : '';  ?>
							<?= isset($username_error) ? '<label class="error">' . $username_error . '</label>' : '';  ?><?= isset($usernamelan) ? '<label class="error">' . $usernamelan . '</label>' : '';  ?>
						</div>
						<div class="col-sm-6">
                            <input type="password" name="password" class="form-control" id="inputword3" placeholder="Password"><?= isset($input_error['password']) ? '<label class="error">' . $input_error['password'] . '</label>' : '';  ?>
                            <?= isset($passlan) ? '<label class="error">' . $passlan . '</label>' : '';  ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="password" name="c_password" class="form-control" id="input" placeholder="Confirm Password"><?= isset($input_error['notmatch']) ? '<label class="error">' . $input_error['notmatch'] . '</label>' : '';  ?>
                            <input style="margin-left:5px;" class="form-check-input" type="checkbox" value="" id="cPassword3">
                            <label style="margin-left:25px;" class="form-check-label-" for="flexCheckDefault"> Show Password </label>
                            <?= isset($passlan) ? '<label class="error">' . $passlan . '</label>' : '';  ?>
                        </div>
						<div class="col-sm-6">
							<div class="col-sm-9 text-dark"><label for="photo">Choose your photo</label></div>
							<input type="file" id="photo" name="photo" class="form-control">
							<?= isset($input_error['photo']) ? '<label class="error">' . $input_error['photo'] . '</label>' : '';  ?> <?= isset($photo) ? '<label class="error">' . $photo . '</label>' : '';  ?>
							<br>
						</div>

					</div>
					<div class="text-center">
						<button type="submit" name="register" class="btn btn-dark">Register!</button>
					</div>
					<br>
			</div>
			</form>
		</div>
		<div class="text-center">
			<p>If you have already an account, You can <br> <a href="login.php" style="color: darkblue;"> Login Your Account!</a></p>
		</div>
	</div>

	<footer class="mt-auto">
		<p class="text-center">Copyright (C) - 2022 | Developed By <a href="https://www.passerellesnumeriques.org/en/">Passerellesnumeriques.org </a> </p>
	</footer>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.5.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('.toast').toast('show')

		let checkbox = document.getElementById("cPassword3");
        checkbox.addEventListener("change" , (e) => {
            debugger
            var p = document.getElementById('input');
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