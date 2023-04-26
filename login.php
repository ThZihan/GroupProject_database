<?php

$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'connect.php';
    
    $userType=$_POST['userType'];
    $ID=$_POST['ID'];
    $password=$_POST['password'];

  if($userType!='student'){
    $sql="SELECT * from employee_t where employeeID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

  elseif($userType=='student'){
    $sql="SELECT * from student_t where studentID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:student_dashboard.php');
        }
     }
  }    

        else{
            $invalid=1;
        }
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
    <link rel="stylesheet" href="style.css">

    <title>Login page</title>

   
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
  <a href="#form_div" class="login-btn">Login</a>
</nav>


<section style="padding:50px 0; background: linear-gradient(to bottom right, #443683, #6dcac2); text-align: center;">
  <img src="image3.jpg" alt="" style="width: 90%; border-radius: 10px; box-shadow: 0px 5px 10px rgba(0,0,0,0.2);">
</section>

<section style="padding:50px 0;">
<h1 style="text-align:center;">Hall Of Fame!</h1>
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="embed-responsive embed-responsive-16by9">
          <img class="embed-responsive-item" src="image1.jpg" alt="image1">
        </div>
      </div>
      <div class="col-md-6">
        <h3>Team IUB FabSat selected for American Astronautical Society: Student CanSat Competition</h3>
        <p>The Independent University, Bangladesh (IUB) has once again made the country proud by securing a place in the American Astronautical Society(AAS) Student CanSat Competition which is sponsored by organizations like NASA, US NAVAL Research Laboratory, Virginia Tech, Lockheed Martin... <a style="font-weight: bold; color:black;" href="http://www.iub.edu.bd/articles/index/1959/Team-IUB-FabSat-selected-for-American-Astronautical-Society-Student-CanSat-Competition">See more...</a></p>
      </div>
    </div>
  </div>
</section>

  <style>
		/* Navbar styles */
		.navbar {
			background-color: #2b2d42; /* Beautiful color */
			padding: 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.logo {
			height: 50px;
			width: auto;
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

		/* Responsive styles */
		@media only screen and (max-width: 600px) {
			.header {
				font-size: 18px;
			}
		}

    footer {
      background-image: url("back.gif");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: right;
  height:70px;
}
	</style>

  </head>
  <body>

 <?php
 if($invalid==1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> Invalid credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

<style>
  body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: top;
    background-color: #0c0c0c;
    background-image: linear-gradient(to bottom right, #443683, #6dcac2);
  }

  .mainContainer {
    margin-top: 100px;
    width: 50%;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .selectNew {
    height: 46px;
    width: 100%;
    margin-bottom: 10px;
    margin-left:0;
    border-radius: 10px;
    border: none;
    outline: none;
    background: #f1f1f1;
    color: #333;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    font-family: Arial, Helvetica, sans-serif;
  }

  .ID {
    height: 46px;
    width: 100%;
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 10px;
    border: none;
    outline: none;
    background: #f1f1f1;
    color: #333;
    font-size: 18px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
  }
  @media only screen and (max-width: 600px) {
  .ID  {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    font-size:12px;
  }
  
}

  label {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 22px;
    color: #fff;
    font-weight: bolder;
    text-align: center;
  }

  .submitButton {
    height: 46px;
    width: 200px;
    display: inline-block;
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
    margin-top: 20px;
  }

  .submitButton:hover {
    background: linear-gradient(90deg, #87CEFA, #00BFFF);
  }

  .submitButton:active {
    opacity: 0.5;
  }

  html {
  scroll-behavior: smooth;
}

</style>

<div style="display:flex;justify-content:center;background-image: url('back1.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
  <div style="margin:25px;"id="form_div" class="mainContainer">
    <form action="login.php" method="post" style="padding:25px;">
      <select name="userType" class="select selectNew ID">
        <option disabled selected>User Type</option>
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
        <option value="department head">Department Head</option>
        <option value="dean">Dean</option>
      </select>

     
      <input class="ID" type="text" name="ID" placeholder="Enter Your ID">

      
      <input class="ID" type="password" name="password" placeholder="Enter Your Password">

      <input type="submit" name="submit" value="Login" class="submitButton ID" style="width: 60%;">

    </form>
  </div>
</div>




</body>
<footer style="background-color: #2b2d42; color: #fff; padding: 20px; text-align: right;">
  &copy; 2023 SPMS. All rights reserved by Failure DataBees.
</footer>
</html> 