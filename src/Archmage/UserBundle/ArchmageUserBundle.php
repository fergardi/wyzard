<?php

namespace Archmage\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ArchmageUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
