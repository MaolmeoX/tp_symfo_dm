<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AppointmentRepository")
 */
class Appointment
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
     * @var \DateTime
     *
     * @ORM\Column(name="startAt", type="datetime")
     */
    private $startAt;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, unique=true)
     */
    private $reference;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPaid", type="boolean")
     */
    private $isPaid;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Animal", inversedBy="appointments")
     * @ORM\JoinColumn(name="appointment_id", referencedColumnName="id")
     */
    private $animal;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Disease", inversedBy="appointment")
     * @ORM\JoinColumn(name="disease_id", referencedColumnName="id", nullable=true)
     */
    private $disease;

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
     * Set startAt
     *
     * @param \DateTime $startAt
     * @return Appointment
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime 
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Appointment
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set isPaid
     *
     * @param boolean $isPaid
     * @return Appointment
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    /**
     * Get isPaid
     *
     * @return boolean 
     */
    public function getIsPaid()
    {
        return $this->isPaid;
    }

    /**
     * Set animal
     *
     * @param \AppBundle\Entity\Animal $animal
     * @return Appointment
     */
    public function setAnimal(\AppBundle\Entity\Animal $animal = null)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get animal
     *
     * @return \AppBundle\Entity\Animal 
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set disease
     *
     * @param \AppBundle\Entity\Disease $disease
     * @return Appointment
     */
    public function setDisease(\AppBundle\Entity\Disease $disease = null)
    {
        $this->disease = $disease;

        return $this;
    }

    /**
     * Get disease
     *
     * @return \AppBundle\Entity\Disease 
     */
    public function getDisease()
    {
        return $this->disease;
    }
}
