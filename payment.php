<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>payments</title>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<div style="margin:5%">
<u>
<h1 style="color: rgba(30, 255, 0, 1);">MAKE PAYMENTS</h1>
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
    $query1 = "SELECT * FROM customers WHERE id=".$_POST['id'];
    $result1 = mysqli_query($con, $query1);
    if (!$result1) {
        $message  = 'Invalid query: ' . mysqli_error($con) . "\n";
        $message .= 'Whole query: ' . $query1;
        die($message);
    }
    $row = mysqli_fetch_array($result1);
    if($row==null){
        echo"invalid input: ".$_POST['id'];
    }
    else{
        
      $query2 = "SELECT * FROM `customers`";
      $result2 = mysqli_query($con, $query2);
        echo "
        <h4>Name:".$row['Name']."</h4>
        <h4>Email:".$row['Email']."</h4>
        <h4>Amount:".$row['Amount']."</h4>
        <br>
        <form action="."payment.php"." method="."post".">
        <input style="."display:none"." placeholder="."enter-id"." name="."id"." type="."number"." value=".$row['id'].">";
        ?>
        <input placeholder="enter-payment-amount" name="Amount" type="number" min="1">
        <?php
        echo"
        <p></p>
        <div class="."input-field col s12".">
        <label>choose receiver</label>
        <select name="."receiver".">";
        while($row2 = mysqli_fetch_array($result2))
        { echo"
          <option value=".$row2['id'].">".$row2['Name']."</option>
          ";
        }
        echo"
        </select>
        <p></p>
        <input type="."submit"." value="."Make_Payment".">
        </form>
      </div>
      <h2>Transaction Table</h2>
      <br>
        ";   
      $query3 = "SELECT * FROM `transactions` WHERE Sender=".$_POST['id']."";
      $result3 = mysqli_query($con, $query3);
      $arr = mysqli_fetch_array($result3);
      $flag = 1;
  if($arr!=null){
    echo"<h3>Sent Table</h3>";
        if($flag==1){
          echo"
          <table class="."table".">
           <thead>
             <tr>
             <th scope="."col".">Sender</th>  <th scope="."col".">Receiver</th>  <th scope="."col".">Amount</th>  <th scope="."col".">Date</th>
             </tr>
           </thead>";
          $query4 = "SELECT * FROM `customers` WHERE id=".$arr['Sender']."";
          $result4 = mysqli_query($con, $query4);
          $row4= mysqli_fetch_array($result4);
          $query5 = "SELECT * FROM `customers` WHERE id=".$arr['Receiver']."";
          $result5 = mysqli_query($con, $query5);
          $row5= mysqli_fetch_array($result5);
          echo"
          <tbody>
          <tr>
          <td>".$row4['Name']."</td>   <td>".$row5['Name']."</td>  <td>".$arr['Amount']."</td>   <td>".$arr['Date']."</td>
          </tr>
          ";
          $flag=0;
        }
        while($row3 = mysqli_fetch_array($result3))
        { $query4 = "SELECT * FROM `customers` WHERE id=".$row3['Sender']."";
          $result4 = mysqli_query($con, $query4);
          $row4= mysqli_fetch_array($result4);
          $query5 = "SELECT * FROM `customers` WHERE id=".$row3['Receiver']."";
          $result5 = mysqli_query($con, $query5);
          $row5= mysqli_fetch_array($result5);
          echo"
          <tr>
          <td>".$row4['Name']."</td>   <td>".$row5['Name']."</td>  <td>".$row3['Amount']."</td>   <td>".$row3['Date']."</td>
          </tr>
          ";
        }
        echo"
        </tbody>
        </table>
        "; 
      }   
      $query6 = "SELECT * FROM `transactions` WHERE Receiver=".$_POST['id']."";
      $result6 = mysqli_query($con, $query6);
      $arr = mysqli_fetch_array($result6);
      $flag = 1;
  if($arr!=null){
    echo"<h3>Receiving Table</h3>";
        if($flag==1){
          echo"
          <table class="."table".">
           <thead>
             <tr>
             <th scope="."col".">Sender</th>  <th scope="."col".">Receiver</th>  <th scope="."col".">Amount</th>  <th scope="."col".">Date</th>
             </tr>
           </thead>
          ";
          $query7 = "SELECT * FROM `customers` WHERE id=".$arr['Sender']."";
          $result7 = mysqli_query($con, $query7);
          $row7= mysqli_fetch_array($result7);
          $query8 = "SELECT * FROM `customers` WHERE id=".$arr['Receiver']."";
          $result8 = mysqli_query($con, $query8);
          $row8= mysqli_fetch_array($result8);
          echo"
          <tbody>
          <tr>
          <td>".$row7['Name']."</td>   <td>".$row8['Name']."</td>   <td>".$arr['Amount']."</td>   <td>".$arr['Date']."</td>
          </tr>
          ";
          $flag=0;
        }
        while($row6 = mysqli_fetch_array($result6))
        { $query7 = "SELECT * FROM `customers` WHERE id=".$row6['Sender']."";
          $result7 = mysqli_query($con, $query7);
          $row7= mysqli_fetch_array($result7);
          $query8 = "SELECT * FROM `customers` WHERE id=".$row6['Receiver']."";
          $result8 = mysqli_query($con, $query8);
          $row8= mysqli_fetch_array($result8);
          echo"
          <tr>
          <td>".$row7['Name']."</td>   <td>".$row8['Name']."</td>   <td>".$row6['Amount']."</td>   <td>".$row6['Date']."</td>
          </tr>
          ";
        }
        echo"
        </tbody>
        </table>
        "; 
      }   
    }
    ?>
    </div> 
    <?php
    if(isset($_POST['Amount'])){
    $query1 = "SELECT * FROM customers WHERE id=".$_POST['id'];
    $result1 = mysqli_query($con, $query1);
    if (!$result1) {
        $message  = 'Invalid query: ' . mysqli_error($con) . "\n";
        $message .= 'Whole query: ' . $query1;
        die($message);
    }
    $row = mysqli_fetch_array($result1);
    if($row==null){
        echo"some error occured";
    }
    else{
        if($row['Amount']>=$_POST['Amount']){
            if($row['Amount']>0){
            $query2 = "UPDATE customers SET Amount=Amount-".$_POST['Amount']." WHERE id=".$_POST['id']."";
            $result2 = mysqli_query($con, $query2);
            $query3 = "UPDATE customers SET Amount=Amount+".$_POST['Amount']." WHERE id=".$_POST['receiver']."";
            $result3 = mysqli_query($con, $query3);
            $query4 = "INSERT INTO transactions(Sender,Receiver,Amount) VALUES (".$row['id'].",".$_POST['receiver'].",".$_POST['Amount'].")";
            $result4 = mysqli_query($con, $query4);
            echo'<script>alert("payment successful")</script>'; 
            //header("Location: https://princelylopes.000webhostapp.com/"); /* Redirect browser */
            /* Make sure that code below does not get executed when we redirect. */
            //exit;
            }
        }
        else{
          echo'<script>alert("payment unsuccessful")</script>'; 
          //header("Location: https://princelylopes.000webhostapp.com/"); /* Redirect browser */
          /* Make sure that code below does not get executed when we redirect. */
          //exit; 
        }
    }
  }
?>
</body>
</html>
