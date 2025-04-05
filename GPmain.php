<!DOCTYPE html>
<html lang="en">


<head>
  <title>Food Order</title>
  <style>

    
    table {
      width: 50%;
      margin: 30px auto;
    }

    th,
    td {
      padding: 20px;
      text-align: left;
      background-color: whitesmoke;
      border: 5px solid ;
    }

    th {
      background-color: green;
      color: black;
    }

    select {
      font-size:px;  
      width: 100%;
      border: 1px solid white;
    }

    input[type="submit"] {
      font-size: 20px;
      background-color: green;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: green;
    }
  </style>
</head>

<body>

  <h1 style="text-align:center;">Choose Your Meal</h1>
  
  <form action="GPext1.php" method="post">

<!-- Table  header  -->

    <table>
      
        <th>Food Item</th>
        <th>Food Option</th>
      
      
      <!-- Appetizer Selection Row and Data -->
      <tr>
        <td><label for="appetizeropt">Appetizer</label></td>
        <td>
          <select name="appetizeropt" id="appetizeropt">
            <option value="0">No Item</option>
            <option value="5.99">Wings (5pc) - $5.99</option>
            <option value="4.99">Spring Rolls (4pc) - $4.99</option>
            <option value="6.49">Mozzarella Sticks (5pc) - $6.49</option>
            <option value="3.99">Bread Sticks (4pc) - $3.99</option>
          </select>
        </td>
      </tr>

      <!-- Main Selection Row and Data -->
      <tr>
        <td><label for="mainopt">Main</label></td>
        <td>
          <select name="mainopt" id="mainopt">
            <option value="0">No Item</option>
            <option value="8.99">Burger - $8.99</option>
            <option value="10.99">Pizza - $10.99</option>
            <option value="7.49">Pasta - $7.49</option>
            <option value="4.99">Hot-dog - $4.99</option>
            <option value="3.99">Salad - $3.99</option>
          </select>
        </td>
      </tr>

      <!-- Side Selection Row and Data -->
      <tr>
        <td><label for="sideopt">Side</label></td>
        <td>
          <select name="sideopt" id="sideopt">
            <option value="0">No Item</option>
            <option value="2.99">Fries - $2.99</option>
            <option value="3.49">Onion Rings - $3.49</option>
            <option value="1.00">Chips - $1.00</option>
            <option value="2.49">Salad - $2.49</option>
          </select>
        </td>
      </tr>

      <!-- Drink Selection Row and Data -->
      <tr>
        <td><label for="drinkopt">Drink</label></td>
        <td>
          <select name="drinkopt" id="drinkopt">
            <option value="0">No Item</option>
            <option value="1.00">Water - $1.00</option>
            <option value="1.99">Soda - $1.99</option>
            <option value="2.49">Juice - $2.49</option>
            <option value="2.99">Coffee - $2.99</option>
          </select>
        </td>
      </tr>

      <!-- Submit Button -->
      <tr>
        <td colspan="2" style="text-align:center;">
          <input type="submit" value="Submit Order" />
        </td>
      </tr>
    </table>
  </form>

</body>

</html>
