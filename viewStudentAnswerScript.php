<?php
session_start();

if(isset($_POST['submit'])){
  $_SESSION['examName']=$_POST['examName'];
  $_SESSION['courseID']=$_POST['courseID'];
  $_SESSION['sectionNum']=$_POST['sectionNum'];
  $_SESSION['semester']=$_POST['semester'];
  $_SESSION['year']=$_POST['year'];

  header('Location: answerScriptGrading.php');
  exit(); // make sure to exit the script after sending the header
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>View Student Answer Script</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="questionform.css">
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

  /* Responsive styles */
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
    <h1 class="header">Student Performance Monitoring System</h1>
  </div>
  <div style="flex-grow: 1;"></div>
  <a href="logout.php" target="_self" class="login-btn">Logout</a>
</nav>
  </head>
  <body>



    

  <form method="post">
  <div style="display:flex;justify-content:space-evenly;margin-top:15px;">
    
    <input type="text" style="background-color:#ccc;color:black;height:36px;cursor: pointer;border-radius: 5px;
       font-size: 14px;letter-spacing:2px;font-weight: bold;text-transform: uppercase;border: none;
       outline:none;text-align:center;color:white;width:250px;margin-top:0px;" 
       placeholder="Exam Name" name="examName"/>


  <select style="background-color:#ccc;color:black;width:250px;margin-left:0px;margin-top:0px;" name="courseID" class="select">
 <option disabled selected>Course</option>
 <option value="CSC101">CSC101</option>
  <option value="EEE131">EEE131</option>
  <option value="ENG101">ENG101</option>
 </select>              

<select style="background-color:#ccc;color:black;width:250px;margin-left:0px;margin-top:0px;" name="sectionNum" class="select">
<option disabled selected>Section</option>
<option value="1">section-1</option>
<option value="2">section-2</option>
<option value="3">section-3</option>
<option value="4">section-4</option>
</select>  

</div>  <!-- div row-1 ends here -->

<!-- div row-2 starts here -->

<div style="display:flex;justify-content:space-evenly;margin-top:15px;">

<select style="background-color:#ccc;color:black; width:250px;margin-left:0px;margin-top:0px;" name="semester" class="select">
   <option disabled selected>Semester</option>
   <option value="spring">spring</option>
   <option value="summer">summer</option>
   <option value="autumn">autumn</option>
 </select>              


 <input type="submit" style="width:250px;margin-top:0px;margin-left:0px;" name="submit" value="Submit" class="submitButton">


 <select style="background-color:#ccc;color:black;width:250px;margin-top:0px;margin-left:0px;" name="year" class="select">
   <option disabled selected>year</option>
   <option value="2020">2020</option>
   <option value="2021">2021</option>
   <option value="2022">2022</option>
 </select> 
 
 
</div>

</form>    
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
<?php
  if(isset($_POST['submit'])){

    // Start the session to store the form data in the session variables
    session_start();

    // Store the form data in the session variables
    $_SESSION['examName']=$_POST['examName'];
    $_SESSION['courseID']=$_POST['courseID'];
    $_SESSION['sectionNum']=$_POST['sectionNum'];
    $_SESSION['semester']=$_POST['semester'];
    $_SESSION['year']=$_POST['year'];

    // Redirect the user to the answerScriptGrading.php page
    header('location: answerScriptGrading.php');
    exit;
  } 
?>