<?php

namespace DTApi\Http\Actions\Mailer;

use DTApi\Http\Contracts\Actions\AbstractMailer;

class Mailer implements AbstractMailer {

    // Send mail
    public function send(string $name, string $subject, string $mailTemplate, mixed $content) {
        $this->mailer->send($this->email, $name, $subject, $mailTemplate, $content);
    }
}