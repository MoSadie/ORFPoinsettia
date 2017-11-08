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

$db_username = trim(array_pop($configFile));
$db_password = trim(array_pop($configFile));
$db_hostname = trim(array_pop($configFile));
$db_database = trim(array_pop($configFile));
$db_table = trim(array_pop($configFile));
$email_event_code = trim(array_pop($configFile));
$email_event_key = trim(array_pop($configFile));
?>