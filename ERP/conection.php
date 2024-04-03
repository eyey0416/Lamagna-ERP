<?php

class crud {
    public static function connect() {
       try {
            $con = new PDO('mysql:host=localhost;dbname=crudsystems', 'root', '');
            return $con;
       } catch (PDOException $error1) {
            echo 'Something went wrong with your connection! '.$error1->getMessage();
            return null;
       } catch (Exception $error2) {
            echo 'Generic error! '.$error2->getMessage();
            return null;
       }
    }

    // Inventory CRUD operations

    public static function insertInventoryItem($itemName, $itemCategory, $specification) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('INSERT INTO inventory (itemName, itemCategory, specification) VALUES (:itemName, :itemCategory, :specification)');
            $stmt->bindParam(':itemName', $itemName);
            $stmt->bindParam(':itemCategory', $itemCategory);
            $stmt->bindParam(':specification', $specification);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public static function selectAllInventoryItems() {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('SELECT id, itemName, itemCategory, specification FROM inventory');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public static function deleteInventoryItem($id) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('DELETE FROM inventory WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

     public static function insertSale($itemName, $price, $quantitySold, $stocksLeft, $totalIncome) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('INSERT INTO sales (itemName, price, quantitySold, stocksLeft, totalIncome) VALUES (:itemName, :price, :quantitySold, :stocksLeft, :totalIncome)');
            $stmt->bindParam(':itemName', $itemName);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantitySold', $quantitySold);
            $stmt->bindParam(':stocksLeft', $stocksLeft);
            $stmt->bindParam(':totalIncome', $totalIncome);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public static function selectAllSales() {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('SELECT id, itemName, price, quantitySold, stocksLeft, totalIncome FROM sales');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    public static function deleteSale($id) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('DELETE FROM sales WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public static function selectSaleById($id) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('SELECT id, itemName, price, quantitySold, stocksLeft, totalIncome FROM sales WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
    public static function addSale($itemName, $price, $quantitySold, $stocksLeft, $totalIncome) {
    try {
        $conn = self::connect();
        $stmt = $conn->prepare('INSERT INTO sales (itemName, price, quantitySold, stocksLeft, totalIncome) VALUES (:itemName, :price, :quantitySold, :stocksLeft, :totalIncome)');
        $stmt->bindParam(':itemName', $itemName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantitySold', $quantitySold);
        $stmt->bindParam(':stocksLeft', $stocksLeft);
        $stmt->bindParam(':totalIncome', $totalIncome);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

    public static function updateSale($id, $itemName, $price, $quantitySold, $stocksLeft, $totalIncome) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('UPDATE sales SET itemName = :itemName, price = :price, quantitySold = :quantitySold, stocksLeft = :stocksLeft, totalIncome = :totalIncome WHERE id = :id');
            $stmt->bindParam(':itemName', $itemName);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantitySold', $quantitySold);
            $stmt->bindParam(':stocksLeft', $stocksLeft);
            $stmt->bindParam(':totalIncome', $totalIncome);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public static function selectAllCustomers() {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('SELECT id, customerName, mobileNumber, email, paymentTerms, purchaseDate FROM customer');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
    public static function insertCustomer($customerName, $mobileNumber, $email, $paymentTerms, $purchaseDate) {
        try {
            $conn = crud::connect();
            $stmt = $conn->prepare('INSERT INTO customer (customerName, mobileNumber, email, paymentTerms, purchaseDate) VALUES (:customerName, :mobileNumber, :email, :paymentTerms, :purchaseDate)');
            $stmt->bindParam(':customerName', $customerName);
            $stmt->bindParam(':mobileNumber', $mobileNumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':paymentTerms', $paymentTerms);
            $stmt->bindParam(':purchaseDate', $purchaseDate);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public static function deleteCustomer($id) {
        try {
            $conn = self::connect();
            $stmt = $conn->prepare('DELETE FROM customer WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public static function Selectdata() {
        try {
            $conn = self::connect();
            $stmt = $conn->prepare('SELECT id, task, completed FROM tasks');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
    public static function updateTask($id, $task) {
        try {
            $conn = self::connect();
            $stmt = $conn->prepare('UPDATE tasks SET task=:task WHERE id=:id');
            $stmt->bindValue(':task', $task);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public static function addTask($task) {
        try {
            $conn = self::connect();
            $stmt = $conn->prepare('INSERT INTO tasks (task, completed) VALUES (:task, 0)');
            $stmt->bindValue(':task', $task);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public static function markAsCompleted($id) {
        try {
            $conn = self::connect();
            $stmt = $conn->prepare('UPDATE tasks SET completed = 1 WHERE id = :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>