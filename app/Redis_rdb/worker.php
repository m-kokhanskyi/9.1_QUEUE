<?php
$queue = new Redis();
$queue->connect('host.docker.internal', 6312);

while (true) {
    $data = $queue->lpop('list-rdb');
    if (!empty($data)) {
        $data  = json_decode($data, true);
        var_dump($data);
    } else {
        echo 'sleep' . PHP_EOL;
        sleep(1);
    }
}




