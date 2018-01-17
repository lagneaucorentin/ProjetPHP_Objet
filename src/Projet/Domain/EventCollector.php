<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:52
 */

namespace Projet\Domain;


class EventCollector
{
    private $events = array();

    public function __construct(array $events = [])
    {
        foreach ($events as $event) {
            if(!$event instanceof Event) {
                throw new \LogicException('Invalid item provided, must be an instance of Event');
            }
        }

        $this->events = $events;
    }

    public function add(Event $event) {
        $this->events[] = $event;
    }

    public function all(): array {
        return $this->events;
    }

    public function merge(EventCollector $events) {
        foreach ($events->all() as $event) {
            $this->events[] = $event;
        }
    }
}