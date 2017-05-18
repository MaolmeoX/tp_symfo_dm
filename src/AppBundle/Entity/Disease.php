<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disease
 *
 * @ORM\Table(name="disease")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiseaseRepository")
 */
class Disease
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="effect", type="string", length=255)
     */
    private $effect;

    /**
     * @var bool
     *
     * @ORM\Column(name="isMortal", type="boolean")
     */
    private $isMortal;

    /**
     * @var string
     *
     * @ORM\Column(name="traitement", type="string", length=255)
     */
    private $traitement;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Appointment", mappedBy="disease")
     */
    private $appointment;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Species", inversedBy="diseases")
     * @ORM\JoinTable(name="diseases_specie")
     */
    private $specie;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Disease
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set effect
     *
     * @param string $effect
     * @return Disease
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Get effect
     *
     * @return string 
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set isMortal
     *
     * @param boolean $isMortal
     * @return Disease
     */
    public function setIsMortal($isMortal)
    {
        $this->isMortal = $isMortal;

        return $this;
    }

    /**
     * Get isMortal
     *
     * @return boolean 
     */
    public function getIsMortal()
    {
        return $this->isMortal;
    }

    /**
     * Set traitement
     *
     * @param string $traitement
     * @return Disease
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;

        return $this;
    }

    /**
     * Get traitement
     *
     * @return string 
     */
    public function getTraitement()
    {
        return $this->traitement;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->specie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set appointment
     *
     * @param \AppBundle\Entity\Appointment $appointment
     * @return Disease
     */
    public function setAppointment(\AppBundle\Entity\Appointment $appointment = null)
    {
        $this->appointment = $appointment;

        return $this;
    }

    /**
     * Get appointment
     *
     * @return \AppBundle\Entity\Appointment 
     */
    public function getAppointment()
    {
        return $this->appointment;
    }

    /**
     * Add specie
     *
     * @param \AppBundle\Entity\Species $specie
     * @return Disease
     */
    public function addSpecie(\AppBundle\Entity\Species $specie)
    {
        $this->specie[] = $specie;

        return $this;
    }

    /**
     * Remove specie
     *
     * @param \AppBundle\Entity\Species $specie
     */
    public function removeSpecie(\AppBundle\Entity\Species $specie)
    {
        $this->specie->removeElement($specie);
    }

    /**
     * Get specie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSpecie()
    {
        return $this->specie;
    }
}
