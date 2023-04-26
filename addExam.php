<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Employee Dashboard</title>

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

  <body>

    

  <!-- div row-1 starts here -->

  <form action="addExamConfig.php" method="POST">
      <div style="display:flex;justify-content:space-evenly;margin-top:15px;">
        
        <input type="text" style="background-color:#ccc;height:36px;cursor: pointer;border-radius: 5px;
           font-size: 14px;letter-spacing:2px;font-weight: bold;text-transform: uppercase;border: none;
           outline:none;text-align:center;color:white;width:250px;margin-top:0px;" 
           placeholder="Exam Name" name="examName"/>


      <select style="background:#ccc;color:black;width:250px;margin-left:0px;margin-top:0px;" name="courseID" class="select">
     <option disabled selected>Course</option>
     <option value="CSC101">CSC101</option>
      <option value="EEE131">EEE131</option>
      <option value="ENG101">ENG101</option>
     </select>              

    <select style="background:#ccc;color:black;width:250px;margin-left:0px;margin-top:0px;" name="sectionNum" class="select">
    <option disabled selected>Section</option>
    <option value="1">section-1</option>
    <option value="2">section-2</option>
    <option value="3">section-3</option>
    <option value="4">section-4</option>
    </select>  

      </div>

  <!-- div row-1 ends here -->




    <!-- div row-2 starts here -->

    <div style="display:flex;justify-content:space-evenly;margin-top:15px;">

    <select style="background:#ccc;color:black;margin-left:0px;width:250px;margin-top:0px;" name="questionCount" class="select">
       <option disabled selected>No. of Questions</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
     </select> 

    <select style="background:#ccc;color:black;width:250px;margin-left:0px;margin-top:0px;" name="semester" class="select">
       <option disabled selected>Semester</option>
       <option value="spring">spring</option>
       <option value="summer">summer</option>
       <option value="autumn">autumn</option>
     </select>              

     <select style="background:#ccc;color:black;width:250px;margin-top:0px;margin-left:0px;" name="year" class="select">
       <option disabled selected>year</option>
       <option value="2020">2020</option>
       <option value="2021">2021</option>
       <option value="2022">2022</option>
     </select>  

    </div>
    
    <div style="display:flex;justify-content:center;">
    <div style="margin-top:15px; width:85%;">
            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum1">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails1">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark1">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum1">
                </label>
            </div>

            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px;
    margin:2px;">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum2">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails2">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark2">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum2">
                </label>

                
            </div>

            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px;
    margin:2px;">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum3">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails3">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark3">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum3">
                </label>

                
            </div>

            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px;
    margin:2px;">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum4">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails4">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark4">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum4">
                </label>

                
            </div>

            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px;
    margin:2px;">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum5">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails5">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark5">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum5">
                </label>

                
            </div>

            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px;
    margin:2px;">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum6">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails6">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark6">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum6">
                </label>

                
            </div>

            <div style="display: flex;
    justify-content: space-around;
    max-width: 100%;
    border: 2px solid black;
    padding: 20px;
    border-radius: 5px;
    margin:2px;">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum7">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails7">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark7">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum7">
                </label>

                
            </div>

            <input type="submit" style="margin-top:20px;margin-bottom:100px;" name="submit" value="Submit" class="submitButton">
        
        </div>   
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