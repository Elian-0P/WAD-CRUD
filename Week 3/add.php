<html>
<head>
	<title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Product Name:</td>
				<td><input type="text" name="product_name" required></td>
			</tr>
			<tr> 
				<td>Category:</td>
				<td><input type="text" name="category" required></td>
			</tr>
			<tr> 
				<td>Quantity:</td>
				<td><input type="number" name="quantity" required></td>
			</tr>
            <tr>
                <td>Price:</td>
                <td><input type="number" step="0.01" name="price" required></td>
            </tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['product_name'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
		
		include_once("config.php");
				
		$sql = "INSERT INTO Product_Table (product_name, category, quantity, price) 
            VALUES ('$name', '$category', $quantity, $price)";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
	}
	?>
</body>
</html>

