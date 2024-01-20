<?php 
include 'connection.php';

if(isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
    if($type == 'tutor') {
      header ('location: index.php');
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



        


        <div class="container">
                <center><div class="header" style="margin-top: 100px; font-size:45px; margin-bottom: 30px;">Teacher Availability.</div></center>
                <center><div class="header" style="margin-top: 10px; font-size:22px; margin-bottom: 100px;">Check when the tutors you want to meet are free, and request a meeting with them.</div></center>
                
            
                <div class="row">
                    <div class="col">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Subjects Taught</th>
                                <th scope="col">Availability</th>
                            </tr>
                        </thead>
                        <tbody class="">
                             


                            <?php

                            if(isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];

                            // Fetch language1, language2, and language3 values
                            $studentData = mysqli_query($conn, "SELECT language1, language2, language3 FROM student_account WHERE studentid = $id");
                            $row = mysqli_fetch_assoc($studentData);

                            $studentlanguage1 = $row['language1'];
                            $studentlanguage2 = $row['language2'];
                            $studentlanguage3 = $row['language3'];

                            // Use mysqli_real_escape_string to prevent SQL injection
                            $id = mysqli_real_escape_string($conn, $id);
                            $studentlanguage1 = mysqli_real_escape_string($conn, $studentlanguage1);
                            $studentlanguage2 = mysqli_real_escape_string($conn, $studentlanguage2);
                            $studentlanguage3 = mysqli_real_escape_string($conn, $studentlanguage3);

                            // Construct the query with proper quoting
                            $result = mysqli_query($conn, "SELECT * FROM tutor_account WHERE busy = 'no' AND
                                (language1 = '$studentlanguage1' OR
                                language1 = '$studentlanguage2' OR
                                language1 = '$studentlanguage3' OR
                                language2 = '$studentlanguage1' OR
                                language2 = '$studentlanguage2' OR
                                language2 = '$studentlanguage3' OR
                                language3 = '$studentlanguage1' OR
                                language3 = '$studentlanguage2' OR
                                language3 = '$studentlanguage3')");

                            $count = 0;
                            while($row = mysqli_fetch_array($result)) {
                                $count = $count + 1;
                                echo "
                                
                                <tr class='{$count}'>
                                
                                    <th scope='row'>{$count}</th>
                                    <td>{$row['username']}</td>
                                    <td>{$row['subject1']}, {$row['subject2']}, and {$row['subject3']}</td>
                                    <td>{$row['availability']}</td>
                                    
                                </tr>

                                <script>
                                    \$(document).ready(function() {
                                        $('.{$count}').click(function() {
                                            window.location = 'requestmeeting.php?id={$row['tutorid']}';
                                        });
                                    });
                                </script>
                                
                                ";
                                }
                            }
                            else {
                              $result = mysqli_query($conn, "SELECT * FROM tutor_account WHERE busy = 'no'");

                              $count = 0;
                              while($row = mysqli_fetch_array($result)) {
                                  $count = $count + 1;
                                  echo "
                                  
                                  <tr class='{$count}'>
                                  
                                      <th scope='row'>{$count}</th>
                                      <td>{$row['username']}</td>
                                      <td>{$row['subject1']}, {$row['subject2']}, and {$row['subject3']}</td>
                                      <td>{$row['availability']}</td>
                                      
                                  </tr>
                              
                                  <script>
                                      \$(document).ready(function() {
                                          $('.{$count}').click(function() {
                                              window.location = 'requestmeeting.php?id={$row['tutorid']}';
                                          });
                                      });
                                  </script>
                                  
                                  ";
                              }
                              
                            }
                            
                            
                            ?>
                        </tbody>
                    </table>

                    </div>
                </div>
            <div>
                        </body>
                        </html>