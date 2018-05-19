<?php

namespace paOnde\backendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="paOnde\backendBundle\Repository\PlaceRepository")
 */
class Place
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="plce_name", type="string", length=255)
     */
    private $plceName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set plceName
     *
     * @param string $plceName
     *
     * @return Place
     */
    public function setPlceName($plceName)
    {
        $this->plceName = $plceName;

        return $this;
    }

    /**
     * Get plceName
     *
     * @return string
     */
    public function getPlceName()
    {
        return $this->plceName;
    }
}

