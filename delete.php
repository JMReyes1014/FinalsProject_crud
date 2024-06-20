<?php 
// inlcudes connection to database
    include('connect.php');


// Logic Respoinsible for deleting skill
    if(isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `skills` WHERE skills_ID = $id";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            die(mysqli_error($con));
        } else {
            header('location: settings.php');
        }
    }

// Logic Respoinsible for deleting education
    if(isset($_GET['delete-educationid'])) {
        $id = $_GET['delete-educationid'];

        $sql = "DELETE FROM `education` WHERE education_ID = $id";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            die(mysqli_error($con));
        } else {
            header('location: manage-education.php');
        }
    }

// Logic responsible for deleting project



// Checks if a user is logged in 
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>