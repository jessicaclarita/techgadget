
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$barcodeNo=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$category = $_POST['category'];
	$productName = $_POST['productName'];
	$productBrand = $_POST['productBrand'];
	$productManuDate = $_POST['productManuDate'];
	$productQty = $_POST['productQty'];
	$tradePrice = $_POST['tradePrice'];
	$retailPrice = $_POST['retailPrice'];
	$productDescription = $_POST['productDescription'];
	$productWarranty = $_POST['productWarranty'];

	$productImage = null;
	$query = null;
	if(!empty($_POST['productImage'])){
		$productImage = $_POST['productImage'];
		$query = "UPDATE `product` set `Category`='$category', `ProductName`='$productName', `Brand`='$productBrand', `ManufacturingDate`='$productManuDate', `Quantity`='$productQty', `TradePrice`='$tradePrice', `RetailPrice`='$retailPrice', `Details`='$productDescription', `Warranty`='$productWarranty', `ImageURL`='$productImage' WHERE `BarcodeNo`='$barcodeNo'";
	}else{
		$query = "UPDATE `product` set `Category`='$category', `ProductName`='$productName', `Brand`='$productBrand', `ManufacturingDate`='$productManuDate', `Quantity`='$productQty', `TradePrice`='$tradePrice', `RetailPrice`='$retailPrice', `Details`='$productDescription', `Warranty`='$productWarranty' WHERE `BarcodeNo`='$barcodeNo'";
	}


	
$sql=mysqli_query($con, $query);
$_SESSION['msg']="Product Updated Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Product</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($con,"SELECT * FROM `product` WHERE `BarcodeNo`='$barcodeNo'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Barcode No.</label>
	<div class="controls">
		<input type="text" name="productName" placeholder="Enter Product Name" value="<?php echo htmlentities($row['BarcodeNo']);?>" class="span8 tip" disabled>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Category</label>
	<div class="controls">
		<select name="category" class="span8 tip" required>
			<option value="<?php echo htmlentities($row['Category']);?>"><?php echo htmlentities($row['Category']);?></option>
			<option value="Laptop">Laptop</option>
			<option value="Monitor">Monitor</option>
			<option value="Processor">Processor</option>
			<option value="RAM">RAM</option>
			<option value="GPU">GPU</option>
			<option value="External Hard Disk">External Hard Disk</option>
			<option value="Accessories">Accessories</option>
		</select>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Name</label>
	<div class="controls">
		<input type="text" name="productName" placeholder="Enter Product Name" value="<?php echo htmlentities($row['ProductName']);?>" class="span8 tip" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Brand	</label>
	<div class="controls">
		<input type="text" name="productBrand"  placeholder="Enter Product Comapny Name" value="<?php echo htmlentities($row['Brand']);?>" class="span8 tip" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Manufacturing Date</label>

	<div class="controls"> 
		<input type="date" name="productManuDate"  placeholder="dd/mm/yyyy" class="span8 tip" value="<?php echo htmlentities($row['ManufacturingDate']);?>"required>
      </div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Quantity</label>
	<div class="controls">
		<input type="range" name="productQty" class="fomr-range span8 tip" id="qtyInputId" value="<?php echo htmlentities($row['Quantity']);?>" min="1" max="20" oninput="qtyOutputId.value = qtyInputId.value" required>
    	<output name="qtyOutput" id="qtyOutputId"><?php echo htmlentities($row['Quantity']);?></output>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Trade Price (Cost)</label>
	<div class="controls">
		<!-- <input type="range" name="tradePrice" class="form-range span8 tip" min="1" max="100" required> -->
		<input type="range" name="tradePrice" class="fomr-range span8 tip" id="tradeInputId" value="<?php echo htmlentities($row['TradePrice']);?>" min="1" max="100" oninput="tradeOutputId.value = tradeInputId.value" required>
    	<output name="tradeOutput" id="tradeOutputId"><?php echo htmlentities($row['TradePrice']);?></output>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Retail Price (Selling Price)</label>
	<div class="controls">
		<!-- <input type="range" name="retailPrice" class="form-range span8 tip" min="1" max="100" required> -->
		<input type="range" name="retailPrice" class="fomr-range span8 tip" id="retailInputId" value="<?php echo htmlentities($row['RetailPrice']);?>" min="1" max="100" oninput="retailOutputId.value = retailInputId.value" required>
    	<output name="retailOutput" id="retailOutputId"><?php echo htmlentities($row['RetailPrice']);?></output>
	</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Description</label>
<div class="controls">
<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="span8 tip">
<?php echo htmlentities($row['Details']);?>
</textarea>  
</div>
</div>


<div class="control-group">
	<label class="control-label" for="basicinput">Warranty Period</label>
	<div class="controls">
		<input type="number" name="productWarranty"  placeholder="Enter Product Warranty Duration (Enter 0 for no warranty)" class="span8 tip" value="<?php echo htmlentities($row['Warranty']);?>" min="0" max="10" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Image</label>
	<div class="controls">
		<img src="<?php echo htmlentities($row['ImageURL']);?>" width="200" height="100"> <a id="changeImage">Change Image</a>
		<input type="text" name="productImage"  style="display: none" id="txtChangeImage" placeholder="Enter Product Image URL" class="span8 tip">
	</div>
</div>


<?php } ?>
	<div class="control-group">
		<div class="controls">
			<button type="submit" name="submit" class="btn">Update</button>
		</div>
	</div>
</form>
</div>
</div>

					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');

			$('#changeImage').click(function(){
				$('#txtChangeImage').toggle();
			})

		} );
	</script>
</body>
<?php } ?>