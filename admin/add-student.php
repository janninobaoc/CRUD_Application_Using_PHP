<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
	if ($corepage == $corepage) {
		$corepage = explode('.', $corepage);
		header('Location: index.php?page=' . $corepage[0]);
	}
}

if (isset($_POST['addstudent'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$pn_email = $_POST['pn_email'];
	$batch_year = $_POST['batch_year'];
	$student_address = $_POST['student_address'];
	$pcontact = $_POST['pcontact'];


	$photo = explode('.', $_FILES['photo']['name']);
	$photo = end($photo);
	$photo = $photo . date('Y-m-d-m-s') . '.' . $photo;

	$query = "INSERT INTO `student_info`(`name`, `age`, `pn_email`, `batch_year`, `student_address`, `pcontact`, `photo`) VALUES ('$name', '$age', '$pn_email', '$batch_year', '$student_address', '$pcontact','$photo');";
	if (mysqli_query($db_con, $query)) {
		$datainsert['insertsucess'] = '<p style="color: green;">Student Inserted Successfully!</p>';
		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo);
	} else {
		$datainsert['inserterror'] = '<p style="color: red;">Student Not Inserted, please input right informations!</p>';
	}
}
?>
<h1 class="text-dark"><i class="fas fa-user-plus"></i> Add Student</h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Student</li>
	</ol>
</nav>

<div class="row bg-light">

	<div class="col-sm-6">
		<?php if (isset($datainsert)) { ?>
			<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
				<div class="toast-header">
					<strong class="mr-auto">Student Insert Alert</strong>
					<small><?php echo date('d-M-Y'); ?></small>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					<?php
					if (isset($datainsert['insertsucess'])) {
						echo $datainsert['insertsucess'];
					}
					if (isset($datainsert['inserterror'])) {
						echo $datainsert['inserterror'];
					}
					?>
				</div>
			</div>
		<?php } ?>
		<form enctype="multipart/form-data" method="POST" action="">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input name="name" type="text" class="form-control" id="name" value="<?= isset($name) ? $name : ''; ?>" required="">
			</div>
			<div class="form-group">
				<label for="age">Student Age</label>
				<input name="age" type="text" class="form-control" id="age" value="<?= isset($age) ? $age : ''; ?>" required="">
			</div>
			<div class="form-group">
				<label for="pn_email">Student Email</label>
				<input name="pn_email" type="pn_email" value="<?= isset($pn_email) ? $pn_email : ''; ?>" class="form-control" id="pn_email" required="">
			</div>
			<div class="form-group">
				<label for="batch_year">Student Batch Year</label>
				<select name="batch_year" class="form-control" id="batch_year" required="">
					<option>Select</option>
					<option value="2021">2021</option>
					<option value="2022-A">2022-A</option>
					<option value="2022-B">2022-B</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
				</select>
			</div>
			<div class="form-group">
				<label for="student_address">Student Address</label>
				<input name="student_address" type="text" value="<?= isset($student_address) ? $student_address : ''; ?>" class="form-control" id="student_address" required="">
			</div>
			<div class="form-group">
				<label for="pcontact">Parents Contact NO</label>
				<input name="pcontact" type="text" class="form-control" id="pcontact" pattern="[0-9]{11}" value="<?= isset($pcontact) ? $pcontact : ''; ?>" placeholder="09........." required="">
			</div>
			<div class="form-group">
				<label for="photo">Student Photo</label>
				<input name="photo" type="file" class="form-control" id="photo" required="">
			</div>
			<div class="form-group text-center">
				<input name="addstudent" value="Add Student" type="submit" class="btn btn-danger">
			</div>
		</form>
	</div>
</div>