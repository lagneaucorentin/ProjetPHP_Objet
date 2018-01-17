<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 16/01/2018
 * Time: 11:26
 */

namespace Projet\Core\Config;

use Projet\Core\Routing\Route;

class JsonFileLoader implements ConfigLoader
{
    private  $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    public function load(): array {
        $routes = [];

        foreach ($this->paths as $path) {
            $content = file_get_contents($path);
            $routes = array_merge_recursive($routes, json_decode($content, true));
        }

        return $routes;
    }
}