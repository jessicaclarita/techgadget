<?php
include 'database/checkWarranty.php';
$searchProduct = '';
$product_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from warranty where ProductName like '%$search%'  ");
        $stmt->execute();
        $product_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($product_details);
         
    }
    else
    {
        $searchProduct = "Please enter the product name";
    }
    
}
 
?>


<html>
 
<body>
    <div class="container">
    <h4 class="font-nunito" style="margin-top: 10px">Warranty Result</h4>
    <br/><br/>
    <form class="form" action="#" method="post">
    <div class="row">
        <div class="form">
            <label class="box" style="margin-left: 20px"><b>Search Product Warranty</b>:</label>
            <div class="form-group" style="margin-top: -32px; margin-left: 230px">
              <span class="error" style="color:red;">* <?php echo $searchProduct;?></span>
            </div>
            <div class="column" style="margin-left: 20px">
              <input type="text" class="form-control" name="search" placeholder="Search Product Name" style="width: 300px">
            </div>
            <div class="submitBtn" style="margin-top: -35px; margin-left: 350px">
              <button type="submit" name="save" class="btn color-second-bg btn-sm">Submit</button>
            </div>
        </div>         
    </div>


    </form>
    <br/><br/>
    <h4 class="font-nunito">Search Result</h4><br/>
    <div class="table-responsive">          
      <table class="table" style='margin-top: 10px; margin-bottom: 200px'>
        <thead>
          <tr>
            <th>NO</th>
            <th>Product Name</th>
            <th>Purchase Date</th>
            <th>Warraty Duration</th>
            <th>Expiry Date</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$product_details)
                 {
                    echo '<tr>Recheck Product Name </tr>';
                 }
                 else{
                    foreach($product_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['ProductName'];?></td>
                        <td><?php echo $value['Category'];?></td>
                        <td><?php echo $value['Brand'];?></td>
                        <td><?php echo $value['Warranty'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>
</div>
</body>
</html>