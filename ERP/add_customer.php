<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer - ERP</title>
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
            <li class="current-page"><a href="add_customer.php"><img src="customer-icon.png" alt="Customer icon"> Add Customer</a></li>
            <li><a href="sales.php"><img src="sales.png" alt="Sales icon"> Sales</a></li>
            <li><a href="add_sale.php"><img src="sales.png" alt="Sales icon">Add Sales</a></li>
            <li><a href="todo.php"><img src="pending.png" alt="Pending icon"> Pending</a></li>
            <li><a href="account.html"><img src="account.png" alt="Account icon"> Account</a></li>
        </ul>
    </nav>
    <div class="info">
        <h2>Add Customer</h2>
        <form action="process_customer.php" method="post">
            <label for="customerName">Customer Name:</label>
            <input type="text" id="customerName" name="customerName" required><br>

            <label for="mobileNumber">Mobile Number:</label>
            <input type="text" id="mobileNumber" name="mobileNumber"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>

            <label for="paymentTerms">Payment Terms:</label>
            <input type="text" id="paymentTerms" name="paymentTerms"><br>

            <label for="purchaseDate">Purchase Date:</label>
            <input type="date" id="purchaseDate" name="purchaseDate"><br>

            <button type="submit">Add Customer</button>
        </form>
    </div>
</body>
</html>
