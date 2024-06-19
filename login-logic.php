<?php 

session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if(empty($user)) {
        header("Location: login.php?error=username is required");
        exit();
    } else if(empty($pass)) {
        header("Location: login.php?error=password is required");
        exit();
    }

    $sql = "SELECT * FROM users WHERE user_name = '$user' AND user_password = '$pass'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['user_name'] === $user && $row['user_password'] === $pass) {
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_ID'] = $row['user_ID'];
            $_SESSION['login_success'] = true;
            header("Location: settings.php");
            exit();
        } else {
            header("Location: login.php?error=Incorrect username or password");
            exit();
        }
    } else {
        header("Location: login.php?error=Incorrect username or password");
        exit();
    }
} else {
    header("Location: login.php?error=Both fields are required");
    exit();
}

?>
