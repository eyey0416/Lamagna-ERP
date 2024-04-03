<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Page - ERP</title>
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
                <li class="current-page"><a href="inventory.php"><img src="inventory.png" alt="Inventory icon"> Inventory</a></li>
                <li><a href="add_inventory.php"><img src="inventory.png" alt="Inventory icon"> Add Items</a></li>
                <li><a href="customer.php"><img src="customer-icon.png" alt="Customer icon"> Customer</a></li>
                <li><a href="add_customer.php"><img src="customer-icon.png" alt="Customer icon"> Add Customer</a></li>
                <li><a href="sales.php"><img src="sales.png" alt="Sales icon"> Sales</a></li>
                <li><a href="add_sale.php"><img src="sales.png" alt="Sales icon">Add Sales</a></li>
                <li><a href="todo.php"><img src="pending.png" alt="Pending icon"> Pending</a></li>
                <li><a href="account.html"><img src="account.png" alt="Account icon"> Account</a></li>
            </ul>
        </nav>
    </header>
    <div class="inventory-container">

    <?php
    require_once('conection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $itemName = $_POST['itemName'];
        $itemCategory = $_POST['itemCategory'];
        $specification = $_POST['specification'];

        if (crud::insertInventoryItem($itemName, $itemCategory, $specification)) {
            echo "<p>Item added successfully!</p>";
        } else {
            echo "Error adding item.";
        }
    }

    // Handle item deletion
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if (crud::deleteInventoryItem($id)) {
            echo "<p>Item deleted successfully!</p>";
        } else {
            echo "Error deleting item.";
        }
    }

    // Display all items in the inventory table
    echo "<h2>Inventory Items:</h2>";
    echo "<table>";
    echo "<tr><th>Item Name</th><th>Category</th><th>Specification</th><th>Action</th></tr>";
    $inventoryItems = crud::selectAllInventoryItems();
    foreach ($inventoryItems as $item) {
        echo "<tr>";
        echo "<td>{$item['itemName']}</td>";
        echo "<td>{$item['itemCategory']}</td>";
        echo "<td>{$item['specification']}</td>";
        echo "<td><a href='inventory.php?action=delete&id={$item['id']}'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
