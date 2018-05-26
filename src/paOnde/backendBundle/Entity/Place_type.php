<?php

namespace paOnde\backendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place_type
 *
 * @ORM\Table(name="place_type")
 * @ORM\Entity(repositoryClass="paOnde\backendBundle\Repository\Place_typeRepository")
 */
class Place_type
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
     * @ORM\Column(name="plty_name", type="string", length=255, unique=true)
     */
    private $pltyName;

    /**
     * @var int
     *
     * @ORM\Column(name="plty_ordering", type="integer", unique=false)
     */
    private $pltyOrdering;

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
     * Set pltyName
     *
     * @param string $pltyName
     *
     * @return Place_type
     */
    public function setPltyName($pltyName)
    {
        $this->pltyName = $pltyName;

        return $this;
    }

    /**
     * Get pltyName
     *
     * @return string
     */
    public function getPltyName()
    {
        return $this->pltyName;
    }

    /**
     * Set pltyOrdering
     *
     * @param string $pltyOrdering
     *
     * @return Place_type
     */
    public function setPltyOrdering($pltyOrdering)
    {
        $this->pltyOrdering = $pltyOrdering;

        return $this;
    }

    /**
     * Get pltyOrdering
     *
     * @return string
     */
    public function getPltyOrdering()
    {
        return $this->pltyOrdering;
    }
}

