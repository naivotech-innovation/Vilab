<?php
session_start();
include 'backend/db.php';

// Check if email is set in the session, otherwise redirect to login
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header('Location: login.php');
    exit();
}

// Handle the signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert new user into the database
    $query = "INSERT INTO users (email, name, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $email, $name, $phone, $password);

    if ($stmt->execute()) {
        // Set session variables and redirect to login
        $_SESSION['user_logged_in'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        header('Location: student/courses.php'); // Redirect to main page after successful signup
        exit();
    } else {
        $_SESSION['error'] = "Signup failed. Please try again.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login and Signup</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/17902915d3.js" crossorigin="anonymous"></script>
     <style>
          body {
               background-color: #f5f7fa;
          }

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
               .discription_two{
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

<body>

     <body id="top" onload="myFunction()" style="margin:0;">
          <!--LOADER-->
          <div class="letter-container" id="loader">
               <div class="letter-n">
                    <div class="vertical left"></div>
                    <div class="diagonal"></div>
                    <div class="vertical right"></div>
               </div>
          </div>



          <div style="display:block;" id="myDiv" class="animate-bottom">

               <div class="container-fluid form-container">
                    <!-- Illustration Section -->
                    <div class="login-section form-section">
                         <h2>Get Started With <span>Virtual Innovation Lab</span></h2>
                         <p class="discription"> Vil lab has features to view and manage academic performance, track your daily activities.</p>

                         <img src="image/Programming-pana.png" width="700" height="600" alt="Welcome Illustration">
                         <p class="mt-3">4k+ Students joined us, now it s your turn.</p>
                    </div>

                    <div class="signup-section form-section">
                         <!-- Signup Form -->
                         <div id="signup-form">
                              <h2>Create Your Account</h2>
                              <p>Welcome! Please sign up to join our community.</p>

                              <!-- Display error message if it exists -->
                              <?php if (isset($_SESSION['error'])): ?>
                                   <p><?php echo $_SESSION['error'];
                                        unset($_SESSION['error']); ?></p>
                              <?php endif; ?>
                              <form method="POST" action="signup.php">
                                   <input type="hidden" name="action" value="signup">
                                   <div class="mb-3">
                                        <label for="email-signup" class="form-label">Email address *</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>

                                   </div>
                                   <div class="mb-3">
                                        <label for="name-signup" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="name-signup" class="form-label">Contact *</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="password-signup" class="form-label">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                                        <small class="form-text text-muted">Your password must be 8 characters at least.</small>
                                   </div>
                                   <div class="mb-3">
                                        <label for="confirm-password" class="form-label">Confirm Password *</label>
                                        <input type="password" class="form-control" id="re-password" name="re-password" required placeholder="Re-Password">
                                   </div>
                                   <button type="submit" class="btn btn-primary w-100 next">Sign Up</button>
                                   <div class="or-divider">
                                        <span>Or</span>
                                   </div>
                                   <button class="btn btn-danger btn-google"><i class="fab fa-google"></i> Sign Up with Google</button>

                                   <p class="text-center mt-3">Already have an account? <a href="#" id="show-login">Login here</a></p>
                              </form>
                         </div>



                    </div>


               </div>






               <script>
                    document.addEventListener('DOMContentLoaded', function() {
                         const form = document.querySelector('form');
                         const password = document.querySelector('input[name="password"]');
                         const rePassword = document.querySelector('input[name="re-password"]');
                         const submitButton = document.querySelector('button.sign-button');

                         form.addEventListener('submit', function(event) {
                              if (password.value !== rePassword.value) {
                                   alert('Passwords do not match.');
                                   event.preventDefault(); // Prevent form submission
                              }
                         });
                    });
               </script>




               <!-- 
- #BACK TO TOP
-->

               <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
                    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
               </a>


          </div>

          <!--========================================
FIXED Buttons
========================================-->

          <div class="fixed-button">
               <a href="#" class="fixed-btn one">
                    <img src="assets/images/images/telephone.png" alt=""></a>

               <a class="fixed-btn" aria-label="Chat on WhatsApp" href="https://wa.me/917355295772">
                    <img alt="Chat on WhatsApp" src="assets/images/images/whatsapp1.png" /></a>


          </div>


          <script>
               var myVar;

               function myFunction() {
                    myVar = setTimeout(showPage, 1000);
               }

               function showPage() {
                    document.getElementById("loader").style.display = "none";
                    document.getElementById("myDiv").style.display = "block";
               }
          </script>
          <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
          <!-- 
    - custom js link
  -->
          <script src="./assets/js/script_main.js" defer></script>
          <script src="./assets/js/contact.js" defer></script>

          <!--- ionicon link-->

          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


     </body>

</html>
