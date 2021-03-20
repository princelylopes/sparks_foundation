
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Basic Banking System</title>

</head>
<body style="background-color: grey;">
<nav style="background-color: white;" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a style="color: black;" class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a style="color: black;" class="nav-link" href="home.php">Customers</a>
        </li>
        <li class="nav-item">
          <a style="color: black;" class="nav-link" href="transactions.php">Transactions</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div style="margin:5%">
<u>
<h1 style="color: rgba(30, 255, 0, 1);">Sparks Foundation</H1>
</u>
<u>
<h1 style="color: rgba(30, 255, 0, 1);">BANKING SYSTEM</H1>
</u>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$db_name="database_name";

$con = mysqli_connect($servername,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$query1 = "SELECT * FROM `customers`";
$query2 = "SHOW COLUMNS FROM table 1";
$result1 = mysqli_query($con, $query1);
$result2 = mysqli_query($con, $query2);
// Check result
// Useful for debugging.
 if (!$result1) {
    $message  = 'Invalid query: ' . mysqli_error($con) . "\n";
    $message .= 'Whole query: ' . $query1;
    die($message);
}
echo "<table>
        <thead>
          <tr>
              <th>Id.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Amount</th>
          </tr>
        </thead>";
        while($row = mysqli_fetch_array($result1))
        //Creates a loop to loop through results
        {
          echo"
        <tbody>
          <tr id=". $row['Email'].">
            <td>" . $row['id'] . "</td>
            <td>" . $row['Name'] . "</td>
            <td>" . $row['Email'] . "</td>
            <td>" . $row['Amount'] . "</td>
          </tr>
        </tbody>";
        }
     echo"</table>
     <div class="."row".">
    <form class="."col s12"." action="."payment.php"." method="."post".">
      <div class="."row".">
        <div class="."input-field col s6".">
          <input placeholder="."customer_id"." name="."id"." type="."number"." class="."validate".">
          <font size="."+1"." style="."color:black;".">Enter id of customer you want to select</font>
        </div>
        <input type="."submit"." value="."Submit".">
        </div>
    </form>
  </div>
     ";  
      ?>
      </div>
</body>
</html>

