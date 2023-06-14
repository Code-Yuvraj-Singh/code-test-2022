<?php

namespace DTApi\Http\Contracts\Actions;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

abstract class AbstractLogger {

    protected mixed $log;

    public function __construct()
    {
        $logger = new Logger('push_logger');

        $logger->pushHandler(new StreamHandler(storage_path('logs/push/laravel-' . date('Y-m-d') . '.log'), Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());
        $this->log = $logger;
    }

    public abstract function addInfo(...$args): void;
}

