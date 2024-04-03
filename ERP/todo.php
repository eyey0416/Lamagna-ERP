<?php
include 'conection.php';

// Check if the form is submitted to add a new task
if(isset($_POST['task'])) {
    $task = $_POST['task'];
    crud::addTask($task);
}

// Check if the mark as completed button is clicked
if(isset($_GET['action']) && $_GET['action'] == 'complete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    crud::markAsCompleted($id);
}

// Check if the form is submitted to update a task
if(isset($_POST['update_task'])) {
    $task_id = $_POST['task_id'];
    $updated_task = $_POST['updated_task'];
    crud::updateTask($task_id, $updated_task);
}

// Fetch all tasks
$tasks = crud::Selectdata();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list - ERP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
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
            <li><a href="add_customer.php"><img src="customer-icon.png" alt="Customer icon"> Add Customer</a></li>
            <li><a href="sales.php"><img src="sales.png" alt="Sales icon"> Sales</a></li>
            <li><a href="add_sale.php"><img src="sales.png" alt="Sales icon">Add Sales</a></li>
            <li class="current-page"><a href="todo.php"><img src="pending.png" alt="Pending icon"> Pending</a></li>
            <li><a href="account.html"><img src="account.png" alt="Account icon"> Account</a></li>
        </ul>
    </nav>

    <div class="inventory-container">
    <h2>To Do List</h2>
    <form method="POST" action="">
        <input type="text" name="task" placeholder="Enter Task">
        <button type="submit">Add Task</button>
    </form>
    <h3>Pending Tasks:</h3>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Update Task</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $task): ?>
                <?php if(!$task['completed']): ?>
                    <tr>
                        <td><?php echo $task['task']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <input type="text" name="updated_task" placeholder="Enter Updated Task">
                                <button type="submit" name="update_task">Update Task</button>
                            </form>
                        </td>
                        <td>
                            <a href="?action=complete&id=<?php echo $task['id']; ?>">Mark as Completed</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
