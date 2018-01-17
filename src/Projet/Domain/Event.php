<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 12:01
 */

namespace Projet\Domain;

class Event
{
    private $description;
    private $objectif;
    private $numberOfPlaces;
    private $address;
    private $horaireDebut;
    private $horaireFin;
    private $ChosenRoom;

    public function __construct(
        string $description,
        string $objectif,
        int $numberOfPlaces,
        string $address,
        \DateTime $horaireDebut,
        \DateTime $horaireFin,
        string $chosenRoom
    )
    {
        if($horaireDebut < new \DateTime()) {
            throw BadTimeSet::startTimeIsInPast();
        }

        if($horaireFin < $horaireDebut) {
            throw BadTimeSet::endTimeIsBeforeStartTime();
        }

        $this->description = $description;
        $this->objectif = $objectif;
        $this->numberOfPlaces = $numberOfPlaces;
        $this->address = $address;
        $this->horaireDebut = $horaireDebut;
        $this->horaireFin = $horaireFin;
        $this->ChosenRoom = $chosenRoom;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getObjectif(): string
    {
        return $this->objectif;
    }

    /**
     * @return int
     */
    public function getNumberOfPlaces(): int
    {
        return $this->numberOfPlaces;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getHoraireDebut(): DateTimeImmutable
    {
        return $this->horaireDebut;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getHoraireFin(): DateTimeImmutable
    {
        return $this->horaireFin;
    }

    /**
     * @return string
     */
    public function getChosenRoom(): string
    {
        return $this->ChosenRoom;
    }
}