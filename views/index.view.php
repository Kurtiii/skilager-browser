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
        <p class="text-muted">
            Wähle aus, welchen Inhalt du sehen möchtest.
        </p>

        <a href="<?= $_CONFIG['base_url']; ?>cam/360" class="text-reset text-decoration-none">
            <div class="card mb-4 mt-5" style="max-width: 540px;">
                <div class="row g-0 align-items-center bg-primary bg-opacity-25 rounded">
                    <div class="col-2 text-primary text-center">
                        <i class="fa-regular fa-360-degrees fa-2x"></i>
                    </div>
                    <div class="col-10 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                360° Videos und Fotos
                            </h5>
                            <span class="form-text">
                                Insta360 One X2
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?= $_CONFIG['base_url']; ?>cam/action_cam" class="text-reset text-decoration-none">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0 align-items-center bg-primary bg-opacity-25 rounded">
                    <div class="col-2 text-primary text-center">
                        <i class="fa-regular fa-camera-security fa-2x"></i>
                    </div>
                    <div class="col-10 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                Action Cam Videos und Fotos
                            </h5>
                            <span class="form-text">
                                GoPro Hero 9 Black
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