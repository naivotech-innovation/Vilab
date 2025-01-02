<?php
session_start();
include('student/db.php'); // Include database connection

// Check if exam_id is passed in the URL
if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];

    // Fetch the exam details from the database
    $query = "SELECT exam_id, title, exam_link, exam_timing FROM exams WHERE exam_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $exam_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $exam = $result->fetch_assoc();
    } else {
        // Redirect if no exam is found
        header('Location: exams.php');
        exit;
    }

    $stmt->close();
} else {
    // Redirect if no exam_id is provided
    header('Location: exams.php');
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Arial', sans-serif;
            color: #444;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
        }

        h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: #fff;
            padding: 30px;
        }

        .card-body h4 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #007bff;
        }

        .card-body p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn {
            font-size: 16px;
            padding: 12px 30px;
            text-align: center;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .exam-link {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }

        .exam-link:hover {
            text-decoration: underline;
        }

        .card-body hr {
            border-color: #ddd;
        }

        .ready-to-start {
            text-align: center;
            margin-top: 40px;
        }

        .ready-to-start p {
            font-size: 18px;
            color: #555;
        }
    </style>

    <script>
        // Prevent the user from going back to the previous page
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
</head>

<body onload="noBack();">

    <div class="container">
        <h2>Start Exam: <?php echo htmlspecialchars($exam['title']); ?></h2>

        <div class="card">
            <div class="card-body">
                <h4>Exam Details</h4>
                <p><strong>Title:</strong> <?php echo htmlspecialchars($exam['title']); ?></p>
                <p><strong>Exam Timing:</strong> <?php echo date("d M Y, h:i A", strtotime($exam['exam_timing'])); ?></p>
                

                <hr>

                <div class="ready-to-start">
                    <h5>Ready to Start?</h5>
                    <p>The exam will begin at the scheduled time. Click the button below when you're ready to start.</p>
                    <!-- Start Exam Button -->
                    <a href="take_exam.php?exam_id=<?php echo $exam['exam_id']; ?>" class="btn btn-success">Start Exam</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
