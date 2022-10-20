<?php
if (strpos($_SERVER["REQUEST_URI"], 'rdb')) {
    include_once __DIR__ . '/Redis_rdb/queue.php';
    rdb();
} elseif (strpos($_SERVER["REQUEST_URI"], 'aof')) {
    include_once __DIR__ . '/Redis_aof/queue.php';
    aof();
} elseif (strpos($_SERVER["REQUEST_URI"], 't-beanstalkd')) {
    include_once __DIR__ . '/Beanstalkd/queue.php';
    beanstalkd();
} else {
    echo "<p>Welcome to PHP</p>";
}