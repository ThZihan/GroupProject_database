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

    <title>PLO Analysis With Department Average</title>
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
 /* Change bar color, background color, and font color */
 .google-visualization-columnchart .google-visualization-columnchart-series-0 rect {
            fill: #6698FF;
        }

        .google-visualization-columnchart .google-visualization-columnchart-series-1 rect {
            fill: #333;
        }

        .google-visualization-background-rect {
            fill: none;
        }

        .google-visualization-columnchart .google-visualization-chart-title {
            color: red;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .google-visualization-columnchart-legend {
            color: white;
        }

        .google-visualization-axis-title {
            color: #ccc;
        }

        .google-visualization-tooltip {
            background-color: white;
            color: black;
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

  <body>
    <!--
    <div class="container" id="logoutbutton">
    <a href="logout.php" class="btn btn-primary mb-5">Logout</a>
    </div>
    -->

    

<div style="margin-bottom:100px;">

      <div style="height:80px; background-color: #2b2d42;"class="row1">
        <form method="POST">
        <input style="background-color:#ccc;height:50px;border: 1px solid;cursor: pointer;border-radius: 5px;font-size: 14px;letter-spacing:2px;
                      font-weight: bold;text-transform:uppercase; border: none;outline: none;text-align: center;margin-right:20px;
                      color:black;margin-left:43%;margin-top:13px;" type="text" placeholder="Enter Student ID" name="studentID"/>
             
        <input style="background:#6698FF;border-radius:10px; border:none;outline:none;color:#fff;font-size:14px;
                    letter-spacing:2px;text-transform:uppercase;cursor:pointer;font-weight:bold;margin-left:5px;height: 36px;width: 100px;"
              
        type="submit" name="submit" value="Submit"/>

        </form>
        </div>

      <div style="display:flex;justify-content:space-around; background-color: #2b2d42; margin:100px;" class="row2">
      <button onclick="ploAnalysisWithDepartmentAverage()" style="width:300px;margin-left:0px;background-color:#333;color:#fff;" class="School-wise">PLO Analysis with Department Average</button>
      <button onclick="ploAnalysisWithProgramAverage()" style="width:300px;background-color:#333;color:#fff;" class="Department-wise">PLO Analysis with Program Average</button>
      <button onclick="ploAnalysisWithSchoolAverage()" style="width:300px;background-color:#333;color:#fff;" class="Program-wise">PLO Analysis with School Average</button>

      </div>
    
     <div style="display:flex;justify-content:center; " class="row3" style="margin-top:20px;"> 
       <div id="Autumn" style="width: 65%; height: 500px; display:inline-block;margin-top:23px;"></div>
       
     </div>
</div>    

<?php
if(isset($_POST['submit'])){
  $studentID=$_POST['studentID'];
}
?>

<!-- Analysis with Department Average -->
<script>
    function ploAnalysisWithDepartmentAverage(){
    <?php

    $sql="SELECT plo.ploNum AS ploNum, 
    AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
    FROM registration_t AS r, answer_t AS ans, question_t AS q, 
    co_t AS co, plo_t AS plo
    WHERE r.registrationID=ans.registrationID 
    AND ans.examID=q.examID AND ans.answerNum=q.questionNum AND q.coNum=co.coNum 
    AND q.courseID=co.courseID AND co.ploID=plo.ploID 
    AND r.studentID='$studentID'
    GROUP BY plo.ploNum,r.studentID";

    $result=mysqli_query($con,$sql);

    $sql2="SELECT plo.ploNum AS ploNum, AVG((ans.markObtained/q.markPerQuestion)*100) 
    AS percent
    FROM registration_t AS r, answer_t AS ans, question_t AS q, 
    co_t AS co, plo_t AS plo, student_t AS s WHERE r.studentID=s.studentID 
    AND r.registrationID=ans.registrationID AND ans.examID=q.examID
    AND ans.answerNum=q.questionNum 
    AND q.coNum=co.coNum AND q.courseID=co.courseID AND co.ploID=plo.ploID
    AND s.departmentID=(SELECT s.departmentID FROM student_t AS s 
    WHERE s.studentID='$studentID')
    GROUP BY plo.ploNum";

    $result2=mysqli_query($con,$sql2);

    ?>
    
    google.charts.load('current', {packages:['bar']});
  google.charts.setOnLoadCallback(drawAutumnChart);

  function drawAutumnChart() {
    var data = google.visualization.arrayToDataTable([
      ['ploNum', 'Individual', 'Dept Average'],

      <?php
        while ($data = mysqli_fetch_array($result)) {
          $data2 = mysqli_fetch_array($result2);
          $ploNum = "PLO" . $data['ploNum'];
          $percent = $data['percent'];
          $percent2 = $data2['percent'];
      ?>

      ['<?php echo $ploNum; ?>', <?php echo $percent; ?>, <?php echo $percent2; ?>],
      <?php
        }
      ?>
    ]);

    var options = {
  chart: {
    title: 'PLO Analysis with Department Average',
    titleTextStyle: {
      color: 'red', // Change color to your preferred color
      fontSize: 18, // Change font size to your preferred size
      bold: true, // Make title text bold
      textAlign: 'center' // Center the title text
    }
  },
  series: {
    0: { // individual
      color: '#6698FF',
    },
    1: { // average
      color: '#333',
    }
  },
  bars: 'vertical',
  hAxis: {
    title: 'PLO',
    titleTextStyle: { color: '#ccc' },
    textStyle: {
      color: '#ccc',
      fontSize: 14,
      textAlign: 'center',
    }
  },
  vAxis: {
    title: 'Percentage',
    titleTextStyle: { color: '#ccc' },
    textStyle: { color: '#ccc' },
    minValue: 0,
  },
  backgroundColor: {
    fill: 'none',
  }
};

google.charts.Bar.convertOptions(options);



    var chart = new google.charts.Bar(document.getElementById('Autumn'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
}
</script> 


<!-- Analysis with Program Average -->
<script>
function ploAnalysisWithProgramAverage(){
    <?php

    $sql="SELECT plo.ploNum AS ploNum, 
    AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
    FROM registration_t AS r, answer_t AS ans, question_t AS q, 
    co_t AS co, plo_t AS plo
    WHERE r.registrationID=ans.registrationID 
    AND ans.examID=q.examID
    AND ans.answerNum=q.questionNum AND q.coNum=co.coNum 
    AND q.courseID=co.courseID AND co.ploID=plo.ploID 
    AND r.studentID='$studentID'
    GROUP BY plo.ploNum,r.studentID";

    $result=mysqli_query($con,$sql);

    $sql2="SELECT plo.ploNum AS ploNum, 
    AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
    FROM registration_t AS r, answer_t AS ans, question_t AS q, 
    co_t AS co, plo_t AS plo, student_t AS s, program_t AS p
    WHERE r.studentID=s.studentID 
    AND r.registrationID=ans.registrationID AND ans.examID=q.examID
    AND ans.answerNum=q.questionNum  
    AND q.coNum=co.coNum AND q.courseID=co.courseID AND co.ploID=plo.ploID 
    AND s.programID=p.programID
    AND s.programID=(SELECT s.programID FROM student_t AS s WHERE s.studentID='$studentID')
    GROUP BY plo.ploNum";

    $result2=mysqli_query($con,$sql2);

    ?>
    
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAutumnChart);

      function drawAutumnChart() {
        var data = google.visualization.arrayToDataTable([
          ['ploNum','Individual','Program Average'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $data2=mysqli_fetch_array($result2);
              $ploNum="PLO".$data['ploNum'];
              $percent=$data['percent'];
              $percent2=$data2['percent'];
           ?>

           ['<?php echo $ploNum;?>',<?php echo $percent;?>,<?php echo $percent2;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'PLO Analysis with Program Average',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Autumn'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    }
</script>

<!-- Analysis with School Average -->
<script>
function ploAnalysisWithSchoolAverage(){

    <?php

$sql="SELECT plo.ploNum AS ploNum, 
AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
FROM registration_t AS r, answer_t AS ans, question_t AS q, 
co_t AS co, plo_t AS plo
WHERE r.registrationID=ans.registrationID 
AND ans.examID=q.examID
AND ans.answerNum=q.questionNum  AND q.coNum=co.coNum 
AND q.courseID=co.courseID AND co.ploID=plo.ploID 
AND r.studentID='$studentID'
GROUP BY plo.ploNum,r.studentID";

$result=mysqli_query($con,$sql);

$sql2="SELECT plo.ploNum AS ploNum, 
AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
FROM registration_t AS r, answer_t AS ans, question_t AS q, 
co_t AS co, plo_t AS plo, student_t AS s, program_t AS p, department_t AS d
WHERE r.studentID=s.studentID 
AND r.registrationID=ans.registrationID AND ans.examID=q.examID
AND ans.answerNum=q.questionNum  
AND q.coNum=co.coNum AND q.courseID=co.courseID AND co.ploID=plo.ploID 
AND s.departmentID=d.departmentID
AND d.schoolID=(SELECT d.schoolID FROM student_t AS s, 
department_t AS d WHERE s.studentID='$studentID' 
AND s.departmentID=d.departmentID)
GROUP BY plo.ploNum";

$result2=mysqli_query($con,$sql2);

?>

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawAutumnChart);

  function drawAutumnChart() {
    var data = google.visualization.arrayToDataTable([
      ['ploNum','Individual','School Average'],
      
      <?php
        while($data=mysqli_fetch_array($result)){
          $data2=mysqli_fetch_array($result2);
          $ploNum="PLO".$data['ploNum'];
          $percent=$data['percent'];
          $percent2=$data2['percent'];
       ?>

       ['<?php echo $ploNum;?>',<?php echo $percent;?>,<?php echo $percent2;?>],   
       <?php   
    }
    ?> 
    ]);

    var options = {
      chart: {
        title: 'PLO Analysis with School Average',
      },
      bars: 'vertical',
    };

    var chart = new google.charts.Bar(document.getElementById('Autumn'));
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