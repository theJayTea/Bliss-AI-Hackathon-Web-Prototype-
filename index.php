<?php 
include 'connection.php';


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
        <div class="welcome-section" style="background-image: url(./img/background.jpg)">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-md-start">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-8 col-xs-11">
                <div class="welcome-content">
                    <h1 class="welcome-sub-title">Try out our new AI tutor! </h1>
                    <h1 class="welcome-title">Educational tools that guide you in the right direction</h1>
                    <p class="welcome-descriptions">Access our cutting edge pedagogical tools by creating an 
                        <br class="d-none d-sm-block">
                        account and testing them right now!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-us-section">
    <div class="container">
        <!-- about-us Content -->
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8 col-xs-10">
                <div class="about-us-image">
                    <img class="w-100" src="./img/whoweare.jpg" alt="" style="width:100px">
                </div>
            </div>
            <div class="col-xxl-5 offset-xxl-1 col-lg-6 col-md-8 col-xs-10">
                <div class="about-us-right">
                    <div class="section-title">
                        <h2 class="section-title-heading">Who we are</h2>
                        <p class="section-title-description">
                            As high schoolers committed to promoting equitable education, we've launched a platform connecting volunteer tutors with underprivileged students via voice chats. Our platform includes a task feature for teacher assessments and utilizes an AI, equipped with Text-to-Speech and Speech-to-Text capabilities, to assist students when tutors are unavailable. Our mission is to make quality education accessible to all, transcending barriers such as time zones and language constraints.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ .about-us Content -->
    </div>
</div>

<div class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h6 class="section-sub-heading">Our Main Functions</h6>
                    <h2 class="section-heading">Providing Quality Education To All</h2>
                </div>
            </div>
        </div>
        <div class="widgets">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-xs-6 single-widget">
                    <div class="widget">
                        <div class="widget-circle">
                            <h2 class="widget-circle-content">
                                1</h2>
                        </div>
                        <h4 class="widget-title">Online Video-Chat</h4>
                        <p class="widget-text">Request an online video-chat with our tutors on any topic that you want. We'll make sure they speak your language and fit other required criteria.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-6 single-widget">
                    <div class="widget">
                        <div class="widget-circle">
                            <h2 class="widget-circle-content">
                                2</h2>
                        </div>
                        <h4 class="widget-title">Tasks and Assessments</h4>
                        <p class="widget-text">After our sessions, our teachers can create assessments to test your clarity on the concept to locate and better address your weaknesses.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-6 single-widget">
                    <div class="widget">
                        <div class="widget-circle">
                            <h2 class="widget-circle-content">
                                3</h2>
                        </div>
                        <h4 class="widget-title">AI Tutor</h4>
                        <p class="widget-text">As tutors won't always be free, due to the number of variables that constrict them (language barriers, time zones, or even simply being booked out), our AI tutor acts as a replacement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-section">
    <div class="container">
        <div class="border-top border-default-2">
            <div class="row align-items-center justify-content-center" style="margin-top: 100px;">
                <div class="col-lg-4 col-md-10 col-xs-11">
                    <!-- Section Title -->
                    <div class="section-title text-center">
                        <h2 class="section-heading">Our Video- Chats Feature</h2>
                        <p class="section-description">Our video chat feature connects volunteer tutors and underprivileged students for real-time, personalized learning experiences, overcoming geographical barriers.</p>
                    </div>
                    <!--/ .Section Title -->
                </div>
                <div class="col-xxl-5 col-lg-4 col-md-6 col-xs-9">
                    <div class="content-img text-center">
                        <img class="w-100" src="./img/howtddouse.jpg" alt="" style="height:100%; background-size:cover;">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-xs-9">
                    <div class="content-right">
                        <!-- Single Services -->
                        <div class="widgets">
                            <h5 class="widgets-title"><b>Assessments</b></h5>
                            <p class="widgets-content">After assessments, tutors are allowed to give comments on students, their performace, behaviour, etc. This information is used by the AI to better answer their questions specific to student</p>
                        </div>
                        <!--/ .Single Services -->
                        <!-- Single Services -->
                        <div class="widgets">
                            <h5 class="widgets-title"><b>AI Tutor</b></h5>
                            <p class="widgets-content">Our heavily customised tutor is built to guide you through your questions to help give them a answer, meaning that unless directly asked, it will not give the direct answer and instead, help you figure it out yourself.</p>
                        </div>

                        <!--/ .Single Services -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










    
        <script src="" async defer></script>
    </body>
</html>