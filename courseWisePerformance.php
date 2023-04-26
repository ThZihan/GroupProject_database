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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript"></script>  
    
    <style>
         body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: top;
    background-color: #0c0c0c;
    background-image: linear-gradient(to bottom right, #443683, #6dcac2);
  }

        ::placeholder{
          color:white;
        }

        ::-ms-input-placeholder{
          color:white;
        }

        :-ms-input-placeholder{
          color:white;
        }

    </style>

<style>
 

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

  <style>
        

        ::placeholder{
          color:white;
        }

        ::-ms-input-placeholder{
          color:white;
        }

        :-ms-input-placeholder{
          color:white;
        }

    </style>

  <body>

   

      <div style="margin-bottom:100px;">

      <div style="height:80px;background-color: #2b2d42;"class="row1">
        <form method="POST">
         <select style="background-color: #ccc;color:black" name="year" class="select">
            <option disabled selected>Year</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
             <option value="2022">2022</option>
         </select>
             <input style="background:#00BFFF;
              border-radius:10px;
              border:none;
              outline:none;
              color:#fff;
              font-size:14px;
              letter-spacing:2px;
              text-transform:uppercase;
              cursor:pointer;
              font-weight:bold;
              margin-left:5px;
              height: 36px;
              width: 100px;"
              
             type="submit" name="submitCourseCode" value="Submit"/>
         
      </div>

                   <!-- div row-2 -->

      <div style="padding-left:28%; height:50px height:80px;background-color: #2b2d42;" 
                  class="row2">
      <input style="background-color:#ccc;
                    height:50px;
                    border: 1px solid;
                   cursor: pointer;
                   border-radius: 5px;
                   font-size: 14px;
                   letter-spacing:2px;
                   font-weight: bold;
                    text-transform: uppercase;
                     border: none;
                    outline: none;
                   text-align: center;
                   margin-right:20px;
                    color:black;" type="text" placeholder="Enter course code" name="course1"/>
        <input style="height: 46px;
                  width: 200px;
                      margin-right: 20px;
                     height:50px;
                 display:inline-block;
                   text-align:center;
                  border-radius: 5px;
                      border: none;
                      outline: none;
                  background: #ccc;
                     color: black;
                     font-size: 14px;
                      letter-spacing:2px;
                    text-transform: uppercase;
                       cursor:pointer;
                       font-weight: bold" 
        type="text" placeholder="Enter course code" name="course2"/>
      <input style="background-color:#ccc;
                    height:50px;
                    border: 1px solid;
                   cursor: pointer;
                   border-radius: 5px;
                   font-size: 14px;
                   letter-spacing:2px;
                   font-weight: bold;
                    text-transform: uppercase;
                     border: none;
                    outline: none;
                   text-align: center;
                   margin-right:20px;
                    color:white;"type="text" placeholder="Enter course code" name="course3"/>
      </form>              
      </div>

      <div style="height:50px;padding-left:43%;margin-top:15px;">
      <button onclick="viewCourseWise()" style="height: 46px;
    width: 100px;
    margin-left:40px;
    display:inline-block;
    border-radius: 10px;
    border: none;
    outline: none;
    background: #6698FF;
    color: #fff;
    font-size: 14px;
    letter-spacing:2px;
    text-transform: uppercase;
    cursor:pointer;
    font-weight: bold;">
       view
      </button>
      </div>
    
    <div class="row3" style="margin-top:5px;"> 
       <div id="Spring" style="width: 500px; height: 500px; display:inline-block;"></div>
       <div id="Summer" style="width: 500px; height: 500px; display:inline-block;"></div>
       <div id="Autumn" style="width: 500px; height: 500px; display:inline-block;"></div>
     </div>
</div>  

<?php
if(isset($_POST['submitCourseCode'])){
    $year=$_POST['year'];
    $course1=$_POST['course1'];
    $course2=$_POST['course2'];
    $course3=$_POST['course3'];
  }?>


<!-- course wise function -->

<script>
    function viewCourseWise(){
     
    <?php
    $sql="SELECT sec.courseID AS course, AVG(scp.gradePoint) as GPA
    FROM student_course_performance_t AS scp,registration_t AS r,section_t AS sec
    WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID AND 
    sec.courseID IN ('$course1','$course2','$course3') AND sec.semester='autumn' AND sec.year='$year'
    GROUP BY sec.courseID";
    $result=mysqli_query($con,$sql);
    ?>
    
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAutumnChart);
    google.charts.setOnLoadCallback(drawSummerChart);
    google.charts.setOnLoadCallback(drawSpringChart);

      function drawAutumnChart() {
        var data = google.visualization.arrayToDataTable([
          ['course','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $course=$data['course'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $course;?>',<?php echo $GPA;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Autumn',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Autumn'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


<?php
$sql="SELECT sec.courseID AS course, AVG(scp.gradePoint) as GPA
FROM student_course_performance_t AS scp,registration_t AS r,section_t AS sec
WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID AND sec.courseID IN ('$course1','$course2','$course3') AND sec.semester='summer' AND sec.year='$year'
GROUP BY sec.courseID";
$result=mysqli_query($con,$sql);
?>

      function drawSummerChart() {
        var data = google.visualization.arrayToDataTable([
          ['course','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $course=$data['course'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $course;?>',<?php echo $GPA;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Summer',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Summer'));

        chart.draw(data, google.charts.Bar.convertOptions(options)); 
    }
<?php
$sql="SELECT sec.courseID AS course, AVG(scp.gradePoint) as GPA
FROM student_course_performance_t AS scp,registration_t AS r,section_t AS sec
WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID AND sec.courseID IN ('$course1','$course2','$course3') AND sec.semester='spring' AND sec.year='$year'
GROUP BY sec.courseID";
$result=mysqli_query($con,$sql);
?>

function drawSpringChart() {
        var data = google.visualization.arrayToDataTable([
          ['course','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $course=$data['course'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $course;?>',<?php echo $GPA;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Spring',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Spring'));
        chart.draw(data, google.charts.Bar.convertOptions(options)); 
    }

  }
</script>

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