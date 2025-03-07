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
                <?php
                $path_parts = rtrim($path, '/') . '/';
                $path_parts = explode('/', $path);

                foreach ($path_parts as $index => $part):
                    $path = implode('/', array_slice($path_parts, 0, $index + 1));

                    // check if last part
                    if ($index === count($path_parts) - 1) {
                        $part = '<strong>' . $part . '</strong>';
                    }
                ?>
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis text-decoration-none" href="<?= $_CONFIG['base_url']; ?>filetree?path=<?= $path; ?>">
                            <?= $part; ?>
                        </a>
                    </li>
                <?php
                endforeach;
                ?>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8">
                <?php if ($player == 'video'): ?>
                    <video controls class="w-100 rounded">
                        <source src="<?= $url; ?>" type="video/mp4">
                        <!-- Alert -->
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-regular fa-exclamation-triangle"></i>
                            Dieser Browser unterstützt das Video-Format nicht.
                            Lade die Datei <a href="<?= $_CONFIG['base_url']; ?>viewer?path=<?= $path; ?>&download=true">hier</a> herunter.
                        </div>
                    </video>
                <?php endif; ?>

                <?php if ($player == 'image'): ?>
                    <img src="<?= $url; ?>" class="w-100 rounded">
                <?php endif; ?>

                <?php if ($player == 'insta360'): ?>
                    <div class="text-center text-muted py-5 border rounded">
                        <i class="fa-regular fa-360-degrees fa-3x"></i>
                        <h5 class="mt-3">
                            Insta360-Inhalte werden im Browser nicht unterstützt.
                        </h5>
                        <p>
                            Bitte lade die Datei <a href="<?= $_CONFIG['base_url']; ?>viewer?path=<?= $path; ?>&download=true" class="text-reset">hier</a> herunter
                            und öffne sie am Computer in Insta360-Studio.
                        </p>
                        <p class="mt-5">
                            Download für <br><br>
                            <a href="#" class="text-primary text-decoration-none">
                                <i class="fa-brands fa-apple me-1"></i>
                                MacOS
                            </a>
                            <a href="#" class="text-primary text-decoration-none ms-5">
                                <i class="fa-brands fa-windows me-1"></i>
                                Windows
                            </a>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (!$player): ?>
                    <div class="text-center text-muted py-5 border rounded">
                        <i class="fa-regular fa-file fa-3x"></i>
                        <h5 class="mt-3">
                            Diese Datei kann nicht im Browser geöffnet werden.
                        </h5>
                        <p>
                            Bitte lade die Datei <a href="<?= $_CONFIG['base_url']; ?>viewer?download=true&path=<?= $path; ?>" class="text-reset">hier</a> herunterunter.
                        </p>
                    </div>
                <?php endif; ?>

            </div>
            <div class="col-md-4">
                <?php if ($object['ContentType'] == 'video/mp4' && ($object['ContentLength'] / 1024 / 1024) < 200): ?>
                    <!-- Example split danger button -->
                    <div class="btn-group w-100">
                        <a type="button" class="btn btn-primary btn-lg py-3 w-100" href="<?= $_CONFIG['base_url']; ?>viewer?download=true&path=<?= $path; ?>">
                            <i class="fa-regular fa-download me-2"></i>
                            Download
                        </a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://ezgif.com/video-compressor?url=<?= urlencode($url); ?>">Video komprimieren</a></li>
                            <li><a class="dropdown-item" href="https://ezgif.com/cut-video?url=<?= urlencode($url); ?>">Video zuschneiden</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="<?= $_CONFIG['base_url']; ?>viewer?download=true&path=<?= $path; ?>" class="btn btn-primary btn-lg py-3 w-100">
                        <i class="fa-regular fa-download me-2"></i>
                        Download
                    </a>
                <?php endif; ?>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $name; ?></h5>
                        <p class="card-text">
                            <i class="<?= $icon; ?> text-primary me-2"></i>
                            <span class="text-muted"><?= $object['ContentType']; ?></span>

                            <br>

                            <i class="fa-regular fa-disc-drive text-primary me-2"></i>
                            <span class="text-muted"><?= $size; ?></span>

                            <br>

                            <i class="fa-regular fa-copyright text-primary me-2"></i>
                            <span class="text-muted">CC BY-NC 4.0 <a href="https://link.kurtiii.de/tb7yb" class="text-muted text-decoration-none"><i class="fa-regular fa-circle-question ms-2"></i></a></span>
                        </p>
                    </div>
                </div>

                <p class="form-text mt-4">
                    🇩🇪
                    Download von Rechenzentrum <i>ionos/eu-central-3 (Berlin)</i>
                </p>
            </div>
        </div>

    </div>

    <footer class=" footer fixed-bottom bg-primary bg-opacity-25">
        <div class="container text-center">
            <span class="text-primary">
                Made with 🦆 by <a href="https://kurtiii.de">Kurt</a>
            </span>
        </div>
    </footer>

    <script src="<?= $_CONFIG['base_url']; ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>