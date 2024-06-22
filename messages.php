<?php
session_start();
include('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
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

        <div class="col-12">
            <h4 style="font-size: 60px; text-align: center; margin-bottom: 30px;">Messages</h4>
        </div>

        <div class="d-flex justify-content-center" style="margin-left: 250px; margin-right: 250px;">

            <div class="col-12">
                <div data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                    class="scrollable-div" tabindex="0">
        
                    <ol class="list-group list-group-numbered">

                    <?php 
                        $confirm_del = 'Are you sure you want to delete this contact?';
                        
                        // Prepares and executes SQL query
                        $sql = "SELECT * FROM `contact`";
                        $result = mysqli_query($con, $sql);
                        
                        if($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['contact_ID'];
                                $name = $row['c_name'];
                                $subject = $row['c_subject'];
                                
                                echo '
                                <a href="message-content.php?messageid='.$id.'" class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">'.$name.'</div>
                                        '.$subject.'
                                    </div>
                                    <div class="ms-1">
                                        <form method="post" action="delete.php?delete-messageid='.$id.'">
                                            <input type="hidden" name="id" value="'.$id.'">
                                            <button type="submit" name="delete" style="margin-top: 10px;" class="btn btn-danger btn-sm btn-size" onclick="return confirm(\''.$confirm_del.'\')">Delete</button>
                                        </form>
                                    </div>
                                </a>
                                ';
                            }
                        }
                    ?>


                    </ol>
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