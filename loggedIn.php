<?php

// receive the inputs from the user from the last page and places them into variables
$first = trim($_POST['first']); 

$last = trim($_POST['last']);

$userName = trim($_POST['username']); 

$password = trim($_POST['password']);

$email= trim($_POST['email']);

$phone = trim($_POST['phone']);

//utilizes htmlspecialchars to prevent sql injection and data sanitization.
$first = htmlspecialchars($first);

$last = htmlspecialchars($last);

$userName = htmlspecialchars($userName);

$password = htmlspecialchars($password);

$email = htmlspecialchars($email);

$phone = htmlspecialchars($phone);

// checks if the user has provided inputs to every textbox before submitting. 
if ($first == "" || $last == "" || $userName == ""|| $password == "" || $email == "" || $phone == ""){

    echo '<p>You have not entered all of the required details, please try again.</p>';
    exit;
 }

 //checks if the email the user provided has the proper format.
 else if (preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',
 $email) === 0){

    echo '<p>You have entered an invalid email, please try again.</p>';
    exit;
 }

 //checks if the passwords meets the minimum size requirement of 10.
 else if (!(strlen($password) >= 10)){

    echo '<p>The minimum password length requirement was not reached, please try again</p>';
    exit;
 }

// SQL database section

// connects to the database.
@$db = new mysqli ('localhost', 'root', '', 'delivery_service');

if ($db -> connect_errno) { // Displays an errors if the website cannot connect to the database.
    echo '<p>Error: Could not connect to database.<br/>
    Please try again later.</p>';
    exit;
 }

 /*
 inputs all of the information the user provided into their respective attributes in the database and 
 proceeds to execute the code, as well as close afterwards.
 */
 $query = "INSERT INTO customers VALUES (?, ?, ?, ?, ?, ?, ?)";

 $stmt = $db->prepare($query);

 $stmt->bind_param('issssss', $customerID, $first, $last, $userName, $password, $email, $phone);

 $stmt->execute();

$db->close();



// Displays the results of the of the account information provided for comfirmation.
 echo "<h1> you have signed in, welcome $userName!</p>";

echo "<h2> account information  </h2>";
echo "<p> Name: $first $last</p>";
echo "<p> Password: $password</p>";
echo "<p> Username: $userName</p>";
echo "<p> Email: $email</p>";
echo "<p> Phone Number: $phone</p>";

?>

<!DOCTYPE html>

<body>
   <!-- button created to proceed to the order page-->
<form action = "process.2.php" method = "post">
<input type = "submit" value ="proceed to the delivery page"/>
</form>
</body>
