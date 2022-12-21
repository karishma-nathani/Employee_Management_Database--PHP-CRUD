<?php
include 'connection.php';

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$hireDate = $_POST['hireDate'];
	$salary = $_POST['salary'];
	$createDate = $_POST['createDate'];

	$sql = " update tbl_employee set firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', hireDate='$hireDate', salary='$salary', createDate='$createDate' where id='$id'";

	$result = mysqli_query($con,$sql);

	header('location:index.php');
}
	$id = $_GET['id'];
	 
	$EditSql = "SELECT * FROM tbl_employee WHERE id = '$id'";
	$id = $con->query($EditSql);
	$row = $id->fetch_array();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../Employee Management/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../Employee Management/assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../Employee Management/assets/js/jquery.slim.min.js"></script>
	<script type="text/javascript" src="../Employee Management/assets/js/popper.min.js"></script>
	<script type="text/javascript" src="../Employee Management/assets/js/bootstrap.bundle.min.js"></script>
	<title>Update Data</title>
</head>
<body>
	<section class="hero-section">
		<div class="container">
			<div class="emp-tbl">
				<h1>Employee Management System</h1>
				<form method="post">
					<h3>Enter Employee's Details</h3>
				  	<div class="form-group">
				    	<label for="firstname">First Name</label>
				    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="Enter Employee's First Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="lastname">Last Name</label>
				    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Enter Employee's Last Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="email">Email</label>
				    	<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Employee's Email Id">
				  	</div>
				  	<div class="form-group">
				    	<label for="phone">Phone No.</label>
				    	<input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Enter Employee's Contact number">
				  	</div>
				  	<div class="form-group">
				    	<label for="hireDate">Hire Date</label>
				    	<input type="date" class="form-control" id="hireDate" name="hireDate" value="<?php echo $row['hireDate']; ?>" placeholder="Enter Employee's Hire Date">
				  	</div>
				  	<div class="form-group">
				    	<label for="salary">Salary</label>
				    	<input type="salary" class="form-control" id="salary" name="salary" value="<?php echo $row['salary']; ?>" placeholder="Enter Employee's Salary">
				  	</div>
				  	<div class="form-group">
				    	<label for="createDate">Create Date</label>
				    	<input type="date" class="form-control" id="createDate" name="createDate" value="<?php echo $row['createDate']; ?>" placeholder="Enter Employee's Create Date">
				  	</div>
				  	<button class="btn btn-primary btnSubmit" name="update">Update</button>
				</form>
			</div>
		</div>
	</section>
</body>
</html>