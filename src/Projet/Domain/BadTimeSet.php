<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 16:59
 */

namespace Projet\Domain;


class BadTimeSet extends \Exception
{
    public static function startTimeIsInPast(): self
    {
        return new self('An event can\'t start in the past.');
    }

    public static function endTimeIsBeforeStartTime(): self
    {
        return new self('The end time can\'t be set before the start time.');
    }
}