<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: main.php");
    exit;
}

$email = $_SESSION['email'];
$name = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--- primary meta tag-->
        <title>NaivoTech - Virtual Innovation Lab</title>
        <meta name="title" content="NaivoTech - The Best Program to Enroll for Exchange">
        <meta name="NaivoTech aims to integrate experiential learning and technology at the core of academic curricula by
              establishing Innovation Labs in schools. These labs provide students with hands-on opportunities to work
              with tools and equipment, enabling them to better understand the what, how, and why aspects of STEM
              subjects"
            content="ntvilabs, vil, villabs, Vilabs, Virtual Innovation lab, Naivotech,
   naivotechlab, vilnaivotech,vilnaivo, vilnaivo, ntvillabs, ntvillabs , ntlabs, virtual labs, villabs, lab, virtual, labinnovtion, ntvilabs ">


        <link rel="stylesheet" href="assets/css/course-details.css">



        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- 
    - custom js link
  -->
        <!-- <script src="./assets/js/script_main.js" defer></script>-->



        <!--- ionicon link-->

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- 
    - custom css link
  -->



        <!-- 
  - google font link
-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
            rel="stylesheet">

        <!-- 
  - preload images
-->
        
    <style>
        * {
     margin: 0;
     padding: 0;
     font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
 }
 
 .course-details {
     width: 100%;
 }
 
 section.course-details-header {
     padding: 25px;
     color: white;
     background-color: #2d2f31;
 }
 
 section h1 {
     font-size: 40px;
 }
 
 section .course-contant {
     padding: 10px;
     font-size: 18px;
     font-weight: 500;
 }
 
 section .seller-content {
     display: flex;
     flex-wrap: wrap;
     align-items: center;
 }
 
 section .seller-glow {
     background-color: rgb(108, 214, 179);
     width: 80px;
     padding: 8px;
     font-weight: 600;
     color: black;
     margin-top: 10px;
     margin-left: 10px;
 }
 
 section p {
     padding: 8px;
 }
 
 section .course-rating {
     padding-top: 15px;
     margin-left: 10px;
     font-size: 18px;
     font-weight: 600;
 }
 
 section .Rating {
     color: gold;
     margin-left: 10px;
 }
 
 section .students-enrolled {
     font-size: 20px;
     padding-top: 15px;
     margin-left: 10px;
 }
 
 section .Instructor {
     display: flex;
     flex-direction: row;
     margin-top: 5px;
     margin-left: 9px;
 }
 div .course-contant-list1{
     display: flex;
     margin-top: 20px;
     gap: 20px;
     padding: 10px;
}
 
 div .course-contant-list {
     margin-top: 50px;
     padding: 20px;
     border: 2px solid #ddd;
     width: 80%;
     max-width: 500px;
     margin-left: 90px;
     padding: 12px;
 }
 
 div li {
     margin: 10px 0;
 }
 
 div .chapter-bar {
     margin: 20px auto;
     padding: 10px;
     width: 80%;
     max-width: 500px;
     margin-left: 90px;
 }
 
 div .chapter-detiles {
     display: flex;
     justify-content: space-between;
     margin-top: 40px;
 }
 
 div .chapter-conatent {
     background-color: rgb(249, 249, 249);
     padding: 10px;
     width: 100%;
 }
 
 div .course-contant-chapter {
     cursor: pointer;
     display: flex;
     justify-content: space-around;
     gap: 50px;
     padding: 20px;
     border: 1px solid #ddd;
     background-color: #a6a6a6;
     margin-bottom: 10px;
 }
 
 div .course-contant-chapter:hover {
     background-color: #908f8f;
 }
 
 div .Requirments {
     margin: 10px 0;
     padding: 0 20px;
     margin-left: 20px;
      margin-left: 90px;
 }
 
 div .Requirments h2 {
     margin: 30px 0;
 }
 
 div .discription {
     margin: 30px auto;
     padding: 0 20px;
     width: 80%;
     max-width: 500px;
     margin-left: 20px;
      margin-left: 90px;
 }
 
 div .discription h2 {
     margin-bottom: 20px;
 }
 
 div .discription-content {
     border: 1px solid #ddd;
     padding: 10px;
 }
 
 div .discription-content li {
     list-style-type: decimal;
 }
 
 div .instructor-detailes {
     margin: 10px 0 40px;
     padding: 0 20px;
     width: 80%;
     max-width: 500px;
     margin-left: 20px;
      margin-left: 90px;
 }
 
 div .instructor-detailes h2 {
     margin: 30px 0;
 }
 .instructor-detailes1 p {
     display: flex;
     align-items: center;
     margin: 10px 0;
 }
 
 .instructor-detailes1 i {
     margin-right: 10px;
     color: #2d2f31; 
 }
 
 
 .instructor-img-content {
     display: flex;
     gap: 20px;
      flex-wrap: nowrap;
     align-items: center;
 }
 
 .instructor-img {
     width: 200px;
     background-color: red;
     height: 200px;
     border-radius: 50%;
     margin-bottom: 10px;
     overflow: hidden;
 }
 
 .instructor-detailes1 p {
     margin-bottom: 30px;
 }
 
 div .postion-fixed {
     display: block;
     width: 80%;
     max-width: 420px;
     background-color: #47D0D0;
     position: fixed;
     left: 80%;
     top: 10px;
     transform: translateX(-50%);
     padding: 15px;
 }
 
 div .postion-fixed h1 {
     font-size: 25px;
     margin-bottom: 10px;
 }
 
 .postion-fixed p {
     font-size: 16px;
     margin-bottom: 10px;
 }
 .course-access p {
     display: flex;
     align-items: center;
     margin: 10px 0;
 }
 
 .course-access i {
     margin-right: 10px;
     color: #2d2f31; 
 }
 
 
 div .course-rate {
     font-size: 30px;
     font-weight: 600;
     margin-left: 10px;
     margin-top: 10px;
 }
 
 div .buy-link {
     display: inline-block;
     width: 99%;
     height: 35px;
     margin-left: 2px;
     font-size: 18px;
     background-color: rgb(245, 245, 246);
     border: 1px solid #272626;
     text-align: center;
     text-decoration: none;
     font-weight: 600;
     color: rgb(24, 24, 24);
 }
 
 div .life-time {
     margin-top: 5px;
     color: #3e3e3e;
     text-align: center;
 }
 
 div .buy-link:hover {
     background-color: rgb(230, 230, 230);
 }
 
 .apply-form input {
     width: 95%;
     padding: 8px;
     margin-bottom: 10px;
 }
 
 .apply-form button {
     cursor: pointer;
     padding: 8px;
     background-color: #2d2f31;
     color: #fafaff;
     border: none;
     width: 100%;
 }
 
 .course-access h5 {
     margin-bottom: 10px;
 }
 
 div form p {
     margin: 20px 0 10px;
 }
 
 /* Responsive Design */
 @media screen and (max-width: 768px) {
     section h1 {
         font-size: 30px;
     }
 
     section .course-contant {
         font-size: 16px;
     }
 
     section .seller-content,
     section .course-rating,
     section .students-enrolled {
         font-size: 16px;
         margin-left: 0;
         padding-top: 10px;
     }
 
     div .course-contant-list,
     div .chapter-bar,
     div .discription,
     div .instructor-detailes,
     div .postion-fixed,
     div .Requirments{
         margin: 20px auto;
         width: 90%;
     }
 
     div .postion-fixed {
         left: 50%;
         top: 10px;
         transform: translateX(-50%);
     }
 }
 
 @media screen and (max-width: 480px) {
     section h1 {
         font-size: 24px;
     }
    
 
     section .course-contant {
         font-size: 14px;
     }
 
     section .seller-content,
     section .course-rating,
     section .students-enrolled {
         font-size: 14px;
        
         align-items: flex-start;
     }
 
     div .course-contant-list,
     div .chapter-bar,
     
     div .instructor-detailes,
     div .postion-fixed {
         margin: 20px auto;
         width: 90%;
     }
     div .discription{
          margin: 20px auto;
          width: 96%;
     }
     video{
          width: 340px;
     }
 
     div .postion-fixed {
         position: static;
         transform: none;
         margin-top: 20px;
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
        </div>-->

        <!-- 
    - #HEADER
  -->
        <div style="display:block;" id="myDiv" class="animate-bottom">


    <div id="course-details" class="course-details">
        <!-- Dynamic content will be injected here -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Extract course ID from URL
            const params = new URLSearchParams(window.location.search);
            const courseId = params.get('id');

            if (courseId) {
                // Fetch course details from the server
               fetch(`https://vilab.co.in/api/course_details.php?courseId=${courseId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Course not found');
                        }
                        return response.json();
                    })
                    .then(course => {
                        const courseDetails = document.getElementById('course-details');
                        courseDetails.innerHTML = `
                            <section class="course-details-header">
                                <h1>${course.title}</h1>
                                <p class="course-contant">${course.description}</p>
                                <div class="seller-content">
                                    <p class="seller-glow">Best Seller</p>
                                    <p class="course-rating">Rating: ${course.rating}
                                        <span class="Rating">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star-half"></ion-icon>
                                        </span>
                                    </p>
                                    <p class="students-enrolled">${course.students_enrolled} Students</p>
                                </div>
                                <div class="Instructor">
                                    <p>Instructor</p>
                                    <p>${course.instructor}</p>
                                    <p>(Passionate AI Instructor)</p>
                                </div>
                            </section>
                            <div class="course-contant-list">
                                <h2>What you'll learn</h2>
                                <div class="course-contant-list1">
                                    <div>
                                        <ul>
                                        
                                    </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chapter-bar">
                                <h2>Course content</h2>
                                <div class="chapter-detiles">
                                    <p>${course.chapters.length} Chapters</p>
                                    <p>${course.lectures} lectures</p>
                                    <p>${course.duration} total length</p>
                                </div>
                                 <div class="chapter-conatent">
                                    ${Array.isArray(course.chapters) ? course.chapters.map(chapter => `
                                        <div class="course-contant-chapter">
                                            <p>${chapter.title}</p>
                                            <p>${chapter.lectures} Lectures . ${chapter.duration}</p>
                                        </div>
                                    `).join('') : ''}
                                </div>
                            </div>
                            <div class="Requirments">
                                <h2>Requirements</h2>
                                <ul>
                                   ${Array.isArray(course.requirements) ? course.requirements.map(req => `<li>${req}</li>`).join('') : ''}
                                </ul>
                            </div>
                            <div class="discription">
                                <h2>Description</h2>
                                <div class="discription-content">
                                    <p>${course.long_description}</p>
                                </div>
                            </div>
                            <div class="instructor-detailes">
                                <h2>Instructor</h2>
                                <div class="instructor-img-content">
                                    <div class="instructor-img">
                                        <img src="${course.instructor_image}" alt="Instructor Image">
                                    </div>
                                    <div class="instructor-detailes1">
                                        <p><i class="fas fa-star"></i> ${course.instructor_rating} Educator Rating</p>
                                        <p><i class="fas fa-user-graduate"></i> ${course.instructor_students} Students</p>
                                        <p><i class="fab fa-instagram"></i> Instagram: ${course.instructor_instagram}</p>
                                        <p><i class="fab fa-linkedin"></i> LinkedIn: ${course.instructor_linkedin}</p>
                                    </div>
                                </div>
                                <p>${course.instructor_bio}</p>
                            </div>
                            <div class="postion-fixed">
                                <video width="420" height="240" controls autoplay>
                                    <source src="${course.preview_video}" type="video/mp4">
                                    <source src="${course.preview_video_ogg}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                                <h1>${course.title}</h1>
                                <p>${course.description}</p>
                                <p class="course-rate">₹ ${course.price}</p>
                                 <a class="buy-link" href="payment.html?courseId=${course.id}&courseTitle=${course.title}&coursePrice=${course.price}">Buy Course</a>
                                <p class="life-time">Full Lifetime Access</p>
                                <div class="course-access">
                                    <h5>This course includes:</h5>
                                    <p><i class="fas fa-video"></i> ${course.on_demand_video} hours on-demand video</p>
                                    <p><i class="fas fa-mobile-alt"></i> Access on mobile and PC</p>
                                    <p><i class="fas fa-infinity"></i> Full lifetime access</p>
                                    <p><i class="fas fa-certificate"></i> Certificate of completion</p>
                                </div>
                                <form>
                                    <p>Apply Coupon</p>
                                    <div class="apply-form">
                                        <input type="text" placeholder="Enter Coupon">
                                        <button>Apply</button>
                                    </div>
                                </form>
                            </div>
                        `;
                    })
                    .catch(error => {
                        console.error('Error fetching course details:', error);
                        const courseDetails = document.getElementById('course-details');
                        courseDetails.innerHTML = `<p>Error: ${error.message}</p>`;
                    });
            } else {
                document.getElementById('course-details').innerText = 'Course ID not found in URL.';
            }
        });
    </script>


</body>

</html>
