<?php
session_start();
include('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$alertScript = ""; // Initialize an empty script variable

// Retrieve skill information for the given ID
if (isset($_GET['update-skillid'])) {
    $id = $_GET['update-skillid'];
    $sql = "SELECT * FROM `skills` WHERE skills_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $dis_name = $row['skill_name'];
    $dis_desc = $row['skill_description'];
    $stmt->close();
}

// Update skill information
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['skill_name'];
    $desc = $_POST['skill_desc'];

    // Prepared statement to prevent SQL injection
    $stmt = $con->prepare("UPDATE `skills` SET skill_name = ?, skill_description = ? WHERE skills_ID = ?");
    $stmt->bind_param("ssi", $name, $desc, $id);

    if ($stmt->execute()) {
        $alertScript = '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Skill Updated Successfully",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#4CAF50",
                    background: "#0e0d0d",
                    color: "#fff",
                    iconColor: "#4CAF50"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "settings.php?update-skillid='.$id.'";
                    }
                });
            });
        </script>';
    } else {
        $alertScript = '
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

    $stmt->close();
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
                        <a class="nav-link" aria-current="page" href="logout.php"><i class="las la-sign-out-alt"></i></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN SECTION -->
    <section id="settings" class="full-height px-lg-5">
        <div class="container mt-5 p-md-4">
            <div class="go-back">
                <a href="settings.php" class="button-27">Go back</a>
            </div>
            <div class="col-lg-12 edit-main my-3">
                <div class="row-lg-7">
                    <div class="col">
                        <h4 style="font-size: 60px; text-align: center; margin-bottom: 30px;">Edit Skill</h4>
                    </div>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div>
                            <input type="text" name="skill_name" class="form-control my-3" value="<?php echo $dis_name ?>" />
                        </div>
                        <div>
                            <textarea name="skill_desc" rows="4" class="form-control my-3"><?php echo $dis_desc ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="button-27 btn-add" style="background-color: #000000;">
                                Edit Skill
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

    <!-- Bootstrap cdn js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Animation on scroll cdn js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Initialize AOS -->
    <script>
        AOS.init();
    </script>
    <!-- SweetAlert2 cdn js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $alertScript; ?>
</body>

</html>
