<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Projet\Core\Config;

interface ConfigLoader
{
    public function load(): array;
}
