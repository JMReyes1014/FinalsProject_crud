<?php
session_start();
include ('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['submit'])) {
  $title = htmlspecialchars(trim($_POST['title']));
  $desc = htmlspecialchars(trim($_POST['description']));
  $photo = $_FILES['photo']['name'];
  $tempname = $_FILES['photo']['tmp_name'];
  $folder = 'uploads/' . $photo;

  // Ensure photo upload directory exists
  if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
  }

  // Move the uploaded file to the server directory
  if (move_uploaded_file($tempname, $folder)) {
    // Use session user_ID
    $userID = $_SESSION['user_ID'];

    // Prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO `projects` (user_ID, project_title, project_description, project_photo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $userID, $title, $desc, $photo);

    // Sweet alert
    if ($stmt->execute()) {
      echo '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Project Added Successfully",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#4CAF50",
                        background: "#0e0d0d",
                        color: "#fff",
                        iconColor: "#4CAF50"
                    }).then(function() {
                        window.location = "manage-projects.php";
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
                        text: "Failed to add project: ' . $stmt->error . '",
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
  } else {
    echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Failed to upload photo",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#f44336",
                    background: "#0e0d0d",
                    color: "#fff",
                    iconColor: "#f44336"
                });
            });
        </script>';
  }
}

$con->close();
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
  <!-- STYLE.CSS LINK -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="icon" href="./assets/images/cat-icon.png">
  <!-- MATERIAL ICONS LINK -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>JM Reyes | Webpage</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container fluid mx-lg-auto">
      <a class="navbar-brand navbar-font" href="index.php">
        <span class="name-logo"><i class="las la-cat"></i> JM REYES</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar-font" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active cog-active" style="pointer-events: none;" aria-current="page"
              href="settings.php"><i class="las la-cog"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="messages.php"><i class="las la-envelope"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="logout.php"><i class="las la-sign-out-alt"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="settings" class="full-height px-lg-5">
    <div class="container settings-container mt-5 p-md-4">

      <div class="row-lg-3 settings-nav">
        <a class="settings-option" href="settings.php">
          <span class="py-md-3 m-md-2 oswald-normal">Manage Skills</span>
        </a>
        <a class="settings-option" href="manage-education.php">
          <span class="py-md-3 m-md-2 oswald-normal">Manage Education</span>
        </a>
        <a class="settings-option" href="manage-projects.php">
          <span class="py-md-3 m-md-2 oswald-normal">Manage Projects</span>
        </a>
        <a class="settings-option" href="add-skills.php">
          <span class="py-md-3 m-md-2 oswald-normal">Add Skills</span>
        </a>
        <a class="settings-option" href="add-education.php">
          <span class="py-md-3 m-md-2 oswald-normal">Add Education</span>
        </a>
        <a class="settings-option settings-active" href="add-project.php">
          <span class="py-md-3 m-md-2 oswald-normal">Add Project</span>
        </a>
      </div>

      <div class="row-lg-7 settings-main">
        <div class="col">
          <h4 style="font-size: 40px">Add Project</h4>
        </div>

        <div class="container">
        <form method="post" enctype="multipart/form-data">
  <div class="form-group col-lg-12 my-4">
    <input type="text" class="form-control" name="title" placeholder="Enter project title" required>
  </div>
  <div class="form-group col-lg-12 my-4">
  <textarea class="form-control" rows="3" name="description" placeholder="Enter project description" autocomplete="off"></textarea>
  </div>
  
  <div class="form-group col-lg-12 my-4 d-flex align-items-center">
    <div class="col-lg-6">
      <label for="file" class="mt-lg-0 mb-lg-2">Upload project picture</label>
      <input type="file" name="photo" id="file" accept="image/jpeg, image/png" required onchange="previewFile()">
      <label class="upload-file-lbl" for="file">
        <i class="material-icons">add_photo_alternate</i> &nbsp;
        Choose a Photo
      </label>
    </div>
    <div id="preview" class="col-lg-6 ms-3">
      <img id="previewImage" src="#" alt="Image Preview" style="margin-left: -100px; margin-bottom: -50px; display: none; max-height: 200px; max-width: 300px;">
    </div>
  </div>
  
  <div class="form-group" style="margin-top: 80px;">
    <button type="submit" name="submit" class="button-27 btn-add">
      Add Project
    </button>
  </div>    
</form>
        </div>

      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer class="py-5 p-lg-3">
    <div class="container">
      <p>Copyright © 2023 JM Reyes</p>
    </div>
  </footer>

  <!-- Bootstrap cdn js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <!-- Animation on scroll cdn js -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- Sweet alert script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- JavaScript to preview image -->
  <script>
    function previewFile() {
      const file = document.querySelector('input[type=file]').files[0];
      const preview = document.getElementById('previewImage');
      const fileName = document.getElementById('fileName');

      const reader = new FileReader();

      reader.addEventListener("load", function () {
        preview.src = reader.result;
        preview.style.display = 'block';
      }, false);

      if (file) {
        reader.readAsDataURL(file);
        fileName.textContent = 'File Name: ' + file.name;
      }
    }
  </script>
  <!-- main.js -->
  <script src="./js/main.js"></script>
</body>

</html>