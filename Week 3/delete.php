<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM Product_Table WHERE product_id=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    } 
{
    header("Location: index.php");
    exit();
}?>