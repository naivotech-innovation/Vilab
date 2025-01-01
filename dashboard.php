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


        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/dashboard.css">
        



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


     <!-- Favicons -->
  <link href="./assets/images/transparentImage.png" rel="icon">
  <link href="./assets/images/transparentImage.png" rel="apple-touch-icon">
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
        <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
        <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
        <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
        <link rel="preload" as="image" href="./assets/images/hero-shape-1.svg">
        <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">
       
        <head>



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


            <header class="header" data-header>
                <div class="container">

                    <a href="#" class="logo">
                        <img src="./assets/images/transparentImage.png" width="162" height="50" alt="NaivoTech logo">
                    </a>

                    <nav class="navbar" data-navbar>

                        <div class="wrapper">
                            <a href="#" class="logo">
                                <img src="./assets/images/transparentImage.png" width="162" height="50" alt="VIL logo">
                            </a>

                            <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                                <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                            </button>
                        </div>


                    </nav>

                    <div class="header-actions">
                        <!-- <li class="navbar-item">
      <h2 class="iam">I'm</h2>
    </li>-->

                        <!-- <button class="header-action-btn" aria-label="toggle search" title="Search">
      <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
    </button>-->


                        <a href="#" class="button-16 has-before" id="">
                            <span class="span">My courses</span>
                        </a>


                

                        <div class="dropdown">
                            <a href="#" class="button-16 has-before">
                                <span class="span">
                                    <?php echo htmlspecialchars($name);?>
                                </span>  
                            </a>
                            <div class="dropdown-content">
                                <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
                                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>


    
                    </div>

                    <div class="overlay" data-nav-toggler data-overlay></div>

                </div>
            </header>

            <div style="display:block;" class="animate-bottom">

                <section class="section vil" id="vil" aria-label="vil">
                    <div class="container">

                       <div class="courses-link">
                           <button class="bt" id="show-all">Recommended For You</button>
                           <button class="bt" id="show-in-progress">In Progress</button>
                              <button class="bt" id="show-completed">Completed</button>
                        </div>
                        <div class="range"></div>

                        <ul id="course-list" class="grid-list1"></ul>

                      
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            fetch('https://vilab.co.in/api/courses.php')
                                .then(response => response.json())
                                .then(courses => {
                                    const courseList = document.getElementById('course-list');
                                    courses.forEach(course => {
                                        const listItem = document.createElement('li');
                                        listItem.innerHTML = `
                                            <div class="course-card">
                                                <img src="${course.image_url}" alt="${course.title}" class="course-image">
                                                <div class="course-content">
                                                    <h3 class="course-title tooltip">${course.title}
                                                        <span class="tooltiptext">Most Recommended.</span>
                                                    </h3>
                                                    <div class="instructor-info">
                                                        <p class="instructor-name">${course.instructor}</p>
                                                    </div>
                                                    <p class="course-rating">Rating: ${course.rating}
                                                        <span class="Rating"><ion-icon name="star"></ion-icon>
                                                            <ion-icon name="star"></ion-icon>
                                                            <ion-icon name="star"></ion-icon>
                                                            <ion-icon name="star"></ion-icon>
                                                            <ion-icon name="star-half"></ion-icon></span>
                                                    </p>
                                                    <p class="course-classes">Classes ${course.num_classes}</p>
                                                    
                                                </div>
                                            </div>
                                        `;
                                        listItem.addEventListener('click', () => {
                            window.location.href = `course-details.php?id=${course.id}`;
                        });
                                        courseList.appendChild(listItem);
                                    });
                                })
                                .catch(error => console.error('Error fetching courses:', error));
                        });
                    </script>
    



                </section>

                <?php include __DIR__.'/common/footer.php'; ?>
