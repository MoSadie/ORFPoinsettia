<?php 
$dir = new DirectoryIterator(dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR);
$configFile = null;
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->isFile()) {	
        $configFile = array_reverse(file($fileinfo->getPathname()));
    }
}

if ($configFile == null) {
    http_response_code(500);
    exit;
}

$db_username = array_pop($configFile);
$db_password = array_pop($configFile);
$db_hostname = array_pop($configFile);
$db_database = array_pop($configFile);
$db_table = array_pop($configFile);
?>