<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Student Dashboard</title>
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
    <!--
    <div class="container" id="logoutbutton">
    <a href="logout.php" class="btn btn-primary mb-5">Logout</a>
    </div>
    -->

    




      <div style="display: flex; flex-wrap: wrap; justify-content: center;margin-bottom:100px;">
      <div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">PLO Analysis</h3>
    <p style="font-size: 14px; color: #fff;">PLO analysis is the process of analyzing how well students are achieving the intended learning outcomes of a program or course. It helps educators identify areas for improvement in their teaching and curriculum, and ensure that students are well-prepared for their future careers.</p>
    <a class="login-btn" href="ploAnalysis.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>
  <div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">PLO Achievement Stats</h3>
    <p style="font-size: 14px; color: #fff;">PLO Achievement Stats analyze student achievement of intended learning outcomes in a program or course, evaluating the effectiveness of teaching and preparing students for future careers.</p>
    <a class="login-btn" href="ploAchieveStats.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>

  <div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">Spider Chart Analysis</h3>
    <p style="font-size: 14px; color: #fff;">Spider Chart Analysis visualizes multi-dimensional data for analyzing and comparing student performance on different learning outcomes. It helps educators identify patterns and trends in student performance quickly.</p>
    <a class="login-btn" href="spiderChart.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>
  
<div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">Data Entry</h3>
    <p style="font-size: 14px; color: #fff;">Data Entry is the process of entering or inputting data into a computer system or database. It involves manually inputting information, such as student records, Exams, Course Outcomes and other relevant information, into the system.</p>
    <a class="login-btn" href="dataEntry.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>

  <div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">View course Outline</h3>
    <p style="font-size: 14px; color: #fff;">View Course Outline is the process of accessing and reviewing detailed information about a course, including its description, objectives, learning outcomes, and assessment strategy. </p>
    <a class="login-btn" href="viewCourseOutline.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>


  <div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">Enrollment Stats</h3>
    <p style="font-size: 14px; color: #fff;">Enrollment Stats are data and statistics about student enrollment in a program or course. Analyzing Enrollment Stats helps educators make informed decisions about program and course offerings and improve student outcomes.</p>
    <a class="login-btn" href="enrollmentStatistics.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>

  <div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">GPA Analysis</h3>
    <p style="font-size: 14px; color: #fff;">GPA Analysis evaluates student academic performance through their Grade Point Average (GPA), identifying areas for improvement and implementing interventions to support success.</p>
    <a class="login-btn" href="performanceStats.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>
<div style="width: 300px; height: 300px; background: linear-gradient(to bottom, #4a4a4a, #292929); margin: 10px; padding: 20px; box-sizing: border-box; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <h3 style="margin: 0; color: #fff;">Backlogged Data View</h3>
    <p style="font-size: 14px; color: #fff;">View old students Backlogged Data Table which were inserted by Faculties Later.</p>
    <a class="login-btn" href="show_data.php" target="_self" style="text-decoration: none; color: #0080ff; font-size: 14px;">Select</a>
</div>
 
</div>
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