<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $appetizer = $_POST['appetizeropt'];
    $main = $_POST['mainopt'];
    $side = $_POST['sideopt'];
    $drink = $_POST['drinkopt'];

    // Calculate total    
    $total = $appetizer + $main + $side + $drink;

    // Display order confirmation within a centered container
    echo "<div style='max-width: 600px; margin: 50px auto; text-align: center; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;'>";
    echo "<h1>Order Confirmation</h1>";
    echo "<p>Appetizer: $" . number_format($appetizer, 2) . "</p>";
    echo "<p>Main: $" . number_format($main, 2) . "</p>";
    echo "<p>Side: $" . number_format($side, 2) . "</p>";
    echo "<p>Drink: $" . number_format($drink, 2) . "</p>";
    echo "<h2>Total: $" . number_format($total, 2) . "</h2>";
    echo "</div>";


    
}
// connects to the database and adds the information to the orders table
@$db = new mysqli ('localhost', 'root', '', 'delivery_service');

$query = "INSERT INTO orders VALUES (?, ?, ?, ?, ?, ?)";

 $stmt = $db->prepare($query);

 $stmt->bind_param('isssss', $orderID, $appetizer, $main, $side, $drink, $total);

 $stmt->execute();

 $db->close();
?>

<!--button that leads to the next page -->
<button onclick="window.location.href='comfirmOrder.php';" style="font-size: 16px; padding: 8px 16px; background-color: BLUE; color: white; border: none; border-radius: 5px; cursor: pointer; ">
    check results
</button>

