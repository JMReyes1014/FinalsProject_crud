<?php
session_start();
include ('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$alertScript = ""; // Initialize an empty script variable

// Retrieve project information for the given ID
$dis_name = '';
$dis_desc = '';
$dis_photo = '';
if (isset($_GET['update-projectid'])) {
    $id = $_GET['update-projectid'];
    $sql = "SELECT * FROM `projects` WHERE projects_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dis_name = $row['project_title'];
        $dis_desc = $row['project_description'];
        $dis_photo = $row['project_photo'];
    }
    $stmt->close();
}

// Handle form submission for editing project
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update project title and description
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $sql_update = "UPDATE `projects` SET project_title = ?, project_description = ? WHERE projects_ID = ?";
    $stmt_update = $con->prepare($sql_update);
    $stmt_update->bind_param("ssi", $name, $desc, $id);
    $stmt_update->execute();
    $stmt_update->close();

    // Check if file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['name']) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $file_destination = 'uploads/' . $file_name;
        if (move_uploaded_file($file_temp, $file_destination)) {
            // Update project photo in the database
            $sql_update_photo = "UPDATE `projects` SET project_photo = ? WHERE projects_ID = ?";
            $stmt_update_photo = $con->prepare($sql_update_photo);
            $stmt_update_photo->bind_param("si", $file_name, $id);
            if ($stmt_update_photo->execute() || $stmt_update->execute()) {
                // Update displayed photo
                $dis_photo = $file_name;
                echo '
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                icon: "success",
                                title: "Project Updated Successfully",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#4CAF50",
                                background: "#0e0d0d",
                                color: "#fff",
                                iconColor: "#4CAF50"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "manage-projects.php?update-projectid=' . $id . '";
                                }
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
                                text: "Failed to update skill: ' . $stmt->error . '",
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
    }
}

$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap cdn css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Animation on scroll cdn css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Line Awesome cdn css -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <!-- STYLE.CSS LINK -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="icon" href="./assets/images/cat-icon.png" />
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
                        <a class="nav-link" aria-current="page" href="logout.php"><i
                                class="las la-sign-out-alt"></i></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN SECTION -->
    <section id="settings" class="full-height px-lg-5">


        <div class="container mt-5 p-md-4">

            <div class="go-back">
                <a href="manage-projects.php" class="button-27">Go back</a>
            </div>

            <div class="col-lg-12 edit-main my-3">
                <div class="row-lg-7">

                    <div class="col">
                        <h4 style="font-size: 60px; text-align: center; margin-bottom: 30px;">Edit Project</h4>
                    </div>

                    <form method="post" enctype="multipart/form-data">
                        <div>
                            <input type="text" name="name" class="form-control my-3" value="<?php echo $dis_name ?>" />
                        </div>

                        <div>
                            <textarea name="desc" id="desc" rows="4"
                                class="form-control my-3"><?php echo $dis_desc ?></textarea>
                        </div>

                        <div class="form-group col-lg-12 my-4 d-flex align-items-center">
                            <div class="col-lg-6">
                                <label for="file" class="mt-lg-0 mb-lg-2">Change project picture</label>
                                <input type="file" name="file" id="file" accept="image/jpeg, image/png"
                                    onchange="previewFile()">
                                <label class="upload-file-lbl" for="file">
                                    <i class="material-icons">add_photo_alternate</i> &nbsp;
                                    Choose a Photo
                                </label>
                            </div>
                            <div id="preview" class="col-lg-6 ms-3">
                                <img id="previewImage" src="uploads/<?php echo $dis_photo; ?>" alt="Image Preview"
                                    style="margin-bottom: -50px; margin-left: -170px; max-height: 200px; max-width: 300px; display: <?php echo $dis_photo ? 'block' : 'none'; ?>;">
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 70px;">
                            <button type="submit" class="button-27 btn-add" style="background-color: #000000;">
                                Edit Project
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
            <div class="row gy-4 justify-content-between">
                <div class="col-auto">
                    <p class="mb-0 mt-2">
                        JM REYES @ 2024 || Finals Project in Advanced Database System
                    </p>
                </div>
                <div class="col-auto">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/KuddliestDudeYouHaveEverKnown" target="_blank"><i
                                class="lab la-facebook"></i></a>
                        <a href="https://www.instagram.com/itzjmbruhhh/" target="_blank"><i
                                class="lab la-instagram"></i></a>
                        <a href="https://github.com/JMReyes1014" target="_blank"><i class="lab la-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>

        function previewFile() {
            var preview = document.querySelector('#previewImage');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block'; // Display the preview image
            };

            if (file) {
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.src = "uploads/<?php echo $dis_photo; ?>"; // Display the original image if no new file selected
                preview.style.display = '<?php echo $dis_photo ? 'block' : 'none'; ?>'; // Adjust display based on $dis_photo
            }
        }
    </script>

    <!-- Bootstrap cdn js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- SweetAlert2 cdn js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animation on scroll cdn js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- main.js -->
    <script src="./js/main.js"></script>
</body>

</html>