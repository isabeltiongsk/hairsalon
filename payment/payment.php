<?php

session_start();
date_default_timezone_set('UTC');
$connect = mysqli_connect("localhost","root","","hairsalondb");


if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
				'item_id'		=>	$_GET["id"],
				'item_name'		=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
        array_push($_SESSION['shopping_cart'], $item_array);
    }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="payment.php"</script>';
        }
    }
    else
    {
        $item_array = array(
				'item_id'		=>	$_GET["id"],
				'item_name'		=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
        
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="payment.php"</script>';
            }
        }
    }
    if ($_GET["action"] == "confirm"){
       foreach($_SESSION["shopping_cart"] as $keys => $values){
        $item_name = $values["item_name"];
        $item_price = $values["item_price"];
        $item_quantity = $values["item_quantity"];
        $sql = mysqli_query($connect,"INSERT INTO record (name,price,quantity) VALUES ('$item_name', '$item_price', '$item_quantity')");
    echo '<script>alert("payment succeed");</script>';
    unset($_SESSION['shopping_cart'][$keys]);
    echo "<script>location.replace(location.href);</script>";
        }
    }
   }



?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div id="page-wrapper" class="container-fluid">
<div class="row">
    
<div class="col-xs-4">
         <div class="card mt-5">
    <div class="card-header">
      <h2>Product</h2>
    </div>
    <div class="card-body">

            
<table class="table table-bordered">    
        <tr>
          <th width="40%" >Name</th>
          <th width="20%">Price</th>
          <th width="10%">Quantity</th>
          <th width="5%">Action</th>
        </tr>
        <?php
				$query = "SELECT * FROM product WHERE type = 'product' ORDER BY id ASC ";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
        	<form method="post" action="payment.php?action=add&id=<?php echo $row["id"]; ?>">
        
<tr>
        <td><h5 class="text"><?php echo $row["name"]; ?></h5></td>

        <td><h5 class="text" >$ <?php echo $row["price"]; ?></h5></td>

        <td><input type="text" name="quantity" value="1" class="form-control" /></td>
        <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add" /></td>

        <td><input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" /></td>

        <td><input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /></td>

</form>
</tr>

	<?php
		}
	}
?>
	

</table>
        
		</div>
</div>
</div>
    <div class="col-xs-4">
         <div class="card mt-5">
    <div class="card-header">
      <h2>Service</h2>
    </div>
    <div class="card-body">

            
<table class="table table-bordered">    
        <tr>
          <th width="40%" >Name</th>
          <th width="20%">Price</th>
          <th width="5%">Quantity</th>
          <th width="5%">Action</th>
        </tr>
        <?php
				$query = "SELECT * FROM product WHERE type = 'service' ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
        	<form method="post" action="payment.php?action=add&id=<?php echo $row["id"]; ?>">
        
<tr>
        <td><h5 class="text"><?php echo $row["name"]; ?></h5></td>

        <td><h5 class="text" >$ <?php echo $row["price"]; ?></h5></td>

        <td><input type="text" name="quantity" value="1" class="form-control" /></td>
        <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add" /></td>

        <td><input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" /></td>

        <td><input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /></td>

</form>
</tr>

	<?php
		}
	}
?>
	

</table>
        
		</div>
</div>
</div>
                        <div class="col-xs-4">
         <div class="card mt-5">
    <div class="card-header">
      <h2>Order</h2>
    </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="10%">Date</th>
                                    <th width="20%">Item Name</th>
                                    <th width="10%">Quantity</th>
                                    <th width="20%">Price</th>
                                    <th width="15%">Total</th>
                                    <th width="5%">Action</th>
                                </tr>
                                <?php if(!empty($_SESSION["shopping_cart"]))
                                {
                                    $total = 0;
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                  ?>
                                <tr>
                                    <td><?php echo date("Y/m/d");?></td>
                                    <td><?php echo $values["item_name"]; ?></td>
                                    <td><?php echo $values["item_quantity"]; ?></td>
                                    <td>$ <?php echo $values["item_price"]; ?></td>
                                    <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                    <td><a href="payment.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                                </tr>
                                <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    }
                                    ?>
                                <tr>
						<td colspan="4" align="right">Total</td>
						<td align="left">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
                                        
                                <?php
                                }
                                ?>
                                
                               
                            </table>
                                                    </div>

                            
                            <input  type="button" onclick="location.href='payment.php?action=confirm'" name="confirm" style="margin-top:5px;" class="btn btn-success pull-right" value="Confirm"  />
                        </div>
                        </div>
	</div>
</div>
	<br />
</html>
<?php                include 'footer.php'; ?>