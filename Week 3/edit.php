<?php
include_once("config.php");

if (isset($_POST['update'])) {	
    $id = $_POST['id'];
    
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
        
    $query = "UPDATE Product_Table SET 
              product_name='$product_name', 
              category='$category', 
              quantity='$quantity', 
              price='$price' 
              WHERE Product_ID=$id";
    
    if (mysqli_query($mysqli, $query)) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}

if (!isset($_GET['id'])) {
    die("Error: Product ID is missing.");
}

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM Product_Table WHERE Product_ID=$id");

if (!$result || mysqli_num_rows($result) == 0) {
    die("Error: Product not found.");
}

$product_data = mysqli_fetch_assoc($result);

$product_name = $product_data['product_name'];
$category = $product_data['category'];
$quantity = $product_data['quantity'];
$price = $product_data['price'];
?>

<html>
<head>    
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_product" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Product Name</td>
                <td><input type="text" name="product_name" required value="<?php echo htmlspecialchars($product_name); ?>"></td>
            </tr>
            <tr> 
                <td>Category</td>
                <td><input type="text" name="category" required value="<?php echo htmlspecialchars($category); ?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="number" name="quantity" required value="<?php echo htmlspecialchars($quantity); ?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="price" required value="<?php echo htmlspecialchars($price); ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>

