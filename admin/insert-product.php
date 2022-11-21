
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
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
	$productImage = $_POST['productImage'];

//for getting product id
// $query=mysqli_query($con,"select max(id) as pid from products");
// 	$result=mysqli_fetch_array($query);
// 	 $productid=$result['pid']+1;
// 	$dir="productimages/$productid";
// if(!is_dir($dir)){
// 		mkdir("productimages/".$productid);
// 	}

	// move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	// move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	// move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);

	//check if product exist
	$sql = mysqli_query($con, "SELECT * FROM `product` WHERE `ProductName`='$productName'");
	$num = mysqli_num_rows($sql);
	if($num == 1){

		//if product exists
		$sql1 = mysqli_query($con,"UPDATE `product` set `Category`='$category', `ProductName`='$productName', `Brand`='$productBrand', `ManufacturingDate`='$productManuDate', `Quantity`='$productQty', `TradePrice`='$tradePrice', `RetailPrice`='$retailPrice', `Details`='$productDescription', `Warranty`='$productWarranty' WHERE `ProductName`='$productName'");
		if(mysqli_affected_rows($con) == 1){
			$_SESSION['msg']="Product Exists And Has Updated Successfully !!";
		}else{
			die('Error: '. mysqli_error($con));
		}
	}else{

		//if new product
		$sql2 = mysqli_query($con,"INSERT INTO `product`(`Category`, `ProductName`, `Brand`, `ManufacturingDate`, `Quantity`, `TradePrice`, `RetailPrice`, `Details`, `Warranty`, `ImageURL`) VALUES('$category', '$productName', '$productBrand', '$productManuDate', '$productQty', '$tradePrice', '$retailPrice', '$productDescription', '$productWarranty', '$productImage')");
		if(mysqli_affected_rows($con) == 1){
			$_SESSION['msg']="Product Inserted Successfully !!";
		}else{
			die('Error: '. mysqli_error($con));
		}
	}
}
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
								<h3>Insert Product</h3>
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


<div class="control-group">
	<label class="control-label" for="basicinput">Barcode No.</label>
	<div class="controls">
		<input type="text"    name="productBarcode"  placeholder="Product Barcode No" class="span8 tip" disabled>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Category</label>
	<div class="controls">
		<select name="category" class="span8 tip" required>
			<option value="-">Select Category</option> 
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
		<input type="text" name="productName" placeholder="Enter Product Name" class="span8 tip" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Brand	</label>
	<div class="controls">
		<input type="text" name="productBrand"  placeholder="Enter Product Comapny Name" class="span8 tip" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Manufacturing Date</label>

	<div class="controls"> 
		<input type="date" name="productManuDate"  placeholder="dd/mm/yyyy" class="span8 tip" required>
      </div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Quantity</label>
	<div class="controls">
		<input type="range" name="productQty" class="fomr-range span8 tip" id="qtyInputId" value="10" min="1" max="20" oninput="qtyOutputId.value = qtyInputId.value" required>
    	<output name="qtyOutput" id="qtyOutputId">10</output>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Trade Price (Cost)</label>
	<div class="controls">
		<!-- <input type="range" name="tradePrice" class="form-range span8 tip" min="1" max="100" required> -->
		<input type="range" name="tradePrice" class="fomr-range span8 tip" id="tradeInputId" value="50" min="1" max="100" oninput="tradeOutputId.value = tradeInputId.value" required>
    	<output name="tradeOutput" id="tradeOutputId">50</output>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Retail Price (Selling Price)</label>
	<div class="controls">
		<!-- <input type="range" name="retailPrice" class="form-range span8 tip" min="1" max="100" required> -->
		<input type="range" name="retailPrice" class="fomr-range span8 tip" id="retailInputId" value="50" min="1" max="100" oninput="retailOutputId.value = retailInputId.value" required>
    	<output name="retailOutput" id="retailOutputId">50</output>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Description</label>
	<div class="controls">
		<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="span8 tip"></textarea>  
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Warranty Period</label>
	<div class="controls">
		<input type="number" name="productWarranty"  placeholder="Enter Product Warranty Duration (Enter 0 for no warranty)" class="span8 tip" min="0" max="10" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="basicinput">Product Image</label>
	<div class="controls">
		<!-- <input type="file" name="productImage" id="productimage1" value="" class="span8 tip" required> -->
		<input type="text" name="productImage"  placeholder="Enter Product Image URL" class="span8 tip" required>

	</div>
</div>


	<div class="control-group">
		<div class="controls">
			<button type="submit" name="submit" class="btn">Insert</button>
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

	<script src="scripts/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>

	<script>
		$(document).ready(function() {
			//paginate
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');

		} );


	</script>
</body>
