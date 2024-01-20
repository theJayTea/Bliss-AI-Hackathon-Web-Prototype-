<?php 
include 'connection.php';

if(isset($_SESSION['id'])) {
    header ('location: index.php');
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $fetch = mysqli_query($conn, "SELECT * FROM student_account WHERE email = '$name' or username = '$name'");
    $row = mysqli_fetch_assoc($fetch);

    $fetch2 = mysqli_query($conn, "SELECT * FROM tutor_account WHERE email = '$name' or username = '$name'");
    $row2 = mysqli_fetch_assoc($fetch2);


    if(mysqli_num_rows($fetch) > 0) {
        if($password == $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['studentid'];
            $_SESSION['type'] = 'student';
            header ('location: index.php');
        }
        else {
            echo "<div style='background-color:red; height: 30px; width: 100%; z-index: 5;'>Incorrect password<center></center></div>";
        }
    }
    elseif(mysqli_num_rows($fetch2) > 0) {
      if($password == $row2['password']) {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row2['tutorid'];
        $_SESSION['type'] = 'tutor';
        header ('location: index.php');
    }
    }
    else {
        echo "<div style='background-color:red; height: 30px; width: 100%; z-index: 5;'>User does not exist</center></center></div>";
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






<div class="form-container bg-default-3 position-relative">
  <div class="container position-static">
    <div class="row align-items-center justify-content-center">
      <div class="col-xl-6 col-lg-5 position-static d-none d-lg-block" style="position:static; height: 120vh;">
        <div class="form-image position-absolute bg-image" style="background-image: url(./img/background.jpg); height: 120vh;">
        </div>
      </div>
      <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-xs-10">
        <div class="section-title" style="padding-bottom:60px;">
          <h2 class="title-heading"style="padding-bottom:20px; padding-top:50px;">Log in to Paradigm</h2>
          <p class="title-description">Access our online video-chat with tutors, our tasks and assessments, and our own personalised AI</p>
        </div>
        <div class="form-box">
          <div class="contact-form">
            <form method="post">
            <div class="form-floating">
                    <input class="form-control" name="name" type="text" placeholder="Your Name" id="floatinginput">
                    <label for="floatinginput">Your Username or Email</label>
                  </div>

                  <div class="form-floating">
                    <input class="form-control" type="password" name="password" placeholder="Your Password" id="floatinginput7">
                    <label for="floatinginput7">Your Password</label>
                  </div>
                
              <button class="btn btn-primary shadow--primary-5 btn--lg-2 rounded-55 text-white mt-2" name="submit">Sign Up</button>
            </form>
          </div>
          <div class="buttons mt-6 aos-init" style="margin-top: 50px;">
            <p class="ms-2">Already a member?<a class="btn-link--2 text-electric-violet-2 ms-2" href="login.php">Sign In</a>
            </p>
            <p class="ms-2">Want to be a tutor?<a class="btn-link--2 text-electric-violet-2 ms-2" href="teacherrequest.php">Apply here</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>
