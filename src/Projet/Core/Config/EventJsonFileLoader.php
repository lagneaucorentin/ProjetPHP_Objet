<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:59
 */

namespace Projet\Core\Config;


class EventJsonFileLoader implements ConfigLoader
{
    private $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    public function load(): array {
        $config = [];

        foreach ($this->paths as $path) {
            $content = file_get_contents($path);
            $config = array_merge_recursive($config, json_decode($content, true));
        }

        return $config;
    }
}