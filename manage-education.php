<?php
session_start();
include ('connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
  header("Location: login.php");
  exit();
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
  <!-- STYLE.CSS LINK -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="icon" href="./assets/images/cat-icon.png">
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

  <section id="settings" class="full-height px-lg-5">
    <div class="container settings-container mt-5 p-md-4">

      <div class="row-lg-3 settings-nav">
        <a class="settings-option" href="settings.php">
          <span class="py-md-3 m-md-2 oswald-normal">Manage Skills</span>
        </a>
        <a class="settings-option settings-active" href="manage-education.php">
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
        <a class="settings-option" href="add-project.php">
          <span class="py-md-3 m-md-2 oswald-normal">Add Project</span>
        </a>
      </div>

      <div class="row-lg-7 settings-main">

        <div class="col">
          <h4 style="font-size: 40px">Manage Education</h4>
        </div>

        <div>

          <?php
          $confirm_edit = 'Are you sure you want to edit this education?';
          $confirm_del = 'Are you sure you want to delete this education?';

          $records_per_page = 6; // Adjust the number of records per page
          $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
          $offset = ($current_page - 1) * $records_per_page;

          // Get the total number of records
          $sql_count = "SELECT COUNT(*) AS total FROM `education`";
          $result_count = mysqli_query($con, $sql_count);
          $row_count = mysqli_fetch_assoc($result_count);
          $total_records = $row_count['total'];

          $total_pages = ceil($total_records / $records_per_page);

          // Fetch records for the current page
          $sql = "SELECT * FROM `education` LIMIT $offset, $records_per_page";
          $result = mysqli_query($con, $sql);

          if ($result) {
            echo '<table>';
            echo '<thead>';
            echo '<tr><th>Campus Name</th><th>Edit</th><th>Delete</th></tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['education_ID'];
              $title = $row['campus_name'];
              echo '
        <tr>
          <td class="td-title">' . $title . '</td>
          <td class="edit-del">
            <form action="edit-education.php?update-educationid=' . $id . '" method="post">
              <input type="hidden" name="id" value="' . $id . '">
              <button type="submit" name="edit" class="btn sm btn-primary btn-size" onclick="return confirm(\'' . $confirm_edit . '\')">Edit</button>
            </form>
          </td>
          <td class="edit-del">
            <form method="post">
              <input type="hidden" name="id" value="' . $id . '">
              <a type="submit" href="delete.php?delete-educationid=' . $id . '" name="delete" class="btn sm btn-danger btn-size" onclick="return confirm(\'' . $confirm_del . '\')">Delete</a>
            </form>
          </td>
        </tr>
        ';
            }

            echo '</tbody>';
            echo '</table>';

            // Pagination controls
            echo '<div class="pagination" style="margin-left: 10px; font-size: 25px;">';
            if ($current_page > 1) {
              echo '<a style="margin-right: 20px;" href="?page=' . ($current_page - 1) . '">&laquo; Previous</a>';
            }

            for ($page = 1; $page <= $total_pages; $page++) {
              $active = $page == $current_page ? 'class="active"' : '';
              echo '<a style="margin-right: 20px;" ' . $active . ' href="?page=' . $page . '">' . $page . '</a>';
            }

            if ($current_page < $total_pages) {
              echo '<a style="margin-right: 20px;" href="?page=' . ($current_page + 1) . '">Next &raquo;</a>';
            }
            echo '</div>';
          }
          ?>


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

  <!-- Bootstrap cdn js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- Animation on scroll cdn js -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const paginationLinks = document.querySelectorAll('.pagination a');
      paginationLinks.forEach(link => {
        link.addEventListener('click', function (event) {
          event.preventDefault();
          const page = this.getAttribute('href').split('page=')[1];
          loadPage(page);
        });
      });

      function loadPage(page) {
        fetch('?page=' + page)
          .then(response => response.text())
          .then(html => {
            const newTbody = new DOMParser().parseFromString(html, 'text/html').querySelector('tbody').innerHTML;
            document.querySelector('table tbody').innerHTML = newTbody;

            // Update pagination links
            const newPagination = new DOMParser().parseFromString(html, 'text/html').querySelector('.pagination').innerHTML;
            document.querySelector('.pagination').innerHTML = newPagination;

            // Re-attach event listeners to the new pagination links
            const newPaginationLinks = document.querySelectorAll('.pagination a');
            newPaginationLinks.forEach(link => {
              link.addEventListener('click', function (event) {
                event.preventDefault();
                const page = this.getAttribute('href').split('page=')[1];
                loadPage(page);
              });
            });
          });
      }
    });
  </script>
  <!-- main.js -->
  <script src="./js/main.js"></script>
</body>

</html>