<?php 
include 'connection.php';

if(isset($_SESSION['type'])) {
  $type = $_SESSION['type'];

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
                    <a class="nav-link" href="http://127.0.0.1:5000/">AI Tutor</a>
                </li>';

                  }

                }
                else {
                  echo '                    <li class="nav-item redUnderline" id="underline">
                  <a class="nav-link" href="teacheravailability.php">Teacher Availability</a>
              </li>                    <li class="nav-item redUnderline" id="underline">
              <a class="nav-link" href="http://127.0.0.1:5000/">AI Tutor</a>
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
                      <a class="nav-link" href="yourmeetingstutor.php">Your Meetings</a>
                    </li>
                    
                    

                  
                  <li class="nav-item redUnderline" id="underline">
                  <a class="nav-link" href="createmeeting.php">Create Meeting</a>
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

        
        <div class="welcome-area dark-mode position-relative" style="background-image: url(./img/background.jpg)">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-md-start">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-8 col-xs-11 order-2 order-lg-1">
                <div class="welcome-content">
                    <h1 class="sub-title text-gorse aos-init">Try out our new AI tutor! <?php $id = $_SESSION['id']; echo $id?> </h1>
                    <h1 class="title aos-init">Educational tools that guide you in the right direction</h1>
                    <p class="descriptions aos-init">Access our cutting edge pedagogical tools by creating an <br class="d-none d-sm-block"> account and testing them right now!</p>
                </div>
            </div>
        </div>
    </div>
</div>

        



          <div class="about-us-section about-us-section--l5 bg-default">
      <div class="container">
        <!-- about-us Content -->
        <div class="row align-items-center justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-8 col-xs-10">
            <div class="about-us__image">
              <img class="w-100" src="./img/whoweare.jpg" alt="" style="width:100px">
            </div>
          </div>
          <div class="col-xxl-5 offset-xxl-1 col-lg-6 col-md-8 col-xs-10 aos-init">
            <div class="about-us-right mt-4 mt-lg-0">
              <div class="section-title section-title--l5">
                <h2 class="section-title__heading mb-4">Consultation Trade<br class="d-none d-xs-block d-lg-none  d-xl-block"> Easier Than Ever
                </h2>
                <p class="section-title__description">Scale up and down easily as your business demands. And make use of
                  business-grade consultation. Book flexibly by the day, week or longer and customise the layout to reflect
                  your brand.</p>
              </div>
            </div>
          </div>
        </div>
        <!--/ .about-us Content -->
      </div>
    </div>





    <div class="content-section content-section--l3-2 bg-default">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title section-title--l3 text-center">
              <h6 class="section-title__sub-heading aos-init">Our Process</h6>
              <h2 class="section-title__heading mb-4 aos-init">Digital system for your company</h2>
            </div>
          </div>
        </div>
        <div class="widgets widgets-content--l3">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-xs-6 single-widget">
              <div class="widget widget--content-l3">
                <div class="widget--content-l3__circle">
                  <h2 class="widget--content-l3__circle-content bg-electric-violet-2 shadow--electric-violet-2 dark-mode-texts">
                    1</h2>
                </div>
                <h4 class="widget--content-l3__title">General Concept</h4>
                <p class="widget--content-l3__text">Part of what Adobe does is <br class="d-xs-none"> advise customers about how <br class="d-xs-none"> to transform, to be more</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-6 single-widget">
              <div class="widget widget--content-l3">
                <div class="widget--content-l3__circle">
                  <h2 class="widget--content-l3__circle-content bg-flamingo shadow--flamingo dark-mode-texts">
                    2</h2>
                </div>
                <h4 class="widget--content-l3__title">Post Product</h4>
                <p class="widget--content-l3__text">Part of what Adobe does is <br class="d-xs-none"> advise customers about how <br class="d-xs-none"> to transform, to be more</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-6 single-widget">
              <div class="widget widget--content-l3">
                <div class="widget--content-l3__circle">
                  <h2 class="widget--content-l3__circle-content bg-egg-blue shadow--egg-blue dark-mode-texts">
                    3</h2>
                </div>
                <h4 class="widget--content-l3__title">Design Process</h4>
                <p class="widget--content-l3__text">Part of what Adobe does is <br class="d-xs-none"> advise customers about how <br class="d-xs-none"> to transform, to be more</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="content-section bg-default">
      <div class="container">
        <div class="content-section--l5-1 border-top border-default-2 ">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 col-md-10 col-xs-11">
              <!-- Section Title -->
              <div class="section-title section-title--l5 mb-6 mb-md-0 text-center text-lg-start aos-init aos-animate" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                <h6 class="section-title__sub-heading">About us</h6>
                <h2 class="section-title__heading mx-md-4 mx-lg-0">An Exceptionally<br class="d-none d-xxl-block"> unique experience<br class="d-none d-xxl-block"> Tailored to you</h2>
                <p class="section-title__description">In a professional context it often happens that<br class="d-none d-xs-block d-md-none"> private or corporate clients order a publication<br class="d-none d-xs-block d-md-none"> news while still not being ready.</p>
                <a class="btn btn--lg-3 btn-primary text-white shadow--primary-2 rounded-50" href="#">Learn More</a>
              </div>
              <!--/ .Section Title -->
            </div>
            <div class="col-xxl-5 col-lg-4 col-md-6 col-xs-9 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
              <div class="content-img text-center mb-6 mb-md-0">
                <img class="w-100" src="./img/howtouse.jpg" alt="" style="height:100%; background-size:cover;">
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-xs-9 order-3 aos-init aos-animate" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
              <div class="content-right">
                <!-- Single Services -->
                <div class="widgets widgets--content-1-l5">
                  <h5 class="widgets__title"><b>Our Customer</b></h5>
                  <p class="widgets__content">Business advisory service advises current and future businesses prospects of a client, with the aim of</p>
                </div>
                <!--/ .Single Services -->
                <!-- Single Services -->
                <div class="widgets widgets--content-1-l5">
                  <h5 class="widgets__title"><b>Our Product</b></h5>
                  <p class="widgets__content">Business advisory service advises current and future businesses prospects of a client, with the aim of</p>
                </div>
                <!--/ .Single Services -->
                <!-- Single Services -->
                <div class="widgets widgets--content-1-l5">
                  <h5 class="widgets__title"><b>Our Services</b></h5>
                  <p class="widgets__content">Business advisory service advises current and future businesses prospects of a client, with the aim of</p>
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