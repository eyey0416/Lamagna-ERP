<?php
// Include the connection file
require_once('conection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $customerName = $_POST['customerName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $paymentTerms = $_POST['paymentTerms'];
    $purchaseDate = $_POST['purchaseDate'];

    // Call the function to insert customer data into the database
    if (crud::insertCustomer($customerName, $mobileNumber, $email, $paymentTerms, $purchaseDate)) {
        // Redirect back to customer.php with a success message
        header("Location: customer.php?message=Customer added successfully");
        exit();
    } else {
        // Redirect back to add_customer.php with an error message
        header("Location: add_customer.php?error=Failed to add customer");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to add_customer.php
    header("Location: add_customer.php");
    exit();
}
?>
