<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skilager 2025</title>
    <link rel="icon" type="image/png" href="<?= $_CONFIG['base_url']; ?>assets/img/favicon.png" />

    <link rel="stylesheet" href="<?= $_CONFIG['base_url']; ?>assets/lib/bootstrap/css/bootstrap.min.css">
    <script src="<?= $_CONFIG['base_url']; ?>assets/lib/jquery/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e53a33f556.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= $_CONFIG['base_url']; ?>assets/styles/main.css">
</head>

<body>

    <div class="container my-5">
        <h1>
            Skilager 2025
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis" href="<?= $_CONFIG['base_url']; ?>">
                        <i class="fa-regular fa-house"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                        360° Aufnahmen
                    </a>
                </li>
            </ol>
        </nav>

        <a href="<?= $_CONFIG['base_url']; ?>filetree?path=insta360/rendered" class="text-reset text-decoration-none">
            <div class="card mb-4 mt-5" style="max-width: 540px;">
                <div class="row g-0 align-items-center bg-primary bg-opacity-25 rounded">
                    <div class="col-2 text-primary text-center">
                        <i class="fa-regular fa-photo-film fa-2x"></i>
                    </div>
                    <div class="col-10 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                Pre-rendered
                                <span class="badge text-bg-primary bg-opacity-25 text-primary ms-1">Empfohlen</span>
                            </h5>
                            <span class="form-text">
                                Bereits bearbeitete 360° Aufnahmen
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?= $_CONFIG['base_url']; ?>filetree?path=insta360/raw" class="text-reset text-decoration-none">
            <div class="card mb-4" style="max-width: 540px;">
                <div class="row g-0 align-items-center bg-primary bg-opacity-25 rounded">
                    <div class="col-2 text-primary text-center">
                        <i class="fa-regular fa-file-video fa-2x"></i>
                    </div>
                    <div class="col-10 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                Raw
                            </h5>
                            <span class="form-text">
                                Unbearbeitete 360° Aufnahmen
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?= $_CONFIG['base_url']; ?>filetree?path=insta360/software" class="text-reset text-decoration-none">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0 align-items-center bg-primary bg-opacity-25 rounded">
                    <div class="col-2 text-primary text-center">
                        <i class="fa-regular fa-laptop-arrow-down fa-2x"></i>
                    </div>
                    <div class="col-10 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                Insta360 Studio
                            </h5>
                            <span class="form-text">
                                Software für Insta360 Aufnahmen (<i class="fa-brands fa-apple"></i> & <i class="fa-brands fa-windows"></i>)
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </div>

    <footer class="footer fixed-bottom bg-primary bg-opacity-25">
        <div class="container text-center">
            <span class="text-primary">
                Made with 🦆 by <a href="https://kurtiii.de">Kurt</a>
            </span>
        </div>
    </footer>

    <script src="<?= $_CONFIG['base_url']; ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>