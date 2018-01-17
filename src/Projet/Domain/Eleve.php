<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 15/01/2018
 * Time: 15:57
 */

namespace Projet\Domain;

class Eleve
{
    private $nom;
    private $prenom;
    private $dateInscription;
    private $dateNaissance;


    public function __construct($nom, $prenom, $dateNaissance = '0000/00/00', $dateInscription = '0000/00/00')
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
}