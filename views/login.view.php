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

<style>
    /* Full page webp background */
    body {
        background-image: url('<?= $_CONFIG['base_url']; ?>assets/img/bg-video.webp');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<body>

    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h1>
                    Skilager 2025
                </h1>
                <p class="text-muted">
                    Bitte gebe das Passwort ein, um die Dateien anzugeigen.
                </p>

                <form action="<?= $_CONFIG['base_url']; ?>login?return_url=<?= @$_GET['return_url']; ?>" method="post" class="my-5">
                    <div class="mb-3">
                        <label for="password" class="form-label">Passwort</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Hier Passwort eingeben...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Dateien entschlüsseln
                        <i class="fa-regular fa-chevrons-right ms-2"></i>
                    </button>
                </form>

                <hr>

                <p class="text-muted">
                    Du findest das Passwort auf WhatsApp in der Jahrgangsgruppe oder <a href="https://link.kurtiii.de/n9duc">auf Teams</a>.
                </p>
                <p class="text-muted">
                    Alle Videos und Fotos sind verschlüsselt gespeichert.
                </p>
            </div>
        </div>

    </div>

    <footer class="footer fixed-bottom bg-primary">
        <div class="container text-center">
            <span class="text-white">
                Made with 🦆 by <a href="https://kurtiii.de" class="text-reset">Kurt</a>
            </span>
        </div>
    </footer>

    <script src="<?= $_CONFIG['base_url']; ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>