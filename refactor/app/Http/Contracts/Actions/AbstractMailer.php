<?php

namespace DTApi\Http\Contracts\Actions;
use DTApi\Mailers\AppMailer;

abstract class AbstractMailer {

    protected string $email;
    protected mixed $mailer;

    public function __construct(string $email) {
        $this->mailer = new AppMailer();
        $this->email = $email;
    }

    abstract public function send(string $name, string $subject, string $mailTemplate, mixed $content): void;
}

