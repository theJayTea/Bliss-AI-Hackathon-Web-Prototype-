<?php 
include 'connection.php';

if(isset($_SESSION['type'])) {
  $type = $_SESSION['type'];

}

if(isset($_POST['submit2'])) {
  $tutorid = $_SESSION['id'];
  $studentname = $_POST['studentname'];
  $deadline = $_POST['deadline'];
  $questions = $_POST['questions'];
  $taskname = $_POST['taskname'];
  $totalmarks = $_POST['totalmarks'];
  $subject = $_POST['subject'];
  $taskdescription = $_POST['taskdescription'];

  if(!empty($studentname)) {
    $result = mysqli_query($conn, "SELECT * FROM student_account WHERE username = '$studentname'");
    $row = mysqli_fetch_assoc($result);
    $studentid = $row['studentid'];
    if(!empty($tutorid)) {
      $result2 = mysqli_query($conn, "SELECT * FROM tutor_account WHERE tutorid = '$tutorid'");
      $row2 = mysqli_fetch_assoc($result2);
      $tutorname = $row['username'];

      mysqli_query($conn, "INSERT INTO task_assign VALUES('', '$taskname', '$studentid', '$studentname', '$tutorid', '$tutorname', '$questions', '$deadline', '$totalmarks', '$subject', '$taskdescription')");
    }
  }
}



?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="account.css">
        <link rel="stylesheet" href="request.css">
        <link rel="stylesheet" href="meet.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container-fluid">

            <h1 class="webname">Paradigm Education</h1>

        </div>
        <nav class="navbar navbar-expand-sm sticky-top">
            <div class="container-fluid" id="one">

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#MenuExpand" aria-controls="MenuExpand" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="MenuExpand">

                <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item first redUnderline" id="underline">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>


                <?php
                if(isset($_SESSION['type'])) {
                  $type = $_SESSION['type'];
                  if($type == 'student'){
                    echo '
                    <li class="nav-item redUnderline" id="underline">
                    <a class="nav-link" href="teacheravailability.php">Teacher Availability</a>
                </li>
                    <li class="nav-item redUnderline" id="underline">
                          <a class="nav-link" href="taskmanager.php">Tasks & Deadlines</a>
                    </li>
                    
                    <li class="nav-item redUnderline" id="underline">
                    <a class="nav-link" href="aitutor.php">AI Tutor</a>
                </li>';

                  }

                }
                else {
                  echo '                    <li class="nav-item redUnderline" id="underline">
                  <a class="nav-link" href="teacheravailability.php">Teacher Availability</a>
              </li>                    <li class="nav-item redUnderline" id="underline">
              <a class="nav-link" href="aitutor.php">AI Tutor</a>
          </li>';
                }

                  if(isset($_SESSION['type'])) {
                    $type = $_SESSION['type'];
                    if($type == 'student'){
                      echo '

                      <li class="nav-item redUnderline" id="underline">
                        <a class="nav-link" href="yourmeetings.php">Your Meetings</a>
                      </li>
                      ';
                    
                  }
                  elseif($type == 'tutor') {
                    echo '

                    <li class="nav-item redUnderline" id="underline">
                    <a class="nav-link" href="managerequests.php">Manage Requests</a>
                  </li>


                    <li class="nav-item redUnderline" id="underline">
                      <a class="nav-link" href="yourmeetings.php">Your Meetings</a>
                    </li>
                    
                    

                  
                  <li class="nav-item redUnderline" id="underline">
                  <a class="nav-link" href="">Create Meeting</a>
                </li>

                <li class="nav-item redUnderline" id="underline">
                <a class="nav-link" href="assigntasks.php">Assign Tasks</a>
              </li>

                  ';
                    
                  }

                }


                if(isset($_SESSION['id'])) {
                    echo '                
                
                
                <li class="nav-item redUnderline" id="underline">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>';
                }
                else {
                    echo '                <li class="nav-item redUnderline" id="underline">
                    <a class="nav-link" href="signup.php">Login/ Signup</a>
                </li>';
                }

                


                ?>
                </ul>

            </div>
            </div>
        </nav>





        <div class="feature-area feature-area--l2 bg-purple-heart dark-mode-texts" style=" margin-top: 100px;">
      <div class="container">
        <div class="feature--l2-tab">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
              <div class="feature-area--l2__tab aos-init aos-animate" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
                <ul class="nav nav-tabs nav-tab--feature-2" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Project Management</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Task Management</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Assignment Grading</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>


          <div class="tab-content tab-content--feature-l2 aos-init aos-animate" id="myTabContent" style="margin-top: 70px;">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row align-items-center justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-12 col-xs-12">
                  <div class="feature-area--l2__content">
                    <center><h2 class="feature-area--l2__content__heading content-widget-l2__heading" style="margin-bottom: 50px;">Paradigm's Complete<br class="d-none d-xs-block">
                    Student Directory<br class="d-none d-xs-block"></h2></center>
                    <!-- Feature widgets -->
                    <div class="feature-area--l2-widgets">








                <div class="row">
                    <div class="col">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Languages Spoken</th>
                                <th scope="col">Teacher Notes</th>
                            </tr>
                        </thead>
                        <tbody class="">
                             

                        <?php

    $studentData = mysqli_query($conn, "SELECT * FROM student_account");

    $count = 0;

    while ($row = mysqli_fetch_assoc($studentData)) {
        $count = $count + 1;
        echo "
            <tr>
                <th scope='row'>{$count}</th>
                <td>{$row['username']}</td>
                <td>{$row['grade']}</td>
                <td>{$row['language1']}, {$row['language2']}, {$row['language3']}</td>
                <td class='{$count}'> 
                ";

                $teachernotes = mysqli_query($conn, "SELECT * FROM tutor_notes WHERE studentid = '{$row['studentid']}'");
                // $teachernotes = mysqli_query($conn, "SELECT count(*) FROM tutor_notes WHERE studentid = '{$row['studentid']}'");
                $val = 0;
                if(mysqli_num_rows($teachernotes)) {
                  while ($ree = mysqli_fetch_assoc($teachernotes)) {
                    $val = $val + 1;
                    echo "                       Teacher {$val} ({$ree['tutorname']}): {$ree['tutornote']} <br>";
  
                    echo "
                    
                    <script>
                        \$(document).ready(function() {
                            $('.{$count}').click(function() {
                                window.location = 'addnotes.php?id={$row['studentid']}';
                            });
                        });
                    </script>";
  
                  }                
                }
                else {
                  echo 'no notes on student as of yet</td>';
                  echo "<script>
                  \$(document).ready(function() {
                      $('.{$count}').click(function() {
                          window.location = 'addnotes.php?id={$row['studentid']}';
                      });
                  });
              </script>";
                }
                
                
                echo "</td>";
                

                



        echo"
                
            </tr>
        ";
    }

?>

                        </tbody>
                    </table>

                    </div>
                </div>






                      <!--/ .Single Feature Widgets -->
                    </div>
                    <!--/ .Feature widgets -->
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row align-items-center justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-12 col-xs-12">
                  <div class="feature-area--l2__content">
                  <center><h2 class="feature-area--l2__content__heading content-widget-l2__heading"  style="margin-bottom: 50px;">Create Tasks For Your Students</h2></center>
                    <!-- Feature widgets -->



<div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6">
                    <form method="post" class="contact-form">
                    <div class="form-floating" style="margin-bottom: 50px;">
                    <input  class="form-control" rows="20" name="studentname" placeholder="Leave a comment here" style="height: 100px"></input>
                    <label>Student Name</label>
                  </div>
                  <div class="form-floating" style="margin-bottom: 50px;">
                    <input  class="form-control" rows="20" name="taskname" placeholder="Leave a comment here" style="height: 100px"></input>
                    <label>Task Name</label>
                  </div>
                  <div class="form-floating" style="margin-bottom: 50px;">
                    <input  class="form-control" rows="20" name="subject" placeholder="Leave a comment here" style="height: 100px"></input>
                    <label>Subject</label>
                  </div>
                  <div class="form-floating" style="margin-bottom: 50px;">
                    <input  class="form-control" type="date" rows="20" name="deadline" placeholder="Leave a comment here" style="height: 100px"></input>
                    <label></label>
                  </div>
                  <div class="form-floating" style="margin-bottom: 50px;">
                    <input  class="form-control" rows="20" name="totalmarks" placeholder="Leave a comment here" style="height: 100px"></input>
                    <label>Total Marks</label>
                  </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6">
                    <div class="form-floating" style="margin-bottom: 50px;">
                    <input class="form-control" style="height: 200px; " name="taskdescription" placeholder="Leave a comment here" style="height: 100px" rows="20"></input>
                    <label>Task Description</label>
                  </div>
                    <div class="form-floating" style="margin-bottom: 50px;">
                    <input class="form-control" style="height: 200px;" name="questions" placeholder="Leave a comment here" style="height: 100px" rows="20"></input>
                    <label>Questions</label>
                  </div>
                    
                    <div class="col-md-4 col-lg-5 col-xl-4">
                      <button class="btn btn-primary" name="submit2" id="submit2">Send Message</button>
                    </div>
                    </form>
                    </div>


                    </div>
  </div>

                      <!--/ .Single Feature Widgets -->
                    </div>
                    <!--/ .Feature widgets -->
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="row align-items-center justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-12 col-xs-12">
                  <div class="feature-area--l2__content">
                  <center><h2 class="feature-area--l2__content__heading content-widget-l2__heading" style="margin-bottom: 50px;">Grade student's assignments and provide feedback.</h2></center>
                    <!-- Feature widgets -->
                    <div class="feature-area--l2-widgets">









                    <div class="row">
                    <div class="col">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Total Marks</th>
                            </tr>
                        </thead>
                        <tbody class="">
                             

                        <?php

    $studentData = mysqli_query($conn, "SELECT * FROM task_submit");

    $count = 0;

    while ($row = mysqli_fetch_assoc($studentData)) {
        $count = $count + 1;
        echo "
            <tr class='{$count}'>
                <th scope='row'>{$count}</th>
                <td>{$row['taskname']}</td>
                <td>{$row['studentname']}</td>
                <td>{$row['subject']}</td>
                <td>/{$row['totalmarks']}</td>";

                  echo "<script>
                  \$(document).ready(function() {
                      $('.{$count}').click(function() {
                          window.location = 'gradetask.php?id={$row['tasksubmitid']}';
                      });
                  });
              </script>";
              
              
              echo '</tr>';
                }
    

?>

                        </tbody>
                    </table>

                    </div>
                </div>







                      <!--/ .Single Feature Widgets -->
                    </div>
                    <!--/ .Feature widgets -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



        








    
        <script src="" async defer></script>
    </body>
</html>