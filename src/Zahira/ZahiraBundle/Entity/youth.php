<?php

namespace Zahira\ZahiraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * youth
 *
 * @ORM\Table(name="youth")
 * @ORM\Entity(repositoryClass="Zahira\ZahiraBundle\Repository\youthRepository")
 */
class youth
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
     * @ORM\Column(name="cod_youth", type="string", length=10)
     */
    private $codYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="name_youth", type="string", length=70)
     */
    private $nameYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname_youth", type="string", length=70)
     */
    private $lastnameYouth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="group_youth", type="string", length=30)
     */
    private $groupYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="address_youth", type="string", length=100)
     */
    private $addressYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_youth", type="string", length=25)
     */
    private $phoneYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_youth", type="string", length=100)
     */
    private $mailYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="commune", type="string", length=12)
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="image_youth", type="text")
     */
    private $imageYouth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_youth", type="date")
     */
    private $registerYouth;

    /**
     * @var bool
     *
     * @ORM\Column(name="state_youth", type="boolean")
     */
    private $stateYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="sex_youth", type="string", length=12)
     */
    private $sexYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="vote_youth", type="string", length=70)
     */
    private $voteYouth;

    /**
     * @var bool
     *
     * @ORM\Column(name="subsidy", type="boolean")
     */
    private $subsidy;

    /**
     * @var bool
     *
     * @ORM\Column(name="pension_youth", type="boolean")
     */
    private $pensionYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="entity_youth", type="string", length=30)
     */
    private $entityYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="sisben_youth", type="decimal", precision=10, scale=0)
     */
    private $sisbenYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="bingo_youth", type="string", length=10)
     */
    private $bingoYouth;

    /**
     * @var string
     *
     * @ORM\Column(name="size_youth", type="string", length=10)
     */
    private $sizeYouth;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cod_eps", type="string", length=10)
     */
    private $codEps;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cod_Rh", type="string", length=10)
     */
    private $cod_Rh;

    
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
     * Set codYouth
     *
     * @param string $codYouth
     *
     * @return youth
     */
    public function setCodYouth($codYouth)
    {
        $this->codYouth = $codYouth;

        return $this;
    }

    /**
     * Get codYouth
     *
     * @return string
     */
    public function getCodYouth()
    {
        return $this->codYouth;
    }

    /**
     * Set nameYouth
     *
     * @param string $nameYouth
     *
     * @return youth
     */
    public function setNameYouth($nameYouth)
    {
        $this->nameYouth = $nameYouth;

        return $this;
    }

    /**
     * Get nameYouth
     *
     * @return string
     */
    public function getNameYouth()
    {
        return $this->nameYouth;
    }

    /**
     * Set lastnameYouth
     *
     * @param string $lastnameYouth
     *
     * @return youth
     */
    public function setLastnameYouth($lastnameYouth)
    {
        $this->lastnameYouth = $lastnameYouth;

        return $this;
    }

    /**
     * Get lastnameYouth
     *
     * @return string
     */
    public function getLastnameYouth()
    {
        return $this->lastnameYouth;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return youth
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set groupYouth
     *
     * @param string $groupYouth
     *
     * @return youth
     */
    public function setGroupYouth($groupYouth)
    {
        $this->groupYouth = $groupYouth;

        return $this;
    }

    /**
     * Get groupYouth
     *
     * @return string
     */
    public function getGroupYouth()
    {
        return $this->groupYouth;
    }

    /**
     * Set addressYouth
     *
     * @param string $addressYouth
     *
     * @return youth
     */
    public function setAddressYouth($addressYouth)
    {
        $this->addressYouth = $addressYouth;

        return $this;
    }

    /**
     * Get addressYouth
     *
     * @return string
     */
    public function getAddressYouth()
    {
        return $this->addressYouth;
    }

    /**
     * Set phoneYouth
     *
     * @param string $phoneYouth
     *
     * @return youth
     */
    public function setPhoneYouth($phoneYouth)
    {
        $this->phoneYouth = $phoneYouth;

        return $this;
    }

    /**
     * Get phoneYouth
     *
     * @return string
     */
    public function getPhoneYouth()
    {
        return $this->phoneYouth;
    }

    /**
     * Set mailYouth
     *
     * @param string $mailYouth
     *
     * @return youth
     */
    public function setMailYouth($mailYouth)
    {
        $this->mailYouth = $mailYouth;

        return $this;
    }

    /**
     * Get mailYouth
     *
     * @return string
     */
    public function getMailYouth()
    {
        return $this->mailYouth;
    }

    /**
     * Set commune
     *
     * @param string $commune
     *
     * @return youth
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set imageYouth
     *
     * @param string $imageYouth
     *
     * @return youth
     */
    public function setImageYouth($imageYouth)
    {
        $this->imageYouth = $imageYouth;

        return $this;
    }

    /**
     * Get imageYouth
     *
     * @return string
     */
    public function getImageYouth()
    {
        return $this->imageYouth;
    }

    /**
     * Set registerYouth
     *
     * @param \DateTime $registerYouth
     *
     * @return youth
     */
    public function setRegisterYouth($registerYouth)
    {
        $this->registerYouth = $registerYouth;

        return $this;
    }

    /**
     * Get registerYouth
     *
     * @return \DateTime
     */
    public function getRegisterYouth()
    {
        return $this->registerYouth;
    }

    /**
     * Set stateYouth
     *
     * @param boolean $stateYouth
     *
     * @return youth
     */
    public function setStateYouth($stateYouth)
    {
        $this->stateYouth = $stateYouth;

        return $this;
    }

    /**
     * Get stateYouth
     *
     * @return bool
     */
    public function getStateYouth()
    {
        return $this->stateYouth;
    }

    /**
     * Set sexYouth
     *
     * @param string $sexYouth
     *
     * @return youth
     */
    public function setSexYouth($sexYouth)
    {
        $this->sexYouth = $sexYouth;

        return $this;
    }

    /**
     * Get sexYouth
     *
     * @return string
     */
    public function getSexYouth()
    {
        return $this->sexYouth;
    }

    /**
     * Set voteYouth
     *
     * @param string $voteYouth
     *
     * @return youth
     */
    public function setVoteYouth($voteYouth)
    {
        $this->voteYouth = $voteYouth;

        return $this;
    }

    /**
     * Get voteYouth
     *
     * @return string
     */
    public function getVoteYouth()
    {
        return $this->voteYouth;
    }

    /**
     * Set subsidy
     *
     * @param boolean $subsidy
     *
     * @return youth
     */
    public function setSubsidy($subsidy)
    {
        $this->subsidy = $subsidy;

        return $this;
    }

    /**
     * Get subsidy
     *
     * @return bool
     */
    public function getSubsidy()
    {
        return $this->subsidy;
    }

    /**
     * Set pensionYouth
     *
     * @param boolean $pensionYouth
     *
     * @return youth
     */
    public function setPensionYouth($pensionYouth)
    {
        $this->pensionYouth = $pensionYouth;

        return $this;
    }

    /**
     * Get pensionYouth
     *
     * @return bool
     */
    public function getPensionYouth()
    {
        return $this->pensionYouth;
    }

    /**
     * Set entityYouth
     *
     * @param string $entityYouth
     *
     * @return youth
     */
    public function setEntityYouth($entityYouth)
    {
        $this->entityYouth = $entityYouth;

        return $this;
    }

    /**
     * Get entityYouth
     *
     * @return string
     */
    public function getEntityYouth()
    {
        return $this->entityYouth;
    }

    /**
     * Set sisbenYouth
     *
     * @param string $sisbenYouth
     *
     * @return youth
     */
    public function setSisbenYouth($sisbenYouth)
    {
        $this->sisbenYouth = $sisbenYouth;

        return $this;
    }

    /**
     * Get sisbenYouth
     *
     * @return string
     */
    public function getSisbenYouth()
    {
        return $this->sisbenYouth;
    }

    /**
     * Set bingoYouth
     *
     * @param string $bingoYouth
     *
     * @return youth
     */
    public function setBingoYouth($bingoYouth)
    {
        $this->bingoYouth = $bingoYouth;

        return $this;
    }

    /**
     * Get bingoYouth
     *
     * @return string
     */
    public function getBingoYouth()
    {
        return $this->bingoYouth;
    }

    /**
     * Set sizeYouth
     *
     * @param string $sizeYouth
     *
     * @return youth
     */
    public function setSizeYouth($sizeYouth)
    {
        $this->sizeYouth = $sizeYouth;

        return $this;
    }

    /**
     * Get sizeYouth
     *
     * @return string
     */
    public function getSizeYouth()
    {
        return $this->sizeYouth;
    }
    
    
    function getCodEps() {
        return $this->codEps;
    }

    function setCodEps($codEps) {
        $this->codEps = $codEps;
    }
    
    
    function getCod_Rh() {
        return $this->cod_Rh;
    }

    function setCod_Rh($cod_Rh) {
        $this->cod_Rh = $cod_Rh;
    }


}

