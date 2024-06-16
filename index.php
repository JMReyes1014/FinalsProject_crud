<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap cdn css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Animation on scroll cdn css -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Line Awesome cdn css -->
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- STYLE.CSS LINK -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="icon" href="./assets/images/cat-icon.png">
  <title>JM Reyes | Webpage</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container fluid mx-lg-auto">
      <a class="navbar-brand navbar-font" href="#">
        <span class="name-logo"><i class="las la-cat"></i> JM REYES</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar-font" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="settings.php"><i class="las la-cog"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HOME -->
  <section id="home" class="full-height px-lg-5">
    <div class="container mx-lg-auto">
      <div class="row">
        <!-- HOME INTRO COL -->
        <div class="col-lg-7 margin-top-center">
          <h2 class="display-5 header-brand">— I am</h2>
          <h1 class="display-1 indent mt-2">John Michael Reyes</h1>
          
          <div class="body">
            <div class="container-txt">
              <span class="text first-text">I'm a</span>
              <span class="text second-text">Student</span>
            </div>
         </div>

          <h4 class="indent fs-medium mt-3">" It is by doing <span class="header-brand">ANYTHING</span> that we become <span class="header-brand">ANYBODY</span> "</h4>
          <div>
            <a href="#projects" class="button-27 mt-4 me-4">View My Projects</a>
            <a href="#" class="link-custom">Email me: reyesjr3@students.nu-lipa.edu.ph</a>
          </div>
        </div>

        <!-- IMAGE COL -->
        <div class="col-lg-5">
          <img src="./assets/images/Portfolio.png" alt="JM Reyes" class="d-none d-lg-block jm">
        </div>

      </div>
    </div>
  </section>

  <!-- ABOUT -->
   <section id="about" class="full-height px-lg-5">
    <div class="container">

      <!-- ABOUT INTRO COL -->
      <div class="row pb-4 mb-0">
        <div class="col-lg-8">
          <h4 class="header-brand">ABOUT</h4>
          <h1>— My Education and Skills</h1>
        </div>
      </div>

      <!-- Education Row-->
       <div class="row gy-5">

        <div class="col-lg-10 mx-auto">

          <h1 class="mb-4 mt-0">Education</h1>

          <div class="col-12 resize mb-5" data-aos="fade-up">
            <div class="bg-base p-4 rounded-4 shadow-effect">
              <h4>High School</h4>
              <p class="mb-2 text-brand">Canossa Academy Lipa City (2014 - 2018)</p>
              <p class="mb-0">Graduated as an achiver and as an active member of the Math Honor's Society, Chess and Taekwondo Club</p>
            </div>
          </div>

          <div class="col-12 resize mb-5" data-aos="fade-up" data-aos-delay="300">
            <div class="bg-base p-4 rounded-4 shadow-effect">
              <h4>Senior High School</h4>
              <p class="mb-2 text-brand">APEC Schools Lipa City (2019 - 2021)</p>
              <p class="mb-0">Graduated with Excellence and Merit Award</p>
            </div>
          </div>

          <div class="col-12 resize mb-5" data-aos="fade-up" data-aos-delay="600">
            <div class="bg-base p-4 rounded-4 shadow-effect">
              <h4>Bachelor of Science in Computer Science</h4>
              <p class="mb-2 text-brand">National University Lipa City (2022 - Present)</p>
              <p class="mb-0">Made the Dean's List for 3 terms <br> </p>
            </div>
          </div>

        </div>

        <div class="col-lg-10 mx-auto">
          <h1 class="mb-4 mt-0">Skills</h1>
          <div class="row gy-4">

            <div class="col-6 resize mb-5" data-aos="fade-up">
              <div class="bg-base p-4 rounded-4 shadow-effect">
                <p class="mb-2 text-brand">Time Management</p>
                <p class="mb-0">I excel in time management, effectively prioritizing tasks and meeting deadlines consistently. I organize my workload to maximize productivity and ensure timely completion of projects, all while balancing multiple responsibilities with ease.</p>
              </div>
            </div>
  
            <div class="col-6 resize mb-5" data-aos="fade-up" data-aos-delay="300">
              <div class="bg-base p-4 rounded-4 shadow-effect">
                <p class="mb-2 text-brand">Quick Learner</p>
                <p class="mb-0">I have a strong ability to rapidly grasp new concepts and technologies. I adapt quickly to changing environments and integrate new knowledge into practical applications, which enhances my efficiency and performance in various tasks and projects.</p>
              </div>
            </div>

            <div class="col-6 resize mb-5" data-aos="fade-up">
              <div class="bg-base p-4 rounded-4 shadow-effect">
                <p class="mb-2 text-brand">Web Design</p>
                <p class="mb-0">I am proficient in web design, utilizing HTML, CSS, PHP, and MySQL to create visually appealing and functional websites. I develop responsive web pages, implement server-side scripting, and manage databases to deliver seamless user experiences and robust backend functionalities.</p>
              </div>
            </div>

            <div class="col-6 resize mb-5" data-aos="fade-up" data-aos-delay="300">
              <div class="bg-base p-4 rounded-4 shadow-effect">
                <p class="mb-2 text-brand">Coding</p>
                <p class="mb-0">I have extensive experience in coding with Java and Python, leveraging these languages to develop efficient and scalable software solutions. I write clean, well-documented code and solve complex problems through innovative programming techniques and practices.</p>
              </div>
            </div>

          </div>
        </div>
       </div>

    </div>
   </section>
  
  <!-- PROJECTS -->
  <section id="projects" class="full-height px-lg-5">
    <div class="container">

      <!-- PROJECTS INTRO COL -->
      <div class="row pb-4">
        <div class="col-lg-8">
          <h4 class="header-brand">PROJECTS</h4>
          <h1>— My Recent Projects</h1>
        </div>
      </div>

      <!-- PROJECT CARDS -->
      <div class="row gy-4">

        <div class="col-md-6" data-aos="fade-up">
          <div class="card-custom rounded-4 bg-base shadow-effect">
              <div class="card-custom-image rounded-4">
                  <img class="rounded-4" src="./assets/images/Project-1.png" alt="">
              </div>
              <div class="card-custom-content p-4">
                  <h4 class="header-brand">LAYA (Legal Aid at Your Access)</h4>
                  <p>
                    An AI chatbot designed to address all your inquiries and needs related to Philippine laws. This advanced virtual assistant provides comprehensive and accurate information, helping you navigate legal questions, understand regulations, and stay informed about legal matters specific to the Philippines.</p>
                  <a href="" class="link-custom">Read More</a>
              </div>
          </div>
        </div>

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="card-custom rounded-4 bg-base shadow-effect">
              <div class="card-custom-image rounded-4">
                  <img class="rounded-4" src="./assets/images/Project-2.png" alt="">
              </div>
              <div class="card-custom-content p-4">
                  <h4 class="header-brand">iPaws</h4>
                  <p>"A comprehensive pet tracker app that enables you to connect with fellow pet owners, locate the nearest veterinary services, and monitor your pet's daily activities and needs."</p>
                  <a href="" class="link-custom">Read More</a>
              </div>
          </div>
        </div>

      </div>
      
    </div>
   </section>

  <!-- CONTACT -->
   <section id="contact" class="full-height px-lg-5">
    <div class="container">

      <!-- CONTACT INTRO -->
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <h4 class="header-brand">CONTACT</h4>
          <h1>Interested in working? Let's talk.</h1>
        </div>

      <!-- CONTACT FORM -->
       <div class="col-lg-8">
        <form action="" class="row g-lg-3 gy-3">

          <div class="form-group col-md-6" data-aos="fade-up">
            <input type="text" class="form-control" placeholder="Enter your name.">
          </div>
          <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="200">
            <input type="email" class="form-control" placeholder="Enter your email.">
          </div>
          <div class="form-group col-12" data-aos="fade-up" data-aos-delay="400">
            <input type="text" class="form-control" placeholder="Enter subject.">
          </div>
          <div class="form-group col-12" data-aos="fade-up" data-aos-delay="800">
            <textarea name="" id="" rows="5" class="form-control" placeholder="Enter message."></textarea>
          </div>
          <div class="form-group col-12" data-aos="fade-up" data-aos-delay="1000">
            <button type="submit" formaction="#contact" class="button-27 btn-contact">Contact Me</button>
          </div>

        </form>
       </div>

      </div>
    </div>
   </section>

   <!-- FOOTER -->
    <footer class="py-5 p-lg-3">
      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-auto">
            <p class="mb-0 mt-2">JM REYES @ 2024 || Finals Project in Advanced Database System</p>
          </div>
          <div class="col-auto">
            <div class="social-icons">
              <a href="https://www.facebook.com/KuddliestDudeYouHaveEverKnown" target="_blank"><i class="lab la-facebook"></i></a>
              <a href="https://www.instagram.com/itzjmbruhhh/" target="_blank"><i class="lab la-instagram"></i></a>
              <a href="https://github.com/JMReyes1014" target="_blank"><i class="lab la-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

  <script> 
    const text = document.querySelector(".second-text");

    const textLoad = () => {
      setTimeout(() => {
        text.textContent = "Student"
      }, 0);
      setTimeout(() => {
        text.textContent = "Gamer"
      }, 4000);
      setTimeout(() => {
        text.textContent = "Developer"
      }, 8000);
    }

    textLoad();
    setInterval(textLoad, 12000);
  </script>
  <!-- Bootstrap cdn js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- Animation on scroll cdn js -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- main.js -->
  <script src="./js/main.js"></script>
</body>

</html>