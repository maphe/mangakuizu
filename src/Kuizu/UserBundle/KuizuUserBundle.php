<?php

namespace Kuizu\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KuizuUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
