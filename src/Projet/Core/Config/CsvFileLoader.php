<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 16/01/2018
 * Time: 11:47
 */

namespace Projet\Core\Config;

class CsvFileLoader implements ConfigLoader
{
    private $paths;
    
    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }
    
    public function load() {
        $routes = [];
        
        foreach ($this->paths as $path) {
            $content = file_get_contents($path);
            $rowRoutes = explode(';', $content);

            foreach ($rowRoutes as $rowRoute) {
                
            }
        }
    }
}