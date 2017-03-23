<?php

namespace devlabs\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
    public function __construct()
    {
        require_once 'vendor/autoload.php';
    }
}