<?php
if(!isset($_GET['process'])) {
    return;
}
$process = $_GET['process'];
$file = __DIR__ . '/process/'.$process.'.php';
if (file_exists($file)) {
    include_once ($file);
    return;
}
