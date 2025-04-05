<?php
//initialize variables
$clientzipcode='';
$clientzipcodeErr = '';
$restaurantzipcode='';
$restaurantzipcodeErr = '';
$result='';

$zipDifference = 1000;

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['clientzipcode'])){
    $clientzipcodeErr="Client zipcode is required";
}
else
$clientzipcode = trim($_POST['clientzipcode']);
if(!preg_match('/^\d{5}$/',$clientzipcode)){
    $clientzipcodeErr =" Invaild Zipcode" ;
}
} 
if (empty($_POST['restaurantzipcode'])) {
    $restaurantzipcodeErr = "Restaurant ZIP code is required";
} else 
    $restaurantzipcode = trim($_POST['restaurantzipcode']);
    if(!preg_match('/^\d{5}$/' , $restaurantzipcode)){
        $restaurantzipcodeErr="Invaild restaurant zipcode";  
    }


     // If both ZIP codes are valid, compare them
     if (empty($clientzipcodeErr) && empty($restaurantzipcodeErr)) {
        $zipDifference = abs($clientzipcode - $restaurantzipcode);
        
        if ($zipDifference <= 20 && $zipDifference >= -20) {
            $result = "We can deliver to your location!";
        } else {
            $result = "Sorry, you're too far for delivery. Try another restaurant zipcode that's closer.";
        }
    }
if ($zipDifference <= 20 && $zipDifference >= -20) {
$clientzipcode = trim($_POST['clientzipcode']); 

$restaurantzipcode = trim($_POST['restaurantzipcode']);


// SQL Database section
@$db =new mysqli('localhost','root', '', 'delivery_service') ;
if (mysqli_connect_errno()) {
   echo '<p>error: Could not connect to database. <br/>
   Please try again later. </p>';
   exit;
} 
$query= "INSERT INTO deliveries VALUES (?, ?, ?) ";
$stmt=$db->prepare($query);
$stmt->bind_param("iii", $deliveryID, $clientzipcode, $restaurantzipcode);
$stmt->execute();
$db->close();

}
?>
<html>
<head>
    <title>Delivery Checker</title>
    <style>
        .error { color: red; }
        .result { margin-top: 20px; padding: 10px; background: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Delivery Availability Check</h2>
    
    <p> Disclamer: we are not able to deliver if your location's zipcode and the restaurant of your choice's zipcode if the zipcode's difference is 20 apart </p>
    <form method="post" >
        <div>
            <label>Your ZIP Code:</label>
            <input type="text" name="clientzipcode" value="<?php echo htmlspecialchars($clientzipcode); ?>">
            <span class="error"><?php echo $clientzipcodeErr; ?></span>
        </div>
        
        <div>
            <label>Restaurant ZIP Code:</label>
            <input type="text" name="restaurantzipcode" value="<?php echo htmlspecialchars($restaurantzipcode); ?>">
            <span class="error"><?php echo $restaurantzipcodeErr; ?></span>
        </div>
        
        <button type="submit">Check Delivery</button>

    </form>

    <button onclick="window.location.href='GPmain.php';" style="font-size: 16px; padding: 8px 16px; background-color: BLUE; color: white; border: none; border-radius: 5px; cursor: pointer; ">
    proceed to the order page
</button>

    
    <?php if (!empty($result)): ?>
        <div class="result">
            <?php echo htmlspecialchars($result); ?>
        </div>
    <?php endif; ?>
</body>
</html>