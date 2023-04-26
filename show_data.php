<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Backlogged Data Show</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

   <style>
  body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: top;
    background-color: #0c0c0c;
    background-image: linear-gradient(to bottom right, #443683, #6dcac2);
  }

  /* Navbar styles */
  .navbar {
    background-color: #2b2d42;
    background-image: linear-gradient(to right, #443683, #2b2d42);

    padding: 20px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  .logo-header {
    display: flex;
    align-items: center;
  }

  .logo {
    height: 50px;
    width: auto;
    margin-right: 10px;
  }

  .header {
    font-size: 24px;
    color: #fff;
    margin: 0;
    padding: 0;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .login-btn {
    height: 46px;
    width: 200px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    border: none;
    outline: none;
    background: #6698FF;
    color: #fff;
    font-size: 22px;
    letter-spacing: 2px;
    text-transform: uppercase;
    cursor: pointer;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 15px;
    text-decoration: none;
  }

  .login-btn:hover {
    background: linear-gradient(90deg, #87CEFA, #00BFFF);
  text-decoration: none;
  color:black;

  }

  .login-btn:active {
    opacity: 0.5;
  }

  table {
    margin: 80px auto;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
  padding: 10px;

}

table th, table td {
  padding: 10px;
  border: 1px solid #443683;
  color:#ccc;
}

@media only screen and (max-width: 600px) {
  table th, table td {
    padding: 5px;
  }
}


  @media only screen and (max-width: 600px) {
    .navbar {
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }
    .login-btn {
      margin-top: 10px;
      margin-left: 0;
    }
  }
  
</style>

<nav class="navbar">
  <div class="logo-header">
    <img class="logo" src="icon.png" alt="Logo">
    <h1 class="header">Backlogged Students Data Table</h1>
  </div>
  <div style="flex-grow: 1;"></div>
  <a href="logout.php" target="_self" class="login-btn">Logout</a>
</nav>

  </head>
<body>
    <h1 style="text-align:center;color:#ccc;">Backlogged Students Data Table</h1>
    <?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'spms';


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM std_data ORDER BY Date DESC";

$result = mysqli_query($conn, $sql);//will return row number

if (mysqli_num_rows($result) > 0) {
   
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Year</th>";
    echo "<th>Semester</th>";
    echo "<th>Course</th>";
    echo "<th>Section</th>";
    echo "<th>Grade</th>";
    echo "<th>CO1</th>";
    echo "<th>CO2</th>";
    echo "<th>CO3</th>";
    echo "<th>Date</th>";
    echo "</tr>";


    while ($row = mysqli_fetch_assoc($result)) {//will fetch rows from result set
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Year'] . "</td>";
        echo "<td>" . $row['Semester'] . "</td>";
        echo "<td>" . $row['Course'] . "</td>";
        echo "<td>" . $row['Section'] . "</td>";
        echo "<td>" . $row['Grade'] . "</td>";
        echo "<td>" . $row['CO1'] . "</td>";
        echo "<td>" . $row['CO2'] . "</td>";
        echo "<td>" . $row['CO3'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}
?>

<style>
    footer {
    background-image: url("back.gif");
    background-repeat: no-repeat;
    background-size: cover;
    height: 70px;
    position: fixed; /* set position to fixed */
    bottom: 0; /* set bottom to 0 to position at the bottom */
    width: 100%; /* set width to 100% to span the entire width of the viewport */
    background-color: #2b2d42;
    color: #fff;
    padding: 20px;
    text-align: right;
  }
</style>

  </body>
  <footer style="background-color: #2b2d42; color: #fff; padding: 20px; text-align: right;">
  &copy; 2023 SPMS. All rights reserved by Failure DataBees.
</footer>
</html>