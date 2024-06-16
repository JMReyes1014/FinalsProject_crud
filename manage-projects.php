<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap cdn css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- Animation on scroll cdn css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Line Awesome cdn css -->
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
    <!-- STYLE.CSS LINK -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="icon" href="./assets/images/cat-icon.png" />
    <title>JM Reyes | Webpage</title>
  </head>

  <body data-bs-spy="scroll" data-bs-target=".navbar">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container fluid mx-lg-auto">
        <a class="navbar-brand navbar-font" href="index.php">
          <span class="name-logo"><i class="las la-cat"></i> JM REYES</span></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-font" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php#home"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php#about"
                >About</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php#projects"
                >Projects</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php#contact"
                >Contact</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="settings.php"
                ><i class="las la-cog"></i
              ></a>
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
          <a
            class="settings-option settings-active"
            href="manage-projects.php"
          >
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
            <h4 style="font-size: 40px">Manage Projects</h4>
          </div>

          <div>
            <table>
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="td-title">LAYA (Legal Aid at Your Access)</td>
                  <td class="edit-del"><a class="btn sm btn-primary btn-size" href="">Edit</a></td>
                  <td class="edit-del"><a class="btn sm btn-danger btn-size" href="">Delete</a></td>
                </tr>
                <tr>
                  <td class="td-title">iPaws</td>
                  <td class="edit-del"><a class="btn sm btn-primary btn-size" href="">Edit</a></td>
                  <td class="edit-del"><a class="btn sm btn-danger btn-size" href="">Delete</a></td>
                </tr>
              </tbody>
            </table>
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
              <a href="https://www.facebook.com/KuddliestDudeYouHaveEverKnown" target="_blank"><i class="lab la-facebook"></i></a>
              <a href="https://www.instagram.com/itzjmbruhhh/" target="_blank"><i class="lab la-instagram"></i></a>
              <a href="https://github.com/JMReyes1014" target="_blank"><i class="lab la-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap cdn js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <!-- Animation on scroll cdn js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- main.js -->
    <script src="./js/main.js"></script>
  </body>
</html>
