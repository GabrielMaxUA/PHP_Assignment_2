<?php
require('../model/product_db.php'); // Include the database connection

// Getting data from the form
$productCode = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);

if ($productCode && !empty($productCode)) {
    echo "Product Code: " . htmlspecialchars($productCode) . "<br>";  // Display for debugging
    // Prepare the DELETE statement
    $query = "DELETE FROM products WHERE productCode = :code";
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $productCode);
    
    try {
        // Execute the DELETE statement
        $statement->execute();
        $statement->closeCursor();
        echo "Product deleted successfully."; // Optional debug message
    } catch (Exception $e) {
        // Error handling
        echo "Error executing query: " . $e->getMessage();
        exit;
    }
} else {
    // Error handling if product code is not received
    echo "Error: No product code received.";
    exit;
}

$url = "index.php";
header("Location: " . $url); //header is the method to redirect
die();
?>
