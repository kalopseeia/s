<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connect to your database (replace with your database details)
    $servername = "localhost"; // The hostname of your MySQL server
    $username = "root";        // MySQL username (default in XAMPP is "root")
    $password = "";            // MySQL password (default in XAMPP is blank)
    $dbname = "tools_Equipment"; // Replace with the name of your database

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    
        // Collect data from the AJAX request
        $equipmentName = $_POST["equipmentName"];
        $equipmentType = $_POST["equipmentType"];
        $propertyNumber = $_POST["propertyNumber"];
        $quantity = $_POST["quantity"];
        $location = $_POST["location"];
        $dateOfPurchase = $_POST["dateOfPurchase"];
        $cost = $_POST["cost"];
        $status = $_POST["status"];
        
 
        $sql = "INSERT INTO $equipmentType (name, type, property_number, quantity, location_inside_building, date, cost, status) VALUES (:equipmentName, :equipmentType, :propertyNumber, :quantity, :location, :dateOfPurchase, :cost, :status)";

        $stmt = $conn->prepare($sql);
        

        // Bind parameters
        $stmt->bindParam(':equipmentName', $equipmentName);
        $stmt->bindParam(':equipmentType', $equipmentType);
        $stmt->bindParam(':propertyNumber', $propertyNumber);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':dateOfPurchase', $dateOfPurchase);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':status', $status);


        $stmt->execute();

        // Optionally, you can send a response back to the client
        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Connection failed!";

}
