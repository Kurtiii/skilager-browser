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
                $path = rtrim($path, '/') . '/';
                $path_parts = explode('/', $path);

                foreach ($path_parts as $index => $part):
                    $path = implode('/', array_slice($path_parts, 0, $index + 1));
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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Dateiname</th>
                    <th scope="col">Größe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($objects['Contents'] as $object):
                    $key = $object['Key'];
                    $size = $object['Size'];
                    $size = round($size / 1024 / 1024, 2) . ' MB';
                    $name = basename($key);
                    $name = strtolower($name);

                    // check if file is in that directory
                    if ($key == $path) {
                        continue;
                    }

                    $subdir = substr($key, strlen($path));
                    
                    if (strpos($subdir, '/') !== false && strpos($subdir, '/') < strlen($subdir) - 1) {
                        continue;
                    }
                    
                    // check file type
                    if (strpos($name, '.insv') == true) {
                        $type = 'insv';
                        $icon = 'fa-regular fa-360-degrees';
                        $is_file = true;
                    }
                    if (strpos($name, '.insp') == true) {
                        $type = 'insv';
                        $icon = 'fa-regular fa-panorama';
                        $is_file = true;
                    }

                    if (strpos($name, '.mp4') == true) {
                        $type = 'mp4';
                        $icon = 'fa-regular fa-film';
                        $is_file = true;
                    }

                    if (strpos($name, '.jpg') == true) {
                        $type = 'jpg';
                        $icon = 'fa-regular fa-image';
                        $is_file = true;
                    }

                    if (strpos($name, '.') === false) {
                        $type = 'mp4';
                        $icon = 'fa-regular fa-folder';
                        $name = $name . '/';
                        $size = '';
                        $is_file = false;
                    }

                    if (!isset($type)) {
                        $type = 'unknown';
                        $icon = 'fa-regular fa-file';
                        $is_file = true;
                    }

                    // generate link
                    if ($is_file) {
                        $link = $_CONFIG['base_url'] . 'viewer?path=' . $key;
                    } else {
                        $link = $_CONFIG['base_url'] . 'filetree?path=' . $key;
                    }
                ?>
                    <tr>
                        <td>
                            <a href="<?= $link; ?>" class="text-reset text-decoration-none">
                                <i class="<?= $icon; ?> text-primary me-2"></i>
                                <?= $name; ?>
                            </a>
                        </td>
                        <td>
                            <?= $size; ?>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>


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