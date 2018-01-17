<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 16:20
 */

namespace Projet\Core\Config;

use DateTime;
use Projet\Domain\Event;
use Projet\Domain\EventCollector;

class EventCollectionFactory
{
    public static function createFromArray(array $rowEvents): EventCollector {
        $events = new EventCollector();

        foreach ($rowEvents as $rowEvent) {
            $events->add(
                new Event(
                    $rowEvent['description'],
                    $rowEvent['objectif'],
                    $rowEvent['nombrePlace'],
                    $rowEvent['adresse'],
                    new DateTime($rowEvent['horaireDebut']),
                    new DateTime($rowEvent['horaireFin']),
                    $rowEvent['salleChoisie'])
            );
        }

        return $events;
    }
}