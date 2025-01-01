<?php
session_start();
include 'backend/db.php'; // Include your database connection file

// Get the Google token from the POST request
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'];

// Verify the token using Google's API
$client = new Google_Client(['client_id' => '102905171171-ic2btlm5h937jaou45mdlnl83lq88mak.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($token);

if ($payload) {
  $userid = $payload['sub'];
  $email = $payload['email'];
  $name = $payload['name'];

  // Check if the user already exists in the database
  $query = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // User exists, log them in
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
  } else {
    // User does not exist, create a new account
    $query = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $name, $email);
    $stmt->execute();

    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
  }

  echo json_encode(['status' => 'success']);
} else {
  echo json_encode(['status' => 'error']);
}
?>
