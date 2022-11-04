<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    $oldPhoto = base64_decode($_GET['photo']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
	$age = $_POST['age'];
  	$pn_email = $_POST['pn_email'];
  	$student_address = $_POST['student_address'];
  	$pcontact = $_POST['pcontact'];
  	$batch_year = $_POST['batch_year'];
  	
  	if (!empty($_FILES['photo']['name'])) {
  		 $photo = $_FILES['photo']['name'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo); 
		 $photo = $roll.date('Y-m-d-m-s').'.'.$photo;
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `student_info` SET `name`='$name',`age`='$age',`pn_email`='$pn_email',`batch_year`='$batch_year',`student_address`='$student_address',`pcontact`='$pcontact',`photo`='$photo' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
			unlink('images/'.$oldPhoto);
		}	
  		header('Location: index.php?page=all-student&edit=success');
  	}else{
  		header('Location: index.php?page=all-student&edit=error');
  	}
  }
?>
<h1 class="text-dark"><i class="fas fa-user-plus"></i>  Edit Student Informations!<small class="text-light"> Edit Student!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Student </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `name`, `age`, `pn_email`, `batch_year`, `student_address`, `pcontact`, `photo`, `datetime` FROM `student_info` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Student Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
		  <div class="form-group">
		    <label for="age">Student Age</label>
		    <input name="age" type="text" class="form-control" id="age" value="<?php echo $row['age']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pn_email">Student Email</label>
		    <input name="pn_email" type="pn_email" class="form-control" id="pn_email" value="<?php echo $row['pn_email']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="student_address">Student Address</label>
		    <input name="student_address" type="text" class="form-control" id="student_address" value="<?php echo $row['student_address']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Parents Contact NO</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" value="<?php echo $row['pcontact']; ?>" pattern="[0-9]{11}" placeholder="09........." required="">
	  	</div>
	  	<div class="form-group">
		    <label for="batch_year">Student Class</label>
		    <select name="batch_year" class="form-control" id="batch_year" required="" value="">
		    	<option>Select Batch Year</option>
		    	<option value="2021" <?= $row['batch_year']=='2021'? 'selected':'' ?>>2021</option>
		    	<option value="2022-A" <?= $row['batch_year']=='2022-A'? 'selected':'' ?>>2022-A</option>
		    	<option value="2022-B" <?= $row['batch_year']=='2022-B'? 'selected':'' ?>>2022-B</option>
		    	<option value="2023" <?= $row['batch_year']=='2023'? 'selected':'' ?>>2023</option>
		    	<option value="2024" <?= $row['batch_year']=='2024'? 'selected':'' ?>>2024</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Edit Student Info" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>