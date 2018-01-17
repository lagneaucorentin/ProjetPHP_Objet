<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 14:25
 */

namespace Projet\Core\Config;

use Projet\Core\Routing\RouteCollection;

class Configuration
{
    private $loader;
    public $config;

    public function __construct(ConfigLoader $loader)
    {
        $this->loader = $loader;
    }

    public function getSection($section): array
    {
        if (!$this->config) {
            $this->config = $this->loader->load();
        }

        if (!isset($this->config[$section])) {

            throw new \Exception('La section n\'existe pas');
        }

        return $this->config[$section];
    }

    public function getRoutes(): RouteCollection
    {
        return RouteCollectionFactory::createFromArray($this->getSection('routes'));
    }
}