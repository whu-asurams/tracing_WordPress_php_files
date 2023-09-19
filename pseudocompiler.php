<?php 


echo "<p>The Wordpress system starts with the index.php file from public_html folder, </p>";
$wpConstants = array();
$wpGlobals   = array();
$wpConstants['currentDir']     = __DIR__;
$wpConstants['ABSPATH']        = __DIR__ . '/';
$wpConstants['WP_CONTENT_DIR'] = $wpConstants['ABSPATH']        . 'wp-content'; 
$wpConstants['theme']          = $wpConstants['WP_CONTENT_DIR'] . '/themes/whu'; 



require_once __DIR__ . '/analyzer.php';
require_once __DIR__ . 'file_analyzer.php';


$pcompiler = new analyzer( "pcompilerOutput.txt",  __DIR__ . "/index.php" );

$pcompiler->run();


?>