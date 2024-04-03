<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sales - ERP</title>
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
            <li class="current-page"><a href="add_sale.php"><img src="sales.png" alt="Sales icon"> Add Sale</a></li>
            <li><a href="todo.php"><img src="pending.png" alt="Pending icon"> Pending</a></li>
            <li><a href="account.html"><img src="account.png" alt="Account icon"> Account</a></li>
        </ul>
    </nav>
    <div class="info">
        <h2>Add Sale</h2>
        <form action="process_sale.php" method="post">
            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" name="itemName" required><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required><br>

            <label for="quantitySold">Quantity Sold:</label>
            <input type="text" id="quantitySold" name="quantitySold" required><br>

            <label for="stocksLeft">Stocks Left:</label>
            <input type="text" id="stocksLeft" name="stocksLeft" required><br>

            <label for="totalIncome">Total Income:</label>
            <input type="text" id="totalIncome" name="totalIncome" required><br>

            <button type="submit">Add Sale</button>
        </form>
    </div>
</body>
</html>
