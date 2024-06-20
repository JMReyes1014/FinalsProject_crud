<?php 

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

    include('connect.php');

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

?>