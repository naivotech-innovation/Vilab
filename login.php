<?php
session_start();
include 'backend/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user email exists in the database
    if (isset($_POST['check_email'])) {
        $email = $_POST['email'];

        // Query to check if the email exists in the database
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // If email exists, store email and indicate email found
            $user = $result->fetch_assoc();
            $_SESSION['email_found'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
        } else {
            // If email doesn't exist, redirect to the signup page
            $_SESSION['email'] = $email;
            $_SESSION['error'] = "Email not found. Please sign up.";
            header('Location: signup.php');
            exit();
        }
    }

    // Login with password
    elseif (isset($_POST['login_with_password'])) {
        $email = $_POST['email']; // Use the email entered in the login form
        $password = $_POST['password'];

        // Query to check if the email exists in the database
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Set session variables after successful login
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $user['name'];
                header("Location: student/courses.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid password.";
            }
        } else {
            $_SESSION['error'] = "Invalid email or password.";
        }
    }

    // Login with OTP
    elseif (isset($_POST['login_with_otp'])) {
        $email = $_SESSION['email'];

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            header('Location: otp.php');
            exit();
        } else {
            $_SESSION['error'] = "Email not found.";
            header('Location: signup.php');
            exit();
        }
    }

    // Login with school code and student code
    elseif (isset($_POST['login_with_schoolcode'])) {
        $school_code = $_POST['school-code'];
        $student_code = $_POST['student-code'];

        $query = "SELECT * FROM schoolusers WHERE school_code = ? AND student_code = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $school_code, $student_code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            header('Location: School_students\student_dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = "User not found.";
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--- primary meta tag-->
     <title>Login - Student</title>
     <meta name="title" content="Login-Student">
     <meta name="NaivoTech aims to integrate experiential learning and technology at the core of academic curricula by establishing Innovation Labs in schools. These labs provide students with hands-on opportunities to work with tools and equipment, enabling them to better understand the what, how, and why aspects of STEM subjects"
          content="ntvilabs, vil, villabs, Vilabs, Virtual Innovation lab, Naivotech, naivotechlab, vilnaivotech,vilnaivo, vilnaivo, ntvillabs, villabs , labs, virtual labs, villabs, lab, virtual, labinnovtion, vilabs ">



     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
     <!-- 
    - custom js link
  -->
     <script src="./assets/js/script_main.js" defer></script>
     <script src="https://apis.google.com/js/platform.js" async defer></script>

     <!--- ionicon link-->

     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

     <!-- 
  - google font link
-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/17902915d3.js" crossorigin="anonymous"></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
          rel="stylesheet">
     <script src="https://accounts.google.com/gsi/client" async defer></script>
     <style>
          @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

          @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

          body {}

          .form-container {
               display: flex;
               justify-content: space-between;
               align-items: center;
               height: 100vh;
               width: 100%;
               padding: 0;
          }

          .form-container .span {
               color: #1db99f;
               font-family: "Lato", sans-serif;
               font-weight: 800;
               font-size: 30px;
          }

          .form-container .discription {
               margin-top: 0;
               color: #1a202c;
               display: block;
          }

          .form-container .discription_two {
               margin-top: 0;
               color: #1a202c;
               display: none;
          }


          .form-section {
               flex: 1;
               padding: 50px;
               background-color: white;
               display: flex;
               justify-content: center;
               flex-direction: column;
          }

          .form-section h2 {
               margin-bottom: 2px;
               font-family: "Lato", sans-serif;
               font-weight: 800;
               font-style: normal;
               font-size: 30px;

          }

          .form-section img {
               width: 100%;
               max-width: 400px;
          }

          .login-section {
               background-color: #dde7ff;
               height: 100%;
               justify-content: center;
               align-items: center;
          }

          .main-part {
               color: #525252;
               font-weight: 600;
          }

          .signup-section {
               background-color: #fff;
               height: 100%;
               justify-content: center;
               align-items: center;
          }

          .signup-section img {
               width: 150px;
               height: 80px;
               margin-top: -40px;
               margin-bottom: 60px;
               margin-left: -10px;
               display: block;
          }

          .form-section form {
               width: 100%;
               max-width: 400px;
          }

          .btn-google,
          .btn-School {
               margin-top: 10px;
               width: 100%;
          }

          .or-divider {
               text-align: center;
               margin: 20px 0;
               position: relative;
          }

          .or-divider span {
               background: white;
               padding: 0 10px;
               position: relative;
               z-index: 1;
          }

          .or-divider::before {
               content: "";
               width: 100%;
               height: 1px;
               background: #ddd;
               position: absolute;
               left: 0;
               top: 50%;
          }

          .hidden {
               display: none;
          }

          #show-login,
          #show-signup,
          a {
               text-decoration: none;
               margin-left: 10px;
          }


          /*button stye here */

          .next,
          .btn-google1 {
               background-color: #1ab79d;
          }

          .next:hover {
               background-color: #18a08a;
          }

          .next:focus {
               border: none;
          }

          .btn-google {
               background-color: #983559;
          }




          .form-container {
               display: flex;
               justify-content: space-between;
               align-items: center;
               height: 100vh;
               width: 100%;
               padding: 0;
               flex-wrap: wrap;
               /* Ensures the elements wrap on smaller screens */
          }

          /* Adjust for medium screens */
          @media (max-width: 768px) {
               .form-container {
                    flex-direction: column;
                    /* Stack elements vertically */
                    justify-content: center;
                    height: auto;
                    /* Adjust height */
                    padding: 20px;
                    /* Add padding */
               }

               .form-section {

                    padding: 20px;
                    max-width: 100%;
               }

               .form-section img {
                    height: 300px;
                    /* Scale the image */
                    margin: 0 auto;
                    /* Center the image */
               }
          }

          /* Adjust for small screens */
          @media (max-width: 480px) {
               .form-section h2 {
                    font-size: 22px;
                    /* Adjust font size */
               }

               .form-container .discription {
                    margin-top: 0;
                    color: #1a202c;
                    display: none;
               }

               .form-container .discription_two {
                    margin-top: 0;
                    color: #1a202c;
                    display: block;
               }

               .form-section .span {
                    font-size: 22px;
               }

               .form-section img {
                    height: 100px;
                    width: 100px;
                    /* Further scale the image */
               }

               .form-section {

                    border-radius: 10px;
                    padding: 20px;

               }
          }
     </style>
</head>


<body id="top" onload="myFunction()" style="margin:0;">
     <!--LOADER-->
     <!--<div class="letter-container" id="loader">
    <div class="letter-n">
      <div class="vertical left"></div>
      <div class="diagonal"></div>
      <div class="vertical right"></div>
    </div>
  </div>--->

     <!-- 
    - #HEADER
  -->
     <div style="display:block;" id="myDiv" class="animate-bottom">

          <div class="container-fluid form-container">
               <!-- Illustration Section -->
               <div class="login-section form-section">
                    <h2 class="main-part">Get Started With <span class="span">Virtual Innovation Lab</span></h2>
                    <p class="discription"> Vil lab has features to view and manage academic performance, track your
                         daily activities.</p>
                    <p class="discription_two">"Vilab is a platform where you can learn new things."</p>

                    <img src="assets/images/Programming-pana.png" width="700" height="600" alt="Welcome Illustration">
                    <p class="mt-3">4k+ Students joined us, now it’s your turn.</p>
               </div>

               <!-- Login and Signup Section -->
               <div class="signup-section form-section">
                    <!-- Login Form -->
                    <div id="login-form" class="">
                         <h2>Login into Vil lab!</h2>
                         <p>Nice to see you! Please log in with your account.</p>

                         <?php
                         if (isset($_SESSION['error'])) {
                              echo "<p id='error-message' style='color: red;'>{$_SESSION['error']}</p>";
                              unset($_SESSION['error']);
                         }
                         ?>

                         <?php if (!isset($_SESSION['email_found'])): ?>
                              <!-- Email input form -->
                              <form id="check_email_form" action="login.php" method="POST">
                                   <div class="mb-3">
                                        <label for="email-login" class="form-label">Email address *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                             required>
                                   </div>

                                   <button class="btn btn-primary w-100 mt-2 next" type="submit"
                                        name="check_email">Next</button>
                              </form>


                              <div class="d-flex justify-content-between mt-2">
                                   <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" id="rememberLogin">
                                        <label class="form-check-label" for="rememberLogin">Remember me</label>
                                   </div>
                                   <a href="forgot.php">Forgot password?</a>

                              </div>
                              <div class="or-divider">
                                   <span>Or</span>
                              </div>

                              <div class="g_id_signin" data-type="standard"></div>
                              <button class="btn btn-danger btn-google"><i class="fab fa-google"></i> Login with
                                   Google</button>
                              <button type="button" class="btn btn-primary btn-School" id="show-school"><i
                                        class="fa fa-graduation-cap"></i> Login with School Code</button>
                         <?php endif; ?>



                         <?php if (isset($_SESSION['email_found'])): ?>
                              <!-- Password input form, shown if email is found -->
                              <form id="login_with_password_form" action="login.php" method="POST">
                                   <div class="mb-3">
                                        <input type="email" name="email" class="form-control mb-2"
                                             value="<?php echo $_SESSION['email']; ?>">
                                        <label for="password-login" class="form-label">Password *</label>
                                        <input type="password" class="form-control" name="password"
                                             placeholder="Enter your password" required>
                                   </div>

                                   <button class="btn btn-primary w-100 mt-3 next" type="submit" name="login_with_password">Sign
                                        In with Password</button><br>
                                   <button class="btn btn-primary w-100 mt-3" type="button" onclick="window.location.href='otp.php';">Sign In
                                        with OTP</button>
                                   <div class="d-flex justify-content-between mt-2">
                                        <div class="form-check ">
                                             <input class="form-check-input" type="checkbox" id="rememberLogin">
                                             <label class="form-check-label" for="rememberLogin">Remember me</label>
                                        </div>
                                        <a href="forgot.php" >Forgot password?</a>

                                   </div>
                                   <div class="or-divider">
                                        <span>Or</span>
                                   </div>

                                   <div class="g_id_signin" data-type="standard"></div>
                                   <button class="btn btn-danger btn-google"><i class="fab fa-google"></i> Login with
                                        Google</button>
                                   <button type="button" class="btn btn-primary btn-School" id="show-school"><i
                                             class="fa fa-graduation-cap"></i> Login with School Code</button>
                              </form>
                         <?php endif; ?>


                    </div>
                    <!-- School login form -->
                    <div id="School-form" class="hidden">
                         <h2>Login With Your School Code</h2>
                         <p>Nice to see you! Please log in with your School Code.</p>


                         <form action="login.php" method="post">
                              <input type="hidden" name="action" value="school_code">
                              <div class="mb-3">
                                   <label for="school-code" class="form-label">School Code *</label>
                                   <input type="text" class="form-control" id="school-code" name="school-code"
                                        placeholder="like. NaivoIR098">
                              </div>
                              <div class="mb-3">
                                   <label for="student-code" class="form-label">Student Code *</label>
                                   <input type="text" class="form-control" id="student-code" name="student-code"
                                        placeholder="Student Code">
                              </div>
                              <button type="submit" class="btn btn-primary w-100 mt-3 next" name="login_with_schoolcode">Login</button>

                         </form>
                    </div>

                    
               </div>
          </div>
     </div>


     <!-- Scripts -->
     <script>
          function showOtpForm() {
               document.getElementById('login_with_password_form').style.display = 'none';
               document.getElementById('login_with_otp_form').style.display = 'block';
          }

          function showPasswordForm() {
               document.getElementById('login_with_otp_form').style.display = 'none';
               document.getElementById('login_with_password_form').style.display = 'block';
          }

          // Optional: Script to hide error message after a few seconds
          setTimeout(function() {
               var errorMessage = document.getElementById('error-message');
               if (errorMessage) {
                    errorMessage.style.display = 'none';
               }
          }, 5000);
     </script>

     <script>
          document.getElementById('show-school').onclick = function() {
               document.getElementById('login-form').classList.add('hidden');
               document.getElementById('School-form').classList.remove('hidden');

          };

          document.getElementById('show-forgot').onclick = function() {
               document.getElementById('login-form').classList.add('hidden');
               document.getElementById('School-form').classList.add('hidden');
               document.getElementById('forgot-form').classList.remove('hidden');
          };
          document.getElementById('show-login').onclick = function() {
               document.getElementById('login-form').classList.remove('hidden');
               document.getElementById('School-form').classList.add('hidden');
               document.getElementById('forgot-form').classList.add('hidden');
          };
          document.getElementById('show-login1').onclick = function() {
               document.getElementById('login-form').classList.remove('hidden');
               document.getElementById('School-form').classList.add('hidden');
               document.getElementById('forgot-form').classList.add('hidden');
          };
     </script>


     <script>
          function showOtpForm() {
               document.getElementById('login_with_password_form').style.display = 'none';
               document.getElementById('login_with_otp_form').style.display = 'block';
          }

          function showPasswordForm() {
               document.getElementById('login_with_otp_form').style.display = 'none';
               document.getElementById('login_with_password_form').style.display = 'block';
          }

          function handleCredentialResponse(response) {
               const responsePayload = decodeJwtResponse(response.credential);
               console.log("ID: " + responsePayload.sub);
               console.log('Full Name: ' + responsePayload.name);
               console.log('Given Name: ' + responsePayload.given_name);
               console.log('Family Name: ' + responsePayload.family_name);
               console.log("Image URL: " + responsePayload.picture);
               console.log("Email: " + responsePayload.email);

               // You can send the token to your backend server for further verification and login process
               const xhr = new XMLHttpRequest();
               xhr.open("POST", "google_login.php", true);
               xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
               xhr.onload = function() {
                    if (xhr.status === 200) {
                         window.location.href = "main.php";
                    } else {
                         console.error('Error during Google Sign-In');
                    }
               };
               xhr.send(JSON.stringify({
                    token: response.credential
               }));
          }

          function decodeJwtResponse(token) {
               const base64Url = token.split('.')[1];
               const base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
               const jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
                    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
               }).join(''));
               return JSON.parse(jsonPayload);
          }
     </script>
     
     
     <script>
window.addEventListener("beforeunload", function () {
    // Send a request to the server to clear the email session when closing the tab
    navigator.sendBeacon("logout.php");
});
</script>



</body>

</html>
