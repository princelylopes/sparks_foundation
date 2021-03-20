<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Hello, world!</title>
  </head>
  <body style="background-color: grey !important">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transactions.php">Transactions</a>
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
$db_name="database_name";;

$con = mysqli_connect($servername,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$query1 = "SELECT * FROM `transactions`";
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
echo "<table class="."table".">
        <thead>
          <tr>
              <th scope="."col".">sender</th>
              <th scope="."col".">receiver</th>
              <th scope="."col".">Amount</th>
              <th scope="."col".">date_time</th>
          </tr>
        </thead>";
        while($row = mysqli_fetch_array($result1))
        //Creates a loop to loop through results
        { $query3 = "SELECT * FROM `customers` WHERE id=".$row['Sender'];
          $query4 = "SELECT * FROM `customers` WHERE id=".$row['Receiver'];
          $result3 = mysqli_query($con, $query3);
          $result4 = mysqli_query($con, $query4);
          $row3 = mysqli_fetch_array($result3);
          $row4 = mysqli_fetch_array($result4);
          echo"
        <tbody>
          <tr id=". $row['Sender'].">
            <td>" . $row3['Name'] . "</td>
            <td>" . $row4['Name'] . "</td>
            <td>" . $row['Amount'] . "</td>
            <td>" . $row['Date'] . "</td>
          </tr>
        </tbody>";
        }
      ?>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
