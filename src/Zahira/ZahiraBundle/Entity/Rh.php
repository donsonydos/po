<?php

namespace Zahira\ZahiraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rh
 *
 * @ORM\Table(name="rh")
 * @ORM\Entity(repositoryClass="Zahira\ZahiraBundle\Repository\RhRepository")
 */
class Rh
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
     * @ORM\Column(name="cod_Rh", type="string", length=10)
     */
    private $codRh;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_rh", type="string", length=5)
     */
    private $tipoRh;


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
     * Set codRh
     *
     * @param string $codRh
     *
     * @return Rh
     */
    public function setCodRh($codRh)
    {
        $this->codRh = $codRh;

        return $this;
    }

    /**
     * Get codRh
     *
     * @return string
     */
    public function getCodRh()
    {
        return $this->codRh;
    }

    /**
     * Set tipoRh
     *
     * @param string $tipoRh
     *
     * @return Rh
     */
    public function setTipoRh($tipoRh)
    {
        $this->tipoRh = $tipoRh;

        return $this;
    }

    /**
     * Get tipoRh
     *
     * @return string
     */
    public function getTipoRh()
    {
        return $this->tipoRh;
    }
}

