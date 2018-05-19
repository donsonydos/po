<?php

namespace paOnde\backendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Office_tags
 *
 * @ORM\Table(name="office_tags")
 * @ORM\Entity(repositoryClass="paOnde\backendBundle\Repository\Office_tagsRepository")
 */
class Office_tags
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
     * @var int
     *
     * @ORM\Column(name="ofta_status", type="integer")
     */
    private $oftaStatus;

    /**
     * @var int
     *
     * @ORM\Column(name="offi_id", type="integer")
     */
    private $offiId;

    /**
     * @var int
     *
     * @ORM\Column(name="tacl_id", type="integer")
     */
    private $taclId;


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
     * Set oftaStatus
     *
     * @param integer $oftaStatus
     *
     * @return Office_tags
     */
    public function setOftaStatus($oftaStatus)
    {
        $this->oftaStatus = $oftaStatus;

        return $this;
    }

    /**
     * Get oftaStatus
     *
     * @return int
     */
    public function getOftaStatus()
    {
        return $this->oftaStatus;
    }

    /**
     * Set offiId
     *
     * @param integer $offiId
     *
     * @return Office_tags
     */
    public function setOffiId($offiId)
    {
        $this->offiId = $offiId;

        return $this;
    }

    /**
     * Get offiId
     *
     * @return int
     */
    public function getOffiId()
    {
        return $this->offiId;
    }

    /**
     * Set taclId
     *
     * @param integer $taclId
     *
     * @return Office_tags
     */
    public function setTaclId($taclId)
    {
        $this->taclId = $taclId;

        return $this;
    }

    /**
     * Get taclId
     *
     * @return int
     */
    public function getTaclId()
    {
        return $this->taclId;
    }
}

