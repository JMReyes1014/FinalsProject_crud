<?php
session_start();
include('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$alertScript = ""; // Initialize an empty script variable

// Retrieve education information for the given ID
if (isset($_GET['messageid'])) {
    $id = $_GET['messageid'];
    $sql = "SELECT * FROM `contact` WHERE contact_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $dis_name = $row['c_name'];
    $dis_email = $row['c_email'];
    $dis_subject = $row['c_subject'];
    $dis_content = $row['c_message'];
    $stmt->close();
}
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
                        <a class="nav-link" aria-current="page" href="settings.php"><i class="las la-cog"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active cog-active" aria-current="page" href="messages.php"><i
                                class="las la-envelope"></i></a>
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
                <a href="settings.php" class="button-27">Go back</a>
            </div>
        </div>

        <div class="d-flex justify-content-center message-content-control">

        <div class="d-flex justify-content-center" style="margin-left: 250px; margin-right: 250px;">
            <div class="message-control">
                
                <div>
                    <h4 style="font-size: 20px; margin: 30px; margin-bottom: 0; color: #ef4f4f;">From: Contact Name (contact@email.com)</h4>
                </div>

                <div class="col-12">
                    <h4 style="font-size: 40px; margin: 30px; margin-top: 10px;">Message Subject</h4>
                </div>

                <div class="col-12">
                    <p style="font-size: 30px; margin: 30px; margin-top: 50px;">Message content Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi ratione, reprehenderit dolorum quidem id, tempore aliquam, natus aut quaerat pariatur veritatis adipisci! Architecto alias ducimus natus fuga. Adipisci, aliquid pariatur ullam facere mollitia illo deleniti quibusdam voluptatem at dolorem ipsa itaque asperiores animi ex, tempora accusantium cupiditate aspernatur vero reiciendis! Exercitationem soluta molestias cumque impedit maiores laborum accusantium incidunt dolorum inventore quae id voluptatem nobis, iure corporis fugiat reiciendis delectus. Autem hic officia, ipsum accusamus nostrum nisi error dolor odio? Quam perferendis eaque dolor minima quaerat culpa, itaque rerum consectetur quidem nisi id corrupti. Neque provident eaque facilis iure unde.</p>
                </div>

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
    <script>
        AOS.init();
    </script>
    <!-- main.js -->
    <script src="./js/main.js"></script>
</body>

</html>