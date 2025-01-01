<?php
include ("db.php");

// Chapters data
$chapters = [
    "Introduction to PHP",
    "Variables and Data Types",
    "Control Structures",
    "Functions in PHP",
    "Working with Forms",
    "PHP and MySQL"
];

// Convert the chapters array to a JSON string
$chaptersJson = json_encode($chapters);

// Insert course with chapters
$courseName = "PHP Basics";
$sql = "INSERT INTO courses (name, chapters) VALUES ('$courseName', '$chaptersJson')";

if ($conn->query($sql) === TRUE) {
    echo "Course and chapters added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>\\UPDATE courses 
SET chapters = '["Introduction to PHP", "Variables and Data Types", "Control Structures", "Functions in PHP", "Working with Forms", "PHP and MySQL"]' 
WHERE id = 1;
