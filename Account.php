<?php
include('components/header.php'); 
?>

<script type="text/javascript">
	function valid(){
		if(document.chngpwd.cpass.value=="") {
			alert("Current Password Filed is Empty !!");
			document.chngpwd.cpass.focus();
			return false;
		}
		else if(document.chngpwd.newpass.value=="") {
			alert("New Password Filed is Empty !!");
			document.chngpwd.newpass.focus();
			return false;
		}
		else if(document.chngpwd.cnfpass.value=="") {
			alert("Confirm Password Filed is Empty !!");
			document.chngpwd.cnfpass.focus();
			return false;
		}
		else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value) {
			alert("Password and Confirm Password Field do not match  !!");
			document.chngpwd.cnfpass.focus();
			return false;
		}
	return true;
	}
</script>

<?php
	$query=mysqli_query($con,"SELECT * from `customer` where `CustomerID`='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query))
	{
?>
		<div class="pt-4">
			<div class="row position-relative py-5 mx-5 mt-5">
				<!-- change personal information  -->
				<div class="change-info col-md-4 col-sm-4">
					<h4>Personal Info</h4>
					<form class="register-form" role="form" method="post">
						<div class="form-group">
							<label class="info-title" for="username">Username<span class="text-danger">*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['username'];?>" id="username" name="username" required="required">
						</div>
						
						<div class="form-group">
							<label class="info-title" for="name">First Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['FirstName'];?>" id="name" name="name" required="required">
						</div>

						<div class="form-group">
							<label class="info-title" for="lname">Last Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['LastName'];?>" id="lname" name="lname" required="required">
						</div>

						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Email Address<span class="text-danger">*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['Email'];?>" readonly>
						</div>
						
						<div class="form-group">
							<label class="info-title" for="Contact No.">Contact No.<span class="text-danger">*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['Phone'];?>"  maxlength="10">
						</div>
						<div class="form-group">
							<label class="info-title" for="Contact No.">Birth Date<span class="text-danger">*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" id="birthday" name="birthday" required="required" value="<?php echo $row['BirthDate'];?>"  maxlength="10">
						</div>
						<button type="submit" name="update" class="btn-upper btn color-second-bg form-control checkout-page-button">Update</button>
					</form>
				</div>
				<!-- change personal information  -->
		
				<!-- change password  -->
				<div class="change-password mx-5 col-md-4 col-sm-4">
					<h4>Change Password</h4>
					<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
						<div class="form-group">
							<label class="info-title" for="Current Password">Current Password<span class="text-danger">*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
						</div>
						<div class="form-group">
							<label class="info-title" for="New Password">New Password<span class="text-danger">*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
						</div>
						<div class="form-group">
							<label class="info-title" for="Confirm Password">Confirm Password<span class="text-danger">*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required" >
						</div>
						<button type="submit" name="submit" class="btn-upper btn color-second-bg form-control checkout-page-button">Change Password</button>
					</form> 
				</div>
				<!-- change password  -->
					
				<!-- loyalty points -->
				<span class="border" style="height: 8rem;">
					<div class="loyalty-points px-3 pt-3 pb-0">
						<h4 class="unicase-checkout-title">My Loyalty Point</h4>
						<h1 class="text-center color-second"><b><?php echo $row['LoyaltyPoint'];?></b></h1>
					</div>
				</span>
				<!-- loyalty points -->
			</div>
		</div>
<?php
	} // closing while loop
	include('components/footer.php');
?>