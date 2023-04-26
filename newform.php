<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = "";
$dbname = 'spms';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Database Connection Error!!");
}

if (isset($_POST['add_info'])) {
    $return_msg = add_data($_POST);
}

if(isset($_POST['add_csv'])){
  $fileName = $_FILES["file"]["tmp_name"];
  $faculty_id = $_POST['faculty_id'];
  if($_FILES["file"]["size"]>0){
    $file = fopen($fileName,"r");
    fgetcsv($file);
    while(($column = fgetcsv($file,10000,",")) !== False){


 $marks = 0;
 $grade_point= 0.0;
      switch($column[5]) {
        case 'A':
          $marks = 90;
          $grade_point = 4.0;
          break;
        case 'A-':
          $marks = 85;
          $grade_point = 3.7;
          break;
          case 'B+':
           $marks = 80;
           $grade_point = 3.3;
           break;
          case 'B':
           $marks = 75;
           $grade_point = 3.0;
            break;
          case 'B-':
            $marks = 70;
            $grade_point = 2.7;
           break;
          case 'C+':
            $marks = 65;
            $grade_point = 2.3;
            break;
          case 'C':
            $marks = 60;
            $grade_point = 2.0;
           break;
          case 'C-':
            $marks = 55;
            $grade_point = 1.7;
            break;
          case 'D+':
            $marks = 50;
            $grade_point = 1.3;
            break;
          case 'D':
            $marks = 45;
            $grade_point = 1.0;
            break;

        default:
          break;
      }

      $sqlInsert = "INSERT INTO section_t (sectionNum,semester,courseID,facultyID,year) VALUES ('" . $column[4] . "','" . $column[2] . "','" . $column[3] . "'," . $faculty_id . ",'" . $column[1] . "')";
    $result1 = mysqli_query($conn, $sqlInsert);

    $sqlInsert5 = "INSERT INTO std_data(ID,Year,Semester,Course,Section,Grade,CO1,CO2,CO3,Date) VALUES ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "'," . $marks . "," . $marks . "," . $marks . ",NOW())";

$result5 = mysqli_query($conn, $sqlInsert5);


    if (!empty($result1)) {
        $last_insert_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO registration_t (sectionID,studentID) VALUES ($last_insert_id, '" . $column[0] . "')";
        $result2 = mysqli_query($conn, $query2);
    }
    if (!empty($result2)) {
        $last_insert_id_2 = mysqli_insert_id($conn);

        $query3 = "INSERT INTO student_course_performance_t (registrationID,totalMarksObtained,gradePoint) VALUES ($last_insert_id_2, $marks, $grade_point)";
        mysqli_query($conn, $query3);
    
    } else {
        echo "error";
    }
    }
  }
}

function add_data($data)
{
    global $conn;

      $std_ID= $data['student_id'];
      $std_id=(int)$std_ID;
      $faculty_ID= $data['faculty_id'];
      $faculty_id=(int)$faculty_ID;
      
      $std_year = $data['educational_year'];
      
      $std_semester=$data['educational_semester'];
      $std_course=$data['enrolled_course'];
      $std_SECTION=$data['enrolled_section'];
      $std_section=(int)$std_SECTION;
      $std_grade=$data['obtained_grade'];


      $marks = 0;
      $grade_point = 0.0;
      switch($std_grade) {
        case 'A':
          $marks = 90;
          $grade_point = 4.0;
          break;
        case 'A-':
          $marks = 85;
          $grade_point = 3.7;
          break;
          case 'B+':
           $marks = 80;
           $grade_point = 3.3;
           break;
          case 'B':
           $marks = 75;
           $grade_point = 3.0;
            break;
          case 'B-':
            $marks = 70;
            $grade_point = 2.7;
           break;
          case 'C+':
            $marks = 65;
            $grade_point = 2.3;
            break;
          case 'C':
            $marks = 60;
            $grade_point = 2.0;
           break;
          case 'C-':
            $marks = 55;
            $grade_point = 1.7;
            break;
          case 'D+':
            $marks = 50;
            $grade_point = 1.3;
            break;
          case 'D':
            $marks = 45;
            $grade_point = 1.0;
            break;

        default:
          // handle default case
          break;
      }

      $query1 = "INSERT INTO std_data(ID, Year, Semester, Course, Section, Grade, CO1, CO2, CO3, Date) 
      VALUES ($std_id, $std_year, '$std_semester', '$std_course', $std_section, '$std_grade', '$marks', '$marks', '$marks', NOW())";

      
     
     $query = "INSERT INTO section_t (sectionNum,semester,courseID,facultyID,year) VALUES ($std_section,'$std_semester','$std_course',$faculty_id,$std_year)";
      $result9 = mysqli_query($conn, $query1);
    if (mysqli_query($conn, $query)) {
        $last_insert_id = (int)mysqli_insert_id($conn);

        $query2 = "INSERT INTO registration_t (sectionID,studentID) VALUES ($last_insert_id, $std_id)";
        
        if (mysqli_query($conn, $query2)) {
          $last_insert_id2 = (int)mysqli_insert_id($conn);
  
        $query3 = "INSERT INTO student_course_performance_t (registrationID,totalMarksObtained,gradePoint) VALUES ($last_insert_id2, $marks, $grade_point)";
       
        mysqli_query($conn, $query3);

        return "success";
    } else {
        return "error!";
    }
}
}
?>


<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Input form</title>
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
    <h1 style="background:none;" class="header">Student Performance Monitoring System</h1>
  </div>
  <div style="flex-grow: 1;"></div>
  <a href="logout.php" target="_self" class="login-btn">Logout</a>
</nav>

  </head>
<section>
  <h1 style="background:none;">Backlogged Student Data Entry Form</h1>
  <form style="margin-bottom:100px;" class="form" action="" method="post" enctype="multipart/form-data">
    <?php if(isset($return_msg)){echo $return_msg;}?>
    <label for="student_id">Student ID:</label>
    <input type="text" id="student_id" name="student_id" required><br><br>
    <label for="educational_year">Educational Year:</label>
    <select name="educational_year" id="educational_year" required>
      <option value=""> -- Select --</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
    </select><br><br>

    <label for="educational_semester">Educational Semester:</label>
    <select name="educational_semester" id="educational_semester" required>
      <option value=""> -- Select --</option>
      <option value="Spring">SPRING</option>
      <option value="Summer">SUMMER</option>
      <option value="Autumn">AUTUMN</option>
    </select><br><br>
    <label for="enrolled_course">Enrolled Course:</label>    
    <input type="text" id="enrolled_course" name="enrolled_course" placeholder="CSE###" required><br><br>


    <label for="enrolled_section">Enrolled Section:</label>
    <select name="enrolled_section" id="enrolled_section" required>
      <option value=""> -- Select --</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select><br><br>
    <label for="obtained_grade">Obtained Grade:</label>
    <select name="obtained_grade" id="obtained_grade" required>
      <option value=""> -- Select --</option>
      <option value="A">A</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B">B</option>
      <option value="B-">B-</option>
      <option value="C+">C+</option>
      <option value="C">C</option>
      <option value="C-">C-</option>
      <option value="D+">D+</option>
      <option value="D">D</option>
      <option value="F">F</option>
    </select><br><br>
    <label for="faculty_id">Faculty ID:</label>
    <input type="text" id="faculty_id" name="faculty_id" required><br><br>
    <label for="upload_file">Upload a file:</label>
    <input type="radio" id="upload_file" name="upload_file" value="yes">
    <label for="upload_file">Yes</label>
    <input type="radio" id="upload_file" name="upload_file" value="no" checked>
    <label for="upload_file">No</label><br><br>

    <input type="file" id="file" name="file" style="display:none;"><br><br>
    <div>
    <input class="login-btn" type="submit" id="csv_btn" value="Import" name="add_csv" style="display:none; background:#6698FF;">
    <input class="login-btn" type="submit" id="submit_btn" value="Submit" name="add_info" style="display:block; background:#6698FF;">
    </div>
  </form>
  </section>

  <script>
    document.querySelectorAll('input[type="radio"][name="upload_file"]').forEach(function (radio) {
      radio.addEventListener('change', function () {
        if (this.value === 'yes') {
          document.getElementById('file').style.display = 'block';
          document.getElementById('csv_btn').style.display = 'block';
          document.getElementById('submit_btn').style.display = 'none';
          document.getElementById('obtained_grade').disabled = true;
          document.getElementById('enrolled_section').disabled = true;
          document.getElementById('enrolled_course').disabled = true;
          document.getElementById('educational_semester').disabled = true;
          document.getElementById('educational_year').disabled = true;
          document.getElementById('student_id').disabled = true;
        } else {
          document.getElementById('file').style.display = 'none';
          document.getElementById('csv_btn').style.display = 'none';
          document.getElementById('submit_btn').style.display = 'block';
          document.getElementById('obtained_grade').disabled = false;
          document.getElementById('enrolled_section').disabled = false;
          document.getElementById('enrolled_course').disabled = false;
          document.getElementById('educational_semester').disabled = false;
          document.getElementById('educational_year').disabled = false;
          document.getElementById('student_id').disabled = false;
        }
      });
    });
  </script>


<style>
    footer {
    background-image: url("back.gif");
    background-repeat: no-repeat;
    background-size: cover;
    height: 30px;
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
  <footer style="background-color: #2b2d42; color: #fff; padding: 20px; text-align: right;margin-right:202px;">
 <p> &copy; 2023 SPMS. All rights reserved by Failure DataBees. </p>
</footer>
</html>
