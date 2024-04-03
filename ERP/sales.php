<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales - ERP</title>
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
            <li class="current-page"><a href="sales.php"><img src="sales.png" alt="Sales icon"> Sales</a></li>
            <li><a href="add_sale.php"><img src="sales.png" alt="Sales icon"> Add Sale</a></li>
            <li><a href="todo.php"><img src="pending.png" alt="Pending icon"> Pending</a></li>
            <li><a href="account.html"><img src="account.png" alt="Account icon"> Account</a></li>
        </ul>
    </nav>
    <div class="inventory-container">
        <?php
        require_once('conection.php');

        echo "<h2>Sales List:</h2>";
        echo "<table>";
        echo "<tr><th>Item Name</th><th>Price (PHP)</th><th>Quantity Sold (pc(s))</th><th>Stocks Left (pc(s))</th><th>Total Income (PHP)</th></tr>";
        
        // Retrieve sales data from the database
        $salesList = crud::selectAllSales();
        
        // Display sales data in the table
        foreach ($salesList as $sale) {
            echo "<tr>";
            echo "<td>{$sale['itemName']}</td>";
            echo "<td>PHP {$sale['price']}</td>"; // Add peso sign to price
            echo "<td>{$sale['quantitySold']} pc(s)</td>"; // Add word "pc(s)" to quantity sold
            echo "<td>{$sale['stocksLeft']} pc(s)</td>"; // Add word "pc(s)" to stocks left
            echo "<td>PHP {$sale['totalIncome']}</td>"; // Add peso sign to total income
            echo "</tr>";
        }
        
        echo "</table>";
        ?>
    </div>
</body>
</html>