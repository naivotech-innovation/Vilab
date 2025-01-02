<?php
session_start();

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
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
        <style>
            .header-actions {
  display: flex;
  align-items: center;
}

.button-16 {

   margin-top: 20px;
  background-color:#f8f9fa;
  border: 1px solid #f8f9fa;
  border-radius: 4px;
  color: #3c4043;
  cursor: pointer;
  font-family: arial, sans-serif;
  font-size: 14px;
  height: 36px;
  line-height: 27px;
  min-width: 54px;
  padding: 0 16px;
  text-align: center;
  user-select: none;
  display: flex;
  font-weight: 600;
 
  
}
.has-before::before {
  content: '';
  position: absolute;
  top: 50%;
  left: -10px;
  width: 5px;
  height: 5px;
  background-color: hsl(170, 75%, 41%);
  border-radius: 50%;
  transform: translateY(-50%);
  transition: background-color 0.3s;
}

.button-16:hover .has-before::before {
  background-color: hsl(170, 75%, 41%);
}



.button-16:hover {
  background-color: hsl(170, 75%, 41%);
}



.dropdown {
  position: relative;
  display: inline-block;
  margin-left: 20px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  border-radius: 4px;
  overflow: hidden;
}

.dropdown-content a {
  color: #333;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-size: 14px;
  transition: background-color 0.3s;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .button-16 {
  background-color: hsl(170, 75%, 41%);
}
 .button-16:second-child{
        margin-right: -12px;
    }







@media (max-width: 600px) {
  .button-16 {
    width: 110px;
    height: 35px;
    margin-left: 1px;
    font-size: 12px;
  }

}
@media (max-width: 440px) {
    .button-16{
        width:90px;
        height:30px;
        font-size:9px;
        
    }
    .button-16:first-child{
        margin-right: -12px;
    }
}
@media (min-width: 575px) {
    .header-actions {
        gap: 20px;
    }
}



        </style>
       
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
                        <ul class="navbar-list">

<li class="navbar-item">
  <a href="#home" class="navbar-link" data-nav-link>Home</a>
</li>

<li class="navbar-item">
  <a href="#top-skills" class="navbar-link" data-nav-link>Courses</a>
</li>

<li class="navbar-item">
  <a href="#about" class="navbar-link" data-nav-link>About</a>
</li>

<li class="navbar-item">
  <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
</li>

<li class="navbar-item">
  <a href="#Contact" class="navbar-link" data-nav-link>Contact</a>
</li>

</ul>


                    </nav>

                    <div class="header-actions">


                        <a href="dashboard.php" class="button-16" id="">
                            <span class="span">My courses</span>
                        </a>


                

                        <div class="dropdown">
                            <a href="#" class="button-16">
                                <span class="">
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
            <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url('./assets/images/hero-bg.svg')">
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 section-title"  class="h1-title">
              NaivoTech's<span class="span"> Innovation</span> Lab
            </h1>

            <p class="hero-text">
              NaivoTech aims to integrate experiential learning and technology at the core of academic curricula by
              establishing Innovation Labs in schools. These labs provide students with hands-on opportunities to work
              with tools and equipment, enabling them to better understand the what, how, and why aspects of STEM
              subjects
            </p>

            <div class="Expolre">
              <h5>I 'm</h5>
              <a href="school.php" class="btb has-before" class="row-button" target="_blank">
                <span class="span">Schools</span>
              </a>

              <a href="educators.php" class="btb has-before" class="row-button">
                <span class="span">Educators</span>
              </a>

              <a href="login.php" class="btb has-before" class="row-button" target="_blank">
                <span class="span">Student</span>
              </a>

            </div>
          </div>

          <figure class="hero-banner">

            <div class="img-holder one" style="--width: 270; --height: 300;">
              <img src="./assets/images/hero-banner-1.jpg" width="270" height="300" alt="hero banner" class="img-cover">
            </div>

            <div class="img-holder two" style="--width: 240; --height: 370;">
              <img src="./assets/images/hero-banner-2.jpg" width="240" height="370" alt="hero banner" class="img-cover">
            </div>

            <img src="./assets/images/hero-shape-1.png" width="380" height="190" alt="" class="shape hero-shape-1">

            <img src="./assets/images/hero-shape-2.png" width="622" height="551" alt="" class="shape hero-shape-2">

          </figure>

        </div>
      </section>



      <!-- 
        - #STATE
      -->

      <section class="section stats" aria-label="stats">
        <div class="container">

          <ul class="grid-list">

            <li>
              <div class="stats-card" style="--color: 170, 75%, 41%">
                <h3 class="card-title">12.3k</h3>

                <p class="card-text">Student Enrolled</p>
              </div>
            </li>

            <li>
              <div class="stats-card" style="--color: 351, 83%, 61%">
                <h3 class="card-title">25.4K</h3>

                <p class="card-text">Class Completed</p>
              </div>
            </li>

            <li>
              <div class="stats-card" style="--color: 260, 100%, 67%">
                <h3 class="card-title">99%</h3>

                <p class="card-text">Satisfaction Rate</p>
              </div>
            </li>

            <li>
              <div class="stats-card" style="--color: 42, 94%, 55%">
                <h3 class="card-title">110+</h3>

                <p class="card-text">Top Instructors</p>
              </div>
            </li>

          </ul>

        </div>
      </section>



      <!-- 
        - #CATEGORY COURSE
      -->

      <section class="sectio categor" aria-label="category" id="top-skills">
        <div class="container">

          <p class="section-subtitle">Course Categories</p>
          <h3 class="h2 section-title">
            Top Trending
            <span class="span">SKILLS </span>
          </h3>



          <ul class="grid-list">

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="file-tray-full-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Artificial Intelligence</a>
                  </h3>

                  <span class="card-meta">15 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="color-palette-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Machine Learning</a>
                  </h3>

                  <span class="card-meta">15 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="layers-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Robotics</a>
                  </h3>

                  <span class="card-meta">15 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="laptop-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="#">Data Mining</a>
                  </h3>

                  <span class="card-meta">10 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="thumbs-up-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Natural Language Processing</a>
                  </h3>

                  <span class="card-meta">15 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="analytics-outline"></ion-icon>

                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Data Analytics With Python</a>
                  </h3>

                  <span class="card-meta">39 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="server-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Data Strucure & Algoritham</a>
                  </h3>

                  <span class="card-meta">25 Classes</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-car">

                <div class="card-icon">
                  <ion-icon class="icon" name="globe-outline"></ion-icon>

                </div>

                <div>
                  <h3 class="h3 card">
                    <a href="course.php">Internet Of Things</a>
                  </h3>

                  <span class="card-meta">23 Classes</span>
                </div>

              </div>
            </li>

          </ul>

        </div>
        <div class="button">
          <a href="dashboard.php">More Courses</a>
        </div>
      </section>




      <!-- 
        - #CATEGORY
      -->

      <section class="sectio category" aria-label="category">
        <div class="container">

          <p class="section-subtitle">Categories</p>

          <h2 class="h2 section-title">
            What We are
            <span class="span">OFFERING ?</span>
          </h2>

          <p class="section-text">
            We're on a mission to revolutionize education by setting up dynamic Innovation Labs, crafting cutting-edge
            curricula, providing dedicated mentors, and hosting immersive workshops and camps.
          </p>

          <ul class="grid-list">

            <li>
              <div class="category-card" id="category-1" style="--color: 170, 75%, 41%">

                <div class="card-icon">
                  <img src="./assets/images/category-1.svg" width="40" height="40" loading="lazy"
                    alt="Online Degree Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Tech & Innovation Lab</a>
                </h3>

                <p class="card-text">
                  Empower your school with an
                  affordable Innovation Lab, where
                  students can explore their creative
                  potential.
                </p>

                <span class="card-badge">Modal</span>

              </div>
            </li>

            <li>
              <div class="category-card" id="category-2" style="--color: 351, 83%, 61%">

                <div class="card-icon">
                  <img src="./assets/images/category-2.svg" width="40" height="40" loading="lazy"
                    alt="Non-Degree Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Skill Lab</a>
                </h3>

                <p class="card-text">
                  Our Skill Labs aligned with
                  the NEP 2020 helps develop
                  essential 21st-century skills
                  like critical thinking.
                </p>

                <span class="card-badge">Modal</span>

              </div>
            </li>

            <li>
              <div class="category-card" id="category-3" style="--color: 229, 75%, 58%">

                <div class="card-icon">
                  <img src="./assets/images/category-3.svg" width="40" height="40" loading="lazy"
                    alt="Off-Campus Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Expert Mentorship</a>
                </h3>

                <p class="card-text">
                  Enrich your students' learning experience
                  with expert mentorship.
                  We provide personalized guidance
                  to them.
                </p>

                <span class="card-badge">Modal</span>

              </div>
            </li>

            <li>
              <div class="category-card" id="category-4" style="--color: 42, 94%, 55%">

                <div class="card-icon">
                  <img src="./assets/images/category-4.svg" width="40" height="40" loading="lazy"
                    alt="Hybrid Distance Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Hands-On STEM Projects</a>
                </h3>

                <p class="card-text">
                  Our engaging activities go beyond textbooks, allowing students to apply theoretical knowledge in
                  practical, real-world scenarios.
                </p>

                <span class="card-badge">Modal</span>

              </div>
            </li>

          </ul>

        </div>
      </section>

      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">

            <div class="img-holder" style="--width: 520; --height: 370;">
              <img src="./assets/images/about-banner.jpg" width="520" height="370" loading="lazy" alt="about banner"
                class="img-cover">
            </div>

            <!--<img src="./assets/images/about-shap-1.svg" width="360" height="420" loading="lazy" alt=""
                class="shape about-shape-1">-->

            <img src="./assets/images/about-shape-2.svg" width="371" height="220" loading="lazy" alt=""
              class="shape about-shape-2">

            <img src="./assets/images/about-shape-3.png" width="722" height="528" loading="lazy" alt=""
              class="shape about-shape-3">

          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">
              Changing the Landscape for <span class="span">21st Century School </span> Industry 4.0 Technologies
            </h2>

            <p class="section-text">
              “At NaivoTech, we embrace the diversity of learning paths for every child. While not every student may
              become a coder, we recognize the invaluable role of STEM learning through futuristic technologies.
            </p>

            <ul class="about-list">

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Expert Trainers</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Online Remote Learning</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Lifetime Access</span>
              </li>

            </ul>

            <img src="./assets/images/about-shape-4.svg" width="100" height="100" loading="lazy" alt=""
              class="shape about-shape-4">

          </div>

        </div>
      </section>


      <!--==========================================================
            VIL PART 
         --==========================================================-->

      <section class="section vil" id="vil" aria-label="vil">
        <div class="container">

          <h2 class="h2 section-title">Why Naivotech VIL ?</h2>

          <p class="section-text">
            Changing the Landscape for 21st Century School Industry 4.0 Technologies
          </p>
          <ul class="grid-list1">
            <li>
              <div class="vil-card">
                <img src="assets/images/images/skill.png">
                <h3>New Age Skills</h3>
              </div>
            </li>
            <li>
              <div class="vil-card">
                <img src="assets/images/images/double-check.png">
                <h3>Certified by STEAM & UNESCO</h3>
              </div>
            </li>
            <li>
              <div class="vil-card">
                <img src="assets/images/images/payment.png">
                <h3>Pocket Friendly</h3>
              </div>
            </li>
            <li>
              <div class="vil-card">
                <img src="assets/images/images/mentor.png">
                <h3>Expert Mentors</h3>
              </div>
            </li>
          </ul>
        </div>

      </section>


      <!-- 
        - #BLOG
      -->
      <!-- POPUP NEWS PORTAL -->

     

      <section class="section blog has-bg-image" id="blog" aria-label="blog"
        style="background-image: url('./assets/images/blog-bg.svg')">
        <div class="container" id="newsletter">

          <p class="section-subtitle">Latest Articles</p>

          <h2 class="h2 section-title">Get News With VIL NaivoTech</h2>

          <ul class="grid-list">

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="./assets/images/news-4.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="news.php" class="card-btn" aria-label="read more" id="subscribeButton">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="news.php" class="card-subtitle">Online</a>

                  <h3 class="h3" id="popUpNewsForm">
                    <a href="news.php" class="card-title">Robotics Summer Camp a Resounding Success at St. Joseph's
                      School.!</a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span">July 14, 2024</span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>

                      <span class="span">Com 09</span>
                    </li>

                  </ul>

                  <p class="card-text">
                    Robotics Summer Camp a Resounding Success at St. Joseph.......
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="./assets/images/news-2.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="news.php" class="card-btn" aria-label="read more">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="news.php" class="card-subtitle">Online</a>

                  <h3 class="h3">
                    <a href="news.php" id="openLoginFormBtn" class="card-title">Robotics Summer Camp at IRIS Crown School
                      Inspires Future Engineers</a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span">July 14, 2024</span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>

                      <span class="span">Com 01</span>
                    </li>

                  </ul>

                  <p class="card-text">
                    recently concluded its Robotics Summer Camp............
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="./assets/images/news-3.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="news.php" class="card-btn" aria-label="read more">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="news.php" class="card-subtitle">Online</a>

                  <h3 class="h3">
                    <a href="new.php" class="card-title">High School Student Develops Innovative 'Dog Robot' for Science
                      Fair Project.</a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span">July 14, 2024</span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>

                      <span class="span">Com 09</span>
                    </li>

                  </ul>

                  <p class="card-text">
                    In a remarkable display of creativity and technical.....
                  </p>

                </div>

              </div>
            </li>

          </ul>

          <img src="./assets/images/blog-shape.png" width="186" height="186" loading="lazy" alt=""
            class="shape blog-shape">

        </div>
      </section>

    </article>


      <!--========================================================
      CONTACT PAGE
--==========================================================-->


      <section class="sectionn Contact" id="Contact">
        <p class="section-subtitle">Contact</p>


        <h2 class="h2 section-title">Contact Us today</h2>
        <div class="container-contact">

          <div class="flex-contact">
            <div class="flex-item-contact-left">

              <div>
                <div class="contact_icon">
                  <box-icon type='solid' name='map'></box-icon>
                  <h6>Location:</h6>
                </div>
                <p> Ram Ram Bank Chauraha,Krishna Plaza <br>Sector-A, Aliganj, Lucknow, Uttar Pradesh 226024</p>
              </div>
              <div>
                <div class="contact_icon">
                  <box-icon type='solid' name='time-five'></box-icon>
                  <h6>Open Hours:</h6>
                </div>
                <p>Monday-Saturday:<br>
                  9:00 AM - 5:00 PM</p>
              </div>
              <div>
                <div class="contact_icon">
                  <box-icon type='solid' name='envelope'></box-icon>
                  <h6>Email:</h6>
                </div>
                <p> info@naivotech.com</p>
              </div>
              <div>
                <div class="contact_icon">
                  <box-icon type='solid' name='phone'></box-icon>
                  <h6>Call:</h6>
                </div>
                <p> (+91) 7007362892, 9653006686</p>

              </div>
            </div>
            <div class="flex-item-contact-right">
              <div class="contact-section">
                <form id="contactForm" method="post" action="submit.php">
                  <label for="fname">Name:</label>
                  <input type="text" id="name" name="name" placeholder="Enter your Name" required>

                  <label for="lname">Email:</label>
                  <input type="text" id="email" name="email" placeholder="Email" required>

                  <label for="country">Subject:</label>
                  <input type="text" id="subject" name="subject" placeholder="Subject" required>

                  <label for="subject">Message:</label>
                  <textarea id="message" name="message" placeholder="Write something.." style="height:100px;"
                    required></textarea>

                  <button class="contact-button" type="submit">Send</button>
                </form>
                <div id="successMessage" class="contact-success" style="display:none;">Your message has been sent
                  successfully!</div>
              </div>
            </div>
          </div>

        </div>
        <!-- <div class="flex-contact">
          <div class="flex-item-contact-left">
            <h6>Contact Us</h6>
            <div>
              <div class="contact_icon">
                <box-icon type='solid' name='map'></box-icon>
                <h6>Location:</h6>
              </div>
              <p> Ram Ram Bank Chauraha,Krishna Plaza <br>Sector-A, Aliganj, Lucknow, Uttar Pradesh 226024</p>
            </div>
            <div>
              <div class="contact_icon">
                <box-icon type='solid' name='time-five'></box-icon>
                <h6>Open Hours:</h6>
              </div>
              <p>Monday-Saturday:<br>
                9:00 AM - 5:00 PM</p>
            </div>
            <div>
              <div class="contact_icon">
                <box-icon type='solid' name='envelope'></box-icon>
                <h6>Email:</h6>
              </div>
              <p> info@naivotech.com</p>
            </div>
            <div>
              <div class="contact_icon">
                <box-icon type='solid' name='phone'></box-icon>
                <h6>Call:</h6>
              </div>
              <p> (+91) 7007362892, 9653006686</p>

            </div>
          </div>
          <div class="flex-item-contact-right">
            <div class="contact-section">
              <form id="contactForm" method="post" action="submit.php">
                <label for="fname">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your Name" required>

                <label for="lname">Email:</label>
                <input type="text" id="email" name="email" placeholder="Email" required>

                <label for="country">Subject:</label>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>

                <label for="subject">Message:</label>
                <textarea id="message" name="message" placeholder="Write something.." style="height:100px;"
                  required></textarea>

                <button class="contact-button" type="submit">Send</button>
              </form>
              <div id="successMessage" class="contact-success" style="display:none;">Your message has been sent
                successfully!</div>
            </div>
          </div>
        </div>-->
      </section>



    <!--========================================================
      WORKSHOP PAGE
--==========================================================-->

    <section class="Free">
      <div class="flex-workshop">
        <div class="flex-item-left">
          <h1>Free Workshop</h1>
          <h1 class="our">Join our free Workshop</h1>
          <p class="text-about">"Unlock your potential at our free workshop – reserve your spot today!"
          </p>
          <a class="Workshops-button" href="">Upcomming Workshop</a>
        </div>
        <div class="flex-item-right">
          <div><img class="image-meeting" src="assets/images/news-3.jpg" alt="image"></div>
        </div>
    </section>

  </main>
  <!-- 
    - #FOOTER
  -->

  <footer class="footer" style="background-image: url('./assets/images/')" style="display: none;">

<div class="footer-top section">
  <div class="container grid-list">

    <div class="footer-brand">

      <a href="#" class="logo">
        <img src="./assets/images/naivologo.png" width="250" height="90" alt="naivotech logo">
      </a>

      <p class="footer-brand-text">
        NaivoTech aims to integrate experiential learning and technology at the core of academic curricula by
        establishing Innovation Labs in schools.
      </p>

      <div class="wrapper">
        <span class="span">Add:</span>

        <address class="address">Ram Ram bank Chauraha Aliganj Lucknow</address>
      </div>

      <div class="wrapper">
        <span class="span">Call:</span>

        <a href="tel:+91 9653006686" class="footer-link">(+91) 7007362892, 9653006686</a>
      </div>

      <div class="wrapper">
        <span class="span">Email:</span>

        <a href="mailto:info@naivotech.com" class="footer-link">nfo@naivotech.com</a>
      </div>

    </div>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title">Platform</p>
      </li>

      <li>
        <a href="#about" class="footer-link">About</a>
      </li>

      <li>
        <a href="#courses" class="footer-link">Courses</a>
      </li>

      <li>
        <a href="educators.html" class="footer-link">Educators</a>
      </li>

      <li>
        <a href="#" class="footer-link">Events</a>
      </li>

      <li>
        <a href="#" class="footer-link">Instructor Profile</a>
      </li>

      <li>
        <a href="#" class="footer-link">Purchase Guide</a>
      </li>

    </ul>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title">Links</p>
      </li>

      <li>
        <a href="#Contact" class="footer-link">Contact Us</a>
      </li>

      <li>
        <a href="#" class="footer-link">Gallery</a>
      </li>

      <li>
        <a href="#newsletter" class="footer-link">News & Articles</a>
      </li>

      <li>
        <a href="#" class="footer-link">FAQ's</a>
      </li>

      <li>
        <a href="#" class="footer-link">Sign In/Registration</a>
      </li>

      <li>
        <a href="#" class="footer-link">Coming Soon</a>
      </li>

    </ul>

    <div class="footer-list">

      <p class="footer-list-title">Contacts</p>

      <p class="footer-list-text">
        Enter your email address to register to our newsletter subscription
      </p>

      <form action="backend\subscribe.php" id="newsletter" class="newsletter-form" method="post">
        <input type="email" id="email" name="email" placeholder="Your email" required class="input-field">

        <button type="submit" class="btn has-before">
          <span class="span">Subscribe</span>
          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </button>
      </form>
      <div id="successMessage" class="success-message" style="display:none;">You have successfully subscribed to
        the newsletter!</div>
    </div>

    <ul class="social-list">

      <li>
        <a href="https://www.facebook.com/NaivoTech/" class="social-link">
          <ion-icon name="logo-facebook"></ion-icon>
        </a>
      </li>

      <li>
        <a href="https://www.linkedin.com/company/naivotech/mycompany/" class="social-link">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a>
      </li>

      <li>
        <a href="https://www.instagram.com/naivotech/" class="social-link">
          <ion-icon name="logo-instagram"></ion-icon>
        </a>
      </li>

      <li>
        <a href="#" class="social-link">
          <ion-icon name="logo-twitter"></ion-icon>
        </a>
      </li>

      <li>
        <a href="#" class="social-link">
          <ion-icon name="logo-youtube"></ion-icon>
        </a>
      </li>

    </ul>

  </div>

</div>
</div>
<div class="footer-bottom" style="background-color: #111111" ;>
<div class="container">
<p class="copyright" style="background-color: #111111" ;>
  Copyright 2024 All Rights Reserved by <a href="#" class="copyright-link">NaivoTech</a>
</p>
</div>
</div>

</footer>



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
<a href="#" class="fixed-btn one" >
<img src="assets/images/images/telephone.png" alt=""></a>

<a class="fixed-btn" aria-label="Chat on WhatsApp" href="https://wa.me/917355295772">
  <img alt="Chat on WhatsApp" src="assets/images/images/whatsapp1.png" /></a>


</div>






  <script>
  document.getElementById('contactForm').addEventListener('submit', function(event) {
      event.preventDefault();
      
      var formData = new FormData(this);
  
      fetch('backend/submit.php', {
          method: 'POST',
          body: formData
      }).then(response => response.text())
        .then(data => {
            if (data === 'success') {
                document.getElementById('successMessage').style.display = 'block';
                document.getElementById('contactForm').reset(); // Reset the form
            } else {
                alert('There was an error processing your request. Please try again.');
            }
        }).catch(error => {
            alert('There was an error processing your request. Please try again.');
        });
  });
  </script>

  
  <script>
  var myVar;
  
  function myFunction() {
    myVar = setTimeout(showPage, 000);
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
