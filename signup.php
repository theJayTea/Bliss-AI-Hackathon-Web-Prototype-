<?php
include 'connection.php';

if(isset($_SESSION['id'])) {
    header ('location: index.php');
}

 if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $language1 = $_POST['language1'];
    $language2 = $_POST['language2'];
    $language3 = $_POST['language3'];
    $grade = $_POST['grade'];
    $query = mysqli_query($conn, "SELECT * FROM student_account WHERE username = '$name' or email = '$email'");
    if(mysqli_num_rows($query) > 0) {
        // echo "<div style='background-color:red; height: 30px; width: 100%; z-index: 5;'>username or email has already been taken<center></center></div>";
        echo "<script>alert('username or email has already been taken');</script>";
    }
    else {
        if(!empty($email) && !empty($password) && !empty($name) && !empty($password2) && !empty($language1)) {
            $fetch = mysqli_query($conn, "SELECT * FROM student_account WHERE email = '$email' or username = '$name'");
            $row = mysqli_fetch_assoc($fetch);
            if(mysqli_num_rows($fetch) == 0) {
                if($password == $password2) {
                    mysqli_query($conn, "INSERT INTO student_account VALUES('', '$name', '$email', '$password', '$grade', '$language1', '$language2', '$language3')");
                    $_SESSION['login'] = true;
                    $_SESSION['type'] = 'student';
                    $fetsch = mysqli_query($conn, "SELECT * FROM student_account WHERE username = '$name'");
                    $temp = mysqli_fetch_array($fetsch);
                    $_SESSION['id'] = $temp['studentid'];
                    header ('location: index.php');
                  }
                  else {
                    echo "<script>alert('your passwords do not match');</script>";
                    // echo "<div style='background-color:red; height: 30px; width: 100%; z-index: 5;'>your passwords do not match<center></center></div>";
                  }
            }


        }
    }
}

?>

<html lang="en" data-theme="light" style="color-scheme: light;"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="account.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>



  </title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  <!-- Custom stylesheet -->

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
        <a class="nav-link" href="">Manage Requests</a>
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
        <div class="form-image position-absolute bg-image" style="background-image: url(./img/background.jpg); height: 200vh;">
        </div>
      </div>
      <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-xs-10">
        <div class="section-title" style="padding-bottom:60px;">
          <h2 class="title-heading"style="padding-bottom:20px; padding-top:50px;">Sign Up to Paradigm</h2>
          <p class="title-description">Get access to our online video-chat with tutors, our tasks and assessments, and our own personalised AI</p>
        </div>
        <div class="form-box">
          <div class="contact-form">
            <form method="post">
              <div class="form-floating">
                <input class="form-control" name="name" type="text" placeholder="Your Name">
                <label>Your Full Name</label>
              </div>
              <div class="form-floating">
                <input class="form-control" name="email" type="email" placeholder="Your Email">
                <label>Your Email</label>
              </div>
              <div class="form-floating">
                <input class="form-control" type="text" name="grade" placeholder="Confirm Your Password">
                <label>Your School Grade/Standard</label>
              </div>
              <div class="form-floating">
                <input class="form-control" type="text" name="language1" placeholder="Confirm Your Password">
                <label>Your First Language</label>
              </div>
              <div class="form-floating">
                <input class="form-control" type="text" name="language2" placeholder="Confirm Your Password">
                <label>Your Second Language (Optional)</label>
              </div>
              <div class="form-floating">
                <input class="form-control" type="text" name="language3" placeholder="Confirm Your Password">
                <label>Your Third Language (Optional)</label>
              </div>
              <div class="form-floating">
                <input class="form-control" type="password" name="password" placeholder="Your Password">
                <label>Your Password</label>
              </div>
              <div class="form-floating">
                <input class="form-control" type="password" name="password2" placeholder="Confirm Your Password">
                <label>Confirm Your Password</label>
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