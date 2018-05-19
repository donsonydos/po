<?php

namespace Zahira\ZahiraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eps
 *
 * @ORM\Table(name="eps")
 * @ORM\Entity(repositoryClass="Zahira\ZahiraBundle\Repository\EpsRepository")
 */
class Eps
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
     * @ORM\Column(name="cod_eps", type="string", length=10)
     */
    private $codEps;

    /**
     * @var string
     *
     * @ORM\Column(name="name_eps", type="string", length=70)
     */
    private $nameEps;

    /**
     * @var string
     *
     * @ORM\Column(name="regime_eps", type="string", length=70)
     */
    private $regimeEps;


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
     * Set codEps
     *
     * @param string $codEps
     *
     * @return Eps
     */
    public function setCodEps($codEps)
    {
        $this->codEps = $codEps;

        return $this;
    }

    /**
     * Get codEps
     *
     * @return string
     */
    public function getCodEps()
    {
        return $this->codEps;
    }

    /**
     * Set nameEps
     *
     * @param string $nameEps
     *
     * @return Eps
     */
    public function setNameEps($nameEps)
    {
        $this->nameEps = $nameEps;

        return $this;
    }

    /**
     * Get nameEps
     *
     * @return string
     */
    public function getNameEps()
    {
        return $this->nameEps;
    }

    /**
     * Set regimeEps
     *
     * @param string $regimeEps
     *
     * @return Eps
     */
    public function setRegimeEps($regimeEps)
    {
        $this->regimeEps = $regimeEps;

        return $this;
    }

    /**
     * Get regimeEps
     *
     * @return string
     */
    public function getRegimeEps()
    {
        return $this->regimeEps;
    }
}

