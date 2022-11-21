<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
{ 
  header('location:index.php');
}
else{
  date_default_timezone_set('Asia/Kuala_Lumpur');// change according timezone
  $currentTime = date('Y-m-d H:i:s');

  $oid=intval($_GET['oid']);
  if(isset($_POST['submit2'])){
    $status=$_POST['status'];

    if($status == "Packed"){
      $query=mysqli_query($con,"UPDATE `shipment` SET `PackingDateTime`='$currentTime' WHERE `TransactionNo`='$oid'");
      $sql=mysqli_query($con,"UPDATE `invoice` set `OrderStatus`='$status' where `TransactionNo`='$oid'");
    }else if ($status == "Delivering"){
      $query=mysqli_query($con,"UPDATE `shipment` SET `ShippingDateTime`='$currentTime' WHERE `TransactionNo`='$oid'");
      $sql=mysqli_query($con,"UPDATE `invoice` set `OrderStatus`='$status' where `TransactionNo`='$oid'");
    }else if ($status == "Delivered"){
      $sql=mysqli_query($con,"UPDATE `invoice` set `OrderStatus`='$status' where `TransactionNo`='$oid'");
    }

    echo "<script>alert('Order updated sucessfully...');</script>";
    //}
  } 

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Compliant</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Order !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>Transaction No:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT 
`invoice`.`TransactionNo` as `TransactionNo`, 
`invoice`.`OrderStatus` as `OrderStatus`,
`invoice`.`OrderDateTime` as `OrderDateTime`,
`shipment`.`PackingDateTime` as `PackingDateTime`, 
`shipment`.`ShippingDateTime` as `ShippingDateTime`
FROM `invoice` INNER JOIN `shipment` 
ON `invoice`.`TransactionNo`=`shipment`.`TransactionNo` 
WHERE `invoice`.`TransactionNo`='$oid'");
     while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
    <tr height="25">
      <td class="fontkink1" ><b>Order Date Time:</b></td>
      <td  class="fontkink"><?php echo $row['OrderDateTime'];?></td>
    </tr>

    <tr height="25">
      <td class="fontkink1" ><b>Packing Date Time:</b></td>
      <td  class="fontkink"><?php echo $row['PackingDateTime'];?></td>
    </tr>

    <tr height="25">
      <td class="fontkink1" ><b>Delivery Date Time:</b></td>
      <td  class="fontkink"><?php echo $row['ShippingDateTime'];?></td>
    </tr>

    <tr height="25">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['OrderStatus'];?></td>
    </tr>

    <tr height="25">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"></td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } ?>
   <?php 
    $st='Delivered';
    $rt = mysqli_query($con,"SELECT * FROM `invoice` WHERE `TransactionNo`='$oid'");
      while($num=mysqli_fetch_array($rt))
      {
      $currrentSt=$num['OrderStatus'];
    }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Delivered </b></td>
   <?php }else  {
      ?>
   
    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink" required="required" >
          <option value="">Select Status</option>
                  <option value="Not Paid">Not Paid</option>
                  <option value="Paid">Paid</option>
                  <option value="Packed">Packed</option>
                  <option value="Delivering">Delivering</option>
                  <option value="Delivered">Delivered</option>
        </select>
        </span></td>
    </tr>

    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="Update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     