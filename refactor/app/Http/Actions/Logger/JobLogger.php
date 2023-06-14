<?php

namespace DTApi\Http\Actions;

use DTApi\Http\Contracts\Actions\AbstractLogger;

class JobLogger extends AbstractLogger {

    public function addInfo(...$args): void {
        $this->log->addInfo('Push send for job ' . implode(' ', $args));
    }
}