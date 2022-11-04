<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
	if ($corepage == $corepage) {
		$corepage = explode('.', $corepage);
		header('Location: index.php?page=' . $corepage[0]);
	}
}

$id = base64_decode($_GET['id']);
if (isset($_POST['userupdate'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$status = $_POST['status'];

	if (!empty($_FILES['photo']['name'])) {
		$photo = $_FILES['photo']['name'];
		$photo = explode('.', $photo);
		$photo = end($photo);
		$photo = $roll . date('Y-m-d-m-s') . '.' . $photo;
	} else {
		$photo = $oldPhoto;
	}
	$query = "UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username',`status`='$status',`photo`='$photo' WHERE `id`= $id";
	if (mysqli_query($db_con, $query)) {
		$datainsert['insertsucess'] = '<p style="color: green;">User Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo);
			unlink('images/' . $oldPhoto);
		}
		header('Location: index.php?page=all-users&edit=success');
	} else {
		header('Location: index.php?page=all-users&edit=error');
	}
}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Edit User Informations!<small class="text-warning"> Edit User!</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-users">User Profile </a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
	</ol>
</nav>

<?php
if (isset($id)) {
	$query = "SELECT `id`, `name`, `email`, `username`, `status`, `photo`, `datetime` FROM `users` WHERE `id`=$id";
	$result = mysqli_query($db_con, $query);
	$row = mysqli_fetch_array($result);
}
?>
<div class="row">
	<div class="col-sm-6">
		<form enctype="multipart/form-data" method="POST" action="">
			<div class="form-group">
				<label for="name">Full Name</label>
				<input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input name="email" type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" required="">
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input name="username" type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" required="">
			</div>
			<div class="form-group">
				<div class="form-group">
					<label for="status">User Status</label>
					<select name="status" class="form-control" id="status" required="" value="">
						<option>Select</option>
						<option value="active" <?= $row['status'] == 'active' ? 'selected' : '' ?>>active</option>
						<option value="inactive" <?= $row['status'] == 'inactive' ? 'selected' : '' ?>>inactive</option>
				</div>
				<div class="form-group">
					<label for="photo">User Photo</label>
					<input name="photo" type="file" class="form-control" id="photo">
				</div>
				<div class="form-group text-center">
					<input name="userupdate" value="Update Profile" type="submit" class="btn btn-danger">
				</div>
		</form>
	</div>
</div>