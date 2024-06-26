<?php
// Include the database connection file
include('connect.php');
?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    // Prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO contact (user_ID, c_name, c_email, c_subject, c_message) VALUES (?, ?, ?, ?, ?)");
    $userID = 1; // Assuming user_ID is 1 for now. This should be dynamically set according to the logged-in user.
    $stmt->bind_param("issss", $userID, $name, $email, $subject, $content);

    // SWEET ALERT
    if ($stmt->execute()) {
        echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Message Sent",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#4CAF50",
                    background: "#0e0d0d",
                    color: "#fff",
                    iconColor: "#4CAF50"
                });
            });
        </script>';
    } else {
        echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Failed to send message: ' . $stmt->error . '",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#f44336",
                    background: "#0e0d0d",
                    color: "#fff",
                    iconColor: "#f44336"
                });
            });
        </script>';
    }

    $stmt->close();
}

?>

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
  <!-- Include SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
            <a class="nav-link active" aria-current="page" href="login.php"><i class="las la-cog"></i></a>
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

          <h4 class="indent fs-medium mt-3">" It is by doing <span class="header-brand">ANYTHING</span> that we become
            <span class="header-brand">ANYBODY</span> "</h4>
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
          <?php
          $sql = "SELECT * FROM `education`";
          $result = mysqli_query($con, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['education_ID'];
              $level = $row['educational_level'];
              $campus = $row['campus_name'];
              $year = $row['school_year'];
              $attainments = $row['attainments'];
              echo '
                      <div class="col-12 resize mb-5" data-aos="fade-up">
                        <div class="bg-base p-4 rounded-4 shadow-effect">
                          <h4>' . $level . '</h4>
                          <p class="mb-2 text-brand">' . $campus . ' ' . $year . '</p>
                          <p class="mb-0">' . $attainments . '</p>
                        </div>
                      </div>

                      ';
            }
          }
          ?>
        </div>

        <!-- SKILLS ROW -->
        <div class="col-lg-10 mx-auto">
          <h1 class="mb-4 mt-0">Skills</h1>
          <div class="row gy-4">

            <?php
            $sql = "SELECT * FROM `skills`";
            $result = mysqli_query($con, $sql);
            if ($result) {

              $counter = 0; // Initialize counter
            
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['skills_ID'];
                $name = $row['skill_name'];
                $desc = $row['skill_description'];
                $delay = $counter * 300; // Calculate delay in milliseconds
            
                echo '
                  <div class="col-6 resize mb-5" data-aos="fade-up" data-aos-delay="' . $delay . '">
                      <div class="bg-base p-4 rounded-4 shadow-effect">
                          <p class="mb-2 text-brand">' . $name . '</p>
                          <p class="mb-0">' . $desc . '</p>
                      </div>
                  </div>
                    ';

                $counter++; // Increment counter for next skill
            
                // Reset counter after every 2 iterations
                if ($counter == 2) {
                  $counter = 0;
                }
              }
            }
            ?>


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


      <?php
        $sql = "SELECT * FROM `projects`";
        $result = mysqli_query($con, $sql);

        if ($result) {

          $counter = 0; // Initialize counter

            while ($row = mysqli_fetch_assoc($result)) {
                $proj_title = $row['project_title'];
                $proj_desc = $row['project_description'];
                $photo = $row['project_photo']; // Assuming it stores the image path or URL
                $delay = $counter * 300; // Calculate delay in milliseconds
                echo '
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="' . $delay . '">
                    <div class="card-custom rounded-4 bg-base shadow-effect">
                        <div class="card-custom-image rounded-4">
                            <img class="rounded-4" src="uploads/'.$photo.'" alt="'.$proj_title.'">
                        </div>
                        <div class="card-custom-content p-4">
                            <h4 class="header-brand">'.$proj_title.'</h4>
                            <p>'.$proj_desc.'</p>
                        </div>
                    </div>
                </div>
                ';

                $counter++; // Increment counter for next skill
            
                // Reset counter after every 2 iterations
                if ($counter == 2) {
                  $counter = 0;
                }

            }
        }
      ?>
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
          <form method="post" class="row g-lg-3 gy-3">

            <div class="form-group col-md-6" data-aos="fade-up">
              <input type="text" name="name" class="form-control" placeholder="Enter your name.">
            </div>
            <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="200">
              <input type="email" name="email" class="form-control" placeholder="Enter your email.">
            </div>
            <div class="form-group col-12" data-aos="fade-up" data-aos-delay="400">
              <input type="text" name="subject" class="form-control" placeholder="Enter subject.">
            </div>
            <div class="form-group col-12" data-aos="fade-up" data-aos-delay="800">
              <textarea name="content" id="" rows="5" class="form-control" placeholder="Enter message."></textarea>
            </div>
            <div class="form-group col-12" data-aos="fade-up" data-aos-delay="1000">
              <button type="submit" name="submit" formaction="index.php#contact" class="button-27 btn-contact">Contact Me</button>
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
            <a href="https://www.facebook.com/KuddliestDudeYouHaveEverKnown" target="_blank"><i
                class="lab la-facebook"></i></a>
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
  <!-- SWEET ALERT2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script> 
  <!-- Animation on scroll cdn js -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- main.js -->
  <script src="./js/main.js"></script>
</body>

</html>

<?php
$con->close();
?>