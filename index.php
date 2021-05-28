<?php
ini_set('error_reporting', E_STRICT);
echo "<h1>api-login</h1>";
require_once('../lib/index.php');

new SecurityCheck();

new Master();
ob_flush();