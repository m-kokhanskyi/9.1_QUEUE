<?php
function rdb() {
    $queue = new Redis();
    $queue->connect('host.docker.internal', 6312);
    $data = [
        'first_name'    => md5(microtime()),
        'last_name'     => md5(microtime()),
        'email_address' => md5(microtime()),
    ];
    $queue->rpush("list-rdb", json_encode($data));
    echo 'Finish' . PHP_EOL . PHP_EOL;
}

rdb();

