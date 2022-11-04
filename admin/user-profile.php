<?php 
$user=  $_SESSION['user_login'];
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-dark"><i class="fas fa-user"></i>  User Profile</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">User Profile</li>
  </ol>
</nav>
<?php 
  $query = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username` ='$user';");
  $row = mysqli_fetch_array($query);

 ?>
<div class="row bg-light">
  <div class="col-sm-6 " style="padding-top: 10px;">
    <table class="table table-bordered bg-light" >
      <tr>
        <td>User ID</td>
        <td><?php echo $row['id']; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo ucwords($row['name']); ?></td>
      </tr>
      <tr>
        <td>Age</td>
        <td><?php echo ucwords($row['age']); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $row['email']; ?></td>
      </tr>
      <tr>
      <tr>
        <td>Address</td>
        <td><?php echo ucwords($row['address']); ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo ucwords($row['username']); ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><?php echo ucwords($row['status']); ?></td>
      </tr>
      <tr>
        <td>Register Date</td>
        <td><?php echo $row['datetime']; ?></td>
      </tr>
    </table>
    
    <a class="btn btn-info pull-right" style="margin-bottom: 15px;" href="index.php?page=edit_this_user&id=<?php echo base64_encode($row['id']); ?>">Edit Profile</a>
    
  </div>
  <div class="col-sm-6" style="padding-left:80px ;">
    <h3>Profile Picture</h3>
    <a href="images/<?php echo $row['photo']; ?>">
      <img class="img-thumbnail" id="imguser" src="images/<?php echo $row['photo']; ?>" width="200px">
    </a>
    <br>
    <br>
  </div>
</div>
