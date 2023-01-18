<?php

namespace Jonas\ListController\Helper;

trait AlertMessage
{
    public function setMessage(string $type, string $message): void
    {
        $_SESSION['alert_type'] = $type;
        $_SESSION['alert_message'] = $message;
    }
}
