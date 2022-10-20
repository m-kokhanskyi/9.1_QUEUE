<?php
function aof() {
    $queue = new Redis();
    $queue->connect('host.docker.internal', 6313);
    $data = [
        'first_name'    => md5(microtime()),
        'last_name'     => md5(microtime()),
        'email_address' => md5(microtime()),
    ];
    var_dump($queue->rpush("list-aof", json_encode($data)));
    echo 'Finish' . PHP_EOL;
}



aof();