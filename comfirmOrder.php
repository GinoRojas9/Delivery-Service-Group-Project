<?php

// connects to the database and creates a join table using the deliveries and orders tables

@$db =new mysqli('localhost','root', '', 'delivery_service') ;

$query = "SELECT  deliveries.clientzipcode, deliveries.restaurantzipcode, orders.total
FROM deliveries
LEFT JOIN orders ON deliveries.deliveryID = orders.orderID";

$conn = mysqli_query($db, $query);

$results = mysqli_fetch_assoc($conn);

// displays all the order and delivery attributes selected
echo  "<h1 align = center> Is your information and order correct?</h1>";
echo "<h2 align = center>User's zipcode:". $results['clientzipcode'] . "<h2/>";
echo "<h2 align = center>restaurant's zip code:". $results['restaurantzipcode']. "<h2/>";
echo "<h2 align = center>Order price: $". $results['total'] . "<h2/>";

?>

<!DOCTYPE html>

<head>

    <style>

input[type="submit"] {
      font-size: 16px;
      padding: 8px 16px;
      background-color: GREEN;       /* changes the look of the submit button */
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    </style>
</head>

<body> 
    <!-- leads back to the delivery page -->
<form action = "process.2.php" method = "post">
<p align="center"> <input type = "submit" value ="No (return to delivery page)"/> </p>
</form>

<!-- goes to the next page -->
<form action = "comfirmation.html" method = "post">
<p align="center"> <input type = "submit" value ="Yes"/> </p>
</form>
</body>
</html>