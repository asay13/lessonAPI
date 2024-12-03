<?php
function autoload($className)
{
    $file = __DIR__ . '\\' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
    return;
    echo "Класс {$className} не найден!";
}

spl_autoload_register('autoload');
$user = 'root';
$password = 'root';
$db = 'db';
$host = 'localhost';
$port = 8889;
define('DB_USER', $user);
define('DB_PASS', $password);
define('DB_HOST', $host);
define('DB_PORT', $port);
define('DB_DB', $db);
