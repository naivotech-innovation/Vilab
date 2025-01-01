<?php
// Include PHPMailer for sending OTP emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Start session to store user email and OTP
session_start();
 $_SESSION['user_id'] = $user['id'];
include 'backend/db.php';  // Include your database connection

// Initialize variables for messages
$success_message = '';
$error_message = '';

// Check for form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Handle sending OTP
     if (isset($_POST['send_otp'])) {
          $email = $_POST['email'];

          // Check if email exists in the users table
          $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
               // Email exists, generate OTP
               $otp = rand(100000, 999999);  // Generate OTP
               $otp_created_at = date('Y-m-d H:i:s');

               // Save OTP to the database or update if exists
               $stmt = $conn->prepare("INSERT INTO users_otp (email, otp, otp_created_at, is_verified) VALUES (?, ?, ?, 0) ON DUPLICATE KEY UPDATE otp = ?, otp_created_at = ?, is_verified = 0");
               $stmt->bind_param("sssis", $email, $otp, $otp_created_at, $otp, $otp_created_at);
               $stmt->execute();

               // Send OTP via email using PHPMailer
               require 'vendor/autoload.php';  // Ensure you have the PHPMailer library installed
               $mail = new PHPMailer(true);
               try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'vamar1435@gmail.com';  // Replace with your email
                    $mail->Password = 'mdpo uacu rqvo enax';  // Replace with your email password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('your-email@gmail.com', 'Naivotech Innovation Lab');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Your OTP Code for Account Verification';

                    // HTML email body
                    $mail->Body = "
                <html>
                <head>
                    <style>
                        .container {
                            font-family: Arial, sans-serif;
                            line-height: 1.6;
                            color: #333;
                            padding: 20px;
                            background-color: #f9f9f9;
                            border-radius: 5px;
                            width: 90%;
                            margin: 0 auto;
                        }
                        .otp-code {
                            font-size: 24px;
                            font-weight: bold;
                            color: #007bff;
                            margin: 20px 0;
                        }
                        .footer {
                            font-size: 12px;
                            color: #777;
                            margin-top: 30px;
                            text-align: center;
                        }
                        .support-link {
                            color: #007bff;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <p>Dear User,</p>
                        <p>Thank you for choosing <strong>Naivotech Innovation Lab</strong>. To complete the verification process for your account, please use the following One-Time Password (OTP):</p>
                        <p class='otp-code'>$otp</p>
                        <p>This OTP is valid for the next 10 minutes. Please enter it in the verification field to confirm your email.</p>
                        <p>For your security, please <strong>do not share this OTP</strong> with anyone. If you did not request this code, please contact our support team immediately at <a href='mailto:support@vil.co.in' class='support-link'>support@vil.co.in</a>.</p>
                        <p>Thank you again for using <strong>Naivotech Innovation Lab</strong>!</p>
                        <p>Best regards,</p>
                        <p>The <strong>Naivotech Innovation Lab</strong> Team</p>
                        <div class='footer'>
                            <p>Visit our website: <a href='https://vil.co.in' class='support-link'>https://Vil.co.in</a></p>
                            <p>Contact Support: <a href='mailto:support@vil.co.in' class='support-link'>support@vil.co.in</a></p>
                        </div>
                    </div>
                </body>
                </html>";

                    $mail->send();
                    $_SESSION['user_logged_in'] = true;
                    $_SESSION['email'] = $email;  // Store email in session
                    $_SESSION['otp_sent'] = true;  // Set OTP sent flag
                    $success_message = "OTP sent to your email address: $email.<br> Please enter the OTP to verify your email.";
               } catch (Exception $e) {
                    $error_message = "Error in sending OTP: {$mail->ErrorInfo}";
               }
          } else {
               $error_message = "User not found, please enter your correct details.";
          }
     } elseif (isset($_POST['verify_otp'])) {
          $email = $_SESSION['email'];
          $otp = $_POST['otp'];
          $current_time = date('Y-m-d H:i:s');

          // Fetch the stored OTP from the database
          $stmt = $conn->prepare("SELECT otp, otp_created_at FROM users_otp WHERE email = ? AND is_verified = 0");
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();
          $user = $result->fetch_assoc();

          if ($user) {
               $stored_otp = $user['otp'];
               $otp_created_at = $user['otp_created_at'];
               

               // Check if OTP is valid and not expired (valid for 2 minutes)
               $otp_expiry_time = strtotime($otp_created_at) + 300;  // 2 minutes
               if ($stored_otp == $otp && strtotime($current_time) <= $otp_expiry_time) {
                    // OTP is valid, mark as verified
                    $stmt = $conn->prepare("UPDATE users_otp SET is_verified = 1 WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $success_message = "OTP verified successfully! Redirecting to your dashboard...";
                    // Redirect to main.php after successful verification
                    header("refresh:3;url=student/courses.php");
                     $_SESSION['user_id'] = $user['id'];
               }
               else {
                    // OTP expired
                    $stmt = $conn->prepare("UPDATE users_otp SET is_verified = 0 WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $error_message = "Your OTP has expired. Please request a new one.";
                } 
                   
               
          } else {
               $error_message = "User not found or already verified.";
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
     <title>NaivoTech - Virtual Innovation Lab</title>
     <meta name="title" content="NaivoTech - The Best Program to Enroll for Exchange">
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
               .login-section{
                    
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

          .message {
               font-size: 14px;
               color: #fff;
               padding: 10px;
               margin-bottom: 20px;
               border-radius: 5px;
          }

          .error {
               background-color: #e74c3c;
          }

          .success {
               background-color: #2ecc71;
          }
     </style>
</head>

<body>
     <div class="container-fluid form-container">
          <!-- Illustration Section -->
          <div class="login-section form-section">
               <h2 class="main-part">Get Started With <span class="span">Virtual Innovation Lab</span></h2>
               <p class="discription"> Vil lab has features to view and manage academic performance, track your
                    daily activities.</p>

               <img src="assets/images/Robotics-cuate.png" width="700" height="600" alt="Welcome Illustration">
               <p class="mt-3">4k+ Students joined us, now it’s your turn.</p>
          </div>

          <!-- Login and Signup Section -->
          <div class="signup-section form-section">
               <!-- Login Form -->
               <div id="login-form" class="">
                    <h2>Login into Vil lab!</h2>
                    <p>Nice to see you! Please log in with your account.</p>

                    <!-- Display success or error messages -->
                    <?php if (!empty($success_message)): ?>
                         <div class="message success"><?= $success_message ?></div>
                    <?php endif; ?>

                    <?php if (!empty($error_message)): ?>
                         <div class="message error" id="error-message"><?= $error_message ?></div>
                    <?php endif; ?>
                    <!-- PHP to determine which form to show -->
                    <?php if (!isset($_SESSION['otp_sent'])): ?>
                         <!-- HTML Form to send OTP -->
                         <form method="POST" action="">
                              <div class="mb-3">
                                   <label for="email-login" class="form-label">Email address *</label>
                                   <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                              </div>
                              <button type="submit" class="btn btn-primary w-100 mt-2 next" name="send_otp">Send OTP</button>

                         </form>
                    <?php else: ?>
                         <!-- HTML Form to verify OTP -->
                         <form method="POST" action="">
                              <div class="mb-3">
                                   <input type="text" name="otp" class="form-control" placeholder="Enter your OTP" required>
                              </div>

                              <button type="submit" class="btn btn-primary w-100 mt-2 next" name="verify_otp">Verify OTP</button>
                         </form>
                    <?php endif; ?>

                   
                    <div class="or-divider">
                         <span>Or</span>
                    </div>

                    <div class="g_id_signin" data-type="standard"></div>
                    <button class="btn btn-danger btn-google"><i class="fab fa-google"></i> Login with
                         Google</button>
                   

               </div>
          </div>


     </div>


<script>
     // Optional: Script to hide error message after a few seconds
     setTimeout(function() {
               var errorMessage = document.getElementById('error-message');
               if (errorMessage) {
                    errorMessage.style.display = 'none';
               }
          }, 5000);
</script>

</body>

</html>
