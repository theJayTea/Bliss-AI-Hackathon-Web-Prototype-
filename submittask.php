<?php 
include 'connection.php';

if(isset($_SESSION['id'])) {
    if(isset($_POST['submit'])) {
        $studentid = $_SESSION["id"];
        $taskid = $_GET["id"];
        $result = mysqli_query($conn, "SELECT * FROM task_assign WHERE taskid = '$taskid'");
        $result2 = mysqli_fetch_array($result);
        $tutorname = $result2["tutorname"];
        $tutorid = $result2["tutorid"];
        $response = $_POST["answer"];
        $questions = $result2["questions"];
        $totalmarks = $result2["totalmarks"];
        $taskdescription = $result2["taskdescription"];
        $subject = $result2["subject"];
        $taskname = $result2["taskname"];
        $studentname = $result2["studentname"];
        $deadline = $result2["deadline"];

        mysqli_query($conn, "INSERT INTO task_submit VALUES('', '$taskname', '$studentid', '$studentname', '$tutorid', '$tutorname', '$questions', '$deadline', '$totalmarks', '$subject', '$taskdescription', '$response')");
        header ('location: taskmanager.php');
        mysqli_query($conn, "DELETE FROM task_assign WHERE taskid = $taskid");
        header ('location: taskmanager.php');
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


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


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

        
        <div class="container" style="margin-top: 50px;">
                <div class="contact-section contact-inner-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-10 mb-10 mb-lg-0">
            <div class="section-title section-title--l3">
              <h2 class="section-title__heading mb-4">
                Send A Message
              </h2>
              <p class="section-title__description">Do your best! </p>
            </div>
            <form method="post" class="contact-form">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating">
                    <textarea class="form-control" name="answer" placeholder="Leave a comment here" style="height: 100px"></textarea>
                    <label>Your Message Here</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row align-items-center">
                    <div class="col-md-8 col-lg-7 col-md-6 col-xl-8 pt-3">

                    </div>
                    <div class="col-md-4 col-lg-5 col-xl-4">
                      <button class="btn btn-primary" name="submit" id="submit">Send Message</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>














    
        <script src="" async defer></script>
    </body>
</html>