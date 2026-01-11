<style>
    .nav-link {
        color: #f8f9fa;
        font-weight: bold;
    }

    .nav-link:hover {
        color: #9A3F3F;
        font-weight: bold;
    }

    .navbar-nav {
        width: 35%;
    }

    @media (max-width: 1700px) {
        .navbar-nav {
            width: 45%; /* much smaller on small phones */
        }
    }

    @media (max-width: 1400px) {
        .navbar-nav {
            width: 55%; /* much smaller on small phones */
        }
    }

    @media (max-width: 1200px) {
        .navbar-nav {
            width: 70%; /* much smaller on small phones */
        }
    }

    @media (max-width: 576px) {
        .navbar-nav {
            width: 100%; /* much smaller on small phones */
        }
    }

    .patrick-hand-regular {
        font-size: 17pt;
    }
</style>

<nav class="navbar navbar-expand-lg patrick-hand-regular" style="background-color: #FD7979;" data-bs-theme="light">
    <div class="container-fluid mx-3 mx-md-5">
        <a class="navbar-brand" href="index.php">
            <img src="images/project_logo_new.png" class="img-fluid my-1" style="height: 3.7rem;" alt="logo">
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" style="color: #9A3F3F;"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-lg-flex justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 d-md-flex justify-content-between">
                <li class="nav-item">
                    <a class="nav-link" href="proverb.php">Shprehje Frazeologjike</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#">Video</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="article.php">Artikuj</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#">Librari</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">Rreth nesh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>