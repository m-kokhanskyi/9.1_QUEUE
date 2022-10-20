<?php
require __DIR__ . '/../vendor/autoload.php';

use Amp\Beanstalk\BeanstalkClient;
use Amp\Loop;

function beanstalkd() {
    Loop::run(function () {
        $beanstalk = new BeanstalkClient("tcp://host.docker.internal:11300");
        yield $beanstalk->use('foobar');
        $data = [
            'first_name'    => md5(microtime()),
            'last_name'     => md5(microtime()),
            'email_address' => md5(microtime()),
        ];
        $jobId = yield $beanstalk->put(json_encode($data), 1);

        echo "Inserted job id: $jobId\n";

        $beanstalk->quit();
    });
}

beanstalkd();

