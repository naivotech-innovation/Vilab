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

// Dummy questions array (for demonstration purposes)
$questions = [
    ['question' => 'What is the capital of France?', 'options' => ['Paris', 'London', 'Rome', 'Berlin'], 'correct' => 'Paris'],
    ['question' => 'What is 2 + 2?', 'options' => ['3', '4', '5', '6'], 'correct' => '4'],
    ['question' => 'Who wrote "Hamlet"?', 'options' => ['Shakespeare', 'Dickens', 'Austen', 'Hemingway'], 'correct' => 'Shakespeare'],
    ['question' => 'What is the color of the sky?', 'options' => ['Blue', 'Green', 'Red', 'Yellow'], 'correct' => 'Blue']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
/* General Styling */
body {
    font-family: 'Arial', sans-serif;
    background: #f4f6f9;
    color: #333;
    padding: 0;
    margin: 0;
}

.container {
    max-width: 1200px;
    margin-top: 50px;
}

/* Exam Container */
.exam-container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Question Styling */
.question {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.options {
    margin-left: 30px;
}

.option-label {
    font-size: 16px;
}

/* Button Styling */
.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Timer Styling */
.timer {
    font-size: 20px;
    font-weight: bold;
    color: #007bff;
    text-align: right;
}

/* Popup Alert */
.fullscreen-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.fullscreen-popup.active {
    display: flex;
}

.fullscreen-popup h4 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}

/* Answered Question Highlight */
.answered {
    background-color: #e1ffe1; /* Light green */
}
</style>

    <script>
        let timeLeft = 300; // 5 minutes for demo
        let timer;
        let questionsAnswered = [];

        // Function to start the exam timer
        function startTimer() {
            timer = setInterval(function () {
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    alert('Time is up!');
                    document.getElementById("examForm").submit();
                } else {
                    let minutes = Math.floor(timeLeft / 60);
                    let seconds = timeLeft % 60;
                    document.getElementById('timer').textContent = minutes + "m " + seconds + "s";
                    timeLeft--;
                }
            }, 1000);
        }

        // Function to request full screen
        function enterFullscreen() {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        }

        // Start fullscreen and timer after exam starts
        function onStartExam() {
            const popup = document.getElementById('fullscreenPopup');
            popup.classList.remove('active');
            enterFullscreen(); // Enter fullscreen
            startTimer(); // Start the timer
        }

        // Handle question answer submission
        function markQuestionAnswered(questionIndex) {
            if (!questionsAnswered.includes(questionIndex)) {
                questionsAnswered.push(questionIndex);
                const questionContainer = document.getElementById('question_' + questionIndex);
                questionContainer.classList.add('answered');
            }
        }

        // Disable context menu and keyboard shortcuts (Esc, F12)
        function disableContextMenuAndShortcuts(event) {
            if (event.type === 'contextmenu') {
                event.preventDefault();
            }
            if (event.key === "Escape" || event.key === "F12") {
                event.preventDefault();
                alert('You are in exam mode, please don’t exit!');
            }
        }

        document.addEventListener("keydown", disableContextMenuAndShortcuts);
        document.addEventListener("contextmenu", disableContextMenuAndShortcuts);

        window.onload = function () {
            const popup = document.getElementById('fullscreenPopup');
            popup.classList.add('active'); // Show fullscreen popup initially
        };
    </script>
</head>

<body>

    <div id="fullscreenPopup" class="fullscreen-popup">
        <div class="popup-content">
            <h4>Please enter fullscreen mode to begin your exam.</h4>
            <button class="btn btn-primary" onclick="onStartExam()">Enter Fullscreen and Start Exam</button>
        </div>
    </div>

    <div class="container full-screen">
        <div class="timer" id="timer">5m 00s</div>

        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">Exam: <?php echo htmlspecialchars($exam['title']); ?></h2>

                <form id="examForm" action="submit_exam.php" method="POST">
                    <?php foreach ($questions as $index => $question): ?>
                        <div class="question-container" id="question_<?php echo $index; ?>">
                            <p class="question"><?php echo ($index + 1) . ". " . $question['question']; ?></p>
                            <div class="options">
                                <?php foreach ($question['options'] as $option): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question_<?php echo $index; ?>" value="<?php echo $option; ?>" onchange="markQuestionAnswered(<?php echo $index; ?>)">
                                        <label class="form-check-label"><?php echo $option; ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-submit">Submit Exam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
