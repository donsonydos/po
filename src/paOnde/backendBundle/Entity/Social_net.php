<?php

namespace paOnde\backendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Social_net
 *
 * @ORM\Table(name="social_net")
 * @ORM\Entity(repositoryClass="paOnde\backendBundle\Repository\Social_netRepository")
 */
class Social_net
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
     * @ORM\Column(name="sone_is_by_office", type="integer")
     */
    private $soneIsByOffice;

    /**
     * @var int
     *
     * @ORM\Column(name="plce_id", type="integer")
     */
    private $plceId;

    /**
     * @var int
     *
     * @ORM\Column(name="offi_id", type="integer")
     */
    private $offiId;

    /**
     * @var string
     *
     * @ORM\Column(name="sone_url", type="text")
     */
    private $soneUrl;


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
     * Set soneIsByOffice
     *
     * @param integer $soneIsByOffice
     *
     * @return Social_net
     */
    public function setSoneIsByOffice($soneIsByOffice)
    {
        $this->soneIsByOffice = $soneIsByOffice;

        return $this;
    }

    /**
     * Get soneIsByOffice
     *
     * @return int
     */
    public function getSoneIsByOffice()
    {
        return $this->soneIsByOffice;
    }

    /**
     * Set plceId
     *
     * @param integer $plceId
     *
     * @return Social_net
     */
    public function setPlceId($plceId)
    {
        $this->plceId = $plceId;

        return $this;
    }

    /**
     * Get plceId
     *
     * @return int
     */
    public function getPlceId()
    {
        return $this->plceId;
    }

    /**
     * Set offiId
     *
     * @param integer $offiId
     *
     * @return Social_net
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
     * Set soneUrl
     *
     * @param string $soneUrl
     *
     * @return Social_net
     */
    public function setSoneUrl($soneUrl)
    {
        $this->offiId = $soneUrl;

        return $this;
    }

    /**
     * Get soneUrl
     *
     * @return int
     */
    public function getSoneUrl()
    {
        return $this->soneUrl;
    }


}
