<?php

include 'connection.php';

if(isset($_POST['insert'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$hireDate = $_POST['hireDate'];
	 $salary = $_POST['salary'];
	 $createDate = $_POST['createDate'];

 	$sql = " INSERT INTO `tbl_employee`(`firstname`, `lastname`, `email`, `phone`, `hireDate`, `salary`, `createDate`) VALUES ( '$firstname', '$lastname', '$email', '$phone', '$hireDate', '$salary', '$createDate' )";

 	$result = mysqli_query($con,$sql);
}
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
	<title>Employee Management System</title>
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
				    	<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Employee's First Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="lastname">Last Name</label>
				    	<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Employee's Last Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="email">Email</label>
				    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter Employee's Email Id">
				  	</div>
				  	<div class="form-group">
				    	<label for="phone">Phone No.</label>
				    	<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Employee's Contact number">
				  	</div>
				  	<div class="form-group">
				    	<label for="hireDate">Hire Date</label>
				    	<input type="date" class="form-control" id="hireDate" name="hireDate" placeholder="Enter Employee's Hire Date">
				  	</div>
				  	<div class="form-group">
				    	<label for="salary">Salary</label>
				    	<input type="salary" class="form-control" id="salary" name="salary" placeholder="Enter Employee's Salary">
				  	</div>
				  	<div class="form-group">
				    	<label for="createDate">Create Date</label>
				    	<input type="date" class="form-control" id="createDate" name="createDate" placeholder="Enter Employee's Create Date">
				  	</div>
				  	<button class="btn btn-primary btnSubmit" name="insert">Submit</button>
				</form>
			</div>
		</div>
	</section>
	<section class="display">
		<div class="container">
 			<div class="col-lg-12">
 				<h1 class="text-warning text-center" > Display Employee Data </h1>
	 			<table  id="tabledata" class=" table table-striped table-hover table-bordered">
					<tr class="bg-dark text-white text-center">
						<th> Id </th>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Email </th>
						<th> Phone No. </th>
						<th> Hire Date </th>
						<th> Salary </th>
						<th> Create Date </th>
					</tr>

						 <?php
						 //Delete
						 if(isset($_GET['id'])) {
							$id = $_GET['id'];
						
						$sql = " DELETE FROM `tbl_employee` WHERE id = $id ";
						mysqli_query($con, $sql);
						}


						//Display
						 $sql = "select * from tbl_employee ";

						 $result = mysqli_query($con,$sql);

						 while($res = mysqli_fetch_array($result)){
						 ?>
					<tr class="text-center">
						<td> <?php echo $res['id'];  ?> </td>
						<td> <?php echo $res['firstname'];  ?> </td>
						<td> <?php echo $res['lastname'];  ?> </td>
						<td> <?php echo $res['email'];  ?> </td>
						<td> <?php echo $res['phone'];  ?> </td>
						<td> <?php echo $res['hireDate'];  ?> </td>
						<td> <?php echo $res['salary'];  ?> </td>
						<td> <?php echo $res['createDate'];  ?> </td>

						<td> <button class="btn-danger btn"> <a href="index.php?id=<?php echo $res['id']; ?>" onclick="return confirm('Are you sure you want to delete?')"> Delete </a>  </button> </td>
						<td> <button class="btn-primary btn"> <a href="employee_update.php?id=<?php echo $res['id']; ?>"> Update </a> </button> </td>
					</tr>

						 <?php 
						 }
						 ?>
				</table>  
			</div>
		</div>
	</section>
 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
</body>
</html>