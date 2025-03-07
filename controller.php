<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'assets/config.php';

// load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// initialize S3 client
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$credentials = new Aws\Credentials\Credentials($_ENV['IONOS_S3_KEY_ID'], $_ENV['IONOS_S3_KEY_SECRET']);
$options = [
    'region' => 'auto',
    'endpoint' => $_ENV['IONOS_S3_API_URL'],
    'version' => 'latest',
    'credentials' => $credentials
];
$_S3 = new S3Client($options);

$_ROUTER = new \Bramus\Router\Router();

// check if user is authenicated, else send to login page
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (@$_SESSION['token'] !== md5($_ENV['CORRECT_PASSWORD']) && strpos($url, $_CONFIG['base_url'] . 'login') !== 0) {
    $url = urlencode($url);
    header('Location: ' . $_CONFIG['base_url'] . 'login?return_url=' . $url);
    exit;
}

$_ROUTER->get('/', function () {
    global $_CONFIG;
    require_once 'views/index.view.php';
});

$_ROUTER->get('/login', function () {
    global $_CONFIG;
    require_once 'views/login.view.php';
});

$_ROUTER->post('/login', function () {
    global $_CONFIG;
    global $_S3;

    $password = $_POST['password'] ?? '';
    $return_url = $_GET['return_url'];

    if ($password == $_ENV['CORRECT_PASSWORD']) {
        $_SESSION['token'] = md5($password);
        $return_url = urldecode($return_url);

        if (empty($return_url)) {
            $return_url = $_CONFIG['base_url'];
        }

        header('Location: ' . $return_url);
        exit;
    } else {
        header('Location: ' . $_CONFIG['base_url'] . 'login?return_url=' . $return_url);
        exit;
    }
});

$_ROUTER->get('/cam/360', function () {
    global $_CONFIG;
    require_once 'views/360.view.php';
});

$_ROUTER->get('/filetree', function () {
    global $_CONFIG;
    global $_S3;

    $path = $_GET['path'] ?? '';

    // array of all objects in the bucket with the given prefix
    $objects = $_S3->listObjects([
        'Bucket' => $_ENV['IONOS_S3_BUCKET'],
        'Prefix' => $path
    ]);

    // to json
    $objects = $objects->toArray();

    // sort objects by key (name)
    usort($objects['Contents'], function ($a, $b) {
        return strcmp($a['Key'], $b['Key']);
    });

    require_once 'views/filetree.view.php';
});

$_ROUTER->get('/viewer', function () {
    global $_CONFIG;
    global $_S3;

    $path = $_GET['path'] ?? '';

    // generate signed url (60min)
    $cmd = $_S3->getCommand('GetObject', [
        'Bucket' => $_ENV['IONOS_S3_BUCKET'],
        'Key'    => $path
    ]);

    $request = $_S3->createPresignedRequest($cmd, '+60 minutes');
    $url = (string) $request->getUri();

    // get object
    try {
        $object = $_S3->headObject([
            'Bucket' => $_ENV['IONOS_S3_BUCKET'],
            'Key' => $path
        ]);
    } catch (AwsException $e) {
        header('Location: ' . $_CONFIG['base_url'] . 'filetree');
        exit;
    }

    $object = $object->toArray();

    // download
    if (isset($_GET['download'])) {
        // force download
        header('Content-Type: ' . $object['ContentType']);
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        readfile($url);
        exit;
    }

    $size = round($object['ContentLength'] / 1024 / 1024, 2) . ' MB';
    $name = basename($path);
    $name = strtolower($name);

    // check file type
    if (strpos($name, '.insv') == true) {
        $type = 'insv';
        $icon = 'fa-regular fa-360-degrees';
        $is_file = true;
        $player = 'insta360';
    }

    if (strpos($name, '.insp') == true) {
        $type = 'insv';
        $icon = 'fa-regular fa-panorama';
        $is_file = true;
        $player = 'insta360';
    }

    if (strpos($name, '.mp4') == true) {
        $type = 'mp4';
        $icon = 'fa-regular fa-film';
        $is_file = true;
        $player = 'video';
    }

    if (strpos($name, '.jpg') == true) {
        $type = 'jpg';
        $icon = 'fa-regular fa-image';
        $is_file = true;
        $player = 'image';
    }

    if (strpos($name, '.') === false) {
        header('Location: ' . $_CONFIG['base_url'] . 'filetree?path=' . $path);
        exit;
    }

    if (!isset($type)) {
        $type = 'unknown';
        $icon = 'fa-regular fa-file';
        $is_file = true;
        $player = false;
    }

    require_once 'views/viewer.view.php';

});

$_ROUTER->run();
