<?php

namespace paOnde\backendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags_cloud
 *
 * @ORM\Table(name="tags_cloud")
 * @ORM\Entity(repositoryClass="paOnde\backendBundle\Repository\Tags_cloudRepository")
 */
class Tags_cloud
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
     * @ORM\Column(name="tacl_name", type="string", length=255, unique=true)
     */
    private $taclName;


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
     * Set taclName
     *
     * @param string $taclName
     *
     * @return Tags_cloud
     */
    public function setTaclName($taclName)
    {
        $this->taclName = $taclName;

        return $this;
    }

    /**
     * Get taclName
     *
     * @return string
     */
    public function getTaclName()
    {
        return $this->taclName;
    }
}

