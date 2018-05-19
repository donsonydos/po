<?php

namespace paOnde\backendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Office
 *
 * @ORM\Table(name="office")
 * @ORM\Entity(repositoryClass="paOnde\backendBundle\Repository\OfficeRepository")
 */
class Office
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="plce_id", type="integer")
     */
    private $plceId;

    /**
     * @var string
     *
     * @ORM\Column(name="offi_schedule", type="text")
     */
    private $offiSchedule;

    /**
     * @var string
     *
     * @ORM\Column(name="offi_name", type="text")
     */
    private $offiName;

    /**
     * @var int
     *
     * @ORM\Column(name="offi_phone", type="integer")
     */
    private $offiPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="offi_address", type="string", length=255)
     */
    private $offiAddress;

    /**
     * @var float
     *
     * @ORM\Column(name="offi_lt_ln", type="float", nullable=true)
     */
    private $offiLtLn;

    /**
     * @var string
     *
     * @ORM\Column(name="offi_type_pay_accepted", type="text", nullable=true)
     */
    private $offiTypePayAccepted;


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
     * Set description
     *
     * @param string $description
     *
     * @return Office
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set plceId
     *
     * @param integer $plceId
     *
     * @return Office
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
     * Set offiSchedule
     *
     * @param string $offiSchedule
     *
     * @return Office
     */
    public function setOffiSchedule($offiSchedule)
    {
        $this->offiSchedule = $offiSchedule;

        return $this;
    }

    /**
     * Get offiSchedule
     *
     * @return string
     */
    public function getOffiSchedule()
    {
        return $this->offiSchedule;
    }

    /**
     * Set offiName
     *
     * @param string $offiName
     *
     * @return Office
     */
    public function setOffiName($offiName)
    {
        $this->offiName = $offiName;

        return $this;
    }

    /**
     * Get offiName
     *
     * @return string
     */
    public function getOffiName()
    {
        return $this->offiName;
    }

    /**
     * Set offiPhone
     *
     * @param integer $offiPhone
     *
     * @return Office
     */
    public function setOffiPhone($offiPhone)
    {
        $this->offiPhone = $offiPhone;

        return $this;
    }

    /**
     * Get offiPhone
     *
     * @return int
     */
    public function getOffiPhone()
    {
        return $this->offiPhone;
    }

    /**
     * Set offiAddress
     *
     * @param string $offiAddress
     *
     * @return Office
     */
    public function setOffiAddress($offiAddress)
    {
        $this->offiAddress = $offiAddress;

        return $this;
    }

    /**
     * Get offiAddress
     *
     * @return string
     */
    public function getOffiAddress()
    {
        return $this->offiAddress;
    }

    /**
     * Set offiLtLn
     *
     * @param float $offiLtLn
     *
     * @return Office
     */
    public function setOffiLtLn($offiLtLn)
    {
        $this->offiLtLn = $offiLtLn;

        return $this;
    }

    /**
     * Get offiLtLn
     *
     * @return float
     */
    public function getOffiLtLn()
    {
        return $this->offiLtLn;
    }

    /**
     * Set offiTypePayAccepted
     *
     * @param string $offiTypePayAccepted
     *
     * @return Office
     */
    public function setOffiTypePayAccepted($offiTypePayAccepted)
    {
        $this->offiTypePayAccepted = $offiTypePayAccepted;

        return $this;
    }

    /**
     * Get offiTypePayAccepted
     *
     * @return string
     */
    public function getOffiTypePayAccepted()
    {
        return $this->offiTypePayAccepted;
    }
}

