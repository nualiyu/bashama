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
  if (isset($_POST['adminupdate'])) {
  	$name = $_POST['name'];
  	$email = $_POST['email'];


  	$query = "UPDATE `admin` SET `name`='$name', `email`='$email' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Admin User Updated!</p>';
  		header('Location: index.php?page=admin-profile&edit=success');
  	}else{
  		header('Location: index.php?page=admin-profile&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Admin Informations!<small class="text-warning"> Edit Admin!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=admin-profile">Admin Profile </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {

			$query = "SELECT  `name`, `email` FROM `admin` WHERE `id`=$id;";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form method="POST" action="">
		<div class="form-group">
		    <label for="name">Full Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="email" class="form-control"  id="email" value="<?php echo $row['email']; ?>" required="">
	  	</div>
	  	
	  	<div class="form-group text-center">
		    <input name="adminupdate" value="Update Profile" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>