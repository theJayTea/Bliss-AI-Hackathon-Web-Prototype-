
<?php 
include 'connection.php';
if(isset($_SESSION['id'])) {
  $tutorid = $_GET['id'];
$studentid = $_SESSION['id'];
$result = mysqli_query($conn, "SELECT * FROM student_account WHERE studentid = '$studentid'");
$result2 = mysqli_fetch_assoc($result);
$studentname = $result2['username'];
$grade = $result2['grade'];



$result3 = mysqli_query($conn, "SELECT * FROM tutor_account WHERE tutorid = '$tutorid'");
$result4 = mysqli_fetch_assoc($result3);
$tutorname = $result4['username'];


if(isset($_POST['submit'])) {
  $subject = $_POST['subject'];
    $requestdescription = $_POST['requestdescription'];
    mysqli_query($conn, "INSERT INTO meeting_request VALUES('', '$studentid', '$studentname', '$grade', '$subject', '$requestdescription', '$tutorid', '$tutorname')");
    header ('location: teacheravailability.php');
}
}
else {
  header ('location: signup.php');
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
                <a class="nav-link" href="">Assign Tasks</a>
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



        



        
        <div class="main-container">
    <center><div class="main-header" style="margin-top: 100px; font-size:45px; margin-bottom: 30px;">Request A Meeting.</div></center>
    <center><div class="sub-header" style="margin-top: 10px; font-size:22px; margin-bottom: 100px; margin-right: 150px; margin-left: 150px;">You selected a teacher to request a meeting with. Write a request description on the subject you want to learn about and wait for your teacher to respond to you. Your requests will be reset every single day, and can be viewed in the 'your meetings' page</div></center>
    
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <h2 class="section-title">
                        Request A meeting
                    </h2>
                    <form method="post" class="contact-form">
                        <div class="row">
                            <div class="form-floating">
                                <input class="form-control" name="subject" placeholder="which Subject Do You Want Help With?" style="height: 100px"></input>
                                <label>Which Subject Do You Want Help With?</label>
                            </div>
                            <div class="col-lg-12" style="margin-top: 30px;">
                                <div class="form-floating">
                                    <textarea class="form-control" name="requestdescription" placeholder="Leave a comment here" style="height: 100px"></textarea>
                                    <label>Your Message Here </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row align-items-center">
                                    <div class="col-md-8 col-lg-7 col-md-6 col-xl-8">
                                    </div>
                                    <div class="col-md-4 col-lg-5 col-xl-4" style="margin-top: 30px;">
                                        <button class="btn btn-primary" name="submit" id="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 offset-xl-1 col-lg-5">
                    <div class="contact-widget">
                        <div class="widget-title-block">
                            <h2 class="widget-title">What To Write</h2>
                            <p class="widget-paragraph">1. What topic in the subject you want to discuss <br> 2. What types of content do you want to cover (practice questions, concepts, etc) <br> 3. The exact time you would prefer the meeting (however, do not expect the teacher to accept with the same request time).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







                        </body>
                        </html>