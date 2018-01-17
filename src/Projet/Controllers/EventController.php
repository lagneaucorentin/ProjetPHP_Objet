<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 14:31
 */

namespace Projet\Controllers;

use Projet\Core\Config\ChainLoader;
use Projet\Core\Config\Configuration;
use Projet\Core\Config\EventCollectionFactory;
use Projet\Core\Config\EventJsonFileLoader;
use Projet\Domain\Event;
use Projet\Domain\EventCollector;

use Projet\Core\Http\Request;
use Projet\Core\Http\Response;

class EventController
{
    public function showAllEvent(Request $request): Response {
        $content = '';

        $loader = new ChainLoader([
            new EventJsonFileLoader([__DIR__ . '/../Conf/salle.json'])
        ]);

        $config = new Configuration($loader);

        foreach (EventCollectionFactory::createFromArray($config->getSection('salle'))->all() as $salle) {
            echo $salle->getDescription();
        }

        return new Response($content, 200);
    }
}