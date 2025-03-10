<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM Product_Table");
?>
 
<html>
<head>    
    <title>Product List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
 
<body>
<div class="a">
    <a href="add.php" class="btn add-btn">Add New</a>
</div>
 
    <table width='80%' border=1>
 
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['product_id']; ?></td>
                <td><?= $row['product_name']; ?></td>
                <td><?= $row['category']; ?></td>
                <td><?= $row['quantity']; ?></td>
                <td><?= number_format($row['price'], 2); ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['product_id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['product_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
    <?php } ?>
    </table>
    
</body>
</html>
