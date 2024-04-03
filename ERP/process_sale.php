<?php
require_once('conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $itemName = $_POST['itemName'];
    $price = $_POST['price'];
    $quantitySold = $_POST['quantitySold'];
    $stocksLeft = $_POST['stocksLeft'];
    $totalIncome = $_POST['totalIncome'];

    // Insert sale into the database
    if (crud::addSale($itemName, $price, $quantitySold, $stocksLeft, $totalIncome)) {
        echo "<p>Sale added successfully!</p>";
    } else {
        echo "Error adding sale.";
    }
} else {
    echo "Invalid request method.";
}
header("Location: sales.php");
exit; // Make sure to exit after redirecting
?>
