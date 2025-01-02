<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NaivoTech - For schools</title>
   <meta name="title" content="NaivoTech - Education Is About Academic Excellence">
    <meta name="Embark on a journey of discovery with NaivoTech, where knowledge thrives. Our avant-garde AI and Robotics education encompasses a meticulously crafted curriculum, interactive robots, engaging hands-on projects, and practical real-life applications. Experience the transformative power of education as NaivoTech pioneers an innovative approach, making learning a dynamic and immersive adventure in the realms of AI and Robotics. Elevate your understanding and skills with NaivoTech, the ultimate hub for cutting-edge technological education."
      content="vilabs, vil, villabs, Vilabs, Virtual Innovation lab, Naivotech,
   naivotechlab, vilnaivotech,vilnaivo, vilnaivo, villabs, villabs , labs, virtual labs, villabs, lab, virtual, labinnovtion, vilabs, vil, naivotech, Naivotech, Naivotechvil lab, Vilabs">


  
     <!-- Favicons -->
  <link href="./assets/images/transparentImage.png" rel="icon">
  <link href="./assets/images/transparentImage.png" rel="apple-touch-icon">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/school.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
  <link rel="preload" as="image" href="./assets/images/hero-abs-1.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./assets/images/hero-abs-2.png" media="min-width(768px)">



  <style>
  
  /*--===================================================
    for sucees massage
===================================================*/

.success-message {
  display:none;
  color: rgb(5, 176, 5);
  text-align: center;
  margin-top: 10px;
}

    .carousel {
      width: 100%;
      overflow: hidden;
      position: relative;
      border-radius: 10px;
      display: flex;
      
    }
    .Curriculum{
      margin-bottom: 80px;
    }

    .carousel-inner {
     display: flex;
      animation: scroll 20s linear infinite;
    }

    .carousel-item {
      min-width: 300px;
      transition: transform 0.5s ease;
    }

    .carousel-item img {
      width: 150px;
      height: 150px;
      height: auto;
      display: block;
      border-radius: 8px;
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }
    
    
.content {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.box {
    background-color: #31bed7;
    background-color: #06a5d2;
    background-color: #525de0;
    background-color: #5f74b9;
    padding: 20px;
    border-radius: 8px;
    flex: 1 1 calc(25% - 20px);
    min-width: 250px;
    border: 1px solid #ddd;
  transition: transform 0.3s;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.box:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
  transition: transform 0.3s;

}

.box h2 {
  font-size: 22px;
    margin-bottom: 15px;
    color: #fff;
    
}

.box ul {
    list-style-type: none;
    color: #fff;
    
}

.box ul li {
    margin-bottom: 5px;
}

.images {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.images img {
    width: calc(20% - 10px);
    border-radius: 8px;
}

@media screen and (max-width: 768px) {
    .content {
        flex-direction: column;
    }

    .images img {
        width: 100%;
        margin-bottom: 10px;
        display: none;
    }
}


.requirements {
  background-color: #ff7f00;
  background-color: #616bdf;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    
}

.requirement-item {
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    border-radius: 50px;
    margin-bottom: 10px;
    padding: 10px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}

.number {
    background-color: #ff7f00;
    color: white;
    font-size: 24px;
    font-weight: bold;
    border-radius: 50%;
    padding: 10px;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
}

.content {
    text-align: left;
}

.content h3 {
    margin-bottom: 5px;
    font-size: 18px;
}

.content p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

.how-it-works {
    margin-top: 30px;
    font-size: 22px;
    color: #ff7f00;
}

.workflow {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    padding: 20px 0;
    position: relative;
}

.workflow::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #000;
    z-index: -1;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.step .circle {
    background-color: #000;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    margin-bottom: 10px;
}

.step p {
    margin-top: 0;
    font-size: 14px;
    color: #555;
}

@media screen and (max-width: 768px) {
    .workflow {
        flex-direction: column;
        align-items: flex-start;
    }

    .workflow::before {
        top: 25%;
        left: 50%;
        height: 100%;
        width: 3px;
    }

    .step {
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    .step p {
        margin-left: 10px;
    }

    .step .circle {
        margin-bottom: 0;
    }
}





.service-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 20px;
}

.service-item {
    display: flex;
    align-items: flex-start;
    background-color: #fff;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 8px;
    width: 48%;
    transition: transform 0.3s;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.service-item:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
  

}


.icon {
    flex-shrink: 0;
    background-color: #525de0;
    padding: 10px;
    /*border-radius: 50%;*/
    margin-right: 15px;
}

.icon img {
    max-width: 40px;
}

.service-content {
    text-align: left;
}

.service-content h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
}

.service-content ul {
    list-style-type: none;
}

.service-content ul li {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}

@media screen and (max-width: 768px) {
    .service-list {
        flex-direction: column;
        align-items: center;
    }

    .service-item {
        width: 100%;
    }
}
.image { 
            box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.5); 
        } 


  </style>
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">


      <a href="#" class="logo">
        <img src="./assets/images/transparentImage.png" width="162" height="50" alt="NaivoTech logo">
      </a>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo">
            <img src="./assets/images/transparentImage.png" width="162" height="50" alt="NaivoTech logo">
          </a>

          <button class="nav-close-btn" aria-label="Close menu" data-nav-toggler>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

           <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-toggler>Home</a>
          </li>

          <li class="navbar-item">
            <a href="#top-skills" class="navbar-link" data-nav-toggler>Our Top Skills</a>
          </li>

          <li class="navbar-item">
            <a href="#Our-Curriculum" class="navbar-link" data-nav-toggler>Our Curriculum</a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-toggler>About</a>
          </li>

          <li class="navbar-item">
            <a href="#meeting" class="navbar-link" data-nav-toggler>Meeting</a>
          </li>

        </ul>

      </nav>

      <div class="header-actions">

        <button class="header-action-btn" aria-label="Open search" data-search-toggler>
          <ion-icon name="search-outline"></ion-icon>
        </button>

        <a href="#meeting" class="header-action-btn login-btn">
          <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

          <span class="span">Book A meeting</span>
        </a>

        <button class="header-action-btn nav-open-btn" aria-label="Open menu" data-nav-toggler>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

      </div>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <!-- 
    - #SEARCH BOX
  -->

  <div class="search-container" data-search-box>
    <div class="container">

      <button class="search-close-btn" aria-label="Close search" data-search-toggler>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="search-wrapper">
        <input type="search" name="search" placeholder="Search Here..." aria-label="Search" class="search-field">

        <button class="search-submit" aria-label="Submit" data-search-toggler>
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </div>

    </div>
  </div>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home" aria-label="hero">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">Better Learning Future With Us</p>

            <h2 class="h1 hero-title" class="h1-title"><span class="india">India’s</span> No.<span class="no1"> 1</span>
              Programs</h2>

            <p class="hero-text">
              India’s No. 1 robotics programs offer cutting-edge curriculum and hands-on training, preparing students to excel in the rapidly evolving field of robotics.
            </p>

            <a href="#meeting" class="btn btn-primary">
              <span class="span">Book a meeting</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

           <img src="" class="image-hero" width="200" height="200" loading="lazy"
              alt="hero image" class="w-100" style="border-radius: 50%;">

            <img src="assets/images/Creativity.gif" width="318" height="352" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-1" class="image" style="border-radius: 50%;">

           <!-- <img src="assets/images/Nerd-amico.png" width="318" height="352" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-2">-->

          </figure>

        </div>
      </section>





      <!-- 
        - #CATEGORY
      -->

      <section class="section category" aria-label="category" id="top-skills">
        <div class="container">

          <p class="section-subtitle">Course Categories</p>

          <h2 class="h2 section-title">Top Trending Skills</h2>

          <ul class="grid-list">

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="briefcase-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Artificial Intelligence</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="file-tray-full-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Machine Learning</a>
                  </h3>

                  <span class="card-meta">24 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="color-palette-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Robotics</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="layers-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Data Mining</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="laptop-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Natural Language Processing</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="thumbs-up-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Data Analytics With Python
                    </a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="headset-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Internet Of Things</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="server-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Data Sciences</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="medkit-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Data Strucure & Algoritham</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>



      
      <!-- 
        - #STEM resources to your school aligned with NEP 2020
      -->

      <section class="section category" id="Our-Curriculum" aria-label="about" style="margin-top: -12%;" style="background-color:linear-gradient(135deg, #7882f9, #fcd6fd, #d7f7f4) ;">
      <div class="container">
        <h2 class="section-subtitle" >OUR CURRICULUM </h2>
        <h2 class="h2 section-title" style="font-size: 30px;">We bring world-class STEM resources to your school aligned with NEP 2020</h2>
        <div class="content">
            <div class="box">
                <h2>Deployment of STEM & Innovation Lab</h2>
                <ul>
                    <li>Lab establishment</li>
                    <li>STEM kits</li>
                    <li>Trainers</li>
                    <li>Daily lab consumables</li>
                    <li>Lab upgrades</li>
                    <li>Hackathons</li>
                    <li>Challenges</li>
                    <li>Certificate</li>
                </ul>
            </div>
            <div class="box">
                <h2>STEM Curriculum with Continuous Tracking</h2>
                <ul>
                    <li>NEP Aligned</li>
                    <li>Emerging Technology Focus</li>
                    <li>Holistic Student Development</li>
                    <li>Financial Literacy Integration</li>
                    <li>Continuous Assessments</li>
                    <li>Entrepreneurship</li>
                    <li>Skill Modules</li>
                </ul>
            </div>
            <div class="box">
                <h2>Industry 4.0 Technologies</h2>
                <ul>
                    <li>Robotics</li>
                    <li>Artificial Intelligence</li>
                    <li>Coding</li>
                    <li>Design Thinking</li>
                    <li>Space & Rocketry</li>
                    <li>Internet of Things</li>
                    <li>Virtual & Augmented Reality</li>
                </ul>
            </div>
            <div class="box">
                <h2>Lab Upgradation & Showcases</h2>
                <ul>
                    <li>Continuous lab upgrades</li>
                    <li>Tech-fests in school</li>
                    <li>Participation in challenges</li>
                    <li>National level presence</li>
                    <li>Automate school campus</li>
                    <li>Regular project presentations</li>
                </ul>
            </div>
        </div>
       <!-- <div class="images">
            <img src="course-1.jpg" alt="Image 1">
            <img src="course-1.jpg" alt="Image 2">
            <img src="course-1.jpg" alt="Image 3">
            <img src="course-1.jpg" alt="Image 4">
            <img src="course-1.jpg" alt="Image 5">
        </div>-->
    </div>
      </section>



      

<!---======NEED FROM SCHOOLS-->
      
<section class="Curriculum category" aria-label="category">
  <div class="container">
    <h2 class="h2 section-title" style="font-size: 30px; margin-top: -30px;" >POPULAR FOR SCHOOLS</h2>
    <h2 class="h2 section-title" style="font-size: 20px; margin-top: -30px;" >We Cover All The Costs to Get Everything Set up for Your SCHOOL</h2>

    <div class="service-list">
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.lc8OFG3Xv_pBwvFNI0TzkAHaHa?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>State-of-Art Innovation Lab Setup</h3>
                <ul>
                    <li>NaivoTech’s cutting-edge STEM lab infrastructure and equipment</li>
                    <li>Turnkey solution for seamless implementation</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.0-L3XDhsEKyzVIWxwFdRLgHaHa?w=512&h=512&rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>Certified Trainers</h3>
                <ul>
                    <li>Experienced and qualified trainers from NaivoTech.</li>
                    <li>Comprehensive training and capacity building programs</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.fVSBCVbkVYEYphC1kaaXCQHaGC?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>Complete Course Kits</h3>
                <ul>
                    <li>NaivoTech’s curated kits for Robotics, IoT, Drones, AR/VR, Space-Tech, and more</li>
                    <li>Aligned with the latest industry and curriculum standards</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.Jtdz3HDp0XWv5bfenauujgAAAA?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>STEM Learning Program</h3>
                <ul>
                    <li>NaivoTech’s comprehensive learning content for grades 1-12</li>
                    <li>Project-based activities and assessments</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.mUoIvwcRfm9Ebk90GphmkAHaD5?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>Daily Lab Consumables</h3>
                <ul>
                    <li>Continuous supply of lab materials and consumables from NaivoTech</li>
                    <li>No worries about damages or replacements</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.90QNIp_f623IiEaD593NggHaE7?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>Continuous Lab Upgrades</h3>
                <ul>
                    <li>NaivoTech’s regular technology and curriculum updates</li>
                    <li>Ensuring relevance and keeping labs future-ready</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.jId-HxnQqJ7-uKUnXDkukAHaHK?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>Student Support Ecosystem</h3>
                <ul>
                    <li>Guidance and mentorship for national/international challenges</li>
                    <li>Connections with NaivoTech’s domain experts for further learning</li>
                </ul>
            </div>
        </div>
        <div class="service-item">
            <div class="icon">
                <img src="https://th.bing.com/th/id/OIP.WIhXFe6zP_f03RlLYiVm-QHaGV?rs=1&pid=ImgDetMain" alt="">
            </div>
            <div class="service-content">
                <h3>Complete Management & Accountability</h3>
                <ul>
                    <li>NaivoTech’s end-to-end ownership and operational support</li>
                    <li>Comprehensive performance tracking and reporting</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>




<!---======NEED FROM SCHOOLS-->
      
      <section class="Curriculum category" aria-label="category">
        <div class="container">
          <h2 class="section-subtitle" >NEED FROM SCHOOLS</h2>
          <h2 class="h2 section-title" style="font-size: 30px; margin-top: 10px;">WHAT WE NEED FROM SCHOOL</h2>
  
          <div class="requirements">
              <div class="requirement-item">
                  <div class="number">1</div>
                  <div class="content">
                      <h3>LAB SPACE :</h3>
                      <p>a minimum where 25-40 students can be accommodated comfortably</p>
                  </div>
              </div>
              <div class="requirement-item">
                  <div class="number">2</div>
                  <div class="content">
                      <h3>BASIC AMENITIES:</h3>
                      <p>Chairs, desks, board, access to computer lab with internet connectivity</p>
                  </div>
              </div>
              <div class="requirement-item">
                  <div class="number">3</div>
                  <div class="content">
                      <h3>STEM & INNOVATION Lab Fee:</h3>
                      <p>Mandatory yearly fee for <strong>Innovation Lab</strong> from all your school's students.</p>
                  </div>
              </div>
              <div class="requirement-item">
                  <div class="number">4</div>
                  <div class="content">
                      <h3>MEMORANDUM OF ASSOCIATION</h3>
                      <p>An MoU with the school for 3 years, and we can also renew mutually</p>
                  </div>
              </div>
          </div>
  



      <!-- 
        - #STEM resources to your school aligned with NEP 2020
      -->

      <section class="section category" id="" aria-label="about" style="margin-top: -12%;">
        
        <h2 class="how-it-works">HOW IT WORKS?</h2>
        <div class="workflow">
            <div class="step">
                <div class="circle"></div>
                <p>Lab Setup & Trainer</p>
            </div>
            <div class="step">
                <div class="circle"></div>
                <p>Regular Sessions</p>
            </div>
            <div class="step">
                <div class="circle"></div>
                <p>Showcase & Assessments</p>
            </div>
            <div class="step">
                <div class="circle"></div>
                <p>Skilled and Future Ready Kids</p>
            </div>
        </div>
    </div>
        
  


      </section>







      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">

            <img src="./assets/images/about-banner.jpg" width="450" height="590" loading="lazy" alt="about banner"
              class="w-100 about-img">

            <img src="./assets/images/about-abs-1.jpg" width="188" height="242" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-1">


          </figure>

          <div class="about-content">



            <h2 class="h2 section-title">Benefits of Partnering with VIL</h2>

            <ul class="about-list">

              <li class="about-item">

                <div class="item-icon item-icon-1">
                  <img src="./assets/images/about-icon-1.png" width="30" height="30" loading="lazy" aria-hidden="true">
                </div>

                <div>
                  <h3 class="h3 item-title">Industry Expert Instructor</h3>

                  <p class="item-text">
                   An Industry Expert Instructor is a seasoned professional who brings extensive real-world experience to the classroom.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="item-icon item-icon-2">
                  <img src="./assets/images/about-icon-2.png" width="30" height="30" loading="lazy" aria-hidden="true">
                </div>

                <div>
                  <h3 class="h3 item-title">Up-to-Date Course Content</h3>

                  <p class="item-text">
                    Up-to-date course content ensures students learn the latest advancements and best practices, equipping them with relevant skills for today’s professional environment.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="item-icon item-icon-3">
                  <img src="./assets/images/about-icon-3.png" width="30" height="30" loading="lazy" aria-hidden="true">
                </div>

                <div>
                  <h3 class="h3 item-title">Hands-on Kit for Practical Learning</h3>

                  <p class="item-text">
                    A hands-on kit for practical learning provides students with tangible tools and materials to apply theoretical knowledge through real-world, experiential activities.
                  </p>
                </div>

              </li>

            </ul>

            <a href="#" class="btn btn-primary">
              <span class="span">Know About Us</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

        </div>
      </section>




      <!------------------------------------>

      <!--Our Popular Skills Curriculum -->

      <!------------------------------------->


      <section class="Curriculum category" aria-label="category">
        <div class="container">

          <h2 class="h2 section-title">Schools that trust Us! Join Us today</h2>

          <div class="carousel">
            <div class="carousel-inner">
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 2.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 3.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 4.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 4.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
              <div class="carousel-item">
                <img src="assets/schools logo/Download 1.png" alt="Image 1">
              </div>
            </div>
          </div>

      </section>




      <!-------------------------------------->
      <!--Book a Meeting-->
      <!-------------------------------------->

      <section class="section Contact" id="meeting">
        <div class="center">
          <p class="section-subtitle">Contact</p>

          <h2 class="h2 section-title">Book a Meeting</h2>
        </div>
        <div class="flex-contact">
          <div class="flex-item-contact-left">
            <img src="assets/images/blog-1.jpg">
            <h2 class="intro">Book an Intro Meeting</h2>
            <h2 class="intro">Or Call us Today at</h2>
            <h2 class="num">(+91) 7007362892, 9653006686</h2>
          </div>
          <div class="flex-item-contact-right">
            <div>
              <form id="contactForm">
                <label for="fname">School Name</label>
                <input type="text" id="schoolname" name="schoolname" placeholder="Enter School Name" required>

                <label for="lname">Principal Name</label>
                <input type="text" id="principalename" name="principalename" placeholder="Enter Principal Name" required>

                <label for="country">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" required>

                <label for="country">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Phone" required>

                  <input type="submit" id="submitBtn" value="Submit">
    
              </form>
               <div id="successMessage" class="success-message"  style="display:none;">Your message has been sent successfully!</div>
            </div>

          </div>
      </section>

      -
  </main>

  <!-- 
    - #FOOTER
  -->

  <footer class="footer" style="background-image: url('./assets/images/')" style="display: none;">

    <div class="footer-top section">
      <div class="container grid-list">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/naivologo.png" width="250" height="90" alt="EduWeb logo">
          </a>

          <p class="footer-brand-text">
             NaivoTech aims to integrate experiential learning and technology at the core of academic curricula by
              establishing Innovation Labs in schools.
          </p>

          <div class="wrapper">
            <span class="span">Add:</span>

            <address class="address">Ram Ram bank</address>
          </div>

          <div class="wrapper">
            <span class="span">Call:</span>

            <a href="tel:++91) 7007362892, 9653006686" class="footer-link">+91) 7007362892, 9653006686</a>
          </div>

          <div class="wrapper">
            <span class="span">Email:</span>

            <a href="mailto:info@eduweb.com" class="footer-link">info@NaivoTech.com</a>
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
            <a href="top-skills" class="footer-link">Courses</a>
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
            <a href="#meeting" class="footer-link">Book a Meeting</a>
          </li>

          <li>
            <a href="#" class="footer-link">Gallery</a>
          </li>

          <li>
            <a href="#" class="footer-link">News & Articles</a>
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
            <form action="subscribe.php" id="newsletterForm" class="newsletter-form">
         <input type="email" name="email" placeholder="Your email" required class="input-field">
         <button type="submit" class="btn has-before">
         <span class="span">Subscribe</span>
         <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
         </button>
         </form>
         <div id="success-Message" class="success-message" style="display:none;">You have successfully subscribed!</div>
         

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
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


    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
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
  
 
 <script>
document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/meeting.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('contactForm').reset();
              
                // Hide the success message after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                successMessage.style.display = 'none';
             }, 5000);
        }
    };
    xhr.send(formData);
});
</script>


<script>
document.getElementById('newsletterForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/subscribe.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var successMessage = document.getElementById('success-Message');
            successMessage.style.display = 'block';
            document.getElementById('newsletterForm').reset();

            // Hide the success message after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 5000);
        } else {
            alert('Error: ' + xhr.status);
        }
    };
    xhr.send(formData);
});
</script>





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






  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
