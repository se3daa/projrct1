<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "products");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
                'item_id'			=>	$_GET["id"],
				'product_name'			=>	$_POST["hidden_name"],
				'price'		=>	$_POST["hidden_price"],
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
            'item_id'			=>	$_GET["id"],
			'product_name'			=>	$_POST["hidden_name"],
			'price'		=>	$_POST["hidden_price"],
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
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
   
    $query = "SELECT * FROM tbl_products ORDER BY id ASC";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
} }
function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output; 
}
}
if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;}
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
						}