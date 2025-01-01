<?php
session_start();
include('student/db.php');  // Include your database connection file

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

$user_id = $_SESSION['user_id'];  // Get the logged-in user's ID
$class_id = $_GET['class_id'] ?? null;  // Get the class ID from the URL query string

// Validate class_id
if (!$class_id) {
    header("Location: /student-dashboard.php?error=class_id_missing"); // Redirect if class_id is missing
    exit();
}

// Fetch class details from the database (including scheduled time)
$sql = "SELECT cs.scheduled_time, cs.status, c.title, cs.meeting_link, c.instructor
        FROM class_schedule cs
        JOIN courses c ON cs.course_id = c.id
        WHERE cs.course_id = ? AND cs.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $class_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

$class = $result->fetch_assoc();

// Handle class not found scenario
if (!$class) {
    header("Location: /student-dashboard.php?error=class_not_found"); // Redirect if class is not found
    exit();
}

// Check if the scheduled time has passed
$current_time = new DateTime();
$scheduled_time = new DateTime($class['scheduled_time']);
$is_class_started = ($current_time >= $scheduled_time);

// Close DB connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Class - <?= htmlspecialchars($class['title']); ?></title>

    <!-- Bootstrap CSS for responsive design -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6Q6n8gR1HYO8C9EJkaQ6h1BLjbbhfEHEQ4n0fg+G5nrtf5FZnbqz7SvFcj" crossorigin="anonymous">

    <!-- Custom CSS for styling -->
    <style>
        body {
            background: linear-gradient(135deg, #0e4b76, #1d1f2e); /* Blue to Black gradient */
            color: #fff;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 5px;
            text-align: center;
            width: 80%; /* Ensure links are block level on small screens */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover/active states */
        }

        a.btn-success {
            background-color: #28a745;
            color: white;
        }

        a.btn-success:hover {
            background-color: #218838;
            color: white;
        }

        a.btn-success:active {
            background-color: #1e7e34;
        }

        a.btn-primary {
            background-color: #007bff;
            color: white;
        }

        a.btn-primary:hover {
            background-color: #0056b3;
            color: white;
        }

        a.btn-primary:active {
            background-color: #004085;
        }

        .container {
            max-width: 800px;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
            border-radius: 10px;
            text-align: center;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .alert {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn-lg {
            font-size: 1.2rem;
            padding: 15px 30px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .countdown-timer {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 20px;
            color: #e74c3c;
        }

        .countdown-finished {
            color: #2ecc71;
        }

        .back-btn {
            margin-top: 30px;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem; /* Adjust title font size for small devices */
            }

            .btn-lg {
                font-size: 1rem; /* Adjust button size for small devices */
                padding: 12px 25px; /* Adjust button padding */
            }

            .countdown-timer {
                font-size: 1.5rem; /* Adjust countdown font size */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Join Class: <?= htmlspecialchars($class['title']); ?></h1>

        <div class="class-info">
            <?php if ($is_class_started): ?>
                <p class="alert alert-success">Class has started! You can join now.</p>
                <a href="<?= htmlspecialchars($class['meeting_link']); ?>" class="btn btn-success btn-lg" target="_blank">
                    Join Class Now
                </a>
            <?php else: ?>
                <p class="alert alert-warning">Class has not started yet.</p>
                <p>Scheduled time: <?= $scheduled_time->format('Y-m-d H:i:s'); ?></p>
                <button class="btn btn-secondary btn-lg" disabled>Join Class</button>
                <p class="mt-3">You will be able to join when the class starts.</p>

                <!-- Countdown timer displayed if class is not started -->
                <div id="countdown" class="countdown-timer">
                    Countdown: Calculating...
                </div>
            <?php endif; ?>
        </div>

        <div class="back-btn">
            <a href="student-dashboard.php" class="btn btn-primary btn-lg">Back to Dashboard</a>
        </div>
    </div>

    <!-- Optional: Countdown timer with JS -->
    <?php if (!$is_class_started): ?>
        <script>
            var scheduledTime = new Date("<?= $scheduled_time->format('Y-m-d H:i:s'); ?>").getTime();
            var countdown = setInterval(function() {
                var now = new Date().getTime();
                var distance = scheduledTime - now;

                // Time calculations
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the countdown
                document.getElementById("countdown").innerHTML = "Countdown: " + hours + "h " + minutes + "m " + seconds + "s ";

                // If the countdown ends, update the countdown text and enable the button
                if (distance < 0) {
                    clearInterval(countdown);
                    document.getElementById("countdown").innerHTML = "Class has started!";
                    document.getElementById("countdown").classList.add('countdown-finished');
                }
            }, 1000);
        </script>
    <?php endif; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
