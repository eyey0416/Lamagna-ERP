<?php
require_once('conection.php');

// Check if sale ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sale = crud::selectSaleById($id);
    if (!$sale) {
        echo "Sale not found.";
        exit;
    }
} else {
    echo "Sale ID not provided.";
    exit;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $itemName = $_POST['itemName'];
    $price = $_POST['price'];
    $quantitySold = $_POST['quantitySold'];
    $stocksLeft = $_POST['stocksLeft'];
    $totalIncome = $_POST['totalIncome'];

    // Update the sale
    if (crud::updateSale($id, $itemName, $price, $quantitySold, $stocksLeft, $totalIncome)) {
        echo "Sale updated successfully!";
    } else {
        echo "Error updating sale.";
    }

    // Redirect back to sales.php
    header("Location: sales.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Sales - ERP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>
<body>
    <h2 class="heading-with-image">
        <img src="erp.png" alt="ERP" class="heading-image"> Enterprise Resource Planning
    </h2>
    <nav>
        <ul>
            <li><a href="dashboard.php"><img src="dashboard.png" alt="Dashboard icon"> Dashboard</a></li>
            <li><a href="inventory.php"><img src="inventory.png" alt="Inventory icon"> Inventory</a></li>
            <li><a href="add_inventory.php"><img src="inventory.png" alt="Inventory icon"> Add Items</a></li>
            <li><a href="customer.php"><img src="customer-icon.png" alt="Customer icon"> Customer</a></li>
            <li><a href="sales.php"><img src="sales.png" alt="Sales icon"> Sales</a></li>
            <li><a href="todo.php"><img src="pending.png" alt="Pending icon"> Pending</a></li>
            <li><a href="account.php"><img src="account.png" alt="Account icon"> Account</a></li>
        </ul>
    </nav>
    <div class="inventory-container">
        <h2>Update Sale</h2>
        <form action="update_sale.php?id=<?php echo $id; ?>" method="post">
            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" name="itemName" value="<?php echo $sale['itemName']; ?>" required><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $sale['price']; ?>" required><br>

            <label for="quantitySold">Quantity Sold:</label>
            <input type="number" id="quantitySold" name="quantitySold" value="<?php echo $sale['quantitySold']; ?>" required><br>

            <label for="stocksLeft">Stocks Left:</label>
            <input type="number" id="stocksLeft" name="stocksLeft" value="<?php echo $sale['stocksLeft']; ?>" required><br>

            <label for="totalIncome">Total Income:</label>
            <input type="number" id="totalIncome" name="totalIncome" value="<?php echo $sale['totalIncome']; ?>" required><br>

            <button type="submit">Update Sale</button>
        </form>
    </div>
</body>
</html>
